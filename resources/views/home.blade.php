<?php 
use Carbon\Carbon;
?>

@section('content')
    @include('layouts.headers.cards')
    
    @extends('layouts.main')


    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>

        <div class="col">
          <div class="card bg-default shadow">
            
            <div class="card-header bg-transparent border-0">
             <strong>Bienvenido al sistema</strong>
             <h3 style="color:aliceblue"> {{ auth()->user()->name }}</h3>
             <?php 
              
              printf( Carbon::now('GMT-4'));  //implicit __toString()
        
               ?>
              <div class="col-lg-50  text-right">
            
            </div>
            </div>
            
          
                                            
                                       
                                    </div>   @include('layouts.footers.auth')
                                  
                                </div>
                            </div>
                        </div>
                        </div>
        </div>
      </div>
     
    </div>
  </div>
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

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function(){

        });
    </script>
    @endpush