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
  <title>Reporte Diario</title>
</head>
<div class="table-title">
  <center>
    <p>
  <h3> SISTEMA DE VENTAS Y FACTURACIÓN</h3>
          <span>Reporte diario: </span>
          <div class="form-group">
              <strong>Feha: {{\Carbon\Carbon::now()->format('d/m/Y')}}</strong>
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
			<th>TOTAL</th>
		</tr>
  </thead>
		
  
  <tbody>
  @foreach($venta as $v)
  <tr>
			<td>{{ $v->id }}</td>
			<td>{{ date('d-m-Y', strtotime($v->created_at)) }}</td>
			<td>Bs {{number_format($v->total, 2)}}</td>
		</tr>
    @endforeach
  </tbody>
		
		
</table>

