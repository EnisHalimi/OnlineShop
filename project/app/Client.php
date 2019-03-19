<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Client extends Model
{

    protected $table = 'clients_data';
    public $timestamps = false;

    public static function getKlasifikimi($id)
    {
        $klasifikimi = DB::table('clients_klasifikimi')->where('id','=',$id)->first();
        return $klasifikimi->Emertimi;

    }

    public function location()
    {
        return $this->hasOne('App\Location','ClientID');
    }

    public function klasifikimi()
    {
        return $this->belongsTo('App\Location','klasifikimiID');
    }
}
