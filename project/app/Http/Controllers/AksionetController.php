<?php

namespace App\Http\Controllers;
use App\Aksionet;
use App\Product;
use Illuminate\Http\Request;

class AksionetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aksion = Aksionet::orderBy('tipi','asc')->paginate(10);
        
        if(auth()->user()->admin == 1)
        {
            return view ('pages.aksionet')->with('aksion',$aksion);
        }
        else
        {
            return redirect('/')->with('error','Unathorized Page'); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->admin == 1)
        {
            $products = Product::where('statusi','=','0')->get();
            return view ('pages.aksionet.create')->with('products',$products);
        }
        else
        {
            return redirect('/')->with('error','Unathorized Page'); 
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->guest() || auth()->user()->admin !== 1)
        {   
            return redirect('/')->with('error','Unathorized Page');
        }
        else 
        {    
            $test = Aksionet::where('productID','=',$request->input('aksionPID'))->first();
            if ($test !== null) 
            {
                return redirect('/aksion/create')->with('error','Produkti ka aksion');
            } 
            else {
                $product = Product::where('Emertimi','=',$request->input('aksionPID'))->first();
                $aksion = new Aksionet; 
                $aksion->tipi = $request->input('tipi');
                $aksion->productID = $product->ID;
                $aksion->rabati = $request->input('rabati');
                $aksion->qmimorja = $request->input('qmimorja');
                $aksion->save();
                return redirect('/aksion')->with('success','U shtua me sukses');
            }
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
        return redirect('/aksion');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->guest() || auth()->user()->admin !== 1)
        {
            return redirect('/')->with('error', 'Unauthorized page');
        }
        else
        { 
            $aksion = Aksionet::find($id);
            $product = Product::find($aksion->productID);
            return view('pages.aksionet.edit')->with('aksion',$aksion)->with('products',$product);
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
        if(auth()->guest() || auth()->user()->admin !== 1)
        {
            return redirect('/')-with('error','Unauthorized page');
        }
        else 
        {
            $aksion = Aksionet::find($id);
            $aksion->tipi = $request->input('tipi');
            $aksion->rabati = $request->input('rabati');
            $aksion->qmimorja = $request->input('qmimorja');
            $aksion->save();
            return redirect('/aksion')->with('success','U ndryshua me sukses');
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
        if(auth()->guest() || auth()->user()->admin !== 1)
        {
            return redirect('/')->with('error','Unauthorized page');
        }
        else
        {
            $aksion = Aksionet::find($id);
            $aksion->delete();
            return redirect('/aksion')->with('success', 'U fshi me sukses');
        }
    }
}
