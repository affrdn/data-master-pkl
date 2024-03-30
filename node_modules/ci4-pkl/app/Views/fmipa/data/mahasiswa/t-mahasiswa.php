<?= $this->extend('layout/template'); ?>

<?= $this->Section('content'); ?>

<div class="container col-md mt-3">
    <div class="container col-md">
        <div class="row">
            <h4>Tambah Data Mahasiswa</h4>
        </div>
    </div>


    <div class="container col-md my-1 pt-3 border">
        <form action="/data/mahasiswa/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col col-md-6">
                    <div class="form-group row">
                        <label for="npm_mhs" class="col-sm-3 col-form-label col-form-label-sm">NPM</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm <?= ($validation->hasError('npm_mhs')) ? 'is-invalid' : ''; ?>" name="npm_mhs" id="npm_mhs" autofocus value="<?= old('npm_mhs'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('npm_mhs'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_mhs" class="col-sm-3 col-form-label col-form-label-sm">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm text-capitalize" name="nama_mhs" id="nama_mhs" value="<?= old('nama_mhs'); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jk_mhs" class="col-sm-3 col-form-label col-form-label-sm ">Jenis Kelamin</label>
                        <div class="col-sm-5">
                            <select name="jk_mhs" id="jk_mhs" class="form-control form-control-sm">
                                <option value="">Pilih</option>
                                <?php foreach ($jk as $k) : ?>
                                    <option value="<?= $k['kd_gender']; ?>"><?= $k['jenis_gender']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tahmas_mhs" class="col-sm-3 col-form-label col-form-label-sm">Tahun masuk</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm" name="tahmas_mhs" id="tahmas_mhs" value="<?= old('tahmas_mhs'); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="agama_mhs" class="col-sm-3 col-form-label col-form-label-sm">Agama</label>
                        <div class="col-sm-7">
                            <select name="agama_mhs" id=" agama_mhs" class="form-control form-control-sm">
                                <option value="">Pilih</option>
                                <?php foreach ($agm as $a) : ?>
                                    <option value="<?= $a['kd_agama']; ?>"><?= $a['nama_agama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat_mhs" class="col-sm-3 col-form-label col-form-label-sm">Alamat</label>
                        <div class="col-sm-7">
                            <textarea name="alamat_mhs" id="alamat_mhs" <?= old('alamat_mhs'); ?> class="form-control form-control-sm" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jurusan_mhs" class="col-sm-3 col-form-label col-form-label-sm ">Jurusan</label>
                        <div class="col-sm-5">
                            <select name="jurusan_mhs" id="jurusan_mhs" class="form-control form-control-sm">
                                <option value="">Pilih</option>
                                <?php foreach ($jrs as $j) : ?>
                                    <option value="<?= $j['kd_jurusan']; ?>"><?= $j['nama_jurusan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="col col-md-6">
                    <div class="form-group row">
                        <label for="prodi_mhs" class="col-sm-3 col-form-label col-form-label-sm">Program Studi</label>
                        <div class="col-sm-7">
                            <select name="prodi_mhs" class="form-control form-control-sm ">
                                <option value="">Pilih</option>
                                <?php foreach ($prd as $p) : ?>
                                    <option value="<?= $p['kd_prodi']; ?>"><?= $p['nama_prodi']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label for="tLahir_mhs" class="col-sm-3 col-form-label col-form-label-sm">Tanggal Lahir</label>
                        <div class="col-sm-7">
                            <input type="date" class="form-control form-control-sm" name="tLahir_mhs" id="tLahir_mhs" <?= old('tLahir_mhs'); ?>>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="foto_mhs" class="col-sm-3 col-form-label col-form-label-sm">Foto</label>
                        <div class="col-sm-3">
                            <img src="/img/" class="img-thumbnail img-preview-mhs">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kosong" class="col-sm-3 col-form-label col-form-label-sm"></label>
                        <div class="col-sm-7 ml-3 custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('foto_mhs')) ? 'is-invalid' : ''; ?>" id="foto_mhs" name="foto_mhs" onchange="previewImgMhs()">
                            <label for="foto_mhs" class="col-sm-11 custom-file-label custom-file-label-mhs">Pilih Foto...</label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('foto_mhs'); ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="form-group mt-5 d-flex justify-content-center">
                <a href="/mahasiswa" class="btn btn-sm btn-info mr-3">
                    Batal
                </a>
                <button type="submit" class="btn btn-sm btn-info">Tambah</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>