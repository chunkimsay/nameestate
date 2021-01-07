<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{

public function __construct()
{
    $this->middleware('auth');
    $this->middleware('admin');
}

    public function index()
    {

        return view('back.index');
    }

}
