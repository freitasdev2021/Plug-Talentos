<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    //LISTA AS CATEGORIAS
    public function index(){
        return view('Categorias.index',[
            "Categorias" => DB::select('SELECT COUNT(v.id) as Vagas,c.id,c.NMCategoria FROM categorias c LEFT JOIN vagas v ON(v.IDCategoria = c.id) GROUP BY c.id')
        ]);
    }
    //create
    public function cadastro($id=null){
        $view = array(
            "Title" => "Adicionar Categoria"
        );

        if($id){
            $view['Title'] = "Editar Categoria";
            $view['Registro'] = Categorias::find($id)->first();
        }

        return view('Categorias.create',$view);
    }

    public function save(Request $request){
        try{
            if(!$request->id){
                Categorias::create($request->all());
            }else{
                Categorias::find($request->id)->update($request->all());
            }
            $mensagem = 'Categoria Salva com Sucesso';
            $status = 'success';
        }catch(\Throwable $th){
            $mensagem = 'Erro'.$th->getMessage();
            $status = 'error';
        }finally{
            return redirect()->route('Admin/Categorias')->with($status,$mensagem);
        }
    }
}
