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
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">Software Engineer</h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>New York, USA</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>Full Time</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                            <a class="btn btn-primary" href="">Apply Now</a>
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan, 2045</small>
                                    </div>
                                </div>
                            </div>
                            <!---->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-3 mb-4 filtros">
                <h3 align="center">Filtre suas vagas</h3>
                <hr>
                <form class="formFiltros">
                    <div class="col-sm-12">
                        <label>Vaga</label>
                        <input type="text" name="Vaga" class="form-control">
                    </div>
                    <div class="col-sm-12">
                        <label>Categoria</label>
                        <select class="form-select">
                            <option value="">Selecione</option>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label>Localização</label>
                        <select class="form-select">
                            <option value="">Selecione</option>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label>Modalidade</label>
                        <select class="form-select">
                            <option value="">Selecione</option>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <label>Contrato</label>
                        <select class="form-select">
                            <option value="">Selecione</option>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <button class="btn bg-plug text-white col-sm-12" type="submit">Filtrar</button>
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