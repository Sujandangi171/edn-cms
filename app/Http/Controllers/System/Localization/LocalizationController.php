<?php

namespace App\Http\Controllers\System\Localization;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function setLanguage($locale){
        App::setLocale($locale);
        Session::put('locale',$locale);
        return redirect()->back();
    }
}
