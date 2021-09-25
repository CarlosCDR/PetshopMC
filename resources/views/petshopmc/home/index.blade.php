@extends ("petshopmc.template")
@section("titulo", "Home")
@section("conteudo_extra")

<div class="alert alert-primary" role="alert">
        <h2>Bem vindo ao PetShopMC!</h2>
</div>
<div>
	<div class="container-fluid">
        <img src="{!! asset('img/imagem5.jpg') !!}"  class=" d-block w-100" alt="PetShopMC">
		<div class="carousel-caption d-none d-md-block">
            <h1 class="danger">PetShopMC aqui seu pet está seguro!</h1>
        </div>             
	</div>   
</div>
@endsection
