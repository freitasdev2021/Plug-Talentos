<form action="{{$to}}" method="POST" enctype="{{$file ? 'multipart/form-data' : ''}}">
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
    <div class="col-sm-12">
        {{$slot}}
    </div>
    <br>
    <div class="col-sm-12 row">
        <div class="col-auto">
            <button class="btn btn-success">Salvar</button>
        </div>
        <div class="col-auto">
            <a href="{{$back}}" class="btn btn-light">Cancelar</a>
        </div>
    </div>
</form>