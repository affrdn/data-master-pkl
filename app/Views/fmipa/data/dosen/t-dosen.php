<?= $this->extend('layout/template'); ?>

<?= $this->Section('content'); ?>

<div class="container col-md">
    <div class="container col-md my-3">
        <div class="row">
            <h4>Tambah Data Dosen</h4>
        </div>

        <form action="/data/dosen/save" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row border my-2 py-3 mx-auto">
                <div class="col-6">
                    <div class="form-group row">
                        <label for="nip_dosen" class="col-sm-4 col-form-label col-form-label-sm">NIP</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm <?= ($validation->hasError('nip_dosen')) ? 'is-invalid' : ''; ?>" name="nip_dosen" id="nip_dosen" autofocus value="<?= old('nip_dosen'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nip_dosen'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nidn_dosen" class="col-sm-4 col-form-label col-form-label-sm">NIDN</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm" name="nidn_dosen" id="nidn_dosen" autofocus value="<?= old('nidn_dosen'); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_dosen" class="col-sm-4 col-form-label col-form-label-sm">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm text-capitalize" name="nama_dosen" id="nama_dosen" value="<?= old('nama_dosen'); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kd_jabatan" class="col-sm-4 col-form-label col-form-label-sm ">Jabatan Struktural</label>
                        <div class="col-sm-5">
                            <select name="kd_jabatan" id="kd_jabatan" class="form-control form-control-sm">
                                <option value="" selected disabled>Pilih</option>
                                <?php foreach ($jab as $j) : ?>
                                    <option value="<?= $j['kd_jabatan']; ?>"><?= $j['nama_jabatan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pangkat_dosen" class="col-sm-4 col-form-label col-form-label-sm ">Pangkat</label>
                        <div class="col-sm-6 d-flex">
                            <select name="pangkat_dosen" id="pangkat_dosen" class="form-control form-control-sm">
                                <option value="" selected disabled>Pilih</option>
                                <?php foreach ($pk as $p) : ?>
                                    <option value="<?= $p['kd_pangkat']; ?>"><?= $p['nama_pangkat']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="gol_dosen" class="col-sm-4 col-form-label col-form-label-sm ">Golongan</label>
                        <div class="col-sm-3">
                            <select name="gol_dosen" id="gol_dosen" class="form-control form-control-sm">
                                <option value="" selected disabled>Pilih</option>
                                <?php foreach ($gol as $g) : ?>
                                    <option value="<?= $g['kd_golongan']; ?>"><?= $g['nama_golongan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jabatan_fung" class="col-sm-4 col-form-label col-form-label-sm ">Jabatan Fungsional</label>
                        <div class="col-sm-5">
                            <select name="jabatan_fung" id="jabatan_fung" class="form-control form-control-sm">
                                <option value="" selected disabled>Pilih</option>
                                <?php foreach ($jabFung as $j) : ?>
                                    <option value="<?= $j['kd_jab_fung']; ?>"><?= $j['nama_jab_fung']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email_dosen" class="col-sm-4 col-form-label col-form-label-sm">Email</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm" name="email_dosen" id="email_dosen" autofocus value="<?= old('email_dosen'); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jurusan_dosen" class="col-sm-4 col-form-label col-form-label-sm ">Jurusan</label>
                        <div class="col-sm-5">
                            <select name="jurusan_dosen" id="jurusan_dosen" class="form-control form-control-sm">
                                <option value="" selected disabled>Pilih</option>
                                <?php foreach ($jrs as $j) : ?>
                                    <option value="<?= $j['kd_jurusan']; ?>"><?= $j['nama_jurusan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tugas_tambahan" class="col-sm-4 col-form-label col-form-label-sm">Tugas Tambahan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm" name="tugas_tambahan" id="tugas_tambahan" value="<?= old('tugas_tambahan'); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="profil_dosen" class="col-sm-4 col-form-label col-form-label-sm">Profil Singkat</label>
                        <div class="col-sm-7">
                            <textarea name="profil_dosen" maxlength="255" id="profil_dosen" class="form-control form-control-sm <?= ($validation->hasError('profil_dosen')) ? 'is-invalid' : ''; ?>" rows="6" aria-placeholder="true"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-6 mx-auto">

                    <div class="form-group row ml-auto">
                        <label for="jk_dosen" class="col-sm-4 col-form-label col-form-label-sm ">Jenis Kelamin</label>
                        <div class="col-sm-5">
                            <select name="jk_dosen" id="jk_dosen" class="form-control form-control-sm">
                                <option value="" selected disabled>Pilih</option>
                                <?php foreach ($jk as $k) : ?>
                                    <option value="<?= $k['kd_gender']; ?>"><?= $k['jenis_gender']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row ml-auto">
                        <label for="tahmas_dosen" class="col-sm-4 col-form-label col-form-label-sm">Tahun masuk</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form-control-sm" name="tahmas_dosen" id="tahmas_dosen" value="<?= old('tahmas_dosen'); ?>">
                        </div>
                    </div>

                    <div class="form-group row ml-auto">
                        <label for="agama_dosen" class="col-sm-4 col-form-label col-form-label-sm">Agama</label>
                        <div class="col-sm-7">
                            <select name="agama_dosen" id="agama_dosen" class="form-control form-control-sm">
                                <option value="" selected disabled>Pilih</option>
                                <?php foreach ($agm as $a) : ?>
                                    <option value="<?= $a['kd_agama']; ?>"><?= $a['nama_agama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row ml-auto">
                        <label for="alamat_dosen" class="col-sm-4 col-form-label col-form-label-sm">Alamat</label>
                        <div class="col-sm-7">
                            <textarea name="alamat_dosen" id="alamat_dosen" class="form-control form-control-sm" rows="3"></textarea>
                        </div>
                    </div>

                    <div class=" form-group row ml-auto">
                        <label for="tLahir_dosen" class="col-sm-4 col-form-label col-form-label-sm">Tanggal Lahir</label>
                        <div class="col-sm-7">
                            <input type="date" class="form-control form-control-sm" name="tLahir_dosen" id="tLahir_dosen" <?= old('tLahir_dosen'); ?>>
                        </div>
                    </div>

                    <div class="form-group row ml-auto">
                        <label for="foto_dosen" class="col-sm-4 col-form-label col-form-label-sm">Foto</label>
                        <div class="col-sm-3">
                            <img src="/img/default.jpg" class="img-thumbnail img-preview-dosen">
                        </div>
                    </div>
                    <div class="form-group row ml-auto">
                        <label for="kosong" class="col-sm-4 col-form-label col-form-label-sm"></label>
                        <div class="col-sm-7 ml-3 custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('foto_dosen')) ? 'is-invalid' : ''; ?>" id="foto_dosen" name="foto_dosen" onchange="previewImgDosen()">
                            <label for="foto_dosen" class="col-sm-11 custom-file-label custom-file-label-dosen">Pilih Foto...</label>
                            <div class="invalid-feedback">
                                <?= $validation->getError('foto_dosen'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row mt-5 mx-auto ">
                    <a href="/dosen" class="btn btn-sm btn-info mr-3">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-sm btn-info">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>