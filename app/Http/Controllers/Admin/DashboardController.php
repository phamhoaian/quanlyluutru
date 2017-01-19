<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
    	# code...
    }

    public function index()
    {
    	return view('admin.pages.dashboard');
    }
}
