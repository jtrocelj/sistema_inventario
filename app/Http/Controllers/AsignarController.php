<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsignarController extends Controller
{
    public function index()
    {
           

            return view('asignar.index')
            ->extends('layouts.main')
            ->section('content');
    
      
    }
}
