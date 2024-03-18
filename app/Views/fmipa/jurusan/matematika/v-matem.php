<?= $this->extend('layout/template'); ?>

<?= $this->Section('content'); ?>

<div class="container col-md mt-4">

    <div class="container-responsive">
        <!-- Icon Cards-->
        <div class="row mb-3">
            <a href="/matematika" class=" hidden-xs inline logo ml-3 justify-content-start">
                <h4>Jurusan Matematika</h4>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-2">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-comments"></i>
                        </div>
                        <div class="mr-5">Dosen</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">Lihat Detail</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-2">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5">S1 Matematika</div>
                    </div>

                    <a class="card-footer text-white clearfix small z-1" href="/matematika/mahasiswa/S1-matematika">
                        <span class=" float-left">Lihat Detail</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-2">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-shopping-cart"></i>
                        </div>
                        <div class="mr-5">S2 Matematika</div>
                    </div>

                    <a class="card-footer text-white clearfix small z-1" href="/matematika/mahasiswa/S2-matematika">
                        <span class=" float-left">Lihat Detail</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-2">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-life-ring"></i>
                        </div>
                        <div class="mr-5">Tenaga Pendidik</div>
                    </div> <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">Lihat Detail</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <?= $this->renderSection('data'); ?>

    </div>
</div>


<?= $this->endsection(); ?>