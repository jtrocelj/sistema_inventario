
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
                <div class="card-header bg-transparent border-0">
                  
                
              
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
                                                        <a href="#" data-toggle="modal" data-target="#ModalCreate" class="btn btn-sm btn-neutral" >
                                                        Agregar
                                                        </a>
                                                       </div>
                                                      <table class="table align-items-center table-dark table-flush">
                                                      <thead class="thead-dark">
                                                      <th scope="col" class="sort" data-sort="budget">Id</th>
                                                      <th scope="col" class="sort" data-sort="budget">Descripcion</th>
                                                      <th scope="col" width="10px" class="sort" data-sort="name">Imagen</th>
                                                      <th scope="col">Accion</th>
                                                      
                                                          </thead>
                                                          <tbody class="list">
                                                            @foreach($categorias as $categoria)
                                                            <td>{{$categoria->id}}</td>
                                                              <td>{{$categoria->nombre}}</td>
                                                              <td class="text-center"> 
                                                                <span>
                                                                <img src="{{asset('storage/categoria/' .$categoria->imagen)}}" class="navbar-brand-img  rounded-circle" height="60" width="60px" >
                                                                </span>   
                                                                
                                                              </td>


                                                                      <td>
                                                                        
                                                                          
                                                                              <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#ModalEdit{{$categoria->id}}">
                                                                              <i class="fa fa-fw fa-edit"></i>
                                                                              </a>
                                                                             
                                                                              @csrf
                                                                               @method('DELETE')
                                                                              <button type="submit" class="btn btn-danger btn-sm" 
                                                                              data-toggle="modal" data-target="#ModalDelete{{$categoria->id}}" 
                                                                            ><a></a><i class="fa fa-fw fa-trash"></i></button>
                                                                        
                                                                           
                                                        
                                                                      </td>
                                                                      @include('categoria.edit')
                                                                      @include('categoria.delete')
                                                                  </tr>
                                                            @endforeach
                                                          </tbody>
                                                          
                                                      </table>
                                                                  {{ $categorias->links() }}     
                  </div>
                                                  
                                            
                </div>   
               
                                        
                                      
                                  
                              
                              
              </div> @include('layouts.footers.auth')
              
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
  