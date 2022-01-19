
<form action="{{ route('roles.update', $role->id) }}" method="post" enctype="multipart/form-data">
    
    {{ method_field('patch') }}
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalEditRol{{$role->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Editar Rol') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Nombre') }}:</strong>
                            <input type="text" name="name" value ="{{$role->name}}" class="form-control" placeholder="Ingrese el nombre del rol" required>
                            </div>
                        </div>
                        <div class="row">
                        <label for="name" class="col-sm-2 col-form-label"><strong>Permisos</strong></label>
                        <div class="col-sm-7">
                        <div class="form-group">
                            <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                <table class="table">
                                <tbody>
                                    @foreach ($permissions as $id => $permiso)
                                    <tr>
                                    <td>
                                        <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="permissions[]"
                                            value="{{ $id }}" {{ $role->permissions->contains($id) ? 'checked' : '' }}>
                                            <span class="form-check-sign">
                                            <span class="check" value=""></span>
                                            </span>
                                        </label>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $permiso }}
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
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

