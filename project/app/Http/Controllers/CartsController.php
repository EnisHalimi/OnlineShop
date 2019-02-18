<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()-> guest())
        {
            return redirect('/')->with('error','Unathorized Page');
        }
        else
            $cart = Cart::where('UserID','=',auth()->user()->id)->get();
            return view('pages.cart.cart')->with('cart',$cart);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->input('sasia') <= 0)
            return redirect('/')->with('error','Sasia nuk mund te jete me e vogle se 1'); 
        if(auth()-> guest())
        {   
            return redirect('/')->with('error','Unathorized Page');
        }
        else{
        $this->validate($request,[
            'sasia'=> 'required|min:1'
        ]);
        $nr = Cart::where('ProductID','=',$request->input('pID'))->where('UserID','=',auth()->user()->id)->first();
        $cart;  
        if($nr !== null)
        {
            $cart = Cart::where('ProductID','=',$request->input('pID'))
             ->where('UserID','=',auth()->user()->id)->first();
        }
        else
        {
            $cart = new Cart;
        }
            $cart->UserID = auth()->user()->id;
            $cart->ProductID = $request->input('pID');
            $product = Product::find($request->input('pID'));
            $cart->Emri = $product->Emertimi;
            $cart->Sasia = $request->input('sasia');
            if(Product::getProductPriceForCart($request->input('pID'), auth()->user()->qmimorja) == 0)
			{
				if(auth()->user()->qmimorja == 'R')
				{
					if(Product::getProductPriceForCart($request->input('pID'), 'R1') == 0)
						return redirect('/')->with('error','Produkti nuk ka qmim');
					else
						$cart->Qmimi = Product::getProductPriceForCart($request->input('pID'), 'R1');
				}	
				else
				{
					if(Product::getProductPriceForCart($request->input('pID'), 'R') == 0)
						return redirect('/')->with('error','Produkti nuk ka qmim');
					else
						$cart->Qmimi = Product::getProductPriceForCart($request->input('pID'), 'R');
				}
			}
            else
                $cart->Qmimi = Product::getProductPriceForCart($request->input('pID'), auth()->user()->qmimorja);
            $cart->save();
            return redirect()->back()->with('success','U shtua në shport');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!auth()->guest())
        {
            $this->validate($request,[
                'sasia' => 'min:1',
            ]);
            $cart = Cart::find($id);
            $cart->Sasia = $request->input('sasia'.$id);
            $cart->save();
            return redirect('/cart')->with('success','U ndryshua sasia e produktit'); 
        }
        else
        {
            return redirect('/')->with('error','Unathorized Page');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        if(!auth()->guest())
        {
            $cart->delete();
            return redirect('/cart')->with('success','Është fshirë produkti nga shporta');
        }
        else
        {
            return redirect('/')->with('error','Unathorized Page');
        }
    }
}
