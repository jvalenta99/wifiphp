<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sportveranstaltung extends Model
{
    protected $table = 'sportveranstaltungen';
    protected $primaryKey = 'veran_ID';


    public function land(){
        return $this -> belongsTo('App\Land','veranLand_FK','land_ID');
    }

    public function stadt(){
        return $this -> belongsTo('App\Stadt','veranStadt_FK','stadt_ID');
    }

    public function sportart(){
        return $this -> belongsTo('App\Sportart','veranSportart_FK','sportarts_ID');
    }

    public function organisator(){
        return $this -> belongsTo('App\User','veranOrganisator_FK','id');
    }

}
