
@section('content')
    @include('layouts.headers.cards')
    
    @extends('layouts.main')
     
    <?php
    use App\Models\Venta;
    use App\Models\DetalleVenta;

    $detalle = DetalleVenta::all()
    ->where('id_venta','=',$venta->id);


    ?>



 <!-- Main content -->
 <div class="main-content" id="panel">
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body ">

        

          <div class="row align-items-center py-4">
          <br>
          
          </div>
        
        </div>
      </div>
    </div>
    
    <!-- Page content -->
    <div class="container-fluid mt--9 ">
     
     
      
    

            
            <!-- Dark table -->
           
            <div class="row">
              <div class="col">
              <div class="card bg-default shadow">
              <div class="card-header bg-transparent border-0">
                
                <h1 class="text-white mb-0">Detalle de venta #{{$venta->id}}</h1>
                <h1 class="text-white mb-0">Cliente: <small>{{$venta->cliente->apellidos}}</small></h1><br><br>
                
              </div>
                  <div class="table-responsive mt--6">
                  
                                                
                                              @if ($message = Session::get('success'))
                                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                      <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                                      <span class="alert-inner--text"> <p>{{ $message }}</p>
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                              @endif
                                              <div class="col-lg-40  text-right">
                                                 <a class="btn btn-info" href="{{route('ventas.index')}}">
                                                    <i class="fa fa-arrow-left"></i>&nbsp;Volver
                                                </a>
                                                <a class="btn btn-success" href="{{route('ticket', ['id' => $venta->id])}}">
                                                    <i class="fa fa-print"></i>&nbsp;Ticket
                                                </a>
                                              </div>
                                              <div class="col-lg-40  text-left  " style="margin-left:30px;">
                                              <h2 class="text-white mb-0">Productos</h2><br>
                                                       </div>
                                                      
                                                      <table class="table align-items-center table-dark table-flush">
                                                      <thead class="thead-dark">
                                                      <th scope="col" class="sort text-center" data-sort="budget">Descripción</th>
                                                      <th scope="col"  class="sort text-center" data-sort="name">Código de barras</th>
                                                      <th scope="col" class="sort text-center" data-sort="name">Precio</th>
                                                      <th scope="col" class="sort text-center" data-sort="name">Cantidad</th>
                                                      <th scope="col" class="sort text-center" data-sort="name">Subtotal</th>
                                                      
                                                          </thead>
                                                          <tbody >
                                                          @foreach($detalle as $producto)
                                                              <td class="text-center">{{$producto->nombre}}</td>
                                                              <td class="text-center">{{$producto->barcode}}</td>
                                                              <td class="text-center">Bs {{number_format($producto->precio, 2)}}</td>
                                                              <td class="text-center">{{$producto->cantidad}}</td>
                                                              <td class="text-center">Bs {{number_format($t = $producto->cantidad * $producto->precio, 2)}}</td>
                                          
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
                                                                    <h3 class="text-info">Bs {{number_format($mytotal, 2)}}</h3>
                                                                </td>
                                                                @endif
                                            
                                                                
                                                            </tr>
                                                            </tfoot>
                                                      </table>
                                                  
                  </div>
                                                  
                                            
                </div>    @include('layouts.footers.auth')
               
                                        
                                      
                                  
                              
                        
              </div> 
</div>
            </div>
           
    </div>

  




        
  

@endsection


    
  