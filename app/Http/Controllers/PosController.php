<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosController extends Controller
{
    public $total,$cart = [];
    public function index(){
        return view('pos.index')->extends('layouts.main')
        ->section('content');
    }
   
}
