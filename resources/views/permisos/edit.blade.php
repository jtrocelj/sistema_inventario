
<form action="{{ route('permisos.update', $permiso->id) }}" method="post" enctype="multipart/form-data">
    
    {{ method_field('patch') }}
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalEditPermisos{{$permiso->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Editar Permiso') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Nombre') }}:</strong>
                            <input type="text" name="name" value ="{{$permiso->name}}" class="form-control" placeholder="Ingrese el nombre del permiso" required>
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

