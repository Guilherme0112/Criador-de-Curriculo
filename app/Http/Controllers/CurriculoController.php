<?php

namespace App\Http\Controllers;

use App\Models\informacoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CurriculoController extends Controller
{
    public function index(){
        $informacoes = informacoe::all();
        return view('index', ['informacoes' => $informacoes]);
    }
    public function profile(){
        $usuario = Auth::user();
        // formatando data
        $data = $usuario->created_at;
        $dateFormat = $data->format('d/m/Y');
        
        return view('profile', compact('usuario', 'dateFormat'));
    }
}
