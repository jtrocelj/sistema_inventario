@section('content')
    @include('layouts.headers.cards')
    
    @extends('layouts.main')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
     
     
    <script>
    window.onload = function(){
        var fecha = new Date(); //Fecha actual
        var mes = fecha.getMonth()+1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        if(dia<10)
          dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
          mes='0'+mes //agrega cero si el menor de 10
        document.getElementById('fecha_fin').value=ano+"-"+mes+"-"+dia;
      }
</script>

    <div class="card">
	        <div class="card-body">
            
            {!! Form::open(['route'=>'pdfDate','method'=>'POST']) !!}

				<div class="row">
                <div class="col-12 col-md-3">
                            <span>Fecha inicial</span>
                            <div class="form-group">
                                <input class="form-control" type="date" 
                                value="{{ old('fecha_ini') }}"
                                name="fecha_ini" id="fecha_ini">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <span>Fecha final</span>
                            <div class="form-group">
                                <input class="form-control" type="date" 
                                value="{{old('fecha_fin')}}" 
                                name="fecha_fin" id="fecha_fin">
                            </div>
                        </div>
                        <div class="col-12 col-md-3 text-center mt-4">
                        <div class="form-group">
                               <button type="submit" name="accion" value="consultar" class="btn btn-primary btn-sm">Consultar</button>
                            </div>
                        </div>
                        
                        <div class="col-12 col-md-3 text-center">
                            <span>Total de ingresos: <b> </b></span>
                            <div class="form-group">
                                <strong>Bs {{number_format($total)}} </strong>
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
                <h3 class="text-white mb-0">Reporte de ventas por Fecha</h3>
              </div>
                  <div class="table-responsive mt--6">
                  
                                                
                                          

                                              <div class="col-lg-40  text-right  ">
                              
                                              <button style="margin-top:30px; " type="submit" class="btn btn-outline-danger" name="accion" value="pdf">Exportar a PDF <i class="far fa-file-pdf"></i></button> 
                                                {!! Form::close() !!}
                                           
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
								
                                                                <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#ModalShowRdate{{$sale->id}}">
                                                                <i class="fa fa-fw fa-eye"></i>
                                                                </a> 
                                                                <h3>@include('reportes.fecha.show')</h3>
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
                    




        
   
@endsection



    