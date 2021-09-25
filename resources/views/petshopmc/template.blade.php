<!DOCTYPE html>
<html>
    <head>
		<title>PetShopMC - @yield("titulo")</title>
	    <meta charset="utf-8"/>
	    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"/>
	    <link rel="stylesheet" href="{{ asset ('css/custom.css')}}"/>
	    <link rel="stylesheet" href="{{ asset ('css/main.js')}}"/>
    </head>
    <body>
     	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand text-danger" href="/home"><h1>PetShopMC</h1></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse">
				<span class="navbar-toggler-icon"></span>
            </button>
			<div class="collapse navbar-collapse" id="corNavbar01">
				<ul class="navbar-nav m-auto">
					 <li class="nav-item active">
						  <a class="nav-link" href="/home"><h3>Home</h3><span class="sr-only"></span></a>
					 </li>
					 <li class="nav-item active">
						  <a class="nav-link" href="/animais"><h3>Animais</h3><span class="sr-only"></span></a>
					 </li>
					 <li class="nav-item active">
						  <a class="nav-link" href="/especies"><h3>Espécies</h3><span class="sr-only"></span></a>
					 </li>
				</ul>         
			</div>
		</nav>
		@if (Session::get("acao") == "salvo")
			<div class="alert alert-success">
				Salvo com Sucesso!
			</div>
		@endif
		
		@if (Session::get("acao") == "excluido")
			<div class="alert alert-danger">
				Excluído com Sucesso!
			</div>
		@endif
		@if (Session::get("acao") == "editado")
			<div class="alert alert-warning">
				Editado com Sucesso!
			</div>
		@endif
		<div class="container">
			@yield("mensagem_retorno")
			@yield("formulario")
			@yield("listagem")
			@yield("botoes_controle")
		    @yield("conteudo_extra")
		</div>
		<div class="container-expand bottom bg-dark">
			<p class="text-center text-light">By: Melquesedeque Oliveira da Silva & Carlos Daniel Rodrigues Cândido</p>
		</div>
	</body>
</html>