<?= $this->extend('layout/template'); ?>

<?= $this->Section('content'); ?>

<div class="container-fluid mt-3">
    <div class="row mb-1">
        <div class="col d-flex justify-content-between">
            <a href="/dosen" class="hidden-xs inline logo">
                <h3>Data Dosen</h3>
            </a>
        </div>

    </div>
    <div class="row row-responsive">
        <div class="col d-flex justify-content-between mb-3">
            <form action="/dosen" method=" POST" enctype="multipart/form-data">
                <div class="input-group input-group-sm align-self-center">
                    <input type="text" class="form-control" placeholder="Masukan kata kunci" name="keyword" autofocus>
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-outline-info" type="submit" data-placement="bottom" title="Cari">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
            <div class="col-sm align-self-center d-flex align-items-end flex-column">
                <?php if (session()->get('isLoggedIn')) : ?>
                    <a href="/dosen/create" class="btn btn-sm btn-info">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                            <path fill-rule="evenodd" d="M13 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0v-2z" />
                        </svg>
                        Tambah Data
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success my-1">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md">
            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead class="light">
                    </thead>
                    <tbody>
                        <?php foreach ($dosen as $d) : ?>

                            <tr class="d-flex justify-content-start small z-1">
                                <td class="pt-2 mr-2">
                                    <img src="/img/<?= $d['foto_dosen']; ?>" width="60">
                                </td>

                                <td>
                                    <a href="" data-target="#detail<?= $d['nip_dosen']; ?>" data-toggle="modal">
                                        <b><?= $d['nama_dosen']; ?></b><br>
                                        <?= $d['nip_dosen']; ?> <br>
                                        <?= $d['nidn_dosen']; ?> <br>
                                        <?= $d['nama_jurusan']; ?> <br>
                                        <?= $d['email_dosen']; ?> <br>
                                    </a>
                                </td>

                                <td class="ml-auto align-self-center">

                                    <?php if (session()->get('isLoggedIn')) : ?>
                                        <a href="/dosen/edit/<?= $d['nip_dosen']; ?>">
                                            <button type="button" class="btn btn-sm btn-warning mb-1 border-0" data-placement="bottom" title="Ubah" name="edit"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                            </button> <br>
                                        </a>

                                        <a onclick="return confirm('Anda yakin ingin menghapus data <?= $d['nip_dosen']; ?> ?')" href="/data/dosen/delete/<?= $d['nip_dosen']; ?>">
                                            <button type="button" class="btn btn-sm btn-danger mb-1 border-0" data-placement="bottom" title="Hapus" name="hapus">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                                </svg>
                                            </button>
                                        </a>
                                    <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<?php $i = 0;
foreach ($dosen as $d) : $i++ ?>
    <div class="modal fade" id="detail<?= $d['nip_dosen']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                <img src="/img/<?= $d['foto_dosen']; ?>" class="card-img img-fluid">
                            </div>
                            <table class="table table-fluid">
                                <tbody>
                                    <tr>
                                        <td><b>Nama</td>
                                        <td> <b><?= $d['nama_dosen']; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><b>NIP</td>
                                        <td><?= $d['nip_dosen']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>NIDN</td>
                                        <td><?= $d['nidn_dosen']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Pangkat Golongan</td>
                                        <td><?= $d['nama_pangkat']; ?> / <?= $d['nama_golongan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Email</td>
                                        <td><?= $d['email_dosen']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jurusan</td>
                                        <td><?= $d['nama_jurusan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Tugas Tambahan</td>
                                        <td><?= $d['tugas_tambahan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Jenis Kelamin</td>
                                        <td><?= $d['jenis_gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Profil Singkat</td>
                                        <td><?= $d['profil_dosen']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Curriculum Vitae</td>
                                        <td><?= $d['cv_dosen']; ?></td>
                                    </tr>
                                    <?php if (session()->get('isLoggedIn')) : ?>
                                        <tr>
                                            <td><b>Agama</td>
                                            <td><?= $d['nama_agama']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Alamat</td>
                                            <td><?= $d['alamat_dosen']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Tanggal Lahir</td>
                                            <td><?= $d['tLahir_dosen']; ?></td>
                                        </tr>
                                    <?php endif; ?>
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