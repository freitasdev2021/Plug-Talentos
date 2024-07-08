<x-site-plug>
    <style>
        .footer{
            position: fixed;
            bottom: 0;
            right: 0;
            left: 0;
        }

        .vaga{
            height:1000px;
        }
    </style>
    <!-- Job Detail Start -->
    <div class="container-xxl py-5 wow fadeInUp vaga" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded" src="{{url("storage/Empresa_$Vaga->CNPJ/$Vaga->Foto")}}" alt="" style="width: 80px; height: 80px;">
                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{$Vaga->NMVaga}}</h3>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$Vaga->Local}}</span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$Vaga->TPContrato}} {{($Vaga->TPVaga)}}</span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{($Vaga->Salario > 0) ? $Vaga->Salario : 'Não Divulgado'}}</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-3">Descrição da Vaga</h4>
                        <p>{{$Vaga->DSVaga}}</p>
                    </div>
    
                    <div class="">
                        <h4 class="mb-4">Finalize sua Candidatura</h4>
                        <form action="{{route('Vaga/Candidatar')}}" method="POST" enctype="multipart/form-data">
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
                            <input type="hidden" value="{{$Vaga->id}}" name="IDVaga">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Nome" name="Candidato" maxlength="30" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Telefone" name="Telefone" maxlength="11" required>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="URL Linkedin (Não Obrigatório)" name="Linkedin" maxlength="100">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="file" class="form-control bg-white" name="Curriculo" accept="application/pdf" required>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Clique para Finalizar sua Candidatura</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    
                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Detalhes da Vaga</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Publicada em: {{date('d/m/Y',strtotime($Vaga->created_at))}}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Empresa: {{$Vaga->NMEmpresa}}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Tipo de Contrato: {{$Vaga->TPContrato}} {{($Vaga->TPVaga)}}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Salario: {{($Vaga->Salario > 0) ? $Vaga->Salario : 'Não Divulgado'}}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Localização: {{$Vaga->Local}}</p>
                    </div>
                    {{-- <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Company Detail</h4>
                        <p class="m-0">Ipsum dolor ipsum accusam stet et et diam dolores, sed rebum sadipscing elitr vero dolores. Lorem dolore elitr justo et no gubergren sadipscing, ipsum et takimata aliquyam et rebum est ipsum lorem diam. Et lorem magna eirmod est et et sanctus et, kasd clita labore.</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->
</x-site-plug>