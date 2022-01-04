
<form action="{{ route('producto.update', $producto->id) }}" method="post" enctype="multipart/form-data">
    
    {{ method_field('patch') }}
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalEditProducto{{$producto->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Editar Producto') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Nombre') }}:</strong>
                            <input type="text" name="nombre" value ="{{$producto->nombre}}" class="form-control" required>
                            </div>
                        </div>
                    </div>   
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Codigo de Barra') }}:</strong>
                            <input type="text" name="barcode" value ="{{$producto->barcode}}" class="form-control" required>
                            </div>
                        </div>
                    </div>  
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Costo de compra') }}:</strong>
                            <input type="text" name="costo" data-type='currency' value ="{{$producto->costo}}" class="form-control" required>
                            </div>
                        </div>
                    </div>  
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Precio de venta') }}:</strong>
                            <input type="text" name="precio" data-type='currency' value ="{{$producto->precio}}" class="form-control" required>
                            </div>
                        </div>
                    </div>  
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Stock') }}:</strong>
                            <input type="number" name="stock" value ="{{$producto->stock}}" class="form-control" required>
                            </div>
                        </div>
                    </div>  
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Inventario minimo') }}:</strong>
                            <input type="number" name="alerts" value ="{{$producto->alerts}}" class="form-control" required>
                            </div>
                        </div>
                    </div>  
                    
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                    <strong>{{ __('Categoria') }}:</strong>
                        <select class="form-control" name="categoria_id">
                            <option value="Elegir" disabled>Elegir</option>
                            @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}" name="categoria_id">{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                        @error('categoria_id') <spam class="text-danger er">{{$message}}</spam> @enderror
                        </div>
                        </div>
                    </div>  
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                    <strong>{{ __('Imagen') }}:</strong>  
                                    <input type="file" name="image"  class="form-control" width="10px" ><br>
                                    <img src="{{ asset('storage/producto/' .$producto->image)}}" height="70" width="80px">
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

