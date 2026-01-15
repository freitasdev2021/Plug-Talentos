<x-admplug>
   <div class="shadow p-3">
      <a href="{{route('Admin/Categorias/Create')}}" class="btn bg-fr text-white">Adicionar</a>
   </div>
   <div>
      <br/>
      <div class="shadow p-3">
        @foreach($Categorias as $c)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$c->NMCategoria}}</h5>
                <p class="card-text">{{$c->Vagas}} Vagas</p>
                <a href="{{route('Admin/Categorias/Edit',$c->id)}}" class="card-link">Editar</a>
            </div>
        </div>
        @endforeach
      </div>
   </div>
</x-admplug>