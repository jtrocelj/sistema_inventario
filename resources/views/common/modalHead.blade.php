<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <b>{{$componentName}}</b> | {{$selected_id > 0 ? 'EDITAR' : 'CREAR'}}
        </h5>
        <h6 class="text-center text-warning " wire:loading>
            Por favor espere
        </h6>
      </div>
      <div class="modal-body">