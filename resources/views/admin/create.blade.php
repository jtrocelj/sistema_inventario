@extends('layouts.main', ['title' => __('User Profile')])
@include('layouts.headers.cards2')
@section('content')
    

    <div class="container-fluid mt--10">
        <div class="row">
            
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Registrar Usuario') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('users.store')}}" autocomplete="off">
                            @csrf
                            @method('post')

                            <h6 class="heading-small text-muted mb-4">{{ __('Datos') }}</h6>
                          


                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name"  value="{{old('name')}}"  class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}"  autofocus>
                    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email"  value="{{old('email')}}" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}"  >

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('Contraseña') }}</label>
                                    <input type="password" name="password" id="input-password"  value="{{old('password')}}" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contraseña') }}" >
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            
                                <div class="form-group{{ $errors->has('telefono') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-telefono">{{ __('Telefono') }}</label>
                                    <input type="text" name="telefono" id="input-telefono"  value="{{old('telefono')}}"  class="form-control form-control-alternative{{ $errors->has('telefono') ? ' is-invalid' : '' }}" placeholder="{{ __('Telefono') }}"  maxlength="8" >

                                    @if ($errors->has('telefono'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('rol') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-telefono">{{ __('Rol') }}</label>
                                    <select class="form-control"  name="rol">
                                        <option value="Elegir" disabled>Elegir</option>
                                        @foreach ($roles as $id => $role)
                                        <option value="{{$id}}" name="rol"> {{ $role }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('rol'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('rol') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Guardar') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                       
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
