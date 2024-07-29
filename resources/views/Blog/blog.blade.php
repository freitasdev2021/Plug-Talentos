<x-headerblog>
    <x-blogbanner/>
    <div class="container px-12 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @foreach($Posts as $p)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{route('Blog/Post',$p->id)}}">
                            <h2 class="post-title">{{$p->Titulo}}</h2>
                            <h3 class="post-subtitle">{{$p->Subtitulo}}</h3>
                        </a>
                        <p class="post-meta">
                            Postado por
                            <a href="{{route('welcome')}}">Plug Talentos</a>
                            on {{date('d/m/Y',strtotime($p->created_at))}}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @endforeach
            </div>
        </div>
    </div>
</x-headerblog>