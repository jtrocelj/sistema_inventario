@extends('layouts.main')
@include('layouts.headers.cards2')
@section('template_title')
    {{ $user->name ?? 'Show User' }}
@endsection

@section('content')
    <section class="content container-fluid">
    <br><br><br>
    

    <div class="row" >
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Atras</a>
            </div><br><br>
            <div class="col-xl-8 mb-5 mb-xl-0" >
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        

                        <div class="col">
                               
                                <h2 class="text-white mb-0">Mostrar Usuario</h2>
                            </div>
                        <!-- Divider -->
                        <hr class="my-3">
                                            
                   
                        <div class="col">
                            <div class="form-group text-white">
                                <strong>Nombre:</strong>
                                {{ $user->name }}
                            </div>
                            <div class="form-group text-white">
                                <strong>Email:</strong>
                                {{ $user->email }}
                            </div>
                            <div class="form-group text-white">
                                <strong>Rol:</strong>
                                {{ $user->rol }}
                            </div>
                            <div class="form-group text-white">
                                <strong>Telefono:</strong>
                                {{ $user->telefono }}
                            </div>
                        
                    </div>
               
           
                    </div>
                    </div>
                </div>
            </div>
        </div>   
      
    </section>
@endsection
