<h2>Pilotos</h2>

<a href="/pilotos/create">Nuevo piloto</a>

<table>
@foreach($pilotos as $p)
<tr>
<td>{{ $p->nombre }}</td>
<td>{{ $p->telefono }}</td>
<td>{{ $p->licencia }}</td>
</tr>
@endforeach
</table>