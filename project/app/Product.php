<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Products_Order;
use App\Aksionet;
use DB;

class Product extends Model
{
    protected $table = 'tblartikujt';
    public $timestamps = false;
    

    public function order()
    {
        return $this->belongsToMany('App\Order','products_order','orderID','productID');
    }

    public function aksion()
    {
        return $this->hasOne('App\Aksionet','productID' ,'ID');
    }

    public function cart()
    {
        return $this->hasMany('App\Cart','ProductID');
    }


    public static function getProductsByOrder($id)
    {
        return $products = DB::table('products_order')
            ->leftJoin('tblartikujt', 'tblartikujt.ID', '=', 'products_order.productID')
            ->where('orderID','=',$id)
            ->get();
    }
  
    public static function getProductPrice($id, $priceID)
    {
        if($priceID == "R")
        {
            $pID = 2;
        }
        else {
            $pID = 3;
        }
        
        $products = DB::table('tblartikujt')
        ->leftJoin('tblartikujtcmimet', 'tblartikujt.ID', '=', 'tblartikujtcmimet.ArtikulliID')
        ->where('tblartikujtcmimet.PricelistID','=',$pID)
        ->where('tblartikujt.ID', '=',$id)
        ->select('tblartikujtcmimet.Price')
        ->get()
        ->first();
        if($products == null)
            $price = 0;
        else
            $price = $products->Price + ($products->Price*0.18);
        return number_format($price, 2);
    }
    public static function getProductPriceForCart($id, $priceID)
    {
        if($priceID == "R")
        {
            $pID = 2;
        }
        else {
            $pID = 3;
        }
        $percentage = 0;
        $aksion = Aksionet::where('productID','=',$id)->where('qmimorja','=',$priceID)->first();
        if($aksion !== null)
        {
            if($aksion->tipi == 1)
                $percentage = $aksion->rabati;
    
        }
        
        $products = DB::table('tblartikujt')
        ->leftJoin('tblartikujtcmimet', 'tblartikujt.ID', '=', 'tblartikujtcmimet.ArtikulliID')
        ->where('tblartikujtcmimet.PricelistID','=',$pID)
        ->where('tblartikujt.ID', '=',$id)
        ->select('tblartikujtcmimet.Price')
        ->get()
        ->first();
        if($products == null)
            return $price = 0;
        else
            $price = $products->Price - ($products->Price * $percentage);
		$price =  $price + ($price *0.18);
        return number_format($price, 2);
    }

    public static function getProductStock($id)
    {
        $product = DB::table('tblcalculationitemscostok')
        ->select(DB::raw('SasiaeMbetur, Data'))
        ->where('ArtikulliID','=',$id)
		->orderBy('Data', 'desc')
        ->first();
       
		if( $product == null)
			return 0;
        return $product->SasiaeMbetur;
    }

    public static function getProductKlasifikimi($id,$klasifikimi)
    {
        if($klasifikimi == 1)
        {
            $product = DB::table('tblartikujt')
            ->select('tblartikujtklasifikimi.Emertimi')
            ->join('tblartikujtklasifikimi','tblartikujtklasifikimi.ID','=','tblartikujt.Klasifikimi1')
            ->where('tblartikujt.ID','=',$id)
            ->first();
    
        }
        else
        {
            $product = DB::table('tblartikujt')
            ->select('tblartikujtklasifikimi2.Emertimi')
            ->join('tblartikujtklasifikimi2','tblartikujtklasifikimi2.ID','=','tblartikujt.Klasifikimi2')
            ->where('tblartikujt.ID','=',$id)
            ->first ();
        
        }
        if($product == null)
            return '';         
        return $product->Emertimi;
    }

    public static function getProducer($id)
    {
        $product = DB::table('tblartikujt')
        ->select('tblartikujtbrendi.Emertimi')
        ->join('tblartikujtbrendi','tblartikujtbrendi.ID','=','tblartikujt.Brendi')
        ->where('tblartikujt.ID','=',$id)
        ->first();
		  if($product == null)
            return '';   
		if($product->Emertimi == 'Geba')
			return '';  
		if($product->Emertimi == 'Midland')
			return '';  
            
        return $product->Emertimi;
    }

    public static function getName($id)
    {
        $product = Product::find($id);
        return $product->Emertimi;
    }
	
	public static function getBarcode($id)
    {
        $product = Product::find($id);
        return $product->Barcode;
    }

    

    public static function getPriceWithDiscount($id,$price ,$perc)
    {
        $price = Product::getProductPrice($id,$price);
       $dPrice = $price - ($price*$perc);
       return number_format($dPrice, 2);
    }
	
	public static function getPhoto($id)
    {
		
       $product = DB::table('tblartikujt')
        ->select('photo.Photo')
        ->join('photo','photo.ArtikulliID','=','tblartikujt.ID')
        ->where('tblartikujt.ID','=',$id)
        ->first();
		  if($product == null)
            return '/project/storage/app/public/images/noImage.png';   
            
		if(substr($product->Photo, 0, 4 ) === "http")	
			return $product->Photo;
		else
			return '/project/storage/app/public/images/'.$product->Photo;
    }
	
	
   
}
