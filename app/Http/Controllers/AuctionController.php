<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Auction;
use Illuminate\Support\Carbon;


class AuctionController extends Controller
{
    

    public function index(Request $request){

        $id = $request->session()->get('loggedUser');

        $auctions = Auction::latest()
        ->where('user_id',$id)->get();
        // dd($auctions);
        return view('auctions.index',['title'=>'Auctions page','auctions'=>$auctions]);

    }

    public function show($id){

        $auction = Auction::findOrfail($id);
        return view('auctions.show',['title'=>'Auction page','auction'=>$auction]);


    }

    public function create(Request $request){

         $id = $request->session()->get('loggedUser');
         $item = Item::latest()->first();
        // dd($item);
        return view('auctions.create',['title'=>'Create auction page','item'=>$item]);

    }

    public function store(Request $request){

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
    public function update($id){
        $auction = Auction::findOrFail($id);
        return view('auctions.update',['title' => 'Update auction Page','auction'=>$auction]);


    }
    public function change(Request $request){
  
        $request->validate([
            'starting_price' => 'required',
            'duration' => 'required',
            'status'=> ' required'
        ]);
        $auction = Auction::findOrFail($request->id);
        // $auction->duration = Carbon::createFromFormat('H',$request->duration)->format('H:i:s');
        $auction->duration = $request->duration;
        $auction->status = $request->status;
        $auction->save();

    }

    public function destroy($id){
        
        $auction = Auction::findOrFail($id);
        $auction->delete();
        return redirect('/farmer/auction');
    }

    public function display(){

        $auctions = Auction::latest()
        ->where('status','approved');
        
        // $auctions = Auction::with('item')
        // ->where('status','approved');

         // dd($auctions);


        // if(request('search')){
            
        //     $auctions
        //     ->where('item.name','like','%'.request('search').'%')
        //     ->orWhere('item.description','like','%'.request('search').'%');
        // }


        return view('auctions.display',['title'=>'Auctions page','auctions'=>$auctions->get()]);
        

    }

    public function displayOne($id){

        $auction = Auction::findOrFail($id);
        return view('auctions.displayOne',['title'=>'Auction page','auction'=>$auction]);
     
    }

    public function indexAdmin(){


        $auctions = Auction::all();

        return view('auctions.indexAdmin',['title'=>'Auctions page','auctions'=>$auctions]);

    }

    public function showAdmin($id){

        $auction = Auction::findOrFail($id);

        return view('auctions.showAdmin',['title'=>'Auction page','auction'=>$auction]);

    }

    public function approve($id){

        $auction = Auction::findOrFail($id);
        $duration = $auction->duration;
        $auction->status = "approved";
        $auction->started_at = Carbon::now();
        $auction->ending_at = Carbon::now()->addHours($duration);
        $auction->save();

        return redirect('/admin/auctions');

    }

    public function reject($id){

        $auction = Auction::findOrFail($id);
        $auction->status = "rejected";
        $auction->save();

        return redirect('/admin/auctions');

    }
}
