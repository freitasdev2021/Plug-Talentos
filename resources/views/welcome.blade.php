<x-site-plug>
    <x-carousel/>
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">Categorias</h1>
            <!--CATEGORIA-->
            <div class="row g-4">
                @foreach($Categorias as $c)
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <a class="cat-item rounded p-4">
                        <h6 class="mb-3">{{$c->NMCategoria}}</h6>
                        <p class="mb-0">{{$c->Vagas}} Abertas</p>
                    </a>
                </div>
                @endforeach
            </div>
            <!--FIM DA CATEGORIA-->
        </div>
    </div>
</x-site-plug>