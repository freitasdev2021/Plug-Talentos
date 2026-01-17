<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VagasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\OuvidoriaController;
use App\Http\Controllers\DiarioController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/Vagas',[VagasController::class,'index'])->name('vagas');
Route::get('/Contratar',[VagasController::class,'contratar'])->name('contratar');

Route::get('/Admin', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/Vaga/{id}',[VagasController::class,'vaga'])->name('Vaga');
Route::post('/Vaga/Candidatar',[VagasController::class,'candidatar'])->name("Vaga/Candidatar");
//BLOG
Route::get('/PlugBlog',[BlogController::class,'blog'])->name('PlugBlog');
Route::get('Blog/Post/{id}',[BlogController::class,'getPost'])->name('Blog/Post');
//
Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    //CATEGORIAS
    Route::get('/Admin/Categorias',[CategoriasController::class,'index'])->name('Admin/Categorias');
    Route::post('/Admin/Categorias/Save',[CategoriasController::class,'save'])->name('Admin/Categorias/Save');
    Route::get('/Admin/Categorias/Cadastro',[CategoriasController::class,'cadastro'])->name('Admin/Categorias/Create');
    Route::get('/Admin/Categorias/Cadastro/{id}',[CategoriasController::class,'cadastro'])->name('Admin/Categorias/Edit');
    //EMPRESAS
    Route::get('/Admin/Empresas',[EmpresasController::class,'index'])->name('Admin/Empresas');
    Route::get('/Admin/Empresas/Cadastro',[EmpresasController::class,'cadastro'])->name('Admin/Empresas/Create');
    Route::get('/Admin/Empresas/Cadastro/{id}',[EmpresasController::class,'cadastro'])->name('Admin/Empresas/Edit');
    Route::post('/Admin/Empresas/Save',[EmpresasController::class,'save'])->name('Admin/Empresas/Save');
    //VAGAS
    Route::get('/Admin/Vagas/Cadastro/{id}',[VagasController::class,'cadastro'])->name('Admin/Vagas/Edit');
    Route::get('/Admin/Vagas/Cadastro',[VagasController::class,'cadastro'])->name('Admin/Vagas/Cadastro');
    Route::get('/Admin/Vagas',[VagasController::class,'indexAdm'])->name('Admin/Vagas');
    Route::get('/Admin/Vagas/Candidaturas/{IDVaga}',[VagasController::class,'candidaturas'])->name('Admin/Vagas/Candidaturas');
    Route::get('/Admin/Vagas/Candidaturas/Descarte/{IDCandidatura}',[VagasController::class,'descartarCandidatura'])->name('Admin/Vagas/Candidaturas/Descarte');
    Route::post('/Admin/Vagas/Save',[VagasController::class,'save'])->name('Admin/Vagas/Save');
    Route::get('/Admin/Vagas/Desativar/{id}',[VagasController::class,'desativarVaga'])->name('Admin/Vagas/Desativar');
    Route::get('/Admin/Vagas/Reativar/{id}',[VagasController::class,'reativarVaga'])->name('Admin/Vagas/Reativar');
    //BLOG
    Route::get('/Admin/Blog',[BlogController::class,'index'])->name('Admin/Blog');
    Route::get('Admin/Blog/Post/{id}',[BlogController::class,'getPost'])->name('Admin/Blog/Post');
    Route::get('Admin/Blog/Create',[BlogController::class,'createPost'])->name('Admin/Blog/Novo');
    Route::get('Admin/Blog/Cadastro/{id}',[BlogController::class,'createPost'])->name('Admin/Blog/Cadastro');
    Route::get('Admin/Blog/Delete/{id}',[BlogController::class,'deletePost'])->name('Admin/Blog/Delete');
    Route::post('Admin/Blog/Save',[BlogController::class,'save'])->name('Admin/Blog/Save');
    //PERFIL
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //SITE
    Route::get('Admin/Site',[SiteController::class,'index'])->name('Admin/Site');
    //OUVIDORIA
    Route::get('Admin/Ouvidoria',[OuvidoriaController::class,'index'])->name('Admin/Ouvidoria');
    //PNCP
    Route::get('Admin/Licitacoes',[LicitacoesController::class,'index'])->name('Admin/Licitacoes');
    //DIARIO
    Route::get('Admin/Diario',[DiarioController::class,'index'])->name('Admin/Diario');
});

require __DIR__.'/auth.php';
