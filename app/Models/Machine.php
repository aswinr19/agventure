<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;


    public function user(){

        return $this->belongsTo(User::class);

    }
    public function cartItems(){

        return $this->hasMany(Cart::class);
   }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
