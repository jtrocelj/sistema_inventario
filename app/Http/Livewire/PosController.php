<?php

namespace App\Http\Livewire;


use App\Models\Denominacion;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;
use App\Models\Producto;
use DB;

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

        dd($barcode);

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

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
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

            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();
            $this->emit('scan-ok', $title);
        }

       
    }
    public function removeItem($productoId){
        Cart::remove($productoId);

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', 'Producto Eliminado');

    }

    public function decreaseQty($productoId){
        $item = Cart::get($productoId);
        Cart::remove($productoId);

        $newQty = ($item->quantity) -1 ;

        if($newQty > 0)
            Cart::add($item->id, $item->nombre, $item->precio, $newQty, $item->attributes[0]);


        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', 'Cantidad Actualizada');
        

    }


    public function clearCart(){
        Cart::clear();
        $this->efectivo = 0;
        $this->cambio = 0;

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();

        $this->emit('scan-ok','Carrito Vacio');

    }

    public function saveSale()
    {
        if ($this->total <= 0)
        {
            $this->emit('sale-error','AGREGA PRODUCTOS A LA VENTA');
            return;
        }

        if ($this->efectivo <= 0)
        {
            $this->emit('sale-error','INGRESA EL EFECTIVO');
            return;
        }
        if ($this->total > $this->efectivo)
        {
            $this->emit('sale-error','EL EFECTIVO DEBE SER MAYOR O IGUAL AL TOTAL');
            return;
        }

        DB::beginTransaction();

            try {
                $sale = Sale::create([
                    'total' => $this->total,
                    'items' => $this->itemsQuantity,
                    'efectivo' => $this->efectivo,
                    'cambio' => $this->cambio,
                    'user_id' => auth()->user()->id,
                ]);

                if ($sale)
                {
                    $items = Cart::getContent();

                    foreach ($items as $item)
                    {
                        SaleDetail::create([
                            'precio' => $item->precio,
                            'cantidad' => $item->cantidad,
                            'producto_id' => $item->id,
                            'sale_id' => $sale->id,
                        ]);

                        $producto = Producto::find($item->id);
                        $producto->stock = $producto->stock - $item->cantidad;
                        $producto->save();
                    }
                }

            DB::commit();

                Cart::clear();

                $this->efectivo = 0;
                $this->cambio= 0;
                $this->total = Cart::getTotal();
                $this->itemsQuantity = Cart::getTotalQuantity();
                $this->emit('sale-ok', 'Venta registrada con éxito');
                $this->emit('print-ticket', $sale->id);

        } catch (Exception $e) {
            DB::rollBack();
                $this->emit('sale-error', $e->getMessage());
        }
    }

    public function printTicket($sale) {
        return Redirect::to("print://$sale->id");
    }

}
