<?php
    use App\Models\Venta;
    use App\Models\DetalleVenta;

    $detalle = DetalleVenta::all()
    ->where('id_venta','=',$sale->id);


    ?>
<!-- Modal -->
<div class="modal" id="ModalShowRdate{{$sale->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="margin-left:-100px; width:900px;">
      <div class="modal-header">
      <h4 class="modal-title">{{ __('Detalle de Venta') }}
                    #{{$sale->id}}
                    </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <table class="table align-items-center table-dark table-flush" style="margin-top: -40px;" >
                                                      <thead class="thead-dark">
                                                      <th scope="col" class="sort text-center" data-sort="budget">Descripción</th>
                                                
                                                      <th scope="col"  class="sort text-center" data-sort="name">Código de barras</th>
                                                      <th scope="col" class="sort text-center" data-sort="name">Precio</th>
                                                      <th scope="col" class="sort text-center" data-sort="name">Cantidad</th>
                                                      <th scope="col" class="sort text-center" data-sort="name">Subtotal</th>
                                                      
                                                          </thead>
                                                          <tbody >
                                                          @foreach($detalle as $producto)
                                                              <td class="text-center"><h4>{{$producto->nombre}}</h4></td>
                                                             
                                                              <td class="text-center"><h4>{{$producto->barcode}}</h4></td>
                                                              <td class="text-center"><h4>Bs {{number_format($producto->precio, 2)}}</h4></td>
                                                              <td class="text-center"><h4>{{$producto->cantidad}}</h4></td>
                                                              <td class="text-center"><h4>Bs {{number_format($t = $producto->cantidad * $producto->precio, 2)}}</h4></td>
                                          
                                                                  </tr>
                                                            @endforeach
                                                          </tbody>
                                                          <tfoot>
                                                            <tr>
                                                                <td colspan="3"></td>
                                                                <td style="color:black;"><strong>Total</strong></td>
                                                                
                                                                @if('detalle')
                                                                @php  $mytotal = 0; @endphp
                                                                @foreach($detalle as $d)
                                                                @php
                                                                    $mytotal += $d->cantidad * $d->precio;
                                            
                                                                @endphp
                                                                @endforeach
                                                              
                                                                <td class="text-center">
                                                                    <h3 class="text-info">Bs {{number_format($mytotal, 2)}}</h3>
                                                                </td>
                                                                @endif
                                            
                                                                
                                                            </tr>
                                                            </tfoot>
                                                      </table>
      </div>
    </div>
  </div>
</div>