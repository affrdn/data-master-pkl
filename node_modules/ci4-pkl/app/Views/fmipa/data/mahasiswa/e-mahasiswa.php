<?= $this->extend('layout/template'); ?>

<?= $this->Section('content'); ?>


<div class="container col-md mt-3">
    <div class="container col-md">
        <div class="row">
            <h4>Ubah Data Mahasiswa</h4>
        </div>
    </div>

    <div class="container col-md my-1 pt-3 border">
        <form action="/data/mahasiswa/update/<?= $mhs['npm_mhs']; ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="fotoLama" value="<?= $mhs['foto_mhs']; ?>">
            <div class="row rounded mx-auto d-block">
                <div class="form-group row">
                    <div class="col col-md-2">
                        <img src="/img/<?= $mhs['foto_mhs']; ?>" class="img-fluid img-thumbnail img-preview">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col col-md-6">
                    <div class="form-group row">
                        <label for="npm_mhs" class="col-sm-3 col-form-label col-form-label-sm">NPM</label>
                        <div class="col-sm-7">
                            <input type="text" value="<?= $mhs['npm_mhs']; ?>" class="form-control form-control-sm" name="npm_mhs" id="npm_mhs" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_mhs" class="col-sm-3 col-form-label col-form-label-sm">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" value="<?= $mhs['nama_mhs']; ?>" class="form-control form-control-sm text-capitalize" name="nama_mhs" id="nama_mhs" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jurusan_mhs" class="col-sm-3 col-form-label col-form-label-sm ">Jurusan</label>
                        <div class="col-sm-5">
                            <select name="jurusan_mhs" id="jurusan_mhs" class="form-control form-control-sm">
                                <?php foreach ($jrs as $m) : ?>
                                    <option value="<?= $m['kd_jurusan']; ?>" <?= $m['kd_jurusan'] == $mhs['jurusan_mhs'] ? "selected" : ''; ?>><?= $m['nama_jurusan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="prodi_mhs" class="col-sm-3 col-form-label col-form-label-sm ">Program Studi</label>
                        <div class="col-sm-7">
                            <select name="prodi_mhs" class="form-control form-control-sm ">
                                <?php foreach ($prd as $m) : ?>
                                    <option value="<?= $m['kd_prodi']; ?>" <?= $m['kd_prodi'] == $mhs['prodi_mhs'] ? "selected" : ''; ?>><?= $m['nama_prodi']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tahmas_mhs" class="col-sm-3 col-form-label col-form-label-sm" for="date">Tahun masuk</label>
                        <div class="col-sm-7">
                            <input type="text" value="<?= $mhs['tahmas_mhs']; ?>" class="form-control form-control-sm" name="tahmas_mhs" id="tahmas_mhs">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jk_mhs" class="col-sm-3 col-form-label col-form-label-sm ">Jenis Kelamin</label>
                        <div class="col-sm-5">
                            <select name="jk_mhs" id="jk_mhs" class="form-control form-control-sm">
                                <?php foreach ($jk as $m) : ?>
                                    <option value="<?= $m['kd_gender']; ?>" <?= $m['kd_gender'] == $mhs['jk_mhs'] ? "selected" : ''; ?>><?= $m['jenis_gender']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="col col-md-6">

                    <div class="form-group row">
                        <label for="agama_mhs" class="col-sm-3 col-form-label col-form-label-sm" for="date">Agama</label>
                        <div class="col-sm-7">
                            <select name="agama_mhs" id=" agama_mhs" class="form-control form-control-sm">
                                <?php foreach ($agm as $m) : ?>
                                    <option value="<?= $m['kd_agama']; ?>" <?= $m['kd_agama'] == $mhs['agama_mhs'] ? "selected" : ''; ?>><?= $m['nama_agama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat_mhs" class="col-sm-3 col-form-label col-form-label-sm">Alamat</label>
                        <div class="col-sm-7">
                            <textarea name="alamat_mhs" id="alamat_mhs" class="form-control form-control-sm" rows="3"><?= $mhs['alamat_mhs']; ?></textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="tLahir_mhs" class="col-sm-3 col-form-label col-form-label-sm">Tanggal Lahir</label>
                        <div class="col-sm-7">
                            <input type="date" value="<?= $mhs['tLahir_mhs']; ?>" class="form-control form-control-sm" name="tLahir_mhs" id="tLahir_mhs">
                        </div>
                    </div>

                </div>
            </div>
            <div class="form-group mt-5 d-flex justify-content-center">
                <a href="/mahasiswa" class="btn btn-sm btn-info mr-3">
                    Batal
                </a>
                <button type="submit" class="btn btn-sm btn-info">Ubah</button>
            </div>

        </form>
    </div>
</div>
<?= $this->endSection(); ?>