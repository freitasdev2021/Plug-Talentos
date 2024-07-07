<x-admplug>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                  {{$Title}}
                </div>
                <div class="card-body">
                  <form action="{{route('Admin/Empresas/Save')}}" method="POST" enctype="multipart/form-data">
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
                    @if(isset($Registro))
                    <input type="hidden" value="{{$Registro->id}}" name="id">
                    @endif
                    <div class="col-sm-12">
                        <div class="col-sm-12">
                            <label>Empresa</label>
                            <input type="text" class="form-control" name="NMEmpresa" placeholder="Nome da Empresa" maxlength="50" required value="{{isset($Registro) ? $Registro->NMEmpresa : ''}}">
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <label>CNPJ</label>
                                <input type="text" name="CNPJ" class="form-control" maxlength="14" value="{{isset($Registro) ? $Registro->CNPJ : ''}}" required>
                            </div>
                            <div class="col-sm-4">
                                <label>CEP</label>
                                <input type="text" name="CEP" class="form-control" maxlength="8" value="{{isset($Registro) ? $Endereco->CEP : ''}}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Rua</label>
                                <input type="text" name="Rua" class="form-control" maxlength="30" value="{{isset($Registro) ? $Endereco->Rua : ''}}" required>
                            </div>
                            <div class="col-sm-4">
                                <label>Cidade</label>
                                <input type="text" name="Cidade" class="form-control" maxlength="30" value="{{isset($Registro) ? $Endereco->Cidade : ''}}" required>
                            </div>
                            <div class="col-sm-4">
                                <label>Bairro</label>
                                <input type="text" name="Bairro" class="form-control" required value="{{isset($Registro) ? $Endereco->Bairro : ''}}" maxlength="30">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label>UF</label>
                                <input type="text" name="UF" class="form-control" maxlength="2" value="{{isset($Registro) ? $Registro->UF : ''}}" required>
                            </div>
                            <div class="col-sm-4">
                                <label>Telefone</label>
                                <input type="text" class="form-control" name="Telefone" value="{{isset($Registro) ? $Registro->Telefone : ''}}" required maxlength="11">
                            </div>
                            <div class="col-sm-2">
                                <label>Numero</label>
                                <input type="number" name="Numero" value="{{isset($Registro) ? $Endereco->Numero : ''}}" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label>Logo da Empresa</label>
                                <input type="file" class="form-control" name="Foto" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-12 row">
                        <div class="col-auto">
                            <button class="btn btn-success">Salvar</button>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('Admin/Empresas')}}" class="btn btn-light">Cancelar</a>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
        </div>
    </div>
</x-admplug>
<script>
    $('input[name=CEP]').on("change",function(e){
        if( $(this).val().length == 8){
            var cep = $(this).val();
            var url = "https://viacep.com.br/ws/"+cep+"/json/";
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function(dados){
                    $("input[name=UF]").val(dados.uf).change();
                    $("input[name=Cidade]").val(dados.localidade);
                    $("input[name=Bairro]").val(dados.bairro);
                    $("input[name=Rua]").val(dados.logradouro);
                }
            })
        }            
    })
</script>