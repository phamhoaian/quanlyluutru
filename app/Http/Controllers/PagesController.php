<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function showStayingForm()
    {
    	return view('pages.staying');
    }
}
