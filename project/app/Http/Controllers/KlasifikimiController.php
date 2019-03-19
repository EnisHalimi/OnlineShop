<?php

namespace App\Http\Controllers;

use App\Klasifikimi;
use Illuminate\Http\Request;

class KlasifikimiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klasifikimet = Klasifikimi::get();
        if(auth()->guest() || auth()->user()->admin !== 1)
        {
            return redirect('/')->with('error','Unathorized Page');
        }
        else
            return view('pages.klasifikimi.klasifikimi')->with('klasfikimet', $klasifikimet);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->guest() || auth()->user()->admin !== 1)
            return redirect('/')->with('error','Unauthorized Page');
        else
            return view('pages.klasifikimi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'cover_image' =>'image|nullable|max:1999',
            'emertimi'=> 'required|min:6|string|max:255',
            'ngjyra'=> 'required|min:2|string|max:255',
        ]);
        if($request->hasFile('cover_image'))
        {

            $fileNamewithExt = $request->file('cover_image')->getClientOriginalName();
            $fileName = pathInfo($fileNamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNametoStore = $request->emertimi.'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/images', $fileNametoStore);

        }
        else
        {
            return redirect('/klasifikimi/create')->with('error','Nuk u gjet fotografia');
        }

        $klasifikimi = new Klasifikimi;
        $klasifikimi->Emertimi = $request->emertimi;
        $klasifikimi->ikona_name = $request->ngjyra;
        $klasifikimi->ikona = "/project/storage/app/public/images/".$fileNametoStore;
        $klasifikimi->save();
        return redirect('/klasifikimi')->with('success','U shtua Klasifikimi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $klasifikimi = Klasifikimi::find($id);
        if(auth()->guest() || auth()->user()->admin !== 1)
            return redirect('/')-with('error','Unathorized page');
        else
            return view('pages.klasifikimi.show')->with('klasifikimi',$klasifikimi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $klasifikimi = Klasifikimi::find($id);
        if(auth()->guest() || auth()->user()->admin !== 1)
            return redirect('/')->with('error','Unauthorized Page');
        else
            return view('pages.klasifikimi.edit')->with('klasifikimi',$klasifikimi);
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
        $this->validate($request,[
            'cover_image' =>'image|nullable|max:1999',
            'emertimi'=> 'required|min:6|string|max:255',
            'ngjyra'=> 'required|min:2|string|max:255',
        ]);
        $klasifikimi = Klasifikimi::find($id);
        if($request->hasFile('cover_image'))
        {

            $fileNamewithExt = $request->file('cover_image')->getClientOriginalName();
            $fileName = pathInfo($fileNamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNametoStore = $request->emertimi.'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/images', $fileNametoStore);
            $klasifikimi->ikona = "/project/storage/app/public/images/".$fileNametoStore;
        }
        $klasifikimi->Emertimi = $request->emertimi;
        $klasifikimi->ikona_name = $request->ngjyra;
        $klasifikimi->save();
        return redirect('/klasifikimi')->with('success','U ndryshua Klasifikimi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $klasifikimi = Klasifikimi::find($id);
        if(auth()->guest() || auth()->user()->admin !== 1)
            return redirect('/')->with('error', 'Unathorized Page');
        else
        {
            $klasifikimi->delete();
            return redirect('/klasifikimi')->with('success','Është fshirë Klasifikimi');
        }
    }
}
