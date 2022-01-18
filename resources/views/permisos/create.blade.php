

<form action="{{ route('permisos.store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
    
    <div class="modal fade text-left" id="ModalCreatePermisos" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                

                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Crear nuevo Permiso') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                      
             
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                            <label>Nombre</label>
                                <input type="text" class="form-control" required name="name" placeholder="Nombre del permiso">
                                @error('name') <spam class="text-danger er">{{$message}}</spam> @enderror
                            </div>
                        </div>

                    
                   
                   
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>