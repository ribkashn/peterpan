<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('layout.utama');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
