
<div class="row" >
    <div class="col-sm-11" style="background:#386EB8; border:5px solid ;border-radius:10px;">
        <div>
            <div class="connect-sorting" >
                <h5 class="text-center text-white mb-3 ">RESUMEN DE VENTA</h5>
            </div>
            <div class="connect-sorting-content" >
                <div class="card simple-title-task ui-sortable-handle">
                    <div class="card-body">
                        <div class="task-header">
                            <div>
                                <h2>TOTAL: Bs {{number_format($total,2)}}</h2>
                                <input type="hidden" id="hiddenTotal" value="{{$total}}">
                            </div>
                            <div>
                                <h4 class="mt-3">Articulos: {{$itemsQuantity}}</h4>
                            </div>
                        </div>
                    </div>

                </div><br>
            </div>          
        </div>
    </div>
</div>