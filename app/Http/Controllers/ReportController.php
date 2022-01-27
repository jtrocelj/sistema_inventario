<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PDF;

use App\Exports\VentasExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    private $pagination =5;

   
    public function paginationView(){
        return 'vendor.livewire.bootstrap';
    }
    public function pdf(Request $request){
        

        $detalle = DetalleVenta::all();
        $venta = Venta::join("detalle_ventas", "detalle_ventas.id_venta", "=", "ventas.id")
       
        ->select("ventas.*","id_cliente" ,DB::raw("sum(detalle_ventas.cantidad * detalle_ventas.precio) as total"))
       
        ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_cliente") ->orderBY('ventas.id','asc')
        ->whereDate('ventas.created_at', Carbon::today('Etc/GMT+4'))->get();
        $total = $venta->sum('total');

        $pdf = PDF::loadView('reportes.dia.pdf',['venta' => $venta,"total" => $total]);
        //$pdf->loadHTML('<h1>Test</h1>');
      
        return $pdf->download('Reporte Diario.pdf');

        return view('reportes.dia.pdf', ["venta" => $venta,"total" => $total])    
            ->extends('layouts.main')
            ->section('content');
    }

    

    public function reports_day()
    {
        
        $detalle = DetalleVenta::all();
       

        $venta = Venta::join("detalle_ventas", "detalle_ventas.id_venta", "=", "ventas.id")
       
        ->select("ventas.*","id_cliente" ,DB::raw("sum(detalle_ventas.cantidad * detalle_ventas.precio) as total"))
       
        ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_cliente") ->orderBY('ventas.id','asc')
        ->whereDate('ventas.created_at', Carbon::today('Etc/GMT+4'))->get();

        $total = $venta->sum('total');
        $producto = Producto::all();
        return view('reportes.dia.report_day', ["venta" => $venta, "detalle" => $detalle, "producto" => $producto,"total" => $total]);
    }

    public function reports_date(){

        $venta = Venta::join("detalle_ventas", "detalle_ventas.id_venta", "=", "ventas.id")
        ->select("ventas.*","id_cliente" ,DB::raw("sum(detalle_ventas.cantidad * detalle_ventas.precio) as total"))
        ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_cliente") ->orderBY('ventas.id','asc')
      ->whereDate('ventas.created_at', Carbon::today('Etc/GMT+4'))->get();
        
      $total =$venta->sum('total');
        return view('reportes.fecha.report_date', compact('venta', 'total'));
    }
  

    public function pdfDate(Request $request){
        
        $fi = $request->fecha_ini. ' 00:00:00';
        $ff = $request->fecha_fin. ' 23:59:59';
        $venta = Venta::join("detalle_ventas", "detalle_ventas.id_venta", "=", "ventas.id")
       
        ->select("ventas.*","id_cliente",DB::raw("sum(detalle_ventas.cantidad * detalle_ventas.precio) as total"))
        ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_cliente") ->orderBY('ventas.id','asc')
        ->whereBetween('ventas.created_at', [$fi, $ff])->get();
        $total =$venta->sum('total');
    
        if ($request->input("accion") == "pdf") {
        
               
        $pdf = PDF::loadView('reportes.fecha.pdf',compact('venta', 'total','fi','ff'));
        //$pdf->loadHTML('<h1>Test</h1>');
      
        
        return $pdf->stream('Reporte.pdf');
        return $pdf->download('Reporte.pdf');

     }else{
       

        
        return view('reportes.fecha.report_date', compact('venta', 'total'));
     }
    }

    
    public function excel(){
      return Excel::download(new VentasExport,'reporte diario.xlsx');
    }
}

