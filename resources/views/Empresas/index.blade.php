<x-admplug>
   <div class="shadow p-3">
      <a href="{{route('Admin/Empresas/Create')}}" class="btn bg-fr text-white">Adicionar</a>
   </div>
   <div>
      <br/>
      <div class="shadow p-3">
        @foreach($Empresas as $e)
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/Empresa_'.$e->CNPJ.'/'.$e->Foto) }}" width="250px" height="180px" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{$e->NMEmpresa}}</h5>
                <p class="card-text">{{$e->Vagas}} Vagas abertas</p>
                <a href="{{route('Admin/Empresas/Edit',$e->id)}}" class="btn btn-primary">Editar</a>
            </div>
        </div>
        @endforeach
      </div>
   </div>
</x-admplug>