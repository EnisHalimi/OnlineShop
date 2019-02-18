<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'value','subjekti' ,'quantity','mesazhi','dergesa'
    ];

    public static function getTotal($id)
    {
        $total = Order::where('UserID','=',$id)->sum('value');
        return $total;
    }

    public static function getNrPorosive($id)
    {
        $porosite = Order::where('UserID','=',$id)->groupBy('UserID')->count();
        return $porosite;
    }

    public static function getUserName($id)
    {
        $order = Order::find($id);
        $user = User::find($order->UserID);
        return $user->name;
    }
    
    public function products()
    {
        return $this->belongsToMany('App\Product', 'products_order','orderID','productID');
    }

    public function user()
    {
        return $this->belongsTo('App\User','UserID');
    }
    
}
