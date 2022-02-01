<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuctionController extends Controller
{
    //

    public function index(){

        return view('auctions.index',['title'=>'Auctions page']);

    }

    public function show($id){

        return view('auctions.show',['title'=>'Auction page']);


    }

    public function create(){

        return view('auctions.create',['title'=>'Create auction page']);

    }

    public function store(Request $request){


        
    }
}
