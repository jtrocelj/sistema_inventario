
@section('content')
    @include('layouts.headers.cards')
    
    @extends('layouts.main')




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
     
      @include('common.searchbox')
      
    

            
            <!-- Dark table -->
           
            <div class="row">
              <div class="col">
             <div class=" bg-default">
              <div class="card-header bg-transparent border-0">
                <h3 class="text-white mb-0">Listado de Productos</h3><br>
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
                                                        <a href="#" data-toggle="modal" data-target="#ModalCreateProducto" class="btn btn-sm btn-neutral" >
                                                        Agregar
                                                        </a>
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
                                                          <tbody class="list">
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
                                                                              <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#ModalEditProducto{{$producto->id}}">
                                                                              <i class="fa fa-fw fa-edit"></i>
                                                                              </a>
                                                                             
                                                                              @csrf
                                                                               @method('DELETE')
                                                                              <button type="submit" class="btn btn-danger btn-sm" 
                                                                              data-toggle="modal" data-target="#ModalDeleteProducto{{$producto->id}}"><i class="fa fa-fw fa-trash"></i></button>
                                                                        
                                                                           
                                                        
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
  