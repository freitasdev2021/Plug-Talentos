<x-admplug>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                  {{$Title}}
                </div>
                <div class="card-body">
                  <form action="{{route('Admin/Categorias/Save')}}" method="POST">
                    @csrf
                    @if(session('success'))
                    <div class="shadow col-sm-12 bg-success">
                        <h2>{{session('success')}}</h2>
                    </div>
                    @elseif(session('error'))
                        <div class="shadow col-sm-12 bg-danger">
                            <h2>{{session('error')}}</h2>
                        </div>
                    @endif
                    @if(isset($Registro->id))
                    <input type="hidden" value="{{$Registro->id}}" name="id">
                    @endif
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="NMCategoria" value="{{isset($Registro) ? $Registro->NMCategoria : ''}}">
                    </div>
                    <br>
                    <div class="col-sm-12 row">
                        <div class="col-auto">
                            <button class="btn btn-success">Salvar</button>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('Admin/Categorias')}}" class="btn btn-default">Cancelar</a>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
        </div>
    </div>
</x-admplug>