@extends('layouts.app')

@section('content')
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto px-sm-2 px-0 bg-plug admNav">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">
                        <img src="{{asset('img/logo.png')}}" width="150px" height="70px">
                    </span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <x-modulo rota="{{route('Admin/Empresas')}}" icon="fa-solid fa-building" endereco="Empresas" nome="Empresas"/>
                    <x-modulo rota="{{route('Admin/Categorias')}}" icon="fa-solid fa-list" endereco="Categorias" nome="Categorias"/>
                    <x-modulo rota="{{route('Admin/Vagas')}}" icon="fa-solid fa-person-chalkboard" endereco="Vagas" nome="Vagas Abertas"/>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i>&nbsp;
                        <span class="d-none d-sm-inline mx-1">{{$User}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
            {{$slot}}
        </div>
    </div>
</div>
</body>
@endsection