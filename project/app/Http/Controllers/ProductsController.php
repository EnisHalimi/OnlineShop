<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use DB;
use  Carbon\Carbon;

class ProductsController extends Controller
{

   
    public function search(Request $request)
    { 
        $longSearch = explode("\\", $request->search);
        $search = $longSearch[0];
        $type = $request->searchcriteria;
		$searchUpper = strtoupper($search);
		$searchoe = str_replace(' ', '', $searchUpper);
		
        if (is_null($search))   
        {
            return redirect('/');
        }
        else
        {
            if($type =='oe')
            {
				
                $products = Product::where('Klasifikimi1','!=','21')->where('KomentiArt','LIKE',"%{$searchoe}%")->raw('ESCAPE ,')->paginate(15);      
            }                  
            else if($type =='code')
            {
                $products = Product::where('Klasifikimi1','!=','21')->where('Barcode','LIKE',"%{$search}%")->orWhere('Extra1','LIKE',"%{$searchoe}%")->orWhere('Extra2','LIKE',"%{$searchoe}%")->paginate(15);
				
            }
            else
            {
                $products = Product::where('Klasifikimi1','!=','21')->where('Barcode','LIKE',"%{$search}%")
                                    ->orWhere('Emertimi','LIKE',"%{$search}%")->raw('ESCAPE \\')->where('Klasifikimi1','!=','21')
                                    ->orWhere('KomentiArt','LIKE',"%{$searchoe}%")->raw('ESCAPE ,')->where('Klasifikimi1','!=','21')
									 ->orWhere('Extra1','LIKE',"%{$searchoe}%")->raw('ESCAPE ,')->where('Klasifikimi1','!=','21')
									 ->orWhere('Extra2','LIKE',"%{$searchoe}%")->raw('ESCAPE ,')->where('Klasifikimi1','!=','21')
                                    ->paginate(15);
            }
            return view('pages.home')->with('products', $products)->with('keyword',$search);
        }
    }

    public function  searchMidland(Request $request)
    { 
        $longSearch = explode("\\", $request->search);
        $search = $longSearch[0];
        if (is_null($search))
        {
            return redirect('/midland')->with('error','Nuk u gjet asnjë produkt');
        }
        else
        {
            $products = Product::where('Klasifikimi1','!=','21')->where('Furnitori','=','305')
                                ->Where('Emertimi','LIKE',"%{$search}%")->raw('ESCAPE \\')
                                ->paginate(15);
            return view('pages.midland')->with('products', $products)->with('keyword',$search);
        }
    }

    public function autocomplete(Request $request)
    { 
        $products = Product::where('Klasifikimi1','!=','21')->pluck('Emertimi');    
        return $products;
    }

    
    public function subjektet(Request $request)
    { 
        $subjektet = DB::table('tblsubjektet')->pluck('Emertimi');    
        return $subjektet;
    }

    public function aksionProduct(Request $request)
    {
        $tp = 0;    
        $keyword = '';
        if($request->input('tipi') == "1")

        {
            $tp = 1;
            $keyword = 'Artikujt në Aksion';
			$products = Product::join('aksion','aksion.productID','=','tblartikujt.ID')->where('Klasifikimi1','!=','21')->where('aksion.tipi','=',$tp)->where('aksion.qmimorja','=',auth()->user()->qmimorja)->paginate(15);
        }
        else if($request->input('tipi') == "2")
        {
            $tp = 2;
            $keyword = 'Artikujt e ri';
			$products = Product::where('Klasifikimi1','!=','21')->where('CreatedDate','>',Carbon::now()->subDays(60))->paginate(15);
        }
        else
        {
            $tp = 3;
            $keyword = 'Artikujt e rekomanduar';
			$products = Product::join('aksion','aksion.productID','=','tblartikujt.ID')->where('Klasifikimi1','!=','21')->where('aksion.tipi','=',$tp)->paginate(15);
        }
        
        if(!auth()->guest())
        {
            return view ('pages.home')->with('products',$products)->with('keyword',$keyword);
        }
    }

