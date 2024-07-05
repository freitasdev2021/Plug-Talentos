@extends('layouts.app')

@section('content')
<body>
    <div class="bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg shadow sticky-top p-2 bg-superior">
            <div>
                <i class="fa-brands fa-instagram" id="instagram"></i>
                Insatgram
            </div>
            <div>
                <i class="fa-brands fa-linkedin" id="linkedin"></i>
                Linkedin
            </div>
            <div>
                <i class="fa-brands fa-whatsapp" id="whatsapp"></i>
                WhatsApp
            </div>
            <div>
                <i class="fa-solid fa-location-dot"></i>
                Avenida 26 de Outubro, 2188 Bela Vista Ipatinga/MG
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg shadow sticky-top p-0 bg-plug">
            <a href="{{route('welcome')}}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <img src="{{asset('img/logo.png')}}">
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navegacao" id="navbarCollapse" style="margin-right:10px;">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{route('welcome')}}" class="nav-item nav-link oswald">Home</a>
                    <a href="index.html" class="nav-item nav-link oswald">Quero Contratar</a>
                    <a href="{{route('vagas')}}" class="nav-item nav-link oswald">Quero Trabalhar</a>
                    <a href="index.html" class="nav-item nav-link oswald">Plug Academy</a>
                    <a href="index.html" class="nav-item nav-link oswald">Blog</a>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->
        {{$slot}}
        <!-- Footer Start -->
        <div class="container-fluid bg-plug text-white-50 footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Plug Talentos</a>, Todos os Direitos Reservados. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Criado e Idealizado por <a class="border-bottom" href="https://htmlcodex.com">FR Tecnologia</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg bg-plug text-white btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
</body>
@endsection