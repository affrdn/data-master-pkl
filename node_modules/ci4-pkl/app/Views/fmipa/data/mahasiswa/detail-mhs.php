<?= $this->extend('layout/template'); ?>

<?= $this->Section('content'); ?>

<div class="container col-md pt-3">

    <div class="container col-md">
        <div class="row">
            <h4>Detail Mahasiswa</h4>
            <div class="d-flex ml-auto">
                <a href="/mahasiswa" class="btn btn-sm btn-primary mt-1">
                    <i class="fas fa-chevron-circle-left"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="row media position-top mt-3">
        <div class="col-md-2 mb-3">
            <img src="/img/<?= $mhs['foto_mhs']; ?>" class="card-img img-fuid">
        </div>
        <div class="col media-body">
            <table class="table table-sm">
                <tbody>
                    <tr>
                        <td class="w-25"><b>Nama</td>
                        <td><?= $mhs['nama_mhs']; ?></td>
                    </tr>
                    <tr>
                        <td><b>NPM</td>
                        <td><?= $mhs['npm_mhs']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jurusan</td>
                        <td><?= $mhs['nama_jurusan']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Program Studi</td>
                        <td><?= $mhs['nama_prodi']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Tahun Masuk</td>
                        <td><?= $mhs['tahmas_mhs']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Jenis Kelamin</td>
                        <td><?= $mhs['jenis_gender']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Agama</td>
                        <td><?= $mhs['nama_agama']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Alamat</td>
                        <td><?= $mhs['alamat_mhs']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Tanggal Lahir</td>
                        <td><?= $mhs['tLahir_mhs']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endsection(); ?>