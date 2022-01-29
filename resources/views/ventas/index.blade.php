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

<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
            <div class="card" style="margin-top: -50px;" >
	              <div class="card-body">
                <div class="card-header bg-transparent border-0">
                <h2 class="text-dark " style="margin-top:-30px;">Listado de Ventas</h2>
              </div>
                      <div class="row">
                        <div class="col">
                        
                        
                            <div class="table-responsive">
    
                                                                </div>
                                                                <table id="example" class="table align-items-center table-dark table-flush " >
                                                                <thead class="thead-dark">
                                                                  <tr>
                                                                      <th scope="col" class="sort text-center" data-sort="budget">FECHA</th>
                                                                      <th scope="col" class="sort text-center" data-sort="budget">CLIENTE</th>
                                                                      <th scope="col"  class="sort text-center" data-sort="name">TOTAL</th>
                                                                      <th scope="col"  class="sort text-center" data-sort="name">TICKET</th>
                                                                      <th scope="col" class="sort text-center" data-sort="name">DETALLES</th>
                                                                  </tr>
                                                                </thead>
                                                                    <tbody >
                                                                    @foreach($ventas as $venta)
                                                                    <tr>
                                                                        <td style="background:#172B4D;" scope="row" class="text-center ">{{\Carbon\Carbon::parse($venta->created_at)->format('d-m-Y h:i:s')}}</td>
                                                                          
                                                                            <td  style="background:#172B4D;"class="text-center">{{$venta->cliente->apellidos}}</td>
                                                                            <td style="background:#172B4D;" class="text-center ">Bs {{number_format($venta->total, 2)}}</td>
                                                                            <td style="background:#172B4D;" class="text-center ">
                                                                            <a class="btn btn-info" href="{{route('ticket', ['id'=>$venta->id])}}">
                                                                                <i class="fa fa-print"></i>
                                                                            </a>
                                                                            </td>
                                                                            <td style="background:#172B4D;" class="text-center ">
                                                                            <a class="btn btn-success" data-toggle="modal" data-target="#ModalShowVentas{{$venta->id}}">
                                                                                <i class="fa fa-info"></i>
                                                                            </a> <h3>@include('ventas.ventas_show')</h3>
                                                                            </td>
                                                                        
                                                                              
                                                                            </tr>
                                                                          
                                                                      @endforeach
                                                                    </tbody>
                                                                    
                                                                </table>
                                                                
                            </div>
                                                            
                                                      
                          </div>   
                        
                                                  
                                                
                                            
                                        
                                  
                        </div> 
                </div>@include('layouts.footers.auth') 
            </div>  
                 

    <script>
      var idioma=

{
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "NingÃºn dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Ãšltimo",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copyTitle": 'Información copiada',
        "copyKeys": 'Use your keyboard or menu to select the copy command',
        "copySuccess": {
            "_": '%d filas copiadas al portapapeles',
            "1": '1 fila copiada al portapapeles'
        },

        "pageLength": {
        "_": "Mostrar %d filas",
        "-1": "Mostrar Todo"
        }
    }
};
     $(document).ready(function() {
      var table =$('#example').DataTable( {
      
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true,
    "language": idioma,
    "lengthMenu": [[5,10,20, -1],[5,10,50,"Mostrar Todo"]],
    "order": [[ 0, "desc" ]]
     
    } );
} );


</script>




        
   
@endsection



    