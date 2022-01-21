

@section('content')
  
    <?php
    use App\Models\Venta;
    use App\Models\DetalleVenta;

    $detalle = DetalleVenta::all()
    ->where('id_venta','=',$venta->id);


    ?>
    @extends('layouts.main')
    <div class="row">
        <div class="col-12">
            <h1>Detalle de venta #{{$venta->id}}</h1>
            <h1>Cliente: <small>{{$venta->cliente->apellidos}}</small></h1>
            @include("notificacion")
            <a class="btn btn-info" href="{{route('ventas.index')}}">
                <i class="fa fa-arrow-left"></i>&nbsp;Volver
            </a>
            <a class="btn btn-success" href="{{route('ventas.ticket', ['id' => $venta->id])}}">
                <i class="fa fa-print"></i>&nbsp;Ticket
            </a>
            <h2>Productos</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Código de barras</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach($detalle as $producto)
                    <tr>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->barcode}}</td>
                        <td>${{number_format($producto->precio, 2)}}</td>
                        <td>{{$producto->cantidad}}</td>
                        <td>${{number_format($t = $producto->cantidad * $producto->precio, 2)}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td><strong>Total</strong></td>
                    
                    @if('detalle')
                    @php  $mytotal = 0; @endphp
                    @foreach($detalle as $d)
                    @php
                        $mytotal += $d->cantidad * $d->precio;

                    @endphp
                    @endforeach
                  
                    <td class="text-center">
                        <h3 class="text-info">${{number_format($mytotal, 2)}}</h3>
                    </td>
                    @endif

                    
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
@endsection
