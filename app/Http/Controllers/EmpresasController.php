<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresas;
use Illuminate\Support\Facades\DB;
use Storage;
class EmpresasController extends Controller
{
    //LISTA AS CATEGORIAS
    public function index(){
        return view('Empresas.index',[
            "Empresas" => DB::select("SELECT e.id,e.CNPJ,e.NMEmpresa,COUNT(v.id) as Vagas,e.Foto FROM empresas e LEFT JOIN vagas v ON(e.id = v.IDEmpresa) GROUP BY e.id")
        ]);
    }
    //
    public function cadastro($id=null){
        $view = array(
            "Title" => "Cadastrar Empresa"
        );

        if($id){   
            $view['Title'] = "Editar Empresa";
            $view['Registro'] = Empresas::find($id)->first();
            $view['Endereco'] = json_decode($view['Registro']->Endereco);
        }

        return view('Empresas.create',$view);
    }
    //
    public function save(Request $request){
        try{
            $Req = $request->all();
            $CNPJ = preg_replace('/[^0-9]/','',$request->CNPJ);
            $Req['CNPJ'] = $CNPJ;
            $Req['Endereco'] = json_encode([
                "CEP" => $request->CEP,
                "Rua" => $request->Rua,
                "Numero" => $request->Numero,
                "Bairro" => $request->Bairro,
                "UF" => $request->UF,
                "Cidade" => $request->Cidade
            ]);
            if($request->id){
                if($request->file('Foto')){
                    $Req['Foto'] = $request->file('Foto')->getClientOriginalName();
                    Storage::disk('public')->delete('Empresa_'.$CNPJ."/".$request->oldFoto);
                    $request->file('Foto')->storeAs('Empresa_'.$CNPJ,$Req['Foto'],'public');
                }
                Empresas::find($request->id)->update($Req);
            }else{
                //dd($request->Foto);
                if($request->file('Foto')){
                    $Req['Foto'] = $request->file('Foto')->getClientOriginalName();
                    $request->Foto->storeAs('Empresa_'.$CNPJ,$Req['Foto'],'public');
                }
                Empresas::create($Req);
            }
            $mensagem = 'Empresa Cadastrada com Sucesso!';
            $status = 'success';
        }catch(\Throwable $th){
            dd($th->getMessage());
            $mensagem = 'Falha no Cadastro'.$th->getMessage();
            $status = 'error';
        }finally{
            return redirect()->route('Admin/Empresas')->with($status,$mensagem);
        }
    }
    //
}
