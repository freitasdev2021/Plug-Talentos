<x-admplug>
    <div class="container">
        <div class="col-auto">
            <a href="{{route('Admin/Blog/Novo')}}" class="btn bg-plug text-white">Adicionar</a>
        </div>
        <br>
        <table id="escolas">
            <thead>
                <tr>
                    <th style="text-align:center;">Titulo</th>
                    <th style="text-align:center;">Subtitulo</th>
                    <th style="text-align:center;">Postado</th>
                    <th style="text-align:center;">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Posts as $p)
                <tr>
                    <td>{{$p->Titulo}}</td>
                    <td>{{$p->Subtitulo}}</td>
                    <td>{{date('d/m/Y', strtotime($p->created_at))}}</td>
                    <td>
                        <a href="{{route('Admin/Blog/Cadastro',$p->id)}}" class="btn btn-primary">Editar</a>
                        <button class="btn btn-danger deletePost" data-route="{{route('Admin/Blog/Delete',$p->id)}}">Excluir</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admplug>