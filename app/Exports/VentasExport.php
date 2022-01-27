<?php

namespace App\Exports;

use App\Models\Venta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;



class VentasExport implements FromView
{
    
    public function view(): View
    {
        return view('reportes.dia.excel', [
           
            'venta' => Venta::join("detalle_ventas", "detalle_ventas.id_venta", "=", "ventas.id")
       
        ->select("ventas.*","id_cliente" ,DB::raw("sum(detalle_ventas.cantidad * detalle_ventas.precio) as total"))
       
        ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_cliente") ->orderBY('ventas.id','asc')
        ->whereDate('ventas.created_at', Carbon::today('Etc/GMT+4'))->get()
        ]);
    }
}
