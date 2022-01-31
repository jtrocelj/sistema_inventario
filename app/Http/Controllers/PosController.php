<?php

namespace App\Http\Livewire;
namespace App\Http\Controllers;


use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use App\Models\DetalleVenta;

class PosController extends Component
{
    public $total ,$efectivo, $efectivo2,$itemsQuantity, $cambio,$id_cliente,$clientes;

    
    public function index(Request $request)
    {
        
        $total = 0;
      
        foreach ($this->obtenerProductos() as $producto) {
            $total += $producto->cantidad * $producto->precio;
            
        }
       
        $productos = $this->obtenerProductos();
      
        return view('pos.index',['total' => $total,'productos' => $productos,'clientes' => Cliente::orderBy('id','desc')->get()])
        ->extends('layouts.main')
        ->section('content');
    }

    
    public function store(Request $request)
    {
        

       
        $cliente = new Cliente();
        $cliente->apellidos = $request->apellidos;
        $cliente->ci = $request->ci;

       
        $cliente->save();
    
        return redirect()->route('pos.index')
            ->with('success', 'Cliente creado exitosamente.');
    }
    public function terminarOCancelarVenta(Request $request)
    {
        if ($request->input("accion") == "terminar") {
            return $this->terminarVenta($request);
        } else {
            return $this->cancelarVenta();
        }
    }
    public function terminarVenta(Request $request)
    {

        $request->validate(['efectivo' => 'required']);
        // Crear una venta
        $venta = new Venta();
        $venta->id_cliente = $request->input("id_cliente");
        $venta->saveOrFail();
        $idVenta = $venta->id;
        
        $productos = $this->obtenerProductos();
        // Recorrer carrito de compras
        foreach ($productos as $producto) {
            // El producto que se vende...
            $detalleVenta = new DetalleVenta();
            $detalleVenta->fill([
                "id_venta" => $idVenta,
                "nombre" => $producto->nombre,
                "barcode" => $producto->barcode,
                "precio" => $producto->precio,
                "cantidad" => $producto->cantidad,
                "efectivo" =>  $detalleVenta->efectivo = $request->input("efectivo"),
                "cambio" => $detalleVenta->cambio = $request->input("resultado"),
            ]);
            // Lo guardamos
            $detalleVenta->saveOrFail();
            // Y restamos la existencia del original
            $productoActualizado = Producto::find($producto->id);
            $productoActualizado->stock -= $detalleVenta->cantidad;
            $productoActualizado->saveOrFail();
        }
        $this->vaciarProductos();
        return redirect()
            ->route("pos.index")
            ->with("mensaje", "Venta terminada");
    }
    private function obtenerProductos()
    {
        $productos = session("productos");
        if (!$productos) {
            $productos = [];
        }
        return $productos;
    }

    private function vaciarProductos()
    {
        $this->guardarProductos(null);
    }

    private function guardarProductos($productos)
    {
        session(["productos" => $productos,
        ]);
    }

    public function cancelarVenta()
    {
        $this->vaciarProductos();
        return redirect()
            ->route("pos.index")
            ->with("mensaje", "Venta cancelada");
    }

    public function quitarProductoDeVenta(Request $request)
    {
        $indice = $request->post("indice");
        $productos = $this->obtenerProductos();
        array_splice($productos, $indice, 1);
        $this->guardarProductos($productos);
        return redirect()
            ->route("pos.index");
    }

    public function agregarProductoVenta(Request $request)
    {
        $codigo = $request->post("codigo");
        $producto = Producto::where("barcode", "=", $codigo)->first();
        if (!$producto) {
            return redirect()
                ->route("pos.index")
                ->with("info", "Producto no encontrado");
        }
        $this->agregarProductoACarrito($producto);
        return redirect()
            ->route("pos.index");
    }

    private function agregarProductoACarrito($producto)
    {
        if ($producto->stock <= 0) {
            return redirect()->route("pos.index")
                ->with([
                    "danger" => "No hay existencias del producto",
                ]);
        }
        $productos = $this->obtenerProductos();
        $posibleIndice = $this->buscarIndiceDeProducto($producto->barcode, $productos);
        // Es decir, producto no fue encontrado
        if ($posibleIndice === -1) {
            $producto->cantidad = 1;
            array_push($productos, $producto);
        } else {
            if ($productos[$posibleIndice]->cantidad + 1 > $producto->stock) {
                return redirect()->route("pos.index")
                    ->with([
                        "danger" => "No se pueden agregar más productos de este tipo, se quedarían sin existencia",
                    ]);
            }
            $productos[$posibleIndice]->cantidad++;
        }
        $this->guardarProductos($productos);
    }


    private function buscarIndiceDeProducto(string $codigo, array &$productos)
    {
        foreach ($productos as $indice => $producto) {
            if ($producto->barcode === $codigo) {
                return $indice;
            }
        }
        return -1;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


}
