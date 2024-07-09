<?php

namespace App\Http\Controllers;

use App\Models\Candidaturas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vagas;
use App\Models\Categorias;
use App\Models\Empresas;

class VagasController extends Controller
{
    public function index(){

        $AND = '';

        if(isset($_GET['Vaga']) && !empty($_GET['Vaga'])){
            $AND .= " AND v.NMVaga LIKE '%" . $_GET['Vaga'] . "%'";
        }

        if(isset($_GET['Categoria']) && !empty($_GET['Categoria'])){
            $AND .= " AND c.NMCategoria='".$_GET['Categoria']."'";
        }

        if(isset($_GET['Local']) && !empty($_GET['Local'])){
            $AND .= " AND v.Local='".$_GET['Local']."'";
        }

        if(isset($_GET['Modalidade']) && !empty($_GET['Modalidade'])){
            $AND .= " AND v.TPVaga='".$_GET['Modalidade']."'";
        }

        if(isset($_GET['Contrato']) && !empty($_GET['Contrato'])){
            $AND .= " AND v.TPContrato='".$_GET['Contrato']."'";
        }

        $filtros =  Vagas::all();

        return view('vagas',[
            "Vagas" => DB::select("SELECT v.id,v.NMVaga,v.Salario,v.TPVaga,v.Local,e.CNPJ,v.TPContrato,e.NMEmpresa,v.created_at,e.Foto FROM vagas v INNER JOIN empresas e ON(e.id = v.IDEmpresa) INNER JOIN categorias c ON(c.id = v.IDCategoria) WHERE STVaga = 1 $AND"),
            "Categorias" => Categorias::all(),
            "Filtros" => $filtros
        ]);
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

    public function vaga($id){
        return view('vaga',[
            "Vaga" => DB::select("SELECT v.DSVaga,v.id,v.NMVaga,v.Salario,v.TPVaga,v.Local,e.CNPJ,v.TPContrato,e.NMEmpresa,v.created_at,e.Foto FROM vagas v INNER JOIN empresas e ON(e.id = v.IDEmpresa) INNER JOIN categorias c ON(c.id = v.IDCategoria) WHERE STVaga = 1 AND v.id = $id")[0]
        ]);
    }

    public function contratar(){
        return view('contratar');
    }

    public function candidatar(Request $request){
        try{
            $Req = $request->all();
            if($request->file('Curriculo')){
                $Req['Curriculo'] = $request->file('Curriculo')->getClientOriginalName();
                $request->Curriculo->storeAs('Curriculos',$Req['Curriculo']."_".$request->Email,'public');
            }
            Candidaturas::create($Req);
            $status = 'success';
            $mensagem = 'Candidatura Realizada com Sucesso!';
        }catch(\Throwable $th){
            $status = 'error';
            $mensagem = 'erro na candidatura'.$th->getMessage();
        }finally{
            return redirect()->route('Vaga',$request->IDVaga)->with($status,$mensagem);
        }
    }

    public function descartarCandidatura($id){
        $return = 0;
        Candidaturas::find($id)->delete();
        $return = 1;
        return $return;
    }

    public function candidaturas($IDVaga){
        return view('Vagas.candidaturas',[
            "Candidaturas" => Candidaturas::where('IDVaga',$IDVaga)->get()
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
