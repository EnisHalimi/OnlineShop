<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\Products_Order;
use DB;
use App\User;
use App\Cart;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function index()
    {
        if( auth()->guest())
        {
            return redirect('/')->with('error','Unathorized Page');
        }
        else
        {
            if(auth()->user()->admin == 1)
            {
               
                $orders = Order::orderBy('created_at', 'desc')->paginate(15);
            }
            else
            {
                $orders = Order::orderBy('created_at', 'desc')->where('UserID','=',auth()->user()->id)->paginate(15);
            }
            return view('pages.porosite')->with('orders',$orders);
        }   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->guest())
        {
            return redirect('/')->with('error','Unathorized Page');
        }
        else
        {
            
               
            $items = Cart::where('UserID','=',auth()->user()->id)->get();
            if($items->isEmpty())
                return redirect('/cart')->with('error','Shporta eshte e zbrazet');
                
            $order = new Order;
            $order->UserID = auth()->user()->id;
            $order->quantity = Cart::getQuantity(auth()->user()->id);
            $order->value = Cart::getTotalPrice(auth()->user()->id);
            if($request->input('subjekti') !== null)
            {
                $order->subjekti =$request->input('subjekti');
            }
            else
            {
                $order->subjekti = '';
            }
			if($request->input('dergesa') !== null)
            {
                $order->dergesa = $request->input('dergesa');
            }
            else
            {
                $order->dergesa = date('Y-m-d');
            }
			if($request->input('mesazhi') !== null)
            {
                $order->mesazhi =$request->input('mesazhi');
            }
            $order->save();
            foreach($items as $item)
            {
                $product_order = new Products_Order;
                $product_order->orderID = $order->id;
                $product_order->productID = $item->ProductID;
                $product_order->userID = $order->UserID;
                $product_order->quantity = $item->Sasia;
                $product_order->save();
            }
            app('App\Http\Controllers\HomeController')->mail($order->id);
            
            Cart::deleteCartContent(auth()->user()->id);
            
            return redirect('/order')->with('success','U shtua Porosia');
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
        $order = Order::find($id);
        if(auth()-> guest())
        {
            return redirect('/order')->with('error','Unathorized Page');
        }
        $order = Order::find($id);
        $user = User::find($order->UserID);
        $products = Product::getProductsByOrder($id);
        return view('pages.orders.show')->with('order',$order)->with('products',$products)->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()-> guest())
        {   
            return redirect('/')->with('error','Unathorized Page');
        }
        else
        {
            $order = Products_Order::where('orderID','=',$id)->get();
            foreach($order as $od)
            {
                $nr = Cart::where('ProductID','=',$od->productID)->where('UserID','=',auth()->user()->id)->first(); 
                if($nr !== null)
                {
                    $cart = Cart::where('ProductID','=',$od->productID)
                                 ->where('UserID','=',auth()->user()->id)->first();
                }
                else
                {
                    $cart = new Cart;
                }
                $cart->UserID = $od->userID;
                $cart->ProductID = $od->ProductID;
                $product = Product::find($od->ProductID);
                $cart->Emri =$product->Emertimi;
                $cart->Sasia = $od->quantity;
                $cart->Qmimi = Product::getProductPrice($od->ProductID, auth()->user()->qmimorja);
                $cart->save();
            }
            return redirect('/cart')->with('success','U shtua porosia në shport');
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if(auth()-> guest() || auth()->user()->admin == 0)
        {
            return redirect('/order')->with('error','Unathorized Page');
        }
        $products = Products_Order::where('orderID','=',$id)->get();
        foreach($products as $item)
        {
            $item->delete();
        }
        $order->delete();

        return redirect('/order')->with('success','U fshi porosia');
    }
}
