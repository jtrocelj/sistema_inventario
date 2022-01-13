<?php

namespace App\Http\Livewire;
namespace App\Http\Controllers;

use App\Models\Denominacion;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;
use App\Models\Producto;
use DB;
use App\Models\Cliente;

class PosController extends Component
{
    public $total ,$itemsQuantity, $efectivo,$cambio,$id_cliente,$clientes;

    public function mount(){
        $this->efectivo = 0;
        $this->cambio = 0;
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->id_cliente = 'ELEGIR';
        $this->clientes = Cliente::all();
    }
    public function index()
    {
        
        return view('pos.index',['clientes' => Cliente::orderBy('id','asc')->get()])
        ->extends('layouts.main')
        ->section('content');
    }

    

}
