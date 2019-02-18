<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart_storage';

    protected $fillable = [
        'UserID', 'ProductID', 'Sasia'
    ];

    public function products()
    {
        return $this->hasMany('App\Products','ProductID');
    }

    public function user()
    {
        return $this->belongsTo('App\User','UserID');
    }

    public static function getQuantity($id)
    {
        $cart = Cart::where('UserID','=',$id)->sum('Sasia');
        return $cart;
    }

    public static function getTotalPrice($id)
    {
        $cart = Cart::where('UserID','=',$id)->sum(DB::raw('Sasia * Qmimi'));
        return $cart;
    }

    public static function getUniqueQuantity($id)
    {
        $cart = Cart::where('UserID','=',$id)->count('Sasia');
        return $cart;
    }

    public static function deleteCartContent($id)
    {
        $cart = Cart::where('UserID','=',$id)->get();
        foreach($cart as $ct)
        {
            $item = Cart::where('id','=',$ct->id);
            $item->delete();
        }

    }

    public static function getProductQuantityOnCart($id,$userID)
    {
        $cart = Cart::where('ProductID','=',$id)->where('UserID','=',$userID)->first();
        if($cart == null)
        {
            return 1;
        }
        else {
            return $cart->Sasia;
        }
    }
}
