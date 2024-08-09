<?php

namespace App\Http\Controllers;

use App\Models\questionario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;

class QuestionController extends Controller
{
    public function question(){
        try{
            $idUser = Auth::id();
            $dadosFormularioDB = questionario::where('idUser', $idUser)->get();

            if($dadosFormularioDB->count() > 0){
                foreach($dadosFormularioDB as $dados){
                    $nome = $dados->nome;
                    $email = $dados->email;
                    $telefone = $dados->telefone;
                    $experiencias = $dados->experiencias;
                    $habilidades = $dados->habilidades;
                    $formacoes = $dados->formacoes;
                };
            } else {
                $dados = '';
            }

            return view('questionario');
        } catch (Exception $e){
            return response()->json(["Erro" => $e->getMessage()]);
        }
    }
    public function store(Request $request){
        try{    
            $idUser = Auth::id();
            $dadosFormularioDB = questionario::where('idUser', $idUser)->get();
            $dados = $request->validate([
                'nome' => 'required|string|max: 50',
                'email' => 'required|email|max: 200',
                'telefone' => 'required|string|max: 15',
                'experiencias' => 'required|string|max: 500',
                'habilidades' => 'required|string|max: 500',
                'formacoes' => 'required|string|max: 500',

            ]);
            $dados['idUser'] = $idUser;

            if($dadosFormularioDB->count() > 0){
                questionario::where('idUser', $idUser)->delete();
                questionario::create($dados);
            } else {
                questionario::create($dados);
            }
            return redirect()->route("criar", ['id' => 1]);
        } catch (Exception $e){
            return response()->json(["Erro " => $e->getMessage()]);
            // return redirect()->route('question');
        }
    }
}
