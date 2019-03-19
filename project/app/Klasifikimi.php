<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klasifikimi extends Model
{


    protected $table = 'clients_klasifikimi';
    public $timestamps = false;

    public function client()
    {
        return $this->hasMany('App\Client','klasifikimiID');
    }
}
