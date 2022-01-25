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
						<span>Todal de ingreso: <b> </b></span>
						<div class="form-group">
							<strong>Bs {{ $detalle->sum('precio') }}</strong>
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
                <h3 class="text-white mb-0">Reporte de ventas por día</h3> @include('common.searchbox')
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
                                              <a class="btn btn-outline-danger"href="{{route('pdf')}}">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf" viewBox="0 0 16 16">
                                                  <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                                                  <path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
                                                </svg>
                                                PDF
                                              </a>
                                                       </div><br>
                                                      <table class="table align-items-center table-dark table-flush">
                                                      <thead class="thead-dark">
                                                      <th scope="col" class="sort text-center" data-sort="budget">ID</th>
                                                      <th scope="col" class="sort text-center" data-sort="budget">FECHA</th>
                                                      
                                                      <th scope="col"  class="sort text-center" data-sort="name">TOTAL</th>
                                                      <th scope="col" class="sort text-center" data-sort="name">ACCIÓN</th>
                                                      
                                                          </thead>
                                                          <tbody  id="laTabla">
                                                          @foreach($venta as $v)
                                                          <th scope="row" class="text-center">{{ $v->id }}</th>
                                                              <td class="text-center">{{ date('d-m-Y', strtotime($v->created_at)) }}</td>
                                                         
                                                              <td class="text-center"> Bs {{number_format($v->total, 2)}}</td>
                                                              <td class="text-center" style="width: 50px;">
								
                                                                <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#ModalShowRday{{$v->id}}">
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


    