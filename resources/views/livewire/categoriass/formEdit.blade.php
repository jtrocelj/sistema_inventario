@include('common.modalHead')
<div class="container-fluid mt--4">
        <div class="row">
            <div class="col-xl-8 mb-10 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                    <div class="col">
                               
                    <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $categoria->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('image') }}
            {{ Form::text('image', $categoria->image, ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Image']) }}
            {!! $errors->first('image', '<div class="invalid-feedback">:message</p>') !!}
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
@include('common.modalFooter')


