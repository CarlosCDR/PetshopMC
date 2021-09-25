@extends ("petshopmc.template")
@section("titulo", $titulo)
@section("formulario")
<table>
	<thead>
		<th>ID</th>
		<th>Especie</th>
		<th colspan = "2">Acoes</th>
	</thead>
	<tbody>
		@foreach($especies as $especie)
		<tr>
			<td>
				{{$especie->id}}
			</td>
			<td>
			    {{$especie->nome_da_especie}}
			</td>
			<td>
				<button id = "editar" ><a href ="/especies/{{$especie->id}}/edit">Editar</a></button>
			</td>
			<td>
				<form action="/especies/{{$especie->id}}" method = "POST">
					@csrf 
					<input type = "hidden" name="_method" value = "DELETE"/>
					<input id = 'bot' type = "submit" value = "Excluir"/>
				</form>
			</td>
			
		</tr>
		@endforeach
	</tbody>
</table>
@endsection