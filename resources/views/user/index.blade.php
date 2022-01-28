@extends('layouts.main')



@section('content')
<script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
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
        <div class="header-body">
          <div class="row align-items-center py-4">
          <br>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
     
      <br>
      <!-- Dark table -->
      <div class="row">
        <div class="col">
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Tabla de usuarios</h3>
            </div>
            <div class="table-responsive">
            @include("notificacion")
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
                                                <th scope="col" class="sort" data-sort="budget">Id</th>
                                                <th scope="col" width="10px" class="sort" data-sort="name">Nombre</th>
                                                <th scope="col" class="sort" data-sort="budget">Email</th>
                                                <th scope="col">Telefono</th>
                                                <th scope="col">Rol</th>
                                                <th scope="col">Accion</th>
                                                <th scope="col">Estado</th>
                                                    </thead>
                                                    <tbody class="list">
                                                        @foreach ($users as $user)
                                                            <tr>
                                                                <td>{{ ++$i }}</td>
                                                                
                                                                <td>{{ $user->name }}</td>
                                                                <td>{{ $user->email }}</td>
                                                                <td>{{ $user->telefono }}</td>
                                                                <td>
                                                                    @forelse ($user->roles as $role)
                                                                      <span class="badge badge-info">{{ $role->name }}</span>
                                                                    @empty
                                                                      <span class="badge badge-danger">Sin rol</span>
                                                                    @endforelse
                                                                  </td>
                                                                

                                                                <td>
                                                                    
                                                                        <a class="btn btn-sm btn-primary " href="{{ route('users.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i></a>
                                                                        <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalEditUser{{$user->id}}"><i class="fa fa-fw fa-edit"></i></a>
                                                                        @csrf
                                                                               @method('DELETE')
                                                                              <button type="submit" class="btn btn-danger btn-sm" 
                                                                              data-toggle="modal" data-target="#ModalDeleteUser{{$user->id}}" 
                                                                            ><a></a><i class="fa fa-fw fa-trash"></i></button>
                                                                      <h3>@include('user.edit')</h3>
                                                                </td>

                                                                @include('user.delete')
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
            </div>
                                            
                                       
                                    </div>   @include('layouts.footers.auth')
                                    {!! $users->links() !!}
                                </div>
                            </div>
                        </div>
                        </div>
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
