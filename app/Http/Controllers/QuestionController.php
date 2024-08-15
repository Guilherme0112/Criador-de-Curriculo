<?php

namespace App\Http\Controllers;

use App\Models\questionario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

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
            
            // Obtendo id do usuário logado

            $idUser = Auth::id();

            // Mensagens de erros

            $message = [
                'required' => 'Este campo é obrigatório',
                'min' => 'Este campo deve conter mais que :min caracteres',
                'max' => 'Este campo deve conter menos que :max caracteres',
            ];

            // Validação dos dados

            $dados = $request->validate([
                'nome' => 'required|string|min:3|max:50',
                'email' => 'required|email|min:3|max:200',
                'telefone' => 'required|string|min:3|max:15',
                'experiencias' => 'required|string|min:3|max:500',
                'habilidades' => 'required|string|min:3|max:500',
                'formacoes' => 'required|string|min:3|max:500',
                'idiomas' => 'required|string|min:3|max:500'
            ], $message);

            $dados['idUser'] = $idUser;
            $imagePath = $request->file('foto')->store('public/photos');
            $dados['foto'] = $imagePath;

            // Verifica se já existe o cadastro, e delete caso já exista para que possa ser 
            // substituído

            $dadosFormularioDB = questionario::where('idUser', $idUser)->get();
            if($dadosFormularioDB->count() > 0){

                foreach ($dadosFormularioDB as $image) {

                    Storage::delete($image->foto);
                }
                questionario::where('idUser', $idUser)->delete();
                questionario::create($dados);
            } else {

                questionario::create($dados);
            }

            return redirect()->route("dashboard");
        } catch (ValidationException $e){

            // $json = json_encode(["Erro" => $e->getMessage()]);
            return redirect()->route('question')->withErrors($e->errors())->withInput();
        } catch (Exception $e){
            return redirect()->route('index');
        }

    }
}
