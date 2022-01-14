

@if ($message = Session::get('mensaje'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-inner--text"> <p>{{ $message }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>                                         
@endif

@if ($message = Session::get('danger'))
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-inner--text"> <p>{{ $message }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>                                         
@endif



@if ($message = Session::get('info'))
     <div class="alert alert-info alert-dismissible fade show" role="alert">
        <span class="alert-inner--text"> <p>{{ $message }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>                                         
@endif