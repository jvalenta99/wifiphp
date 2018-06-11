<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sportveranstaltung extends Model
{
    protected $table = 'sportveranstaltungen';

    

    public function land(){
        return $this -> belongsTo('App\Land','veranLand_FK','land_ID');
    }

}
