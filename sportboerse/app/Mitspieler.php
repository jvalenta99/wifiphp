<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mitspieler extends Model
{
    protected $table = 'mitspieler';
    protected $primaryKey = 'mitsp_ID';

    protected $fillable = [
        'benut_FK',
        'veran_FK',
        'status_FK',
        'bewertung',
        
    ];

    public function user(){
        return $this -> belongsTo('App\User','benut_FK','id');
    }

    public function sportveranstaltung(){
        return $this -> belongsTo('App\Sportveranstaltung','veran_FK','veran_ID');
    }

    public function status(){
        return $this -> belongsTo('App\Status','status_FK','stasp_ID');
    }


}
