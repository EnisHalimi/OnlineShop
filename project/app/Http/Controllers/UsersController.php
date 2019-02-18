<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\User;
use App\Order;  
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( auth()->guest() || auth()->user()->admin !== 1)
        {
            return redirect('/')->with('error','Unathorized Page'); 
        }
        else
        {
            $users = User::orderBy('id', 'asc')->paginate(15);
            return view('pages.users')->with('users',$users);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->guest() || auth()->user()->admin !== 1)
        {
            return redirect('/')->with('error','Unathorized Page'); 
        }
        else
        {
            return view('pages.user.create');
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
            $this->validate($request,[
                'name'=> 'required|min:6|string|max:255|regex:/^[\w&.\-\s]*$/',
                'email' => 'required|min:6|string|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->qmimorja = $request->input('qmimorja');
            $user->admin = $request->input('admin');
            $user->status = $request->input('status');
            $user->save();
            return redirect('/user')->with('success','U shtua Përdoruesi');
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
        $user = User::find($id);
        $qmimi = Order::getTotal($id);
        $porosite = Order::getNrPorosive($id);
        if(auth()->guest() || auth()->user()->admin !== 1)
        {
            return redirect('/')->with('error','Unathorized Page'); 
        }
        else
        {
            return view('pages.user.show')->with('user',$user)->with('nrporosive',$porosite)->with('sasia',$qmimi);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);  
        if(auth()->user()->id == $id || auth()->user()-> admin == 1 )
        {
            return view('pages.user.edit')->with('user',$user);
        }
        else
        {
            return redirect('/')->with('error','Unathorized Page');
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

        if(auth()->guest())
        {
            return redirect('/')->with('error','Unathorized Page'); 
        }
        else if(auth()->user()->id == $id || auth()->user()-> admin == 1 )
        {
             $this->validate($request,[
            'name'=> 'required|min:6|string|max:255|regex:/^[\w&.\-\s]*$/',
            'email' => 'required|min:6|string',
            'password' => 'confirmed',
            
        ]);
        $user = User::find($id);
        if($request->input('password')>6)
            $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->name = $request->input('name');
        if ($request->input('qmimorja') !== null)
            $user->qmimorja = $request->input('qmimorja');
        if ($request->input('admin') !== null) 
            $user->admin = $request->input('admin');
        $user->save();
        if(auth()->user()-> admin == 1)
            return redirect('/user')->with('success','U ndryshua Përdoruesi');
        else
        return redirect('/menaxhimi')->with('success','U ndryshua Përdoruesi');   
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
        $user = User::find($id);
        if(auth()->guest() || auth()->user()->admin !== 1)
        {
            return redirect('/')->with('error','Unathorized Page'); 
        }
        else
        {
            $user->order()->delete();
            $user->cart()->delete();
            $user->delete();
           
            return redirect('/user')->with('success','Është fshirë Përdoruesi');
        }
    }
}
