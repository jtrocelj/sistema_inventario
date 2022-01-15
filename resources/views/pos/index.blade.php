
 
            @section('content')
        
            @include('layouts.headers.cards')
           
            @extends('layouts.main')

        
                <div class="col-12">
                    <h1 style="margin-left: 20px;">Nueva venta <i class="fa fa-cart-plus"></i></h1>
                    @include("notificacion")
                    <div class="row">

                        <div class="col-12 col-md-6">
                            <form action="{{route('agregarProductoVenta')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="codigo" style="margin-left: 10px;" >Código de barras</label>
                                    <input id="codigo" autocomplete="off" required autofocus name="codigo" type="text"
                                        class="form-control"
                                        placeholder="Código de barras" style="width: 300px; margin-left: 10px;">
                                </div>
                            </form>
                        </div>
                    </div>
                    @if(session("productos") !== null)
                        
                     <div class="col-sm-12 col-md-8"> 
                        <div class="table-responsive " style="max-height: 650px; overflow:hidden; margin-top:-20px;">

                            <table class="table table-dark table-flush mt-1">
                                <thead class=" thead-dark text-white " >
                                    <tr>
                                        <th width="10%"> CÒDIGO DE BARRAS</th>
                                        <th class="table-th text-center text-white">DESCRIPCIÓN</th>
                                        <th class="table-th text-center text-white">PRECIO</th>
                                        <th  width="13%"class="table-th text-center text-white">CANTIDAD</th>
                                        <th class="table-th text-center text-white">QUITAR</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach(session("productos") as $producto)
                                    <tr>
                                        <td class="text-center table-th">{{$producto->barcode}}</td>
                                        <td class="text-center">{{$producto->nombre}}</td>
                                        <td class="text-center">Bs{{number_format($producto->precio, 2)}}</td>
                                        <td class="text-center table-th">{{$producto->cantidad}}</td>
                                        <td class="text-center">
                                            <form action="{{route('quitarProductoDeVenta')}}" method="post">
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
                     </div> 
                     
                     <div class="col-sm-12 col-md-4">
                     <div class="row" >
                            <div class="col-sm-11" style="background:#1C345D; border:5px solid ;border-radius:10px;margin-left: 200%; margin-top:-135px;">
                                <div>
                                    <div class="connect-sorting" >
                                        <h5 class="text-center text-white mb-3 ">RESUMEN DE VENTA</h5>
                                    </div>
                                    <div class="connect-sorting-content" >
                                        
                                                    <div>
                                                    <h2 class="text-center text-white ">Total: Bs. {{number_format($total, 2)}}</h2>
                                                    </div>
                                                    <form action="{{route('terminarOCancelarVenta')}}" method="post">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="id_cliente" style="margin-left: 20px;">Cliente</label>
                                                            <select class="form-control" name="id_cliente" style="width: 200px; margin-left: 20px;">
                                                                <option value="Elegir" disabled>ELEGIR:</option>
                                                                @foreach($clientes as $cliente)
                                                                <option value="{{$cliente->id}}" name="id_cliente">{{$cliente->apellidos}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @if(session("productos") !== null)
                                                      
                                                                <button name="accion" style="width: 240px;" value="terminar" type="submit" class="btn btn-success">Terminar
                                                                    venta
                                                                </button><br><br>
                                                           
                                                                <button name="accion" style="width: 240px;" value="cancelar" type="submit" class="btn btn-danger">Cancelar
                                                                    venta
                                                                </button>
                                                          
                                                        @endif
                                                    </form>
                                                    
                                               
                                    </div>          
                                </div>
                            </div>
                        </div>
                     </div>
                    @else
                    
                    <div class="col-sm-12 col-md-8"> 
                        <div class="table-responsive " style="max-height: 650px; overflow:hidden; margin-top:-20px;">

                            <table class="table table-dark table-flush mt-1">
                                <thead class=" thead-dark text-white " >
                                    <tr>
                                        <th width="10%"> CÒDIGO DE BARRAS</th>
                                        <th class="table-th text-center text-white">DESCRIPCIÓN</th>
                                        <th class="table-th text-center text-white">PRECIO</th>
                                        <th  width="13%"class="table-th text-center text-white">CANTIDAD</th>
                                        <th class="table-th text-center text-white">QUITAR</th>

                                    </tr>
                                </thead>
                                <tbody>
                           
                                    <tr>
                                        <td class="text-center table-th"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center table-th"></td>
                                        <td class="text-center">
                                           
                                        </td>                                                   
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>
                     </div>   
                    @endif
                </div>
    </div>
       


        
     
            
                            
        @endsection
