

<form action="{{ route('denominacion.store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
    
    <div class="modal fade text-left" id="ModalCreateMonedas" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                

                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Crear nueva Denomiación') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-sm-12 col-md-8">
                        <div class="form-group ">
                        <label>Tipo</label>
                            <select class="form-control" name="tipo">
                                <option value="Elegir" disabled>Elegir</option>
                                <option value="BILLETE" >BILLETE</option>
                                <option value="MONEDA" >MONEDA</option>
                                <option value="OTRO" >OTRO</option>
                            </select>
                            @error('tipo') <spam class="text-danger er">{{$message}}</spam> @enderror
                        </div>
                    </div>
                </div>
                      
             
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                    <label>Valor</label>
                        <input type="number" class="form-control" required name="valor" placeholder="ejemplo: 100.00" maxlength="25">
                        @error('valor') <spam class="text-danger er">{{$message}}</spam> @enderror
                    </div>
                </div>
                <div class=" col-md-12">
                        <div class="form-group" >
                            <strong>{{ __('Imagen') }}:</strong>
                            <input type="file" class=" form-control" name="image">
                        </div>
                    </div><br>
                   
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>