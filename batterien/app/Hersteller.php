<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hersteller extends Model
{
    protected $guarded = ['her_PK'];
    protected $table = 'hersteller';
    protected $primaryKey = 'her_PK';


}
