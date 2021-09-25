@extends("petshopmc.template")
@section("titulo",$titulo);
@section("listagem")
<table border = "colapse">
	<thead>
		<th>Dono</th>
		<th>Animal</th>
		
		<th>Especie</th>
		<th>Raça</th>
		
		<th>Data de nascimento</th>
	    <th>Idade</th>
	
		<th colspan = "2" >Acoes</th>
	</thead>
	<tbody>
		
		@foreach($animais as $animal)
		<tr>
			<td>
				{{$animal->nome_dono}}
			</td>
			<td>
				{{$animal->nome_animal}}
			</td>
			<td>
				{{$animal->nome_especie}}
			</td>
			<td>
				{{$animal->raca}}
			</td>
			<td>
				{{$animal->data_nascimento}}
			</td>
			<td>
				{{$animal->idade}}
			</td
			><td>
				<button id = "editar" ><a href ="/animais/{{$animal->id}}/edit">Editar</a></button>
			</td>
			<td>
				<form action="/animais/{{$animal->id}}" method = "POST">
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