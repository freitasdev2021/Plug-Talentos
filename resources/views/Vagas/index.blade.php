<x-admplug>
    <div class="container">
        <div class="col-auto">
            <a href="{{route('Admin/Vagas/Cadastro')}}" class="btn bg-plug text-white">Adicionar</a>
        </div>
        <br>
        <table id="escolas">
            <thead>
                <tr>
                    <th style="text-align:center;">Vaga</th>
                    <th style="text-align:center;">Empresa</th>
                    <th style="text-align:center;">Abertura</th>
                    <th style="text-align:center;">Localização</th>
                    <th style="text-align:center;">Categoria</th>
                    <th style="text-align:center;">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Vagas as $v)
                <tr>
                    <td>{{$v->Vaga}}</td>
                    <td>{{$v->Empresa}}</td>
                    <td>{{date('d/m/Y', strtotime($v->created_at))}}</td>
                    <td>{{$v->Localizacao}}</td>
                    <td>{{$v->Categoria}}</td>
                    <td>
                        <a href="{{route('Admin/Vagas/Edit',$v->IDVaga)}}" class="btn btn-primary">Editar</a>
                        <a href="{{route('Admin/Vagas/Candidaturas',$v->IDVaga)}}" class="btn btn-secondary">Candidaturas</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admplug>