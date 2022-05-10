<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Purchase;
use App\Models\Soil_test;
use App\Models\User;
use Carbon\Carbon;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Exception;
use Illuminate\Http\Request;

class SoilTestController extends Controller
{

    public function index()
    {

        $tests = Soil_test::latest()
                 ->get();

        return view('soilTests.index', ['title' => 'Soil tests page', 'tests' => $tests]);
    }

    public function show($id)
    {

        $test = Soil_test::findOrFail($id);

        return view('soilTests.show', ['title' => 'Soil test page', 'test' => $test]);
    }

    public function create(Request $request)
    {

        $id = $request->session()->get('loggedUser');

        $soilTests = Soil_test::where('user_id', $id)->latest('created_at')->first();

        // dd($soilTests);

        return view('soilTests.create', ['title' => 'Create soil test page', 'soilTests' => $soilTests]);
    }

    public function store(Request $request)
    {

        $currentMnth = Carbon::now()->format('m');
        $currentDay = Carbon::now()->format('d');

        $request->validate([

            'month' => 'required|after_or_equal: .$currentMnth',
            'day' => 'required|after_or_equal: .$currentDay',
            'time' => 'required',
        ]);

        // dd('hai');
        $soilTest = new Soil_test();

        $soilTest->user_id = $request->session()->get('loggedUser');
        $soilTest->date = Carbon::createFromDate('2022', $request->month, $request->day);
        $soilTest->time = Carbon::createFromTime($request->time, 0, 0);
        $soilTest->save();

        return redirect('/soil-test/create-soil-test');

    }

    public function update($id)
    {

        return view('soilTests.update', ['title' => 'Update soil test page']);
    }

    public function change(Request $request)
    {

    }

    public function cancel($id)
    {
        $soilTest = Soil_test::findOrFail($id);

        $soilTest->delete();

        return redirect('/soil-test/appointments');
    }

    public function display(Request $request)
    {

        $id = $request->session()->get('loggedUser');

        $tests = Soil_test::where('user_id', $id)
            ->get();

        return view('soilTests.display', ['title' => 'Soil tests page', 'tests' => $tests]);
    }

    public function displayOne($id, Request $request)
    {

        $userId = $request->session()->get('loggedUser');
        $test = Soil_test::findOrFail($id);

        $purchase = Purchase::where('user_id', $userId)->where('soil_test_id', $id)->get();

        return view('soilTests.displayOne', ['title' => 'Soil test page', 'test' => $test, 'purchase' => $purchase]);
    }

    public function success()
    {

        return view('checkout.success', ['title' => 'Success page']);
    }

    public function failed()
    {

        return view('checkout.failed', ['title' => 'Failed page']);
    }

    public function prodceedToPay($id, Request $request)
    {

        // dd($id);
        $request->session()->put('soilTestId', $id);

        $total = $request->total;
        $request->session()->put('totalAmount', $total);

        return redirect('/soil-test/checkout');
    }

    public function storePurchase($userId, $addressId, $cardNumber, $amount, $paymentMethod, $status, $orderStatus, $soilTestId)
    {

        $purchase = new Purchase();
        $purchase->user_id = $userId;
        $purchase->address_id = $addressId;
        $purchase->card_number = $cardNumber;
        $purchase->amount = $amount;
        $purchase->delivery_charge = 60;
        $purchase->total = $amount + 60;
        $purchase->payment_method = $paymentMethod;
        $purchase->status = $status;
        $purchase->order_status = $orderStatus;
        $purchase->soil_test_id = $soilTestId;

        $purchase->save();

    }

    public function createCheckout(Request $request)
    {

        $id = $request->session()->get('loggedUser');
        $totalAmount = $request->session()->get('totalAmount');

        $addresses = Address::latest()
            ->where('user_id', $id)->get();

        if ($totalAmount) {

            return view('checkout.index', ['title' => 'Checkout page', 'addresses' => $addresses]);

        } else {

            return redirect('/');
        }
    }

    public function makeTransaction(Request $request)
    {

        $id = $request->session()->get('loggedUser');
        $soilTest = Soil_test::where('user_id', $id)->latest('created_at')->first();

        $user = User::findOrFail($id);

        //addressId
        $addressId = $request->selected_address;

        //find the address with the id sent from the view ( selected address )
        $address = Address::findOrFail($addressId);

        $soilTestId = $request->session()->get('soilTestId');

        // ddd($address);

        $totalAmount = $request->session()->get('totalAmount');

        //card details
        $cardNumber = $request->card_number;

        $expiryMonth = $request->expiry_month;

        $expiryYear = $request->expiry_year;

        $cvv = $request->cvv;

        if ($request->payment_method == "cod") {

            $request->validate([
                'selected_address' => 'required',

            ]);
        } else if ($request->payment_method == "card") {

            $request->validate([

                'card_number' => 'required',
                'expiry_month' => 'required',
                'expiry_year' => 'required',
                'cvv' => 'required',
                'selected_address' => 'required',

            ]);
        }

        //logic for cod transactions
        if ($request->payment_method == "cod") {

            $this->storePurchase($id, $addressId, 0, $totalAmount, "cod", "pending", "ordered", $soilTest->id);

            $request->session()->forget('soilTestId');
            $request->session()->forget('totalAmount');

            return redirect('/checkout/success');
        }
        //logic for card transactions
        else if ($request->payment_method == "card") {

            $stripe = Stripe::make(env('STRIPE_SECRET'));

            try {

                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $cardNumber,
                        'exp_month' => $expiryMonth,
                        'exp_year' => $expiryYear,
                        'cvc' => $cvv,
                    ],
                ]);

                // dd($token);

                if (!isset($token['id'])) {

                    session()->flash('stripe_error', 'The stripe token was not generated correctly!');
                    return redirect('/checkout');
                }

                $customer = $stripe->customers()->create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'address' => [
                        'line1' => $address->house_name . ' ' . $address->street,
                        'postal_code' => $address->pincode,
                        'city' => $address->city,
                        'state' => $address->state,
                        'country' => 'India',
                    ],
                    'shipping' => [

                        'name' => $address->name,
                        'address' => [
                            'line1' => $address->house_name . ' ' . $address->street,
                            'postal_code' => $address->pincode,
                            'city' => $address->city,
                            'state' => $address->state,
                            'country' => 'India',
                        ],
                    ],
                    'source' => $token['id'],
                ]);

                // dd($customer);

                $charge = $stripe->paymentIntents()->create([

                    'customer' => $customer['id'],
                    'currency' => 'inr',
                    'amount' => $totalAmount + 60,
                    'description' => 'Payment for order no : ',
                    'payment_method_types' => [
                        'card',
                    ],
                ]);

                // dd($charge);

                if ($charge['status'] == 'succeeded') {

                    $this->storePurchase($id, $addressId, $cardNumber, $totalAmount, "card", "succesful", "ordered", $soilTest->id);

                    $request->session()->forget('soilTestId');
                    $request->session()->forget('totalAmount');

                    return redirect('/checkout/success');
                } else {
                    session()->flash('stripe_error', 'Error in transaction!');

                    $this->storePurchase($id, $addressId, $cardNumber, $totalAmount, "card", "failed", "failed", $soilTest->id);

                    $request->session()->forget('soilTestId');
                    $request->session()->forget('totalAmount');

                    return redirect('/checkout/failed');
                }
            } catch (Exception $e) {

                session()->flash('stripe_error', $e->getMessage());
                dd($e->getMessage());
                return redirect('/checkout/failed');
            }
        }
    }

}
