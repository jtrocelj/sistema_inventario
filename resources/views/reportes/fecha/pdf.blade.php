<style>
    table {
    margin: 2.5%;
    width: 95%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
    border: 1px solid #1C345D;

    th,
    td {
        padding: 15px;
        border: 1px solid #1C345D;
        text-align: center;
        /*border-left: 0;
        border-right: 0;*/
    }

    th {
        background-color: #1C345D;
        color: white;
        font-weight: bold;
    }

    td {
        background-color: white;
    }
    }

</style>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte</title>
</head>
<div class="table-title">
  <center>
    <p>
  <h3> SISTEMA DE VENTAS Y FACTURACIÓN</h3>
          <span>Reporte de Ventas por Fechas: </span>
          <div class="form-group">
              del <strong>{{\Carbon\Carbon::parse($fi)->format('d-m-Y')}}</strong> al <strong>{{\Carbon\Carbon::parse($ff)->format('d-m-Y')}}</strong>
          </div>
          <img style="margin-left:-600px; margin-top: -50px;width:100px;" class="logo"src="img/logo.jpg">
  </p>     
          </div>
          </center>
<table>
  <thead>
  <tr>
			<th>ID</th>
			<th>FECHA</th>
      <th>ESTADO</th>
      <th>CLIENTE</th>
			<th>TOTAL</th>
		</tr>
  </thead>
		
  
  <tbody>
  @foreach($venta as $v)
  <tr>
			<td>{{ $v->id }}</td>
			<td>{{\Carbon\Carbon::parse($v->created_at)->format('d-m-Y')}}</td>
      <td>PAGADO</td>
      <td>{{$v->cliente->apellidos}}</td>
			<td>Bs {{number_format($v->total, 2)}}</td>
		</tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="3"></td>
      <td style="color:black;"><strong>Total</strong></td>
      <td class="text-center">
        <h3 class="text-info">Bs {{number_format($total, 2)}}</h3>
      </td>
    </tr>
  </tfoot>
		
</table>

