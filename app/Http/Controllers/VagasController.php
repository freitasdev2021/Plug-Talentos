<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vagas;
use App\Models\Categorias;
use App\Models\Empresas;

class VagasController extends Controller
{
    public function index(){
        return view('vagas');
    }

    public function indexAdm(){
        return view('Vagas.index',[
            "Vagas" => DB::select('SELECT 
                v.NMVaga as Vaga,
                v.id as IDVaga,
                e.NMEmpresa as Empresa,
                v.created_at,
                v.Local as Localizacao,
                c.NMCategoria as Categoria
                FROM vagas v
                INNER JOIN empresas e ON(v.IDEmpresa = e.id)
                INNER JOIN categorias c ON(v.IDCategoria = c.id)
            ')
        ]);
    }

    public function desativarVaga($id){
        $return = 0;
        Vagas::find($id)->update(['STVaga' => 0]);
        $return = 1;
        return $return;
    }

    public function reativarVaga($id){
        $return = 0;
        Vagas::find($id)->update(['STVaga' => 1]);
        $return = 1;
        return $return;
    }

    public function cadastro($id=null){
        $view = array(
            'Title' => 'Publicar vaga',
            "Empresas" => Empresas::select('id','NMEmpresa')->get(),
            "Categorias" => Categorias::select('id','NMCategoria')->get()
        );

        if($id){
            $view['Title'] = 'Alterar Vaga';
            $view['Registro'] = Vagas::find($id)->first();
        }

        return view('Vagas.create',$view);
    }

    public function save(Request $request){
        try{
            if(!$request->id){
                Vagas::create($request->all());
            }else{
                Vagas::find($request->id)->update($request->all());
            }
            $mensagem = 'Vaga Cadastrada com Sucesso';
            $status = 'success';
        }catch(\Throwable $th){
            $mensagem = 'Erro'.$th->getMessage();
            $status = 'error';
        }finally{
            return redirect()->route('Admin/Vagas')->with($status,$mensagem);
        }
    }
}
