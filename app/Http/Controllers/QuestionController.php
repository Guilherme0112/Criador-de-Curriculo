<?php

namespace App\Http\Controllers;

use App\Models\questionario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;

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
                    $foto = $dados->foto;
                    $idioma = $dados->idioma;
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
                'nome' => 'required|string|min:3|max:50',
                'email' => 'required|email|min:3|max:200',
                'telefone' => 'required|string|min:3|max:15',
                'experiencias' => 'required|string|min:3|max:500',
                'habilidades' => 'required|string|min:3|max:500',
                'formacoes' => 'required|string|min:3|max:500',
                'idiomas' => 'required|string|min:3|max:500'
            ]);
            $dados['idUser'] = $idUser;
            $imagePath = $request->file('foto')->store('public/photos');
            $dados['foto'] = $imagePath;

            if($dadosFormularioDB->count() > 0){
                $images = questionario::where('idUser', $idUser)->get();
                foreach ($images as $image) {
                    Storage::delete($image->foto);
                }
                questionario::where('idUser', $idUser)->delete();
                questionario::create($dados);
            } else {
                questionario::create($dados);
            }
            return redirect()->route("dashboard");
        } catch (Exception $e){
            $json = json_encode(["Erro" => $e->getMessage()]);
            return redirect()->route('question')->withErrors($e->errors())->withInput();
        }
    }
}
