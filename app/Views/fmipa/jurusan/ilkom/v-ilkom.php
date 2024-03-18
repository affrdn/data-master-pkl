<?= $this->extend('layout/template'); ?>

<?= $this->Section('content'); ?>

<div class="container mt-4">

    <div class="container-responsive">
        <!-- Icon Cards-->
        <div class="row mb-3">
            <a href="/ilmu-komputer" class="hidden-xs inline logo ml-3 justify-content-start">
                <h3>Jurusan Ilmu Komputer</h3>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-2">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">

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

                        <div class="mr-5 text-dark">S1 Ilmu Komputer</div>

                    </div>

                    <a class="card-footer text-white clearfix small z-1" href="/ilmu-komputer/S1-ilmu-komputer">
                        <span class=" float-left text">Lihat Detail</span>
                        <span class="float-right">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-2">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">

                        <div class="mr-5">D3 Manajemen Informatika</div>

                    </div>

                    <a class="card-footer text-white clearfix small z-1" href="/ilmu-komputer/D3-manajemen-informatika">
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

                        <div class="mr-5">Tenaga Pendidik</div>

                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
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


<?= $this->endSection(); ?>