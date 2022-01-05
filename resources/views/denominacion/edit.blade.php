
<form action="{{ route('denominacion.update', $denominacion->id) }}" method="post" enctype="multipart/form-data">
    
    {{ method_field('patch') }}
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalEditMonedas{{$denominacion->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Editar Denominación') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



                <div class="modal-body">
                    
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-sm-12 col-md-8">
                        <div class="form-group ">
                        <label>Tipo</label>
                            <select class="form-control" name="tipo" value ="{{$denominacion->tipo}}">
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
                                <strong>{{ __('Valor') }}:</strong>
                            <input type="text" name="valor" value ="{{number_format($denominacion->valor,2)}}" class="form-control" required>
                            </div>
                        </div>
                    </div>   
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                    <strong>{{ __('Imagen') }}:</strong>  
                                    <input type="file" name="image"  class="form-control" width="10px" ><br>
                                    <img src="{{ asset('storage/denominacion/' .$denominacion->image)}}" height="70" width="80px">
                            </div>
                        </div>
                    </div>   
                        
                    <div class="col-xs-12 col-sm-12 col-md-12 ml--30">
                        <button type="submit" class="btn btn-warning">{{ __('Editar') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

