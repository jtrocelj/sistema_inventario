<div class="row mt-3">
    <div class="col-sm-12" style="background:#386EB8; border:5px solid ;border-radius:10px;">
        <div class="connect-sorting ">
            <h5 class="text-center mb-2 text-white">DENOMINACIONES</h5>
            <div class="container">
                <div class="row">
                    @foreach($denominacions as $denominacion)
                        <div class="col-sm mt-2">
                            <button wire:click.prevent="ACash({{$denominacion->valor}})" class="btn btn-dark btn-block den">
                                {{ $denominacion->valor > 0 ? 'Bs ' . number_format($denominacion->valor,2, '.','') : 'Exacto' }}
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="connect-sorting-content mt-4">

                <div class="card simple-title-task ui-sortable-handle">
                    <div class="card-body">
                        <div class="input-group input-group-md mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text input-gp hideonsm" style="background: #386EB8; color:white; height:45px;">Efectivo F8</span>
                            </div>
                            <input type="number" id="cash" wire:model="efectivo" wire:keydown.enter="saveSale" 
                            class="form-control text-center" value="{{$efectivo}}" style="height:43px;">
                            <div class="input-group-append">
                                <span wire:click="$set('efectivo', 0)" class="input-group-text" style="background: #386EB8; color:white; height:45px;">
                                    <i class="fas fa-backspace fa-2x"></i>

                                </span>
                            </div>
                        </div>

                            <h4 class="text-muted">Cambio: Bs {{ number_format($cambio,2)}}</h4>       
                            <div class="row justify-content-between mt-5">
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    @if($total > 0)
                                   <button onclick="confirm('','clearCart', ' Seguro de eliminar el carrito?')" class="btn btn-dark mtmobile">
                                       CANCELAR F4
                                   </button>
                                   @endif
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    @if($efectivo >= $total && $total > 0)
                                    <button wire:click.prevent="saveSale"class="btn btn-dark btn-md btn-block">
                                        GUARDAR F9
                                    </button>
                                    @endif
                                </div>
                            </div>                 
                    </div>
                </div>
            </div>
<br>
        </div>
    </div>
</div>