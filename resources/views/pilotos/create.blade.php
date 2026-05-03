<form method="POST" action="/pilotos">
@csrf

<input name="nombre" placeholder="Nombre del piloto">
<input name="telefono" placeholder="Teléfono">
<input name="licencia" placeholder="Licencia">

<button>Guardar</button>

</form>