<x-admplug>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                  {{$Title}}
                </div>
                <div class="card-body">
                  <x-form-post to="{{route('Admin/Categorias/Save')}}" :file="false" back="{{route('Admin/Categorias')}}">
                    @if(isset($Registro->id))
                    <input type="hidden" value="{{$Registro->id}}" name="id">
                    @endif
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="NMCategoria" value="{{isset($Registro) ? $Registro->NMCategoria : ''}}">
                    </div>
                  </x-form-post>
                </div>
              </div>
        </div>
    </div>
</x-admplug>