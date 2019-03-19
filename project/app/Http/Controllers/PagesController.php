<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use DB;
use App\Product;
use Cart;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        if(auth()-> guest())
        {
            return redirect('/login')->with('error','Unathorized Page');
        }
        else
        {
            $products = Product::where('Klasifikimi1','!=','21')->orderBy('ID', 'asc')->paginate(15);
            return view('pages.home')->with('products', $products)->with('keyword','');
        }
    }

    public function midland()
    {
        if(auth()-> guest())
        {
            return redirect('/login')->with('error','Unathorized Page');
        }
        else
        $products = Product::orderBy('ID', 'asc')->where('Klasifikimi1','!=','21')->where('Furnitori','=','305')->paginate(15);
        return view('pages.midland')->with('products', $products)->with('keyword','');
    }


    public function porosite()
    {
        if(auth()-> guest())
        {
            return redirect('/login')->with('error','Unathorized Page');
        }
        else
            return view('pages.porosite');
    }
	
	 public function pictures()
    {
        if(auth()-> guest())
        {
            return redirect('/login')->with('error','Unathorized Page');
        }
        else
            return view('picture');
    }

    public function menaxhimi()
    {
        if( auth()->guest())
        {
            return redirect('/')->with('error','Unathorized Page');
        }
        else
        {
            
            $qmimi = Order::getTotal(auth()->user()->id);
            $porosite = Order::getNrPorosive(auth()->user()->id);
            $user = User::where('id','=',auth()->user()->id)->first();
            return view('pages.menaxhimi')->with('user',$user)->with('nrporosive',$porosite)->with('sasia',$qmimi);
        }
            
    }

}
