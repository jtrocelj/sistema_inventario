
@section('content')
    @include('layouts.headers.cards')
    
    @extends('layouts.main')




 <!-- Main content -->
 <div class="main-content" id="panel">
 
 <script type="text/javascript">
        function confirmarEliminar(){
            var res = confirm("Estas seguro que deseas eliminar al usuario?");
            if(res == true){
                
                return true;
                
            }else{
                return false;
            }
        }
    </script>
    <div class="header bg-primary pb-6">
      
      <div class="container-fluid">
        <div class="header-body ">

        
          <form class="form-inline">
            <input class="form-control mr-sm-1" type="search" placeholder="Buscar..." aria-label="Search">
            <button class="btn btn-dark " type="submit">Buscar</button>
          </form>
      
          <div class="row align-items-center py-4">
          <br>
          
          </div>
          @include('livewire.categoria.form')  
        </div>
      </div>
    </div>
    
    <!-- Page content -->
    <div class="container-fluid mt--8">
     
            <br>
            <!-- Dark table -->
            
            <div class="row">
              <div class="col">
                <div class="card bg-default shadow">
                  
                  <div class="card-header bg-transparent border-0">
                    <h3 class="text-white mb-0">
                        <b>{{$componentName}} | {{$pageTitle}}</b>
                    </h3>
                    <div class="col-lg-50  text-right">
                    <a href="javascript:void(0)" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#theModal">Agregar</a>  
                  </div>
                  </div>
                  
                  <div class="table-responsive">

                                                
                                              @if ($message = Session::get('success'))
                                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                      <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                                      <span class="alert-inner--text"> <p>{{ $message }}</p>
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                              @endif

                                                
                                                      <table class="table align-items-center table-dark table-flush">
                                                      <thead class="thead-dark">
                                                      <th scope="col" class="sort" data-sort="budget">Descripcion</th>
                                                      <th scope="col" width="10px" class="sort" data-sort="name">Imagen</th>
                                                      <th scope="col">Accion</th>

                                                          </thead>
                                                          <tbody class="list">
                                                            @foreach($categorias as $categoria)
                                                              <td>{{$categoria->nombre}}</td>
                                                              <td class="text-center"> 
                                                                <span>
                                                                <img src="{{asset('storage/categoria/' .$categoria->image)}}" class="navbar-brand-img" height="70" width="80px" class="rounded">
                                                                </span>   
                                                                
                                                              </td>


                                                                      <td>
                                                                          <form action="#" method="POST">
                                                                          
                                                                              <a class="btn btn-sm btn-success" href="javascript:void(0)"
                                                                              wire:click="Edit({{$categoria->id}})"
                                                                              >
                                                                              <i class="fa fa-fw fa-edit"></i>
                                                                            </a>
                                                                          
                                                                              <button type="submit" class="btn btn-danger btn-sm" 
                                                                              onclick="Confirm('{{$categoria->id}}')"
                                                                            ><i class="fa fa-fw fa-trash"></i></button>
                                                                          </form>
                                                                      </td>
                                                                  </tr>
                                                            @endforeach
                                                          </tbody>
                                                          
                                                      </table>
                                                                       
                  </div>
                                                  
                                            
                </div>   @include('layouts.footers.auth')
                                        
                                      
                                  
                              
                              
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

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(){

        });
    </script>
    @endpush