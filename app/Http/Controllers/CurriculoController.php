<?php

namespace App\Http\Controllers;

use App\Models\informacoe;
use Illuminate\Http\Request;

class CurriculoController extends Controller
{
    public function index(){
        $informacoes = informacoe::all();
        return view('index', ['informacoes' => $informacoes]);
    }
}
