<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Lang;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Session;

//use Illuminate\Http\RedirectResponse;


class LanguageController extends Controller


{
    private $validLanguages = [
        'de',
        'en'
    ];
    public function chooser() {
        Session::put('locale', Input::get('locale'));
       //Session::set('locale', Input::get('locale'));
        return redirect()->back();

        /* echo Input::get('locale');
        echo "ahoj";
        echo Lang::getLocale();
        echo App::getLocale(); */
    }

    public function getChooser($lang) {        
       if (in_array($lang, $this->validLanguages)){
            Session::put('locale', $lang);
        }
        //Session::set('locale', Input::get('locale'));
         return redirect()->back();
    }
}
