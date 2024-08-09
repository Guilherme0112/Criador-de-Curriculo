<?php

namespace App\Http\Controllers;

use App\Models\informacoe;
use App\Models\modelo;
use App\Models\questionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Exception;

class CurriculoController extends Controller
{
    public function index(){
        $informacoes = informacoe::all();
        return view('index', ['informacoes' => $informacoes]);
    }
    public function profile(){
        try{
            $usuario = Auth::user();
            
            $dateFormat = $usuario->created_at;
            $dateFormat = $dateFormat->format('d/m/Y');

            return view('profile', compact('usuario', 'dateFormat'));
        } catch (Exception $e){
            return redirect()->route('index');
        }
    }
    public function dashboard(){
        $modelos = modelo::all();

        return view('dashboard', ['modelos' => $modelos]);
    }
    public function criar($id){
        try{
            $modelo = modelo::find($id);
            $html = $modelo->html;
            $idUser = Auth::id();
            // Ele guarda os valores do usuário em variáveis, e procura na string (HTML do PDF) por valores seguidos com $, e os substitui pelos valores das variavéis.

            $dadosQuestionario = questionario::where("idUser", $idUser)->get();
            if($dadosQuestionario->count() > 0){
                foreach($dadosQuestionario as $questionario){
                    $nome = $questionario->nome;
                    $email = $questionario->email;
                    $telefone = $questionario->telefone;
                    $experiencia = $questionario->experiencias;
                    $habilidades = $questionario->habilidades;
                    $formacao = $questionario->formacoes;
                }

                $changes = [
                    '$Nome' => $nome,
                    '$Email' => $email,
                    '$Telefone' => $telefone,
                    '$Experiência' => $experiencia,
                    '$Habilidades' => $habilidades,
                    '$Formação' => $formacao

                ];

                foreach($changes as $change => $value){
                    $html = str_replace($change, $value, $html);
                }

                $pdf = Pdf::loadHTML($html);
                $pdfName = $modelo->nomeDoModelo;
                $path = public_path("pdfs/$pdfName");
                $pdf->save($path);

                $html = str_replace("\n", "<span class='wrap'></span>", $html);

                return view('criar', compact('html', 'pdfName'))->with('path', $path);
            } else {
                return view('questionario');
            }

            
        } catch (Exception $e){
            // return redirect()->route('index');
            return response()->json(['Erro' => $e->getMessage()]);
        }
    }
}
