
@section('content')
    @include('layouts.headers.cards')
    
    @extends('layouts.main')


<div>
    <style></style>

    <div class="row layout-top-spacing">
    <div class="col-sm-12 col-md-8">
        @include('pos.partials.detalle')
    </div>
    <div class="col-sm-12 col-md-4">
    @include('pos.partials.total')

    @include('pos.partials.monedas')
    </div>

    </div>
</div>

<script>
    
</script>


  
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>  
                    
@endsection


    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
  