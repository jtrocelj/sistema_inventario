
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
     
     
      
    

            
            <!-- Dark table -->
           
            <div class="row">
              <div class="col">
              <div class="card bg-default shadow">
              <div class="card-header bg-transparent border-0">
                <h3 class="text-white mb-0">Asignar Permisos</h3> 
                @include("notificacion")
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
                                            
                                                        <div class="form-inline">
                                                            <div class="form-group mr-5">
                                                              <select name="role" class="form-control">
                                                                    <option value="Elegir" selected>=== Seleccione el Rol ===</option>
                                                                    @foreach($roles as $role)
                                                                    <option value="{{ $role->id}}">{{ $role->name}}</option>
                                                                    @endforeach

                                                              </select>
                                                            </div>
                                                            <button wire:click.prevent="SyncAll()" type="button" class="btn btn-dark mbmobile inblock mr-5">Sincronizar Todos</button>
                                                            <button onclick="Revocar()" type="button" class="btn btn-dark mbmobile  mr-5">Revocar Todos</button>
                                                        </div>

                                                            <div class="row mt-3">
                                                                <div class="col-sm-12">
                                                                    <table class="table align-items-center table-dark table-flush">
                                                                        <thead class="thead-dark">
                                                                        <th scope="col" class="sort text-center" data-sort="budget">Id</th>
                                                                        <th scope="col" class="sort text-center" data-sort="budget">Permiso</th>
                                                                        <th scope="col" class="sort text-center" data-sort="name">Roles con el permiso</th>
                                                                        
                                                                            </thead>
                                                                            <tbody  id="laTabla">
                                                                                @foreach($permisos as $permiso)
                                                                                            <tr>
                                                                                                <td class="text-center">{{$permiso->id}}</td>
                                                                                                <td class="text-center">
                                                                                                    <div class="n-check">
                                                                                                        <label class="new-control new-checkbox checkbox-primary">
                                                                                                            <input type="checkbox"  id="p{{$permiso->id}}" 
                                                                                                            value="{{$permiso->id}}"
                                                                                                            class="new-control-input"
                                                                                                            {{$permiso->checked == 1 ? 'checked' : ''}}
                                                                                                            >
                                                                                                            <span class="new-control-indicator"></span>
                                                                                                            <h6>{{$permiso->name}}</h6>
                                                                                                            
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </td>
                                                                                            
                                                                                                <td class="text-center">
                                                                                                    {{ \App\Models\User::permission($permiso->name)->count()}}
                                                                                                <td>
                                                                                               
                                                                                              
                                                                                            </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        
                                                                    </table>
                                                                </div>
                                                            </div>
                                                      {{ $permisos->links() }}     
                                                                 
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


    
  