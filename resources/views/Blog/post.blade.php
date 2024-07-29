<x-headerblog>
            <!-- Page Header-->
            <header class="masthead" style="background-image: url({{asset('img/bannerContratar/carousel-1.jpg')}})">
                <div class="container position-relative px-4 px-lg-5">
                    <div class="row gx-4 gx-lg-5 justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7">
                            <div class="post-heading">
                                <h1>{{$Post->Titulo}}</h1>
                                <h2 class="subheading">{{$Post->Subtitulo}}</h2>
                                <span class="meta">
                                    Postado por
                                    <a href="#!">Plug Talentos</a>
                                    em {{date('d/m/Y', strtotime($Post->created_at))}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Post Content-->
            <article class="mb-4">
                <div class="container px-4 px-lg-5">
                    <div class="row gx-4 gx-lg-5 justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7">
                            <p>
                                {{$Post->Conteudo}}
                            </p>
                        </div>
                    </div>
                </div>
            </article>
</x-headerblog>