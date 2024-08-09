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
            return view('questionario');
        } catch (Exception $e){
            return response()->json(["Erro" => $e->getMessage()]);
        }
    }
    public function store(Request $request){
        try{    
            $idUser = Auth::id();
            // $dados = $request->validate([
            //     // 'nome' => 'required|string|max: 50',
            //     'email' => 'required|email|unique:questionarios',
            //     'telefone' => 'required|string|max: 15',
            //     'experiencias' => 'required|string|max: 500',
            //     'habilidades' => 'required|string|max: 500',
            //     'formacoes' => 'required|string|max: 500',

            // ]);
            $dados['idUser'] = $idUser;
            // questionario::create($dados);
            return redirect()->route("criar", ['id' => 1]);
        } catch (Exception $e){
            return response()->json(["Erro " => $e->getMessage(), var_dump($dados)]);
            // return view('questionario');
        }
    }
}
