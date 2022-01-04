

    @if ($categoria->productos->count() > 0)
        <div class="modal fade" id="ModalDelete{{$categoria->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
           
                
            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                <div class="modal-content bg-gradient-danger">
        	
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
            
                <div class="modal-body">
                    
                    <div class="py-3 text-center">
                        <i class="ni ni-bell-55 ni-3x"></i>
                        <h4 class="heading mt-4">ATENCION!</h4>
                        <p>NO SE PUEDE ELIMINAR ESTA CATEGORIA PORQUE ESTA RELACIONADA CON UN PRODUCTO</p>
                    </div>
                    
                </div>
             
            </div>
        
    </div>   
    @endif


    @if ($categoria->productos->count() < 1)
        <form action="{{ route('categoria.destroy', $categoria->id) }}" method="post" enctype="multipart/form-data">
    {{ method_field('delete') }}
    {{ csrf_field() }}
    <div class="modal fade" id="ModalDelete{{$categoria->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Eliminar categoria') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>   
                <div class="modal-body">Seguro que quieres eliminar a la categoria<b>  {{$categoria->nombre}}</b>?</div>
                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">{{ __('Cancelar') }}</button>
                    <button type="submit" class="btn btn-outline-danger">{{ __('Eliminar') }}</button>
                </div>
            </div>
        </div>
    </div>  
    </form>
    @endif
