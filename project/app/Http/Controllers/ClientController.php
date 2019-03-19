<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Client;
use App\Location;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maps = DB::table('location')
        ->selectRaw('X(location_data) as Lat, Y(location_data) as Lng ,clients_data.`emri_kompanise`,clients_data.`qyteti`,clients_data.`klasifikimiID`, ClientID')
        ->join('clients_data','clients_data.id','=','location.ClientID')
        ->get();
        $klasifikimi = DB::table('clients_klasifikimi')->get();
        if(auth()->guest() || auth()->user()->admin !== 1)
        {
            return redirect('/login')->with('error','Unathorized Page');
        }
        else
            return view('pages.client.client')->with('maps',$maps)->with('klasifikimet', $klasifikimi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klas = DB::table('clients_klasifikimi')->get();
        if(auth()-> guest())
        {
            return redirect('/login')->with('error','Unathorized Page');
        }
        else
            return view('pages.client.create')->with('klasifikimet',$klas);
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
            'compname'=> 'required|min:6|string|max:255',
            'emrimbiemri'=> 'required|min:6|string|max:255',
            'pozita'=> 'required|min:6|string|max:255',
            'nrfiskal'=> 'required|min:6|numeric',
            'nrbiznesi'=> 'required|min:6|numeric',
            'address' => 'required|min:6|string|max:255',
            'comtel' => 'required|min:9|numeric',
            'email'=> 'required|min:6|e-mail|max:30',
            'telpers' => 'required|min:9|numeric',
            'emailpers'=> 'required|min:6|e-mail|max:30',
            'qmimorja'=> 'required',
            'kreditnotaV' => 'required|min:3|numeric',
        ]);
        $client = new Client;
        $client->emri_kompanise = $request->compname;
        $client->klasifikimiID = $request->klasifikimi;
        $client->adresa = $request->address;
        $client->qyteti = $request->qyteti;
        $client->shteti = $request->shteti;
        $client->tel_komp = $request->comtel;
        $client->email_komp = $request->email;
        $client->nr_fiskal = $request->nrfiskal;
        $client->nr_biznesit  = $request->nrbiznesi;
        $client->emri_mbiemri = $request->emrimbiemri;
        $client->pozita = $request->pozita;
        $client->tel_pers = $request->telpers;
        $client->email_pers = $request->emailpers;
        $client->qmimorja = $request->qmimorja;
        $client->rabati_perq  = $request->rabati;
        $client->kredit_nota  = $request->kreditnotaV;
        $client->kushtet_pageses = $request->kreditnota;
        if (isset($request->rabatibox1)) { $client->rabati_midland = true;}
        if (isset($request->rabatibox2)) { $client->rabati_zimmermann = true;}
        if (isset($request->rabatibox3)) { $client->rabati_purflux = true;}
        if (isset($request->rabatibox4)) { $client->rabati_geba = true;}
        if (isset($request->midland1)) { $client->prod_midland_pkw  = true;}
        if (isset($request->midland2)) { $client->prod_midland_lkw  = true;}
        if (isset($request->midland3)) { $client->prod_midland_transm  = true;}
        if (isset($request->midland4)) { $client->prod_midland_moto = true;}
        if (isset($request->midland5)) { $client->prod_midland_adit = true;}
        if (isset($request->zimmermann1)) { $client->prod_zimm_frena  = true;}
        if (isset($request->zimmermann2)) { $client->prod_zimm_frena_dores  = true;}
        if (isset($request->zimmermann3)) { $client->prod_zimm_diska = true;}
        if (isset($request->zimmermann4)) { $client->prod_zimm_diska_sport = true;}
        if (isset($request->purflux1)) { $client->prod_purf_vaji  = true;}
        if (isset($request->purflux2)) { $client->prod_purf_ajri  = true;}
        if (isset($request->purflux3)) { $client->prod_purf_karb  = true;}
        if (isset($request->purflux4)) { $client->prod_purf_klime = true;}
        if (isset($request->purflux5)) { $client->prod_purf_nderr = true;}
        if (isset($request->geba1)) { $client->prod_geba_pomp  = true;}
        if (isset($request->geba2)) { $client->prod_geba_rryp = true;}
        if (isset($request->midlandmark1)) { $client->mark_midland_forex   = true;}
        if (isset($request->midlandmark2)) { $client->mark_midland_flamur   = true;}
        if (isset($request->midlandmark3)) { $client->mark_midland_raft_m   = true;}
        if (isset($request->midlandmark4)) { $client->mark_midland_raft_v  = true;}
        if (isset($request->midlandmark5)) { $client->mark_midland_reklame  = true;}
        if (isset($request->midlandmark6)) { $client->mark_midland_pomp_m  = true;}
        if (isset($request->midlandmark7)) { $client->mark_midland_pomp_d  = true;}
        if (isset($request->midlandmark8)) { $client->mark_midland_qader  = true;}
        if (isset($request->zimmermannmark1)) { $client->mark_zimm_katalog  = true;}
        if (isset($request->zimmermannmark2)) { $client->mark_zimm_zyrt  = true;}
        if (isset($request->zimmermannmark3)) { $client->mark_zimm_reklam  = true;}
        if (isset($request->purfluxmark1)) { $client->mark_purf_katalog  = true;}
        if (isset($request->purfluxmark2)) { $client->mark_purf_veshmb   = true;}
        if (isset($request->purfluxmark3)) { $client->mark_purf_zyrt   = true;}
        if (isset($request->purfluxmark4)) { $client->mark_purf_reklam  = true;}
        if (isset($request->gebamark1)) { $client->mark_geba_katalog  = true;}
        if (isset($request->gebamark2)) { $client->mark_geba_reklam  = true;}
        $client->save();
        $locdata = str_replace("LatLng","", $request->input('location_data'));
        $location = new Location;
        $location->location_data = DB::raw('POINT' .$locdata.'');
        $location->ClientID = $client->id;
        $location->save();
        return redirect('/client')->with('success','U shtua Klienti');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        $klas = DB::table('clients_klasifikimi')->get();
        $location = DB::table('location')->selectRaw('X(location_data) as Lat, Y(location_data) as Lng')->where('ClientID','=',$id)->first();
        if(auth()->guest() || auth()->user()->admin !== 1)
        {
            return redirect('/')->with('error','Unathorized Page');
        }
        else
        {
            return view('pages.client.show')->with('client',$client)->with('klasifikimet',$klas)->with('location',$location);
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
        $client = Client::find($id);
        $klas = DB::table('clients_klasifikimi')->get();
        $location = DB::table('location')->selectRaw('X(location_data) as Lat, Y(location_data) as Lng')->where('ClientID','=',$id)->first();
        if(auth()->guest() || auth()->user()->admin !== 1)
        {
            return redirect('/')->with('error','Unathorized Page');
        }
        else
        {
            return view('pages.client.edit')->with('client',$client)->with('klasifikimet',$klas)->with('location',$location);
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
            return redirect('/')->with('error','Unathorized Page');
        }
        else
        {


        $this->validate($request,[
            'compname'=> 'required|min:6|string|max:255',
            'emrimbiemri'=> 'required|min:6|string|max:255',
            'pozita'=> 'required|min:6|string|max:255',
            'nrfiskal'=> 'required|min:6|numeric',
            'nrbiznesi'=> 'required|min:6|numeric',
            'address' => 'required|min:6|string|max:255',
            'comtel' => 'required|min:9|numeric',
            'email'=> 'required|min:6|e-mail|max:30',
            'telpers' => 'required|min:9|numeric',
            'emailpers'=> 'required|min:6|e-mail|max:30',
            'qmimorja'=> 'required',
            'kreditnotaV' => 'required|min:3|numeric',
        ]);
        $client = Client::find($id);
        $client->emri_kompanise = $request->compname;
        $client->klasifikimiID = $request->klasifikimi;
        $client->adresa = $request->address;
        $client->qyteti = $request->qyteti;
        $client->shteti = $request->shteti;
        $client->tel_komp = $request->comtel;
        $client->email_komp = $request->email;
        $client->nr_fiskal = $request->nrfiskal;
        $client->nr_biznesit  = $request->nrbiznesi;
        $client->emri_mbiemri = $request->emrimbiemri;
        $client->pozita = $request->pozita;
        $client->tel_pers = $request->telpers;
        $client->email_pers = $request->emailpers;
        $client->qmimorja = $request->qmimorja;
        $client->rabati_perq  = $request->rabati;
        $client->kredit_nota  = $request->kreditnotaV;
        $client->kushtet_pageses = $request->kreditnota;
        if (isset($request->rabatibox1)) { $client->rabati_midland = true;}
        if (isset($request->rabatibox2)) { $client->rabati_zimmermann = true;}
        if (isset($request->rabatibox3)) { $client->rabati_purflux = true;}
        if (isset($request->rabatibox4)) { $client->rabati_geba = true;}
        if (isset($request->midland1)) { $client->prod_midland_pkw  = true;}
        if (isset($request->midland2)) { $client->prod_midland_lkw  = true;}
        if (isset($request->midland3)) { $client->prod_midland_transm  = true;}
        if (isset($request->midland4)) { $client->prod_midland_moto = true;}
        if (isset($request->midland5)) { $client->prod_midland_adit = true;}
        if (isset($request->zimmermann1)) { $client->prod_zimm_frena  = true;}
        if (isset($request->zimmermann2)) { $client->prod_zimm_frena_dores  = true;}
        if (isset($request->zimmermann3)) { $client->prod_zimm_diska = true;}
        if (isset($request->zimmermann4)) { $client->prod_zimm_diska_sport = true;}
        if (isset($request->purflux1)) { $client->prod_purf_vaji  = true;}
        if (isset($request->purflux2)) { $client->prod_purf_ajri  = true;}
        if (isset($request->purflux3)) { $client->prod_purf_karb  = true;}
        if (isset($request->purflux4)) { $client->prod_purf_klime = true;}
        if (isset($request->purflux5)) { $client->prod_purf_nderr = true;}
        if (isset($request->geba1)) { $client->prod_geba_pomp  = true;}
        if (isset($request->geba2)) { $client->prod_geba_rryp = true;}
        if (isset($request->midlandmark1)) { $client->mark_midland_forex   = true;}
        if (isset($request->midlandmark2)) { $client->mark_midland_flamur   = true;}
        if (isset($request->midlandmark3)) { $client->mark_midland_raft_m   = true;}
        if (isset($request->midlandmark4)) { $client->mark_midland_raft_v  = true;}
        if (isset($request->midlandmark5)) { $client->mark_midland_reklame  = true;}
        if (isset($request->midlandmark6)) { $client->mark_midland_pomp_m  = true;}
        if (isset($request->midlandmark7)) { $client->mark_midland_pomp_d  = true;}
        if (isset($request->midlandmark8)) { $client->mark_midland_qader  = true;}
        if (isset($request->zimmermannmark1)) { $client->mark_zimm_katalog  = true;}
        if (isset($request->zimmermannmark2)) { $client->mark_zimm_zyrt  = true;}
        if (isset($request->zimmermannmark3)) { $client->mark_zimm_reklam  = true;}
        if (isset($request->purfluxmark1)) { $client->mark_purf_katalog  = true;}
        if (isset($request->purfluxmark2)) { $client->mark_purf_veshmb   = true;}
        if (isset($request->purfluxmark3)) { $client->mark_purf_zyrt   = true;}
        if (isset($request->purfluxmark4)) { $client->mark_purf_reklam  = true;}
        if (isset($request->gebamark1)) { $client->mark_geba_katalog  = true;}
        if (isset($request->gebamark2)) { $client->mark_geba_reklam  = true;}
        $client->save();
        $client->location()->delete();
        $locdata = str_replace("LatLng","", $request->input('location_data'));
        $location = new Location;
        $location->location_data = DB::raw('POINT' .$locdata.'');
        $location->ClientID = $client->id;
        $location->save();

        return redirect('/client')->with('success','U ndryshua Klienti');
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
        $client = Client::find($id);
        if(auth()->guest() || auth()->user()->admin !== 1)
        {
            return redirect('/')->with('error','Unathorized Page');
        }
        else
        {
            $client->location()->delete();
            $client->delete();

            return redirect('/client')->with('success','Është fshirë Klienti');
        }
    }
}
