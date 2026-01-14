<x-admplug>
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">Empresas</h1>
            <!--CATEGORIA-->
            <div class="col-sm-3">
                <a href="{{route('Admin/Empresas/Create')}}" class="btn bg-plug text-white">Adicionar</a>
            </div>
            <br>
            <div class="row g-4">
                @foreach($Empresas as $e)
                <div class="col-lg-3 col-sm-6 wow fadeInUp text-center" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <a class="cat-item rounded p-4" href="{{route('Admin/Empresas/Edit',$e->id)}}">
                        <h6 class="mb-3">{{$e->NMEmpresa}}</h6>
                        <img src="{{ asset('storage/Empresa_'.$e->CNPJ.'/'.$e->Foto) }}" width="150px" height="150px">
                        <p class="mb-0">{{$e->Vagas}} Vagas abertas</p>
                    </a>
                </div>
                @endforeach
            </div>
            <!--FIM DA CATEGORIA-->
        </div>
    </div>
</x-admplug>