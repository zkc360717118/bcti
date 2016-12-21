<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class QuoteController extends Controller
{
    public function maketour(){
        return view('quote.maketour');
    }
}
