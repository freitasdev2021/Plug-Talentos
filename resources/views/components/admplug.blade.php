@extends('layouts.app')

@section('content')
    <!-- TOPO GERAL -->
<div class="topo-geral d-flex">

    <!-- TOPO BRANCO (mesma largura da sidebar) -->
    <div class="p-3 topo-sidebar bg-white shadow-sm d-flex flex-column justify-content-center align-items-center text-center">
        <router-link to="/"><strong class="text-fr">PortalFreitas</strong></router-link>
        <strong style="font-size:16px;">Publicações Oficiais</strong>
    </div>

    <!-- TOPO AZUL -->
    <div class="topo-nav d-flex align-items-center justify-content-between px-2">
        <div class="d-flex align-items-center brasao">
            <img 
                src="https://upload.wikimedia.org/wikipedia/commons/b/bf/Coat_of_arms_of_Brazil.svg"
                class="rounded-circle border brs"
                width="30"
                height="30"
                alt="Usuário"
            >
            <div class="text-white fw-semibold brs">
                Município de Exemplo
            </div>
        </div>
        <div>
            <strong id="horaAtual" class="text-white"></strong>
        </div>
        <div>
            <button class="btn btn-sm btn-danger" @click="logout">Sair</button>
        </div>
    </div>

</div>

<div class="sidebar d-flex flex-column">

    <ul class="nav nav-pills flex-column mt-3">
        <x-modulo rota="{{route('Admin/Empresas')}}" icon="fa-solid fa-building" endereco="Empresas" nome="Empresas"/>
        <x-modulo rota="{{route('Admin/Categorias')}}" icon="fa-solid fa-list" endereco="Categorias" nome="Categorias"/>
        <x-modulo rota="{{route('Admin/Vagas')}}" icon="fa-solid fa-person-chalkboard" endereco="Vagas" nome="Vagas Abertas"/>
        <x-modulo rota="{{route('Admin/Blog')}}" icon="fa-solid fa-person-chalkboard" endereco="Blog" nome="Blog"/>
    </ul>
    <!-- PERFIL DO USUÁRIO -->
    <div class="mt-auto d-flex border-top border-light bg-white shadow-sm usuario">

        <div class="mb-2 us">
            <!-- Foto de perfil -->
            <img 
                src="https://randomuser.me/api/portraits/men/32.jpg"
                class="rounded-circle border"
                width="50"
                height="50"
                alt="Usuário"
            >
        </div>
        <div class="column us">
          <div class="fw-semibold" style="color:#234D9D">
              João da Silva
          </div>

          <div class="text-muted small">
              Gestor Público
          </div>
        </div>
    </div>

</div>

<!-- CONTEÚDO -->
<div class="content">
 {{$slot}}
</div>
</body>
@endsection