<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';
    public $timestamps = false;

    public function client()
    {
        return $this->belongsTo('App\Client','ClientID');
    }
}
