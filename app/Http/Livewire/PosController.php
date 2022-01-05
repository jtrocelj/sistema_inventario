<?php

namespace App\Http\Livewire;


use App\Models\Denominacion;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;
use App\Models\Producto;

class PosController extends Component
{
    public $total ,$itemsQuantity, $efectivo,$cambio;

    public function mount(){
        $this->efectivo = 0;
        $this->cambio = 0;
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
    }
    public function render()
    {
     
        return view('livewire.pos.index', [
            'denominacions' => Denominacion::orderBy('valor','desc')->get(),
            'cart' => Cart::getContent()->sortBy('nombre')
        ])
        ->extends('layouts.main')
        ->section('content');;
    }

    public function ACash($valor){
        $this->efectivo += ($valor == 0 ? $this->total : $valor);
        $this->cambio = ($this->efectivo - $this->total);
    }

    protected $listeners =[
        'scan-code' => 'ScanCode',
        'removeItem' => 'removeItem',
        'clearCart' => 'clearCart',
        'saveSale' => 'saveSale'
    ];

    public function ScanCode($barcode, $cantidad = 1){

        $producto = Producto::where('barcode', $barcode)->first();
        if($producto == null || empty($empty)){
            $this->emit('scan-notfound', 'El producto no está registrado');
        }else{
            if($this->InCart($producto->id)){
                $this->increaseQty($producto->id);
                return;
            }
            if($producto->stock < 1){
                $this->emit('no-stock','Stock insuficiente :(');
                return;
            }
            Cart::add($producto->id, $producto->nombre, $producto->precio, $cantidad, $producto->image);
            $this->total = Cart::getTotal();
            $this->emit('scan-ok','Producto Agregado');

        }
    }

    public function InCart($productoId){
        $exist = Cart::get($productoId);
        if($exist){
            return true;
        }else{
            return false;
        }
    }

    public function increaseQty($productoId, $cantidad=1){
        $title = '';
        $producto = Producto::find($productoId);
        $exist = Cart::get($productoId);

        if($exist){
            $title = 'Cantidad Actualizada';
        }else{
            $title = 'Producto Agregado';
        }

        if($exist){
            if($producto->stock < ($cantidad + $exist->quantity)){
                $this->emit('no-stock','Stock insuficiente');
                return;
            }
        }

        Cart::add($producto->id, $producto->nombre, $producto->precio, $cantidad, $producto->image);

        $this->total = Card::getTotal();
        $this->itemsQuantity = Card::getTotalQuantity();
        $this->emit('scan-ok', $title);

    }

    public function updateQty($productoId, $cantidad = 1){
        $title = '';
        $producto = Producto::find($productoId);
        $exist = Cart::get($productoId);

        if($exist){
            $title = 'Cantidad Actualizada';
        }else{
            $title = 'Producto Agregado';
        }

        if($exist)
        {
            if($producto->stock < $cantidad){
                $this->emit('no-stock','Stock insuficiente');
                return;
            }
        }

        $this->removeItem($productoId);
        if($cantidad > 0){
            Cart::add($producto->id, $producto->nombre, $producto->precio, $cantidad, $producto->image);

            $this->total = Card::getTotal();
            $this->itemsQuantity = Card::getTotalQuantity();
            $this->emit('scan-ok', $title);
        }
    }

}