    public function customSeachProduct(Request $request)
    {
  
        if($request->input('tipi') == "1")
        {
            if($request->input('search') == "Zimmermann")
            {
                $products = Product::where('Brendi','=','3')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Zimmermann');
            }
            else if($request->input('search') == "Midland")
            {
                $products = Product::where('Brendi','=','1')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Midland');
            }
            else if($request->input('search') == "Purflux")
            {
                $products = Product::where('Brendi','=','7')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Purflux');
            }
            else if($request->input('search') == "Geba")
            {
                $products = Product::where('Brendi','=','8')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Geba');
            }
            else if($request->input('search') == "Mammooth")
            {
                $products = Product::where('Brendi','=','9')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Mammooth');
            }
            else if($request->input('search') == "ATE")
            {
                $products = Product::where('Brendi','=','20')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','ATE');
            }
            else if($request->input('search') == "Fremax")
            {
                $products = Product::where('Brendi','=','4')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Fremax');
            }
            else if($request->input('search') == "Vaico")
            {
                $products = Product::where('Brendi','=','17')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Vaico');
            }
            else if($request->input('search') == "Mann")
            {
                $products = Product::where('Brendi','=','12')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Mann');
            }
            else if($request->input('search') == "Filtron")
            {
                $products = Product::where('Brendi','=','13')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Filtron');
            }
			else if($request->input('search') == "JCPremium")
            {
                $products = Product::where('Brendi','=','23')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','JC Premium');
            }
            else if($request->input('search') == "INNA")
            {
                $products = Product::where('Brendi','=','15')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Ina');
            }
			 else if($request->input('search') == "Contitech")
            {
                $products = Product::where('Brendi','=','14')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Contitech');
            }
            else if($request->input('search') == "Cartechnic")
            {
                $products = Product::where('Brendi','=','10')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Cartechnic');
            }
            else if($request->input('search') == "OSRAM")
            {
                $products = Product::where('Brendi','=','11')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','OSRAM');
            }
            else if($request->input('search') == "Febi")
            {
                $products = Product::where('Brendi','=','19')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Febi Bilstein');
            }
            else if($request->input('search') == "LiquiMoly")
            {
                $products = Product::where('Brendi','=','16')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','LiquiMoly');
            }
            else if($request->input('search') == "4Max")
            {
                $products = Product::where('Brendi','=','21')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','4Max');
            }
			else if($request->input('search') == "Profitool")
            {
                $products = Product::where('Brendi','=','24')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Profitool');
            }
			else if($request->input('search') == "Knecht")
            {
                $products = Product::where('Brendi','=','25')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Knecht');
            }
			else if($request->input('search') == "Profirs")
            {
                $products = Product::where('Brendi','=','26')->where('Klasifikimi1','!=','21')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Profirs');
            }
            else
            {
                return redirect('/')->with('error','Nuk u gjet asnje produkt');
            }
        }
        else if($request->input('tipi') == "2")
        {
            if($request->input('search') == "PKV")
            {
                $products = Product::where('Klasifikimi2','=','1')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','PKV');
            }
            else if($request->input('search') == "LKV")
            {
                $products = Product::where('Klasifikimi2','=','2')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','LKV');
            }
            else if($request->input('search') == "Transmission")
            {
                $products = Product::where('Klasifikimi2','=','9')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Transmission');
            }
            else if($request->input('search') == "Hydraulic")
            {
                $products = Product::where('Klasifikimi2','=','10')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Hydraulic');
            }
            else if($request->input('search') == "Motorcycle")
            {
                $products = Product::where('Klasifikimi2','=','11')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Motorcycle');
            }
            else if($request->input('search') == "Industry")
            {
                $products = Product::where('Klasifikimi2','=','12')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Industry');
            }
            else if($request->input('search') == "Aditiv")
            {
                $products = Product::where('Klasifikimi2','=','13')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Aditiv');
            }
            else 
            {
                return redirect('/')->with('error','Nuk u gjet asnje produkt');
            }
        }
        else if($request->input('tipi') == "3")
        {
            if($request->input('search') == "Para")
            {
                $products = Product::where('Klasifikimi2','=','38')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Disqe Para');
            }
            else if($request->input('search') == "Mrapa")
            {
                $products = Product::where('Klasifikimi2','=','39')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Disqe Mrapa');
            }
            else if($request->input('search') == "Sport Para")
            {
                $products = Product::where('Klasifikimi2','=','55')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Disqe Sport Para');
            }
            else if($request->input('search') == "Sport Mrapa")
            {
                $products = Product::where('Klasifikimi2','=','56')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Disqe Sport Mrapa');
            }
            else 
            {
                return redirect('/')->with('error','Nuk u gjet asnje produkt');
            }
        }
        else if($request->input('tipi') == "4")
        {
            if($request->input('search') == "Para")
            {
                $products = Product::where('Klasifikimi2','=','40')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Frena Para');
            }
            else if($request->input('search') == "Mrapa")
            {
                $products = Product::where('Klasifikimi2','=','41')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Frena Mrapa');
            }
            else 
            {
                return redirect('/')->with('error','Nuk u gjet asnje produkt');
            }
        }
        else if($request->input('tipi') == "5")
        {
            if($request->input('search') == "Ajri")
            {
                $products = Product::where('Klasifikimi2','=','45')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Filter Ajri');
            }
            else if($request->input('search') == "Vaji")
            {
                $products = Product::where('Klasifikimi2','=','46')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Filter Vaji');
            }
            else if($request->input('search') == "Nafte")
            {
                $products = Product::where('Klasifikimi2','=','47')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Filter Nafte');
            }
            else if($request->input('search') == "Benzin")
            {
                $products = Product::where('Klasifikimi2','=','48')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Filter Karburanti');
            }
            else if($request->input('search') == "Klime")
            {
                $products = Product::where('Klasifikimi2','=','49')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Filter Klime');
            }
            else if($request->input('search') == "Nderruesi")
            {
                $products = Product::where('Klasifikimi2','=','50')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Filter Ndërruesi');
            }
            else 
            {
                return redirect('/')->with('error','Nuk u gjet asnje produkt');
            }
        }
        else if($request->input('tipi') == "6")
        {
            if($request->input('search') == "Xenon")
            {
                $products = Product::where('Klasifikimi2','=','44')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Drita Xenon');
            }
            else if($request->input('search') == "Halogen")
            {
                $products = Product::where('Klasifikimi2','=','43')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Drita Halogen');
            }
            else 
            {
                return redirect('/')->with('error','Nuk u gjet asnje produkt');
            }
        }
        else if($request->input('tipi') == "7")
        {
            if($request->input('search') == "Rrypa")
            {
                $products = Product::where('Klasifikimi1','=','10')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Rrypa Motori');
            }
            else if($request->input('search') == "PumpaUji")
            {
                $products = Product::where('Klasifikimi2','=','51')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Pompa Uji');
            }
            else 
            {
                return redirect('/')->with('error','Nuk u gjet asnje produkt');
            }
        }
        else if($request->input('tipi') == "8")
        {
            if($request->input('search') == "KablloStartuese")
            {
                $products = Product::where('Klasifikimi1','=','14')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Kabllo Startuese');
            }
			 else if($request->input('search') == "Paste")
            {
                $products = Product::where('Klasifikimi1','=','22')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Paste per pastrimin e duarve');
            }
			 else if($request->input('search') == "Ene")
            {
                $products = Product::where('Klasifikimi1','=','23')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Ene mbajtese per vaj');
            }
			 else if($request->input('search') == "kepuce")
            {
                $products = Product::where('Klasifikimi1','=','24')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Kepuce pune');
            }
			 else if($request->input('search') == "mbulese")
            {
                $products = Product::where('Klasifikimi1','=','25')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Mbulese veture');
            }
			 else if($request->input('search') == "uje")
            {
                $products = Product::where('Klasifikimi1','=','26')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Uje per xhama concentrat');
            }
            else if($request->input('search') == "Zingjire")
            {
                $products = Product::where('Klasifikimi1','=','12')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Zingjirë');
            }
            else if($request->input('search') == "Akumlatore")
            {
                $products = Product::where('Klasifikimi1','=','16')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Akumlatorë');
            }
            else if($request->input('search') == "Bateri")
            {
                $products = Product::where('Klasifikimi1','=','17')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Bateri');
            }
            else if($request->input('search') == "Fshesa")
            {
                $products = Product::where('Klasifikimi1','=','18')->paginate(15);
                return view ('pages.home')->with('products',$products)->with('keyword','Fshesa');
            }
            else 
            {
                return redirect('/')->with('error','Nuk u gjet asnje produkt');
            }
        }
        else if($request->input('tipi') == "22")
        {
            if($request->input('search') == "PKV")
            {
                $products = Product::where('Klasifikimi2','=','1')->paginate(15);
                return view ('pages.midland')->with('products',$products)->with('keyword','PKV');
            }
            else if($request->input('search') == "LKV")
            {
                $products = Product::where('Klasifikimi2','=','2')->paginate(15);
                return view ('pages.midland')->with('products',$products)->with('keyword','LKV');
            }
            else if($request->input('search') == "Transmission")
            {
                $products = Product::where('Klasifikimi2','=','9')->paginate(15);
                return view ('pages.midland')->with('products',$products)->with('keyword','Transmission');
            }
            else if($request->input('search') == "Hydraulic")
            {
                $products = Product::where('Klasifikimi2','=','10')->paginate(15);
                return view ('pages.midland')->with('products',$products)->with('keyword','Hydraulic');
            }
            else if($request->input('search') == "Motorcycle")
            {
                $products = Product::where('Klasifikimi2','=','11')->paginate(15);
                return view ('pages.midland')->with('products',$products)->with('keyword','Motorcycle');
            }
            else if($request->input('search') == "Industry")
            {
                $products = Product::where('Klasifikimi2','=','12')->paginate(15);
                return view ('pages.midland')->with('products',$products)->with('keyword','Industry');
            }
            else if($request->input('search') == "Aditiv")
            {
                $products = Product::where('Klasifikimi2','=','13')->paginate(15);
                return view ('pages.midland')->with('products',$products)->with('keyword','Aditiv');
            }
            else 
            {
                return redirect('/')->with('error','Nuk u gjet asnje produkt');
            }
        }
        else
        {}
    }
}
