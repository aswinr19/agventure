<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Auction;
use App\Models\Participation;
use Illuminate\Support\Carbon;

class AuctionController extends Controller
{


    public function index(Request $request)
    {

        $id = $request->session()->get('loggedUser');

        $auctions = Auction::latest()
            ->where('user_id', $id)->get();

        // foreach($auctions as $auction){

        //     $this->auctionComplete($auction->id);

        //}

        return view('auctions.index', ['title' => 'Auctions page', 'auctions' => $auctions]);
    }




    public function show($id)
    {

        $auction = Auction::findOrfail($id);
        return view('auctions.show', ['title' => 'Auction page', 'auction' => $auction]);
    }



    public function create(Request $request)
    {

        // $id = $request->session()->get('loggedUser');
        $item = Item::latest()->first();
        // dd($item);
        return view('auctions.create', ['title' => 'Create auction page', 'item' => $item]);
    }





    public function store(Request $request)
    {

        $request->validate([
            'starting_price' => 'required',
            'duration' => 'required'
        ]);
        $auction = new Auction();
        $auction->user_id = $request->session()->get('loggedUser');
        $auction->item_id = $request->item_id;
        $auction->starting_amount = $request->starting_price;
        //$auction->duration = Carbon::createFromFormat('H',$request->duration)->format('H:i:s');
        $auction->duration = $request->duration;
        $auction->save();
        return redirect('/farmer/auctions');
    }



    public function update($id)
    {
        $auction = Auction::findOrFail($id);
        return view('auctions.update', ['title' => 'Update auction Page', 'auction' => $auction]);
    }



    public function change(Request $request)
    {

        $request->validate([
            'starting_price' => 'required',
            'duration' => 'required',
            'status' => ' required'
        ]);
        $auction = Auction::findOrFail($request->id);
        // $auction->duration = Carbon::createFromFormat('H',$request->duration)->format('H:i:s');
        $auction->duration = $request->duration;
        $auction->starting_amount  = $request->starting_price;
        $auction->status = $request->status;
        $auction->save();

        return redirect('/farmer/auctions');
    }



    public function destroy($id)
    {

        $auction = Auction::findOrFail($id);
        $auction->delete();
        return redirect('/farmer/auctions');
    }



    public function display()
    {

        $auctions = Auction::latest()
            ->where('status', 'approved')
            ->get();

        return view('auctions.display', ['title' => 'Auctions page', 'auctions' => $auctions]);
    }



    public function displayOne($id, Request $request)
    {

        $auction = Auction::findOrFail($id);

            return view('auctions.displayOne', ['title' => 'Auction page', 'auction' => $auction]);
    }


    public function indexAdmin()
    {


        $auctions = Auction::all();

        return view('auctions.indexAdmin', ['title' => 'Auctions page', 'auctions' => $auctions]);
    }

    public function showAdmin($id)
    {

        $auction = Auction::findOrFail($id);

        return view('auctions.showAdmin', ['title' => 'Auction page', 'auction' => $auction]);
    }

    public function approve($id)
    {

        $auction = Auction::findOrFail($id);
        $duration = $auction->duration;
        $auction->status = "approved";
        $auction->started_at = Carbon::now();
        $auction->ending_at = Carbon::now()->addHours($duration);
        $auction->save();

        return redirect('/admin/auctions');
    }

    public function reject($id)
    {

        $auction = Auction::findOrFail($id);
        $auction->status = "rejected";
        $auction->save();

        return redirect('/admin/auctions');
    }

    public function startBid(Request $request)
    {
        
      

        $request->validate([

            'amount' => 'required',
            'agree' => 'required'
        ]);

        $auction = Auction::findOrFail($request->auction_id);

        if($request->amount > $auction->starting_amount){

            $bid = new Participation();

            $bid->user_id = $request->session()->get('loggedUser');
            $bid->auction_id = $request->auction_id;
            $bid->bid = $request->amount;
            $bid->status = "ongoing";
            $bid->save();
    
        }
        else{

            return back()->with('fail','Please enter a bid amount greater than that of starting amount!');
        }

       

        return redirect('/auctions/'. $request->auction_id );
    }




    public function updateBid(Request $request, $id)
    {


        $request->validate([
            'bid' => 'required',
        ]);

        $bid  = Participation::latest()
            ->where('auction_id', $id)
            ->get();

        $bid->bid = $request->bid;
        $bid->save();

        return redirect('/auction/{{ $id }}');
    }




    public function deleteBid($id)
    {

        $bid  = Participation::latest()
            ->where('auction_id', $id)
            ->get();

        $bid->delete();

        return redirect('/auction/{{ $id }}');
    }



    public function auctionComplete($id)
    {

        $auction = Auction::where('id', $id)
            ->where('status', '=', 'ended')
            ->get();

        $bid = Participation::where('auction_id', $id)
            ->orderBy('bid', 'DESC')
            ->first()
            ->get();

        if ($auction and $bid) {

            $auction->partcipation_id = $bid->user_id;
            $auction->save();
        }
    }

    public function result($id)
    {
        $auction = Auction::findOrFail($id);

        $bids = Participation::where('auction_id',$id)->get();

        // dd($bids);

        return view('auctions.result',['title'=>'Auction reslut page','bids'=>$bids,'auction'=>$auction]);
    }


    public function userResult(Request $request){

        $id = $request->session()->get('loggedUser');

        $bids = Participation::where('user_id',$id)->get();

        return view('auctions.userResult',['title'=>'Auctions results page','bids'=>$bids]);
    }



    public function approveBid($id)
    {

        $bid = Participation::findOrFail($id);
        
        $this->rejectBid($bid->auction_id);

        $bid->status =  "approved";

        $bid->save();

        return redirect('farmer/auction/results/'.$bid->auction_id);
    }

    public function rejectBid($id)
    {

        $bids = Participation::where('auction_id', $id)->get();

        foreach ($bids as $bid) {

            $bid->status = "rejected";
            $bid->save();
        }
    }


    public function prodceedToBuy($id,Request $request)
    {
        $request->session()->put('auctionId',$id);
        $total = $request->total;
        $request->session()->put('totalAmount',$total);

        return redirect('/checkout');
    }
}
