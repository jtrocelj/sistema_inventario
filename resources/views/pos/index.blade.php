
 
            @section('content')
        
            @include('layouts.headers.cards')
           
            @extends('layouts.main')

            <div class="row">
                <div class="col-12">
                    <h1 style="margin-left: 20px;">Nueva venta <i class="fa fa-cart-plus"></i></h1>
                    @include("notificacion")
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <form action="{{route('terminarOCancelarVenta')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="id_cliente" style="margin-left: 20px;">Cliente</label>
                                    <select class="form-control" name="id_cliente" style="width: 300px; margin-left: 20px;">
                                        <option value="Elegir" disabled>ELEGIR:</option>
                                        @foreach($clientes as $cliente)
                                        <option value="{{$cliente->id}}" name="id_cliente">{{$cliente->apellidos}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if(session("productos") !== null)
                                    <div class="form-group">
                                        <button name="accion" value="terminar" type="submit" class="btn btn-success">Terminar
                                            venta
                                        </button>
                                        <button name="accion" value="cancelar" type="submit" class="btn btn-danger">Cancelar
                                            venta
                                        </button>
                                    </div>
                                @endif
                            </form>
                        </div>
                        <div class="col-12 col-md-6">
                            <form action="{{route('agregarProductoVenta')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="codigo" style="margin-left: -90px;" >Código de barras</label>
                                    <input id="codigo" autocomplete="off" required autofocus name="codigo" type="text"
                                        class="form-control"
                                        placeholder="Código de barras" style="width: 300px; margin-left: -90px;">
                                </div>
                            </form>
                        </div>
                    </div>
                    @if(session("productos") !== null)
                        <h2>Total: Bs. {{number_format($total, 2)}}</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Código de barras</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Quitar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(session("productos") as $producto)
                                    <tr>
                                        <td>{{$producto->barcode}}</td>
                                        <td>{{$producto->nombre}}</td>
                                        <td>Bs{{number_format($producto->precio, 2)}}</td>
                                        <td>{{$producto->cantidad}}</td>
                                        <td>
                                            <form action="#" method="post">
                                                @method("delete")
                                                @csrf
                                                <input type="hidden" name="indice" value="{{$loop->index}}">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                    
                    <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Código de barras</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Quitar</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                               
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
    </div>
       


        
     
            
                            
        @endsection
