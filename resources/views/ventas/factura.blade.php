<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #invoice-POS {
        box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        padding: 2mm;
        margin: 0 auto;
        width: 44mm;
        background: #fff;
        margin-top:-40px;
        margin-left:-30px;
        }
        #invoice-POS ::selection {
        background: #f31544;
        color: #fff;
        }
        #invoice-POS ::moz-selection {
        background: #f31544;
        color: #fff;
        }
        #invoice-POS h1 {
        font-size: 1.5em;
        color: #222;
        }
        #invoice-POS h2 {
        font-size: 0.9em;
        }
        #invoice-POS h3 {
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
        }
        #invoice-POS p {
        font-size: 0.7em;
        color: #666;
        line-height: 1.2em;
        }
        #invoice-POS #top,
        #invoice-POS #mid,
        #invoice-POS #bot {
        /* Targets all id with 'col-' */
        border-bottom: 1px solid #eee;
        }
        #invoice-POS #top {
        min-height: 100px;
        }
        #invoice-POS #mid {
        min-height: 80px;
        }
        #invoice-POS #bot {
        min-height: 50px;
        }
        #invoice-POS #top .logo {
        height: 60px;
        width: 60px;
        background: url(public/img/logo.jpg) no-repeat;
        background-size: 60px 60px;
        }
        #invoice-POS .clientlogo {
        float: left;
        height: 60px;
        width: 60px;
        background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
        background-size: 60px 60px;
        border-radius: 50px;
        }
        #invoice-POS .info {
        display: block;
        margin-left: 0;
        }
        #invoice-POS .title {
        float: right;
        }
        #invoice-POS .title p {
        text-align: right;
        }
        #invoice-POS table {
        width: 100%;
        border-collapse: collapse;
        }
        #invoice-POS .tabletitle {
        font-size: 0.5em;
        background: #eee;
        }
        #invoice-POS .service {
        border-bottom: 1px solid #eee;
        }
        #invoice-POS .item {
        width: 24mm;
        }
        #invoice-POS .itemtext {
        font-size: 0.5em;
        }
        #invoice-POS #legalcopy {
        margin-top: 5mm;
        }

        #f{         
        border-bottom: 1px solid #eee;
        }
    </style>
</head>
<body>
    
  <div id="invoice-POS">
    
    <center id="top">
    <div class="info"> 
        <h2>SIS VTA. & FACT.</h2>
      </div>
      <div class="logo">
          <center> 
          <img style="margin-left:70px;" class="logo"src="img/logo.jpg">
          </center>
      </div>
     <!--End Info-->
    </center><!--End InvoiceTop-->
    
    
    <div id="mid">
         <div class="info">
            <h2>Contacto Información</h2>
                <p> 
                <strong>Dirección:</strong> obrajes calle 6, Nro.77</br>
                <strong> Email   :</strong> miniMarket@gmail.com</br>
                <strong> Telefono   :</strong> 555-555-5555</br>
                <center>
                <h2>La paz - Bolivia</h2>
                </center>
                
                </p>
        </div>
        
    </div>    
       
                <center>
                        <h2 id="f">Factura Simplificada</h2>
                        </center>
        
       
      
               
    <div id="mid">
      <div class="info">
        <h2>Datos Cliente</h2>
        <p> 
            <strong>Apellidos: </strong>{{$venta->cliente->apellidos}}</br><br>
            <strong>Ci:</strong>{{$venta->cliente->ci}}</br>
        </p>
      </div>
    </div>
                <center>
                        <h2 id="f">{{$venta->created_at}}</h2>
                        </center>
    <div id="bot">

					<div id="table">
						<table>
							<tr class="tabletitle">
								<td class="item"><h2>Item</h2></td>
								<td class="Hours"><h2>Cantidad</h2></td>
								<td class="Rate"><h2>Sub Total</h2></td>
							</tr>
                            @foreach($detalle as $producto)
							<tr class="service">
								<td class="tableitem"><p class="itemtext">{{$producto->nombre}}</p></td>
								<td class="tableitem"><p class="itemtext">{{$producto->cantidad}}</p></td>
								<td class="tableitem"><p class="itemtext">Bs{{number_format($t = $producto->cantidad * $producto->precio)}}</p></td>
							</tr>
                            @endforeach
                            @if('detalle')
                                @php  $mytotal = 0; @endphp
                                @foreach($detalle as $d)
                                    @php
                                         $mytotal += $d->cantidad * $d->precio;  
                                    @endphp
                                    @endforeach
                                                              
                                    <tr class="tabletitle">
                                        <td></td>
                                        <td class="Rate"><h2>Total</h2></td>
                                        <td class="payment"><h2>Bs {{number_format($mytotal)}}</h2></td>
                                        
                                    </tr>
                                    <tr class="tabletitle">
                                        <td></td>
                                        <td class="Rate"><h2>Efectivo</h2></td>
                                        <td class="payment"><h2>Bs {{$d->efectivo}}</h2></td>
                                        
                                    </tr>

                                    <tr class="tabletitle">
                                        <td></td>
                                        <td class="Rate"><h2>Cambio</h2></td>
                                        <td class="payment"><h2>Bs {{$d->cambio}}</h2></td>
                                        
                                    </tr>
                                    @endif
						</table>
					</div><!--End Table-->
                    
					<div id="legalcopy">
						<p class="legal"><strong>Gracias por tu compra. Tu apoyo continuo nos dice que te gusta la manera en la que trabajamos. 
                            Recomiéndanos con un amigo o un negocio asociado y ¡obtén un 10% de descuento en tu próxima compra!!</strong>  
						</p>
					</div>

				</div><!--End InvoiceBot-->
  </div><!--End Invoice-->

</body>
</html>