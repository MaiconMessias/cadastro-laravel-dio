<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\CursorPaginator;

class Usuario extends Model
{
    protected $connection = 'pgsql';
    protected $table = 'users';
    public $timestamps = false;

    // Listagem do Grid
    public static function listar(){

        $sql = self::select([
            "id",
            "name",
            "email",
            "password"
        ]);
            
        //dd($sql->toSql());
        return $sql->paginate(2);
        //return $sql->all();
        //return $sql->toSql();
    }

    // Listagem de registros do Formulário
    public static function listarAlterar(Request $request){
        $camposAlteracao = self::select([
                                "id",
                                "name",
                                "email",
                                "password"
                            ])
         ->where('id', '=', $request->chave);

         return $camposAlteracao->get()->first();

    }

    /**
     * CRUD
     */
    public static function deletar(Request $request){
        self::where('id', $request->chave)
                    ->delete();                     
    }

    // Inserir ou alterar cadastros    
    public static function cadastrar(Request $request){

        if ($request->id == null){
            self::insert([
                "name" => $request->input('nome'),
                "email" => $request->input('email'),
                "password" => Hash::make($request->input('password'))
            ]);
            return response("Cadastro efetuado", 201);
        } else  {
            self::where('id', $request->id)
                 ->update([
                    "name" => $request->input('nome'),
                    "email" => $request->input('email'),
                    "password" => Hash::make($request->input('password'))                     
                 ]);
        }  

       //dd($sql->toSql(), $request->all());
    }


}
