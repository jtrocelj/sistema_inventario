<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;
use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use PDF;
class VentasController extends Controller
{

    public function pdf(Request $request){
        $venta = Venta::findOrFail($request->get("id"));
        $detalle = DetalleVenta::all()
        ->where('id_venta','=',$venta->id);

               
        $pdf = PDF::loadView('ventas.factura',['detalle' => $detalle,'venta' => $venta]);
  
        return $pdf->stream('Factura.pdf');
        return $pdf->download('Factura.pdf');

        return view('ventas.factura', ["detalle" => $detalle,"venta" => $venta])    
            ->extends('layouts.main')
            ->section('content');
    }


    public function index()
    {
        
      
        $ventasConTotales = Venta::join("detalle_ventas", "detalle_ventas.id_venta", "=", "ventas.id")
       
        ->select("ventas.*","id_cliente" ,DB::raw("sum(detalle_ventas.cantidad * detalle_ventas.precio) as total"))
       
        ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_cliente") ->orderBY('ventas.id','desc')
        ->get();
        
    
            return view('ventas.index', ["ventas" => $ventasConTotales])
            ->extends('layouts.main')
            ->section('content');
    
           
    }
    
   /**
     * Display the specified resource.
     *
     * @param \App\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
      
        return view("ventas.ventas_show", [
            "venta" => $venta,
          
        ]);
    }

   

}
