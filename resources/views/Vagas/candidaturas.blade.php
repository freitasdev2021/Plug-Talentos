<x-admplug>
    <div>
        <br/>
        <div class="shadow p-3">
            <table id="escolas" class="table table-striped table-fr">
                <thead>
                    <tr>
                        <th style="text-align:center;">Nome</th>
                        <th style="text-align:center;">Telefone</th>
                        <th style="text-align:center;">Linkedin</th>
                        <th style="text-align:center;">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Candidaturas as $c)
                    <tr>
                        <td>{{$c->Candidato}}</td>
                        <td>{{$c->Telefone}}</td>
                        <td><a href="{{$c->Linkedin}}">{{$c->Linkedin}}</a></td>
                        <td>
                            <a href="{{asset('storage/Curriculos/'.$c->Curriculo)}}" download class="btn btn-primary">Baixar Currículo</a>
                            <button type="button" class="btn btn-danger descartarCandidatura" data-candidatura="{{route("Admin/Vagas/Candidaturas/Descarte",$c->id)}}">Descartar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admplug>
<script>
    $(".descartarCandidatura").on("click",function(){
        if(confirm("Deseja Desclassificar o Candidato?")){
            $.ajax({
                method : "GET",
                url : $(this).attr("data-candidatura")
            }).done(function(response){
                window.location.reload()
            })
        }
    })
</script>