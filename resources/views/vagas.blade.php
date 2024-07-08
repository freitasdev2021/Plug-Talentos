<x-site-plug>
    <style>
        .footer{
            position: fixed;
            bottom: 0;
            right: 0;
            left: 0;
        }
    </style>
    <!-- Jobs Start -->
    <div class="p-4 py-5 vagas">
        <!--LISTA DE EMPREGOS-->
        <div class="row">
            <div class="col-sm-8">
                <div class="tab-class text-center wow fadeInUp empregos" data-wow-delay="0.3s">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <!--VAGA ABERTA-->
                            @foreach($Vagas as $v)
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="{{url("storage/Empresa_$v->CNPJ/$v->Foto")}}" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">{{$v->NMVaga}}</h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$v->Local}}</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$v->TPContrato}} ({{$v->TPVaga}})</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{($v->Salario > 0) ? $v->Salario : 'Não Divulgado'}}</span>
                                            <span class="text-truncate me-0">&nbsp;<i class="fa-solid fa-briefcase text-primary me-2"></i>{{$v->NMEmpresa}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-primary" href="{{route('Vaga',$v->id)}}">Anexar Curriculo</a>
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Publicada: {{date('d/m/Y',strtotime($v->created_at))}}</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!---->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-3 mb-4 filtros">
                <h3 align="center">Filtre suas vagas</h3>
                <hr>
                <form class="formFiltros" action="{{route('vagas')}}" method="GET">
                    <div class="col-sm-12">
                        <label>Vaga</label>
                        <input type="text" name="Vaga" class="form-control" value="{{isset($_GET['Vaga']) ? $_GET['Vaga'] : ''}}">
                    </div>
                    <div class="col-sm-12">
                        <label>Categoria</label>
                        <select class="form-select" name="Categoria">
                            <option value="">Selecione</option>
                            @foreach($Categorias as $c)
                            <option value="{{$c->NMCategoria}}" {{isset($_GET['Categoria']) && $_GET['Categoria'] == $c->NMCategoria ? 'selected' : '' }}>{{$c->NMCategoria}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label>Localização</label>
                        <select class="form-select" name="Local">
                            <option value="">Selecione</option>
                            @foreach($Filtros as $l)
                            <option value="{{$l->Local}}" {{isset($_GET['Local']) && $_GET['Local'] == $l->Local ? 'selected' : '' }}>{{$l->Local}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label>Modalidade</label>
                        <select class="form-select" name="Modalidade">
                            <option value="">Selecione</option>
                            @foreach($Filtros as $m)
                            <option value="{{$m->TPVaga}}" {{isset($_GET['Modalidade']) && $_GET['Modalidade'] == $m->TPVaga ? 'selected' : '' }}>{{$m->TPVaga}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label>Contrato</label>
                        <select class="form-select" name="Contrato">
                            <option value="">Selecione</option>
                            @foreach($Filtros as $ct)
                            <option value="{{$ct->TPContrato}}" {{isset($_GET['Contrato']) && $_GET['Contrato'] == $ct->TPContrato ? 'selected' : '' }}>{{$ct->TPContrato}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn bg-plug text-white col-sm-12" type="submit">Filtrar</button>
                    </div>
                    <div class="col-sm-12">
                        <a href="{{route('vagas')}}" class="btn btn-warning col-sm-12">Limpar Filtros</a>
                    </div>
                </form>
            </div>
        </div>
        <!--FILTROS DOS EMPREGOS-->

        <!------------------------>
    </div>
    <!-- Jobs End -->
</x-site-plug>
<script>
    $(document).ready(function(){
        
    })
</script>