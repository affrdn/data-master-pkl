<?= $this->extend('layout/template'); ?>

<?= $this->extend('fmipa/jurusan/biologi/v-biologi'); ?>

<?= $this->Section('data'); ?>

<div class="modal-body">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-sm table-hover">
                <tbody>
                    <?php foreach ($mhs as $m) : ?>

                        <tr class="d-flex justify-content-start small z-1">

                            <?php if (session()->get('isLoggedIn')) : ?>
                                <td class="align-self-center mr-2"><input type="checkbox"></td>
                            <?php endif; ?>
                            <td class="pt-2 mr-2">
                                <img src="/img/<?= $m['foto_mhs']; ?>" width="60">
                            </td>

                            <td>
                                <a href="" data-target="#detail<?= $m['npm_mhs']; ?>" data-toggle="modal">
                                    <b><?= $m['nama_mhs']; ?></b><br>
                                    <?= $m['npm_mhs']; ?> <br>
                                    <?= $m['nama_jurusan']; ?> <br>
                                    <?= $m['nama_prodi']; ?> <br>
                                    <?= $m['tahmas_mhs']; ?>
                                </a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<?php foreach ($mhs as $m) : ?>
    <div class="modal fade" id="detail<?= $m['npm_mhs']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row media position-top">
                        <div class="col media-body d-flex">
                            <div class="col-md-4 mb-3">
                                <img src="/img/<?= $m['foto_mhs']; ?>" class="card-img img-fluid">
                            </div>
                            <table class="table table-fluid">
                                <tbody>
                                    <tr>
                                        <td><b>Nama</td>
                                        <td><?= $m['nama_mhs']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>NPM</td>
                                        <td><?= $m['npm_mhs']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jurusan</td>
                                        <td><?= $m['nama_jurusan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Program Studi</td>
                                        <td><?= $m['nama_prodi']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tahun Masuk</td>
                                        <td><?= $m['tahmas_mhs']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jenis Kelamin</td>
                                        <td><?= $m['jenis_gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Agama</td>
                                        <td><?= $m['nama_agama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Alamat</td>
                                        <td><?= $m['alamat_mhs']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tanggal Lahir</td>
                                        <td><?= $m['tLahir_mhs']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endSection(); ?>