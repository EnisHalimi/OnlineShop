<?php

namespace App\Http\Controllers;
use App\Order;
use App\Product;
use App\User;
use App\Location;
use Illuminate\Http\Request;
use Mail;
use DB;
use App\Mail\SendMail;
class HomeController extends Controller
{
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
        return view('pages.home');
    }
    public function changeStatus(Request $request)
    {
        if(auth()-> guest())
        {
            return redirect('/')->with('error','Unathorized Page');
        }
        $user = User::find($request->id);
        if($user->status)
        {
            $user->status=false;
            
        }
        else
        {
            $user->status=true;
        }
        $user->save();
        return redirect('/user')->with('success','U ndërrua statusi');
    }   

    public function mail($id)
    {
        $order = Order::find($id);
        if(auth()-> guest())
        {
            return redirect('/order')->with('error','Unathorized Page');
        }
        $order = Order::find($id);
        $user = User::find($order->UserID);
        $products = Product::getProductsByOrder($id);
        $data = array();
        $data['order']= $order->id;
        $data['user']= $user->name;
        $data['products']= $products;
        $data['subjekti'] = $order->subjekti;
		$data['mesazhi'] = $order->mesazhi;
		$data['dergesa'] = $order->dergesa;
        Mail::to('motors@startech-ks.com')->send(new SendMail($data));
   
     return 'Email was sent';
    }
	
	public function addPicture(Request $request)
	{
		
        $this->validate($request,[
            'cover_image' =>'image|nullable|max:1999'
        ]);
		$product = Product::where('Emertimi','=',$request->input('aksionPID'))->first();
        if($request->hasFile('cover_image'))
        {

            $fileNamewithExt = $request->file('cover_image')->getClientOriginalName();
            $fileName = pathInfo($fileNamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNametoStore = $product->Emertimi.'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/images', $fileNametoStore);

        }
        else
        {
            $fileNametoStore = 'noImage.png';
        }
		$temp =DB::table('photo')->where('ArtikulliID','=',$product->ID)->first();
		if($temp !== null)
			$add = DB::table('photo')->where('ArtikulliID','=',$product->ID)->update(['ArtikulliID' =>  $product->ID, 'Photo' => $fileNametoStore]);
		else
			$add = DB::table('photo')->insert(['ArtikulliID' =>  $product->ID, 'Photo' => $fileNametoStore]);

        return redirect('/picture')->with('success','U shtua fotografia');
    }

    public function  addMapData(Request $request)
    {
        $locdata = str_replace("LatLng","", $request->input('data'));
        $location = new Location;
        $location->location_data = DB::raw('POINT' .$locdata.'');
        $location->ClientID = 1;
        $location->save();
        return redirect('/client')->with('success','U shtua Klienti');           
    }
  
}
