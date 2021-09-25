@extends ("petshopmc.template")
@section("titulo", $titulo)
@section("formulario")

<form method = "post"  action = '/animais'>
	<h1 class="display-1">Cadastro Animal</h1>
	@csrf
	<input type = "hidden" id = "id" name = "id" value = "{{$animal->id}}"/>
	<div class="form-row  col-md-6">						
	      <label><h4>Nome do dono</h4></label>
	      <input type = "text" class="form-control" name = "nomeDono" id = "campoDono" value = "{{$animal->nome_dono}}"/>
    </div>
    <div class="form-row col-md-6">
	      <label><h4>Nome do PET</h4></label>
	      <input type = "text" name = "nomeAnimal" class="form-control"  id = "campoAnimal" value = "{{$animal->nome_animal}}"/>
	</div>
	<div class="form-row col-md-6">		
	     <label><h4>Especie</h4></label>
	     <select name = "especie" class="form-control" id = "selecionarEspecie">
		    @foreach($especies as $especie)
			     @if($animal->especie == $especie->id)
				      <option value = "{{$especie->id}}" selected = "selected">{{$especie->nome_da_especie}}</option>
			     @else
				      <option value = "{{$especie->id}}">{{$especie->nome_da_especie}}</option>
			     @endif
		    @endforeach
	    </select>
   </div>
   <div class="form-row col-md-6">
	     <label><h4>Raça</h4></label>
	     <input type = "text" class="form-control" name = "raca" id = "campoRaca" value = "{{$animal->raca}}"/>
   </div>
   <div class="form-row col-md-6">
	    <label><h4>Data de nascimento do PET</h4></label>
	    <input type = "date" class="form-control" name = "dataNascimento" id = "campoDataNascimento" value = "{{$animal->data_nascimento}}"/>
   </div>
	 <br>		
	 <input type = "submit" class="btn btn-success" value = "{{$botao_acao}}"/>
</form>
   @endsection
   @section("listagem")
<table class="table">
   <br>	
   <thead class="thead-dark">
        <tr>
           <th scope="col">Nome do Pet</th>
           <th scope="col">Espécie</th>
           <th scope="col">Idade</th>
           <th scope="col" colspan = "2" >Acoes</th>
        </tr>
   </thead>
   <tbody>
         <tr>
           @foreach($animais as $animal)
         <tr>
         <td>
            {{$animal->nome_animal}}
         </td>
         <td>
		   {{$animal->especie}}
         </td>
         <td>
            {{$animal->idade}}
         </td>
	     <td>
            <button id = "editar" class="btn btn-dark " ><a href ="/animais/{{$animal->id}}/edit" style="text-decoration:none">Editar</a></button>
         </td>
         <td>
             <form action="/animais/{{$animal->id}}" method = "POST">
                @csrf 
                <input type = "hidden" name="_method" value = "DELETE"/>
                <input id = 'bot' type = "submit" class="btn btn-danger" value = "Excluir"/>
             </form>
         </td>
      
         </tr>
         @endforeach
    </tbody>
</table>
<div>
	<img src="{!! asset('img/imagem3.jpg') !!}" class="d-block w-50" alt="..."/>
</div>
@endsection