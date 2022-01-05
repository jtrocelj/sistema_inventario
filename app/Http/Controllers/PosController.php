<?php

namespace App\Http\Livewire;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\Component;




class PosController extends Component
{
    public $total ,$cart = [],$itemsQuantity = '';
    
    public function index(){
       $this->total ;
        return view('pos.index')->extends('layouts.main')
        ->section('content');
    }
   
}
