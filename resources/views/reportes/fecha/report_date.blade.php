@section('content')
    @include('layouts.headers.cards')
    
    @extends('layouts.main')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">

<script  src="//code.jquery.com/jquery-3.5.1.js"></script>
<script  src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
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

    <div class="card" style="height: 130px;">
	        <div class="card-body">
          <div class="card-header bg-transparent border-0">
                <h2 class="text-dark " style="margin-top:-30px;">Reporte de ventas por Fecha</h2>
              </div>
            {!! Form::open(['route'=>'pdfDate','method'=>'POST']) !!}

				<div class="row"  style="margin-top:-20px;">
                <div class="col-12 col-md-3" >
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
            {!! Form::close() !!}
    </div>  <br>  <br>  <br> 
            <!-- Dark table -->
            <div class="card" style="margin-top: -50px;" >
	              <div class="card-body">
                      <div class="row">
                        <div class="col">
                        
                        
                            <div class="table-responsive">
                            
                                                          
                                                    

                                                      
                                                        
                                                    
                                                                </div><br>
                                                                <table id="example" class="table align-items-center table-dark table-flush ">
                                                                <thead class="thead-dark">
                                                                  <tr>
                                                                      <th scope="col" class="sort text-center" data-sort="budget">ID</th>
                                                                      <th scope="col" class="sort text-center" data-sort="budget">FECHA</th>
                                                                      <th scope="col" class="sort text-center" data-sort="budget">ESTADO</th>
                                                                      <th scope="col" class="sort text-center" data-sort="budget">CLIENTE</th>
                                                                      <th scope="col"  class="sort text-center" data-sort="name">TOTAL</th>
                                                                      <th scope="col" class="sort text-center" data-sort="name">ACCIÓN</th>
                                                                  </tr>
                                                                </thead>
                                                                    <tbody >
                                                                    @foreach($venta as $sale)
                                                                    <tr>
                                                                        <td style="background:#172B4D;" scope="row" class="text-center ">{{ $sale->id }}</td>
                                                                          
                                                                            <td  style="background:#172B4D;"class="text-center">{{\Carbon\Carbon::parse($sale->created_at)->format('d-m-Y')}}</td>
                                                                            <td style="background:#172B4D;" class="text-center "><span class="badge badge-info">Pagado</span></td>
                                                                            <td style="background:#172B4D;" class="text-center ">{{$sale->cliente->apellidos}}</td>
                                                                            <td style="background:#172B4D;" class="text-center ">Bs {{number_format($sale->total, 2)}}</td>
                                                                            <td style="background:#172B4D;" class="text-center" style="width: 50px;">
                                                                            <button class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#ModalShowRday{{$sale->id}}">
                                                                              <i class="fa fa-fw fa-eye"></i>
                                                                      </button>
                                                                              <h3>@include('reportes.fecha.show')</h3>
                                                                            </td>
                                                                              
                                                                            </tr>
                                                                          
                                                                      @endforeach
                                                                    </tbody>
                                                                    
                                                                </table>
                                                                
                            </div>
                                                            
                                                      
                          </div>   
                        
                                                  
                                                
                                            
                                        
                                  
                        </div> 
                </div>
            </div>  
            @include('layouts.footers.auth')      

    <script>
     $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
       
    } );
} );

</script>




        
   
@endsection



    