<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function salvar(Request $request){
        dd($request->all());
    }


    public function cadastrar(Request $request){
        if (Usuario::cadastrar($request)){
            return response("ok", 201);
        }else{
            return response("erro", 409);
        }

    }
}
