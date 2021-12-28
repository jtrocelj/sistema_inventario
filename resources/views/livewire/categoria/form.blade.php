@include('common.modalHead')


<div class="row">
    <div class="col-sm-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <span class="fas fa-edit">

                    </span>
                </span>
            </div>
            <input type="text" wire:model.lazy="nombre" class="form-control" placeholder="ej: caferacer">
        </div>
        @error('nombre') <spam class="text-danger er">{{$message}}</spam> @enderror
    </div>

    <div class="col-sm-12 mt-3">
        <div class="form-group custom-file">
            <input type="text" class="custom-file-input form-control" wire:model="image" accept="image/x-png, image/jpeg, image/gif">
            <label  class="custom-file-label">Imagen {{$image}}</label>
            @error('image') <spam class="text-danger er">{{$message}}</spam> @enderror
        </div>
    </div>
</div>

@include('common.modalFooter')