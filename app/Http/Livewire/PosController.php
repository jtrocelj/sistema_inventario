<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Denominacion;
class PosController extends Component
{
    public $total=10 ,$cart = [],$itemsQuantity = '',$denominacions = [], $efectivo,$cambio;
    public function render()
    {
        $this->denominacions = Denominacion::all();
        return view('livewire.pos.index')->extends('layouts.main')
        ->section('content');;
    }
}
