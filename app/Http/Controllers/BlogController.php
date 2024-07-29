<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
class BlogController extends Controller
{
    public function index(){
        return view('Blog.index',[
            'Posts' => DB::select("SELECT id,created_at,Titulo,Subtitulo FROM posts")
        ]);
    }

    public function blog(){
        return view('Blog.blog',[
            'Posts' => DB::select("SELECT id,Titulo,Subtitulo,created_at FROM posts")
        ]);
    }

    public function createPost($id=null){
        $view = array(
            "Title" => "Publicar"
        );

        if($id){   
            $view['Title'] = "Editar Publicação";
            $view['Registro'] = DB::select("SELECT * FROM posts WHERE id = $id")[0];
        }

        return view('Blog.createPost',$view);
    }

    public function save(Request $request){
        try{
            $now = date('Y-m-d');
            if($request->id){
                DB::update("UPDATE posts SET Titulo = '$request->Titulo', Subtitulo = '$request->Subtitulo', Conteudo = '$request->Conteudo' WHERE id = '$request->id' ");
            }else{
                DB::insert("INSERT INTO posts (Titulo,Subtitulo,Conteudo,created_at,updated_at) VALUES('$request->Titulo','$request->Subtitulo','$request->Conteudo','$now','$now')");
            }
            $mensagem = 'Publicação feita com Sucesso';
            $status = 'success';
        }catch(\Throwable $th){
            $mensagem = 'Erro '.$th->getMessage();
            $status = 'error';
        }finally{
            //dd($request->all());
            return redirect()->route('Admin/Blog/Novo')->with($status,$mensagem);
        }
    }

    public function deletePost(){

    }

    public function getPost($id){
        $Post = DB::select("SELECT * FROM posts WHERE id = $id")[0];
        return view('Blog.post',[
            "Post" => $Post
        ]);
    }

    public function sobre(){

    }
}
