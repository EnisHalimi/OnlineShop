<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Product;

class Aksionet extends Model
{
    protected $table = 'aksion';

    protected $fillable = [
        'tipi', 'productID'
    ];

    public function products()
    {
        return $this->belongsTo('App\Product', 'productID');
    }
    
    public static function getAksion($id)
    {
        $product = Aksionet::select('aksion.tipi')->join('tblartikujt','tblartikujt.ID','=','aksion.productID')->where('tblartikujt.ID','=',$id)->first();
        return $product['tipi'];
    }

    public static function getAksionQmimorja($id)
    {
        $product = Aksionet::select('aksion.qmimorja')->join('tblartikujt','tblartikujt.ID','=','aksion.productID')->where('tblartikujt.ID','=',$id)->first();
        return $product['qmimorja'];
    }
	
	public static function getAksionNew($id)
    {
        $products = Product::where('Klasifikimi1','!=','21')->where('ID','=',$id)->where('CreatedDate','>',Carbon::now()->subDays(60))->first();
        if($products == null)
			return false;
		else
			return true;
    }
	
	

    public static function getPercentage($id)
    {
        $product = Aksionet::where('productID','=',$id)->first();
        return $product->rabati;
    }
}
