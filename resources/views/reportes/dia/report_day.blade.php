@section('content')
    @include('layouts.headers.cards')
    
    @extends('layouts.main')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<?php
    use App\Models\Venta;
    use App\Models\DetalleVenta;

    $detalle = DetalleVenta::all()
  ;


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
     
     
      
    <div class="card">
	        <div class="card-body">
				<div class="row">
					<div class="col-12 col-md-4 text-center">
						<span>Fecha de consulta: <b> </b></span>
						<div class="form-group">
							<strong>{{\Carbon\Carbon::now()->format('d/m/Y')}}</strong>
						</div>
					</div>
					<div class="col-12 col-md-4 text-center">
						<span>Cantidad de ventas: <b> </b></span>
						<div class="form-group">
							<strong>{{ $venta->count() }}</strong>
						</div>
					</div>

					<div class="col-12 col-md-4 text-center">
						<span>Total de ingreso: <b> </b></span>
						<div class="form-group">
							<strong>Bs {{ $total }}</strong>
						</div>
					</div>
				</div>

            </div>
    </div>  <br>    
            <!-- Dark table -->
           
            <div class="row">
              <div class="col">
              <div class="card bg-default shadow">
              <div class="card-header bg-transparent border-0">
                <h3 class="text-white mb-0">Reporte Diario</h3> @include('common.searchbox')
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

                                              <div class="col-lg-40  text-right  ">
                                              <a class="btn btn-outline-success" href="{{route('excel') }}">EXCEL <i class="fas fa-file-excel"></i></a>

                                              <a class="btn btn-outline-danger"href="{{route('pdf')}}" >PDF <i class="far fa-file-pdf"></i></a>
                                                       </div><br>
                                                       <table class="table align-items-center table-dark table-flush">
                                                      <thead class="thead-dark">
                                                      <th scope="col" class="sort text-center" data-sort="budget">ID</th>
                                                      <th scope="col" class="sort text-center" data-sort="budget">FECHA</th>
                                                      <th scope="col" class="sort text-center" data-sort="budget">ESTADO</th>
                                                      <th scope="col" class="sort text-center" data-sort="budget">CLIENTE</th>
                                                      <th scope="col"  class="sort text-center" data-sort="name">TOTAL</th>
                                                      <th scope="col" class="sort text-center" data-sort="name">ACCIÓN</th>
                                                      
                                                          </thead>
                                                          <tbody  id="laTabla">
                                                          @foreach($venta as $sale)
                                                          <th scope="row" class="text-center">{{ $sale->id }}</th>
                                                              <td class="text-center">{{\Carbon\Carbon::parse($sale->created_at)->format('d-m-Y')}}</td>
                                                         
                                                              <td class="text-center"><span class="badge badge-info">Pagado</span></td>
                                                              <td class="text-center">{{$sale->cliente->apellidos}}</td>
                                                              <td class="text-center">Bs {{number_format($sale->total, 2)}}</td>
                                                              <td class="text-center" style="width: 50px;">
								
                                                                <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#ModalShowRday{{$sale->id}}">
                                                                <i class="fa fa-fw fa-eye"></i>
                                                                </a> 
                                                                <h3>@include('reportes.dia.show')</h3>
                                                              </td>
                                                                     
                                                                  </tr>
                                                            @endforeach
                                                          </tbody>
                                                          
                                                      </table>
                                                          
                  </div>
                                                  
                                            
                </div>    @include('layouts.footers.auth')
               
                                        
                                      
                                  
                              
                        
              </div> 
</div>
            </div>
           
    </div>

  
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>  
                    




        
    @include('categoria.create')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $(document).ready(function(){
        $("#buscador").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#laTabla tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
      </script>

@endsection


    