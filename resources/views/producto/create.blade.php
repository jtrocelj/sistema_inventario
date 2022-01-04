

<form action="{{ route('producto.store') }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
    
    <div class="modal fade text-left" id="ModalCreateProducto" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                

                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Crear nuevo Producto') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                      
             
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                    <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" required placeholder="Nombre">
                        @error('nombre') <spam class="text-danger er">{{$message}}</spam> @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group ">
                    <label>Código de Barra</label>
                        <input type="text" class=" form-control" name="barcode" required placeholder="ej: 011234">
                        @error('barcode') <spam class="text-danger er">{{$message}}</spam> @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group ">
                    <label>Costo de compra</label>
                        <input type="text"  data-type='currency'class="form-control" name="costo" required placeholder="costo">
                        @error('costo') <spam class="text-danger er">{{$message}}</spam> @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group ">
                    <label>Precio de venta</label>
                        <input type="text" data-type='currency' class=" form-control" name="precio" required placeholder="precio">
                        @error('precio') <spam class="text-danger er">{{$message}}</spam> @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group ">
                    <label>Stock</label>
                        <input type="number" class="form-control" name="stock" required placeholder="ej: 0">
                        @error('stock') <spam class="text-danger er">{{$message}}</spam> @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group ">
                    <label  class="custom-label">Inventario minimo</label>
                        <input type="number" class=" form-control" name="alerts" required placeholder="ej: 10">
                        @error('alerts') <spam class="text-danger er">{{$message}}</spam> @enderror
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-8">
                    <div class="form-group ">
                    <label>Categoria</label>
                        <select class="form-control" name="categoria_id">
                            <option value="Elegir" disabled>Elegir</option>
                            @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}" name="categoria_id">{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                        @error('categoria_id') <spam class="text-danger er">{{$message}}</spam> @enderror
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
