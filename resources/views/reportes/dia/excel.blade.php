<table>
  <thead>
  <tr>
			<th align="center" style="background:#1C345D; color: white;"><strong>ID</strong></th>
			<th align="center" style="background:#1C345D; color: white;"><strong>FECHA</strong></th>
      <th align="center" style="background:#1C345D; color: white;"><strong>ESTADO</strong></th>
      <th align="center" style="background:#1C345D; color: white;"><strong>CLIENTE</strong></th>
			<th align="center" style="background:#1C345D; color: white;"><strong>TOTAL</strong></th>
		</tr>
  </thead>
		
  
  <tbody>
  @foreach($venta as $v)
  <tr>
	    <td align="center" >{{ $v->id }}</td>
	    <td align="center">{{\Carbon\Carbon::parse($v->created_at)->format('d-m-Y')}}</td>
      <td align="center">PAGADO</td>
      <td align="center">{{$v->cliente->apellidos}}</td>
		  <td align="center">Bs {{number_format($v->total, 2)}}</td>
		</tr>
    @endforeach
  </tbody>
		
		
</table>