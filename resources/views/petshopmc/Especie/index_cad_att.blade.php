@extends ("petshopmc.template")
@section("titulo", "Adicionar ou atualizar especie")
@section("formulario")
<form  class = "row" method = "post"  action = '/especies'>
    <h1 class="display-1">Cadastro Espécie Animal</h1>
	@csrf
	<div class = "form-group col-md-6">
		<label><h4>Nome da especie</h4></label>
		<input type="hidden" id = "idHidden" name = "id" value = "{{$especie->id}}">
		<input type = "text" class="form-control"  name = "especie" id = "campoEspecie" value = "{{$especie->nome_da_especie}}"/>
	</div>
	<div class = "form-group">
		<br>
		<input type = "submit" class="btn btn-primary mb-2" value = "{{$botao_acao}}"/>
	</div>
</form>
@endsection
@section("listagem")
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Espécie</th>
      <th colspan = "2" scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($especies as $especie)
       <tr> 
          <td scope="row">{{$especie->id}}</td>
          <td>{{$especie->nome_da_especie}}</td>
          <td><button id = "editar" class="btn btn-dark"><a href ="/especies/{{$especie->id}}/edit" style="text-decoration:none">Editar</a></button>
          </td>
          <td>
				<form action="/especies/{{$especie->id}}" method = "POST">
					@csrf 
					<input type = "hidden" name="_method" value = "DELETE"/>
					<input id = 'bot' type = "submit" class="btn btn-danger" value = "Excluir"/>
				</form>
		  </td>
        </tr>
    @endforeach  	
  </tbody>
</table>
<img src="{!! asset('img/imagem1.jpg') !!}"  class=" d-block w-100" alt="PetShopMC">
@endsection