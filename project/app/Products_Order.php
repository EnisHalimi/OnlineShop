<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Products_Order extends Model
{
    protected $table = 'products_order';

    public static function getQuantityOfProduct($productID,$orderID)
    {
        $quantity = DB::table('products_order')
            ->where('orderID','=',$orderID)
            ->where('productID','=',$productID)
            ->select('quantity')
            ->get()
            ->first();
            
        return $quantity->quantity; 
    }

    public static function getQuantityTotal($orderID)
    {
        $quantity = DB::table('products_order')
            ->where('orderID','=',$orderID)
            ->sum('quantity');          
        return $quantity; 
    }

    
    
}
