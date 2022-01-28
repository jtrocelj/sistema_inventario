
@section('content')
    @include('layouts.headers.cards')
    
    @extends('layouts.main')


    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>

 <!-- Main content -->
 <div class="main-content" id="panel">
    </script>
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
             <div class=" bg-default">
              <div class="card-header bg-transparent border-0">
                <h3 class="text-white mb-0">Listado de Productos</h3>@include('common.searchbox')
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
                                                      @can('Productos_Crear')
                                                        <a href="#"data-toggle="modal" data-target="#ModalCreateProducto" class="btn btn-sm btn-neutral" >
                                                        Agregar
                                                        </a>
                                                        @endcan
                                                       </div><br>
                                                      <table class="table align-items-center table-dark table-flush">
                                                      <thead class="thead-dark">
                                                     
                                                      <th scope="col" class="sort" data-sort="budget">Descripción</th>
                                                      <th scope="col" class="sort" data-sort="budget">Barcode</th>
                                                      <th scope="col" class="sort" data-sort="budget">Categoría</th>
                                                      <th scope="col" class="sort" data-sort="budget">Precio</th>
                                                      <th scope="col" class="sort" data-sort="budget">Stock</th>
                                                      <th scope="col" class="sort" data-sort="budget">Inv. Mínimo</th>
                                                      <th scope="col" width="10px" class="sort" data-sort="name">Imagen</th>
                                                      <th scope="col">Acción</th>
                                                      
                                                          </thead>
                                                          <tbody class="list" id="laTabla">
                                                            @foreach($productos as $producto)
                                                           
                                                              <td class="text-center">{{$producto->nombre}}</td>
                                                              <td class="text-center">{{$producto->barcode}}</td>
                                                              <td class="text-center">{{$producto->categoria->nombre}}</td>
                                                              <td class="text-center">{{$producto->precio}}</td>
                                                              <td class="text-center">{{$producto->stock}}</td>
                                                              <td class="text-center">{{$producto->alerts}}</td>
                                                              <td class="text-center"> 
                                                                <span>
                                                                <img src="{{asset('storage/producto/' .$producto->imagen)}}" class="navbar-brand-img  rounded-circle" height="60" width="60px" >
                                                                </span>   
                                                                
                                                              </td>
                                                                      <td>
                                                                          @can('Productos_Editar')
                                                                              <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#ModalEditProducto{{$producto->id}}">
                                                                              <i class="fa fa-fw fa-edit"></i>
                                                                              </a>
                                                                              @endcan

                                                                              @can('Productos_Eliminar')
                                                                              @csrf
                                                                               @method('DELETE')
                                                                              <button type="submit" class="btn btn-danger btn-sm" 
                                                                              data-toggle="modal" data-target="#ModalDeleteProducto{{$producto->id}}"><i class="fa fa-fw fa-trash"></i></button>
                                                                              @endcan
                                                                           
                                                        
                                                                      </td>
                                                                      @include('producto.edit')
                                                                      @include('producto.delete')
                                                                  </tr>
                                                            @endforeach
                                                          </tbody>
                                                          
                                                      </table>
                                                                  {{ $productos->links() }}     
                  </div>
                                                  
                                            
                </div>     @include('layouts.footers.auth')          
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
                    




        
    @include('producto.create')
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


    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
          window.livewire.on('show-modal', msg =>{
            $('#theModal').modal('show')
          });


        });

      
        

    </script>
  