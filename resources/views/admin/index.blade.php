<?php 
use Carbon\Carbon;
?>
@extends('layouts.mainAdmin')

@section('content')
    @include('layouts.headers.cards2')
    
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

        
    
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush