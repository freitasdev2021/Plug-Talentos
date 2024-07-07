<x-admplug>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                  {{$Title}}
                </div>
                <div class="card-body">
                  <form action="{{route('Admin/Vagas/Save')}}" method="POST">
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
                        <label>Vaga</label>
                        <input type="text" class="form-control" name="NMVaga" required maxlength="30" value="{{isset($Registro) ? $Registro->NMVaga : ''}}">
                    </div>
                    <div class="col-sm-12">
                        <label>Descrição da Vaga</label>
                        <textarea name="DSVaga" class="form-control" required maxlength="250">{{isset($Registro) ? $Registro->DSVaga : ''}}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Modalidade</label>
                            <select name="TPVaga" class="form-select" required>
                                <option value="">Selecione</option>
                                <option value="0" {{isset($Registro) && $Registro->TPVaga == 0 ? 'selected' : ''}}>Presencial</option>
                                <option value="1" {{isset($Registro) && $Registro->TPVaga == 1 ? 'selected' : ''}}>Remoto</option>
                                <option value="2" {{isset($Registro) && $Registro->TPVaga == 2 ? 'selected' : ''}}>Hibrido</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Tipo do Contrato</label>
                            <select name="TPContrato" class="form-select" required>
                                <option value="">Selecione</option>
                                <option value="0" {{isset($Registro) && $Registro->TPContrato == 0 ? 'selected' : ''}}>CLT</option>
                                <option value="1" {{isset($Registro) && $Registro->TPContrato == 1 ? 'selected' : ''}}>PJ</option>
                                <option value="2" {{isset($Registro) && $Registro->TPContrato == 2 ? 'selected' : ''}}>Freelancer</option>
                                <option value="3" {{isset($Registro) && $Registro->TPContrato == 3 ? 'selected' : ''}}>Cooperado</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Categoria</label>
                            <select name="IDCategoria" class="form-select" required>
                                <option value="">Selecione</option>
                                @foreach($Categorias as $c)
                                <option value="{{$c->id}}" {{isset($Registro) && $Registro->IDCategoria == $c->id ? 'selected' : ''}}>{{$c->NMCategoria}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label>Salário</label>
                            <input type="number" name="Salario" class="form-control" required value="{{isset($Registro) ? $Registro->Salario : ''}}">
                        </div>
                        <div class="col-sm-3">
                            <label>Empresa</label>
                            <select name="IDEmpresa" class="form-select" required>
                                <option value="">Selecione</option>
                                @foreach($Empresas as $e)
                                <option value="{{$e->id}}" {{isset($Registro) && $Registro->IDEmpresa == $e->id ? 'selected' : ''}}>{{$e->NMEmpresa}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label>Localização</label>
                            <input type="text" name="Local" class="form-control" value="{{isset($Registro) ? $Registro->Local : ''}}">
                        </div>
                        <div class="col-sm-3">
                            <label>Quantidade de Vagas</label>
                            <input type="number" name="QTVagas" class="form-control" value="{{isset($Registro) ? $Registro->QTVagas : ''}}" required>
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-12 row">
                        <div class="col-auto">
                            <button class="btn btn-success">Salvar</button>
                        </div>
                        @if(isset($Registro))
                        <div class="col-auto">
                            <button class="btn alterar {{($Registro->STVaga) ? 'btn-warning desativar' : 'btn-primary ativar'}}" data-desativar="{{route(($Registro->STVaga) ? 'Admin/Vagas/Desativar' : 'Admin/Vagas/Reativar',$Registro->id)}}" type="button">{{($Registro->STVaga) ? 'Desativar' : 'Ativar'}}</button>
                        </div>
                        @endif
                        <div class="col-auto">
                            <a href="{{route('Admin/Vagas')}}" class="btn btn-default">Cancelar</a>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
        </div>
    </div>
</x-admplug>
<script>
    $(".desativar").on("click",function(){
        if(confirm("Deseja Desativar a vaga? Ela Desaparecerá do Site, para reativa-la novamente basta clicar em Ativar")){
            $.ajax({
                method : "GET",
                url : $(this).attr("data-desativar")
            }).done(function(res){
                window.location.reload()
            })
        }
    })

    $(".ativar").on("click",function(){
        if(confirm("Deseja Reativar a vaga? Ela Aparecerá novamente no site para receber candidaturas, caso queira desativa-la basta clicar em Desativar")){
            $.ajax({
                method : "GET",
                url : $(this).attr("data-desativar")
            }).done(function(res){
                window.location.reload()
            })
        }
    })
</script>