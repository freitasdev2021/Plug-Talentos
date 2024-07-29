<x-admplug>
    <x-admplug>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                      {{$Title}}
                    </div>
                    <div class="card-body">
                      <form action="{{route('Admin/Blog/Save')}}" method="POST">
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
                            <label>Titulo</label>
                            <input type="text" class="form-control" name="Titulo" value="{{isset($Registro) ? $Registro->Titulo : ''}}">
                        </div>
                        <div class="col-sm-12">
                            <label>Subtitulo</label>
                            <input type="text" class="form-control" name="Subtitulo" value="{{isset($Registro) ? $Registro->Subtitulo : ''}}">
                        </div>
                        <div class="col-sm-12">
                            <label>Conteudo</label>
                            <textarea class="form-control" name="Conteudo">{{isset($Registro) ? $Registro->Conteudo : ''}}</textarea>
                        </div>
                        <br>
                        <div class="col-sm-12 row">
                            <div class="col-auto">
                                <button class="btn btn-success">Salvar</button>
                            </div>
                            <div class="col-auto">
                                <a href="{{route('Admin/Blog')}}" class="btn btn-default">Cancelar</a>
                            </div>
                        </div>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </x-admplug>
</x-admplug>