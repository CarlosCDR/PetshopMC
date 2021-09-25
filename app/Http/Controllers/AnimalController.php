<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animais;
use App\Models\Especie;
use Illuminate\Support\Facades\DB;
class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$animais = DB::table("animais AS a")->join("especies AS e","a.especie", "=","e.id")->select("a.nome_animal","a.idade","e.nome_da_especie as especie" , "a.id")->get();
		$animal = new Animais();
		$especies = Especie::All();
		return view("petshopmc.animais.index_cad_att",
				[
					"titulo" => "Ver animais",
					"animais" => $animais,
					"animal" => $animal,
					"botao_acao" => "Adicionar animal",
					"especies" => $especies 
				]
		);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       	if($request->get("id")== ""){
			$animal = new Animais();
			$acao = "salvo";
		}else{
			$animal = Animais::Find($request->get("id"));
			$acao = "editado";
		}
			$animal->nome_animal = $request->get("nomeAnimal");
			$animal->nome_dono = $request->get("nomeDono");
			$animal->raca = $request->get("raca");
			$animal->especie = $request->get("especie");
			$data = $request->get("dataNascimento");
			$parte = explode('-',$data);
			
			$mesNasc = $parte[1];
			$anoNasc = $parte[0];
			
			$mes = date('m');
			$ano = date('Y');
			
			$idade = $ano - $anoNasc;
			if($mesNasc > $mes){
					$idade = $idade - 1;
			}
			$animal->data_nascimento = 	$data;		
			$animal->idade = $idade;			
			$animal->save();
            $request->Session()->flash("acao", $acao);
			return redirect("/animais");
	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		//$animal = new Animais();
		new Animais();
        $animal = Animais::Find($id);
		$animais = DB::table("animais AS a")->join("especies AS e","a.especie", "=","e.id")->select("a.nome_animal","a.idade","e.nome_da_especie as especie" , "a.id")->get();
		$especies = Especie::All();
		return view(
			"petshopmc.animais.index_cad_att",
			[
				"titulo" => "Editar dados do animal .",
				"animal" => $animal,
				"botao_acao" => "Atualizar",
				"animais" => $animais,
				"especies" => $especies 
			]
		);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Animais::Destroy($id);
        $request->Session()->flash("acao", "excluido");
		return redirect("/animais");
    }
}
