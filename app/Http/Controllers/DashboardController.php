<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class DashboardController extends Controller
{
    public function index(){
        return view('home');
    }
}
