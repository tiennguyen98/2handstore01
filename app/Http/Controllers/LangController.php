<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{

    public $available_lang = [
        'en',
        'vi'
    ];

    public function changeLanguage(Request $request, $lang)
    {
        if (in_array($lang, $this->available_lang)) {
            $request->session()->put(['lang' => $lang]);
        }

        return redirect()->back();
    }

}
