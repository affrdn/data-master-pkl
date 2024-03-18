    <?= $this->extend('layout/template'); ?>

    <?= $this->Section('content'); ?>


    <div class="container col-md mt-3">
        <div class="container col-md">
            <div class="row">
                <h4>Ubah Data Mahasiswa</h4>
            </div>
        </div>

        <div class="container col-md my-4 pt-3 border">
            <form action="/data/dosen/update/<?= $dosen['nip_dosen']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="fotoLama" value="<?= $dosen['foto_dosen']; ?>">
                <div class="row">
                    <div class="form-group row">
                        <div class="col-sm-2 ml-3">
                            <img src="/img/<?= $dosen['foto_dosen']; ?>" class="img-fluid img-preview">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-6">
                        <div class="form-group row">
                            <label for="nip_dosen" class="col-sm-4 col-form-label col-form-label-sm">NIP</label>
                            <div class="col-sm-7">
                                <input type="text" value="<?= $dosen['nip_dosen']; ?>" class="form-control form-control-sm" name="nip_dosen" id="nip_dosen" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nip_dosen" class="col-sm-4 col-form-label col-form-label-sm">NIDN</label>
                            <div class="col-sm-7">
                                <input type="text" value="<?= $dosen['nidn_dosen']; ?>" class="form-control form-control-sm" name="nidn_dosen" id="nidn_dosen" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_dosen" class="col-sm-4 col-form-label col-form-label-sm">Nama</label>
                            <div class="col-sm-7">
                                <input type="text" value="<?= $dosen['nama_dosen']; ?>" class="form-control form-control-sm text-capitalize" name="nama_dosen" id="nama_dosen" autofocus>
                            </div>
                        </div>

                        <div class=" form-group row">
                            <label for="kd_jabatan" class="col-sm-4 col-form-label col-form-label-sm ">Jabatan Struktural</label>
                            <div class="col-sm-5">
                                <select name="kd_jabatan" id="kd_jabatan" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                    <?php foreach ($jab as $j) : ?>
                                        <option value="<?= $j['kd_jabatan']; ?>" <?= $j['kd_jabatan'] == $dosen['kd_jabatan'] ? "selected" : ''; ?>><?= $j['nama_jabatan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pangkat_dosen" class="col-sm-4 col-form-label col-form-label-sm ">Pangkat</label>
                            <div class="col-sm-6 d-flex">
                                <select name="pangkat_dosen" id="pangkat_dosen" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                    <?php foreach ($pk as $p) : ?>
                                        <option value="<?= $p['kd_pangkat']; ?>" <?= $p['kd_pangkat'] == $dosen['pangkat_dosen'] ? "selected" : ''; ?>><?= $p['nama_pangkat']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gol_dosen" class="col-sm-4 col-form-label col-form-label-sm ">Golongan</label>
                            <div class="col-sm-3">
                                <select name="gol_dosen" id="gol_dosen" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                    <?php foreach ($gol as $g) : ?>
                                        <option value="<?= $g['kd_golongan']; ?>" <?= $g['kd_golongan'] == $dosen['gol_dosen'] ? "selected" : ''; ?>><?= $g['nama_golongan']; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class=" form-group row">
                            <label for="jabatan_fung" class="col-sm-4 col-form-label col-form-label-sm ">Jabatan Fungsional</label>
                            <div class="col-sm-5">
                                <select name="jabatan_fung" id="jabatan_fung" class="form-control form-control-sm">
                                    <option value="">Pilih</option>
                                    <?php foreach ($jabFung as $j) : ?>
                                        <option value="<?= $j['kd_jab_fung']; ?>" <?= $j['kd_jab_fung'] == $dosen['jabatan_fung'] ? "selected" : ''; ?>><?= $j['nama_jab_fung']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email_dosen" class="col-sm-4 col-form-label col-form-label-sm">Email</label>
                            <div class="col-sm-7">
                                <input type="text" value="<?= $dosen['email_dosen']; ?>" class="form-control form-control-sm" name="email_dosen" id="email_dosen">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jurusan_dosen" class="col-sm-4 col-form-label col-form-label-sm ">Jurusan</label>
                            <div class="col-sm-5">
                                <select name="jurusan_dosen" id="jurusan_dosen" class="form-control form-control-sm">
                                    <?php foreach ($jrs as $m) : ?>
                                        <option value="<?= $m['kd_jurusan']; ?>" <?= $m['kd_jurusan'] == $dosen['jurusan_dosen'] ? "selected" : ''; ?>><?= $m['nama_jurusan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tugas_tambahan" class="col-sm-4 col-form-label col-form-label-sm">Tugas Tambahan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form-control-sm" name="tugas_tambahan" id="tugas_tambahan" value="<?= $dosen['tugas_tambahan']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profil_dosen" class="col-sm-4 col-form-label col-form-label-sm">Profil Singkat</label>
                            <div class="col-sm-7">
                                <textarea name="profil_dosen" maxlength="255" id="profil_dosen" class="form-control form-control-sm <?= ($validation->hasError('profil_dosen')) ? 'is-invalid' : ''; ?>" rows="6"><?= $dosen['profil_dosen']; ?></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="col col-md-6">

                        <div class="form-group row ml-auto">
                            <label for="jk_dosen" class="col-sm-4 col-form-label col-form-label-sm ">Jenis Kelamin</label>
                            <div class="col-sm-5">
                                <select name="jk_dosen" id="jk_dosen" class="form-control form-control-sm">
                                    <?php foreach ($jk as $m) : ?>
                                        <option value="<?= $m['kd_gender']; ?>" <?= $m['kd_gender'] == $dosen['jk_dosen'] ? "selected" : ''; ?>><?= $m['jenis_gender']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row ml-auto">
                            <label for="tahmas_dosen" class="col-sm-4 col-form-label col-form-label-sm" for="date">Tahun masuk</label>
                            <div class="col-sm-7">
                                <input type="text" value="<?= $dosen['tahmas_dosen']; ?>" class="form-control form-control-sm" name="tahmas_dosen" id="tahmas_dosen">
                            </div>
                        </div>

                        <div class="form-group row ml-auto">
                            <label for="agama_dosen" class="col-sm-4 col-form-label col-form-label-sm" for="date">Agama</label>
                            <div class="col-sm-7">
                                <select name="agama_dosen" id=" agama_dosen" class="form-control form-control-sm">
                                    <?php foreach ($agm as $m) : ?>
                                        <option value="<?= $m['kd_agama']; ?>" <?= $m['kd_agama'] == $dosen['agama_dosen'] ? "selected" : ''; ?>><?= $m['nama_agama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row ml-auto">
                            <label for="alamat_dosen" class="col-sm-4 col-form-label col-form-label-sm">Alamat</label>
                            <div class="col-sm-7">
                                <textarea name="alamat_dosen" id="alamat_dosen" class="form-control form-control-sm" rows="3"><?= $dosen['alamat_dosen']; ?></textarea>
                            </div>
                        </div>


                        <div class="form-group row ml-auto">
                            <label for="tLahir_dosen" class="col-sm-4 col-form-label col-form-label-sm">Tanggal Lahir</label>
                            <div class="col-sm-7">
                                <input type="date" value="<?= $dosen['tLahir_dosen']; ?>" class="form-control form-control-sm" name="tLahir_dosen" id="tLahir_dosen">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group mt-5 d-flex justify-content-center">
                    <a href="/dosen" class="btn btn-sm btn-info mr-3">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-sm btn-info">Ubah</button>
                </div>
            </form>
        </div>
    </div>
    <?= $this->endSection(); ?>