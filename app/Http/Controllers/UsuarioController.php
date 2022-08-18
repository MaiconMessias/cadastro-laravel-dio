<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;


class UsuarioController extends Controller
{
    public function listagem(Request $request){
        return view('usuario.listagem', [
            "sql" => Usuario::listar()
        ]);
    }

    public function listarAlterar(Request $request){
        return view('usuario.cadastro',[
            "camposAlteracao" => Usuario::listarAlterar($request)
        ]);
    }

    public function cadastrar(){
        return view('usuario.cadastro');
    }

    public function salvar(Request $request){
        $request->validate([
            "nome" => "required",
            "email" => "required|email",
            "password" => "required|min:5"
        ]);
        
        Usuario::cadastrar($request);
        
        return view('usuario.listagem', [
            "sql" => Usuario::listar()            
        ]);
        
        //dd($request->all());
    }

    public function deletar(Request $request){

        Usuario::deletar($request);

        return view('usuario.listagem', [
            "sql" => Usuario::listar()            
        ]);
    }


}
