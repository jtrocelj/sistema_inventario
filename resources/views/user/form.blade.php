

<div class="container-fluid mt--4">
        <div class="row">
            <div class="col-xl-8 mb-10 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                    <div class="col">
                               
                               <h2 class="text-white mb-0">Actualizar Usuario</h2>
                           </div><!-- Divider -->
                            <hr class="my-3">
                            <div class="form-group text-white" required autofocus>
                                {{ Form::label('Nombre') }}
                                {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            <div class="form-group text-white">
                                {{ Form::label('email') }}
                                {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                                {!! $errors->first('email', '<div class="invalid-feedback">:message</p>') !!}
                            </div>

                            <div class="form-group text-white">
                                {{ Form::label('telefono') }}
                                {{ Form::text('telefono', $user->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
                                {!! $errors->first('telefono', '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                            
                            <div class="form-group text-white">
                                {{ Form::label('rol') }}
                                {{ Form::text('rol', $user->rol, ['class' => 'form-control' . ($errors->has('rol') ? ' is-invalid' : ''), 'placeholder' => 'Rol']) }}
                                {!! $errors->first('rol', '<div class="invalid-feedback">:message</p>') !!}
                            </div>

                    
                        <div class="box-footer mt20">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> 
</div>        