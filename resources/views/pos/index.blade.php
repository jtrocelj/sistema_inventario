
            @section('content')
        
            @include('layouts.headers.cards')
           
            @extends('layouts.main')
        <style>
            .table-fixed tbody {
                display: block;
                height: 400px;
                overflow-y: auto;
            }

            .table-fixed tr {
                display: block;
            }
        </style>
   
  
                <div class="col-12">
                    <h1 style="margin-left: 10px; margin-top:-80px;">Nueva venta <i class="fa fa-cart-plus"></i></h1>
                    @include("notificacion")
                    <div class="row">

                        <div class="col-12 col-md-6">
                            <form action="{{route('agregarProductoVenta')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="codigo" style="margin-left: 10px;" class="text-white" >Código de barras</label>
                                    <input id="codigo" autocomplete="off" required autofocus name="codigo" type="text"
                                        class="form-control"
                                        placeholder="Código de barras" style="width: 300px; margin-left: 10px;">
                                </div>
                            </form>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                      <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                                      <span class="alert-inner--text"> <p>{{ $message }}</p>
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                              @endif
                    @if(session("productos") !== null)
                        
                     <div class="col-sm-12 col-md-8"> 
                                <div class="table-responsive " style="max-height: 650px; overflow:hidden; margin-top:-20px;">

                                    <table ALIGN="center"class="table table-dark table-flush mt-1 table-fixed text-center">
                                        <thead class=" thead-dark text-white " >
                                            <tr>
                                            
                                                <th ALIGN="right" class="col  text-white" > CÒDIGO DE BARRAS</th>
                                                <th ALIGN="right" class="col  text-white" >DESCRIPCIÓN</th>
                                                <th ALIGN="right" class="col text-center text-white">PRECIO</th>
                                                <th  ALIGN="right" class="col text-center text-white">CANTIDAD</th>
                                                <th  ALIGN="right" class="col text-center text-white">QUITAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
                                            

                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(session("productos") as $producto)
                                            <tr>
                                                <td ALIGN="right" class="col text-center ">{{$producto->barcode}}</td>
                                                <td ALIGN="right" class="col " >{{$producto->nombre}}</td>
                                                <td ALIGN="right" class="col text-center">Bs{{number_format($producto->precio, 2)}}</td>
                                                <td ALIGN="right" class="col text-center ">{{$producto->cantidad}}</td>
                                                <td ALIGN="right"  width="10%"class="col text-center">
                                                    <form action="{{route('quitarProductoDeVenta')}}" method="post">
                                                        @method("delete")
                                                        @csrf
                                                        <input type="hidden" name="indice" value="{{$loop->index}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <button type="submit" class="btn btn-danger" >
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
                                                                                                                    
                </div>                                                                                
                        
					<script>
                        function cambio(){
                        caja=document.forms["restar"].elements;
                        var total = Number(caja["total"].value.replace(".",""))
                        var efectivo = Number(caja["efectivo"].value.replace(".",""))
                        resultado=efectivo-total;
                        if(!isNaN(resultado)){
                        caja["resultado"].value=efectivo-total;
                        format(caja["resultado"])
                        }
                        }
                        //-----SCRIPT SEPARADOR DE MILES---------
                        function format(input)
                        {
                        var num = input.value.replace(/\./g,'');
                        if(!isNaN(num)){
                        num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
                        num = num.split('').reverse().join('').replace(/^[\.]/,'');
                        input.value = num;
                        }
                        //-- ALERTA SOLO NUMEROS 
                        else{ alert('Solo se permiten numeros');
                        input.value = input.value.replace(/[^\d\.]*/g,'');
                        }
                        }
                    </script>         
                    <div class="col-sm-12 col-md-4">
                                                <div class="row" >
                                                        <div class="col-sm-11" style="background:#1C345D; border:5px solid ;border-radius:10px;margin-left: 200%; margin-top:-460px;"><br>
                                                                <form action="{{route('terminarOCancelarVenta')}}"  method="post" name="restar">
                                                                @csrf
                                                                    <div class="card div_radius" >  
                                                                        <div class="card-header">
                                                                        <h2 class="card-title">Realizar venta</h2>

                                                                            <div class="mb-3">
                                                                                <div class="form-group">
                                                                                <label for="">Total: </label>
                                                                                <input type="text" name="total" value="{{$total}} " onKeyUp="cambio();format(this)" onchange="format(this)" class="form-control text-center input_style_total" id="venttotal_venta" placeholder="00.00" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <div class="row">
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                    <label for="">Efectivo: </label>
                                                                                    <input type="text"  name="efectivo"  required class="form-control input_style" onKeyUp="cambio();format(this)" onchange="format(this)"placeholder="Bs 0.00" autocomplete="off">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="form-group">
                                                                                    <label for="">Cambio: </label>
                                                                                    <input type="text"  name="resultado"  class="form-control input_style" readonly placeholder="Bs 0.00"> 
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>    
                                                                
                                                                   
                                                                    <div class="card div_radius">  
                                                                        <div class="card-header">
                                                                            <h3 class="card-title">Datos para la factura</h3>
                                                                            <div class="col-lg-40  text-right  ">
                                                                                <a href="#" data-toggle="modal" data-target="#ModalCreateCliente2" class="btn btn-sm btn-neutral" >
                                                                                Agregar Cliente
                                                                                </a>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                        <label for="id_cliente">Cliente</label>
                                                                                        <select required class="form-control" name="id_cliente" id="id_cliente">
                                                                                            @foreach($clientes as $cliente)
                                                                                                <option value="{{$cliente->id}}">{{$cliente->apellidos}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                        </div>      
                                                                    </div>  <br>                
                                                                            @if(session("productos") !== null)
                                                                                                            
                                                                                <button name="accion" style="width: 100px;" value="terminar" type="submit" class="btn btn-success">Terminar</button>
                                                                                                                
                                                                                <button name="accion" style="width: 100px;" value="cancelar" type="submit" class="btn btn-danger">Cancelar</button>
                                                                                                                
                                                                                @endif
                                                                          
                                                                </form><br> 
                                                        </div>  
                                                </div>  
                                                
                    </div>                            

                                           
                    @else
                    
                    <div class="col-sm-12 col-md-8"> 
                        <div class="table-responsive " style="max-height: 650px; overflow:hidden; margin-top:-20px;">

                            <table class="table table-dark table-flush mt-1">
                                <thead class=" thead-dark text-white " >
                                    <tr>
                                        <th class="table-th text-center text-white"> CÒDIGO DE BARRAS</th>
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
       


        
     
                  
    @include('pos.create')
                            
        @endsection
