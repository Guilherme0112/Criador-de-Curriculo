<?php

namespace App\Http\Controllers;

use App\Models\informacoe;
use App\Models\modelo;
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
        
            return view('profile');
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

            $pdf = Pdf::loadHTML($html);
            $pdfName = $modelo->nomeDoModelo;
            $path = public_path("pdfs/$pdfName");
            $pdf->save($path);


            return view('criar', compact('html', 'pdfName'))->with('path', $path);
        } catch (Exception $e){
            // return redirect()->route('index');
            return response()->json(['Erro' => $e->getMessage()]);
        }
    }
}
