<?= $this->Section('data'); ?>

<div class="container-fluid mt-4">
    <div class="row mb-2">
        <img src="jur-kom.jpg" class="img-fluid mb-3 mx-auto" height="auto">
        <p class="font-italic text-justify">
            Jurusan Ilmu Komputer FMIPA Unila berawal dari pembentukan Program Studi S1 Ilmu Komputer yang berada di bawah Jurusan Matematika. Beberapa dosen Jurusan Matematika merintis Program Studi S1 Ilmu Komputer, hasilnya program studi ini dibuka pada tahun 2005 melalui SK Dirjen DIKTI No 1845/D/T/2005 tanggal 3 Juni 2005. Mahasiswa angkatan tahun 2005 merupakan angkatan pertama dari Ilmu Komputer. Kemudian berdasarkan SK Rektor No 07/UN26/DT/2011 tanggal 30 Desember 2011 maka berdirilah Jurusan Ilmu Komputer di bawah FMIPA Unila.
        </p>
        <div class="font-weight-bold mx-auto ml-auto text-center">
            <div class="my-4 border-left border-right font-weight-lighter font-italic">
                <h3 class="text-muted">
                    Pada tahun 2025 menjadi Program Studi Ilmu Komputer yang unggul dalam Pendidikan dan Penelitian Bidang Komputer dan Informatika, serta berprestasi di tingkat Nasional dan Internasional.
                </h3>
                <p class="mt-3">
                    Visi Jurusan Ilmu Komputer
                </p>
            </div>
            <p class="font-weight-normal text-justify pt-2">
                Jurusan Ilmu Komputer selain berfokus dalam membentuk mahasiswa yang menguasai teknologi komputer dan informasi, juga berfokus pada pembentukan karakter mahasiswa karena hal ini sangatlah penting.
            </p>
        </div>
    </div>

    <div class="row mb-2">
        <ul class="list-inline">
            <li>
                <h4>Jurusan Ilmu Komputer telah tersertifikasi ISO 9001:2008</h4>
            </li>
            <li>
                <p class="text-justify">
                    Dalam proses kegiatan belajar mengajar Jurusan Ilmu Komputer dilengkapi dengan fasilitas laboratorium yaitu Laboratorium Komputasi Dasar dan Laboratorium Rekayasa Perangkat Lunak (RPL).
                </p>
            </li>
        </ul>
    </div>

    <div class="row mb-2">
        <ul class="list-inline">
            <li>
                <h4>Program Studi</h4>
                <ul>
                    <li>D3 Manajemen Informatika</li>
                    <li>S1 Ilmu Komputer</li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="row">
        <h3>Informasi Jurusan</h3>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <?php foreach ($kajur as $k) : ?>
                            <td width="30%">Ketua Jurusan</td>
                            <td width="70%">
                                <b><?= $k['nama_dosen']; ?></b> <br>
                                NIP. <?= $k['nip_dosen']; ?> <br>
                                NIDN. <?= $k['nidn_dosen']; ?> <br>
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                                </svg> <?= $k['email_dosen']; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <?php foreach ($sekjur as $s) : ?>
                            <td width="30%">Sekretaris Jurusan</td>
                            <td width="70%">
                                <b><?= $s['nama_dosen']; ?></b> <br>
                                NIP. <?= $s['nip_dosen']; ?> <br>
                                NIDN. <?= $s['nidn_dosen']; ?> <br>
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                                </svg> <?= $s['email_dosen']; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <?php foreach ($sekret as $s) : ?>
                            <td>Sekretariat</td>
                            <td>
                                <?= $s['nama_sekret']; ?> <br>
                                <a href="https://goo.gl/maps/4Nr5n7XWEoWZBT2V6" target="blank">
                                    <?= $s['alamat_sekret']; ?>
                                </a><br>
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z" />
                                </svg> <?= $s['noTelp_sekret']; ?> <br>
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                                </svg> <?= $s['email_sekret']; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>

                    <tr>
                        <?php foreach ($kaprod as $k) : ?>
                            <td>Ka. PS D3 Manajemen Informatika</td>
                            <td>
                                <b><?= $k['nama_dosen']; ?> </b> <br>
                                NIP. <?= $k['nip_dosen']; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>

                    <tr>
                        <?php foreach ($kakd as $ka) : ?>
                            <td>Ka. Lab. Komputasi Dasar</td>
                            <td>
                                <b><?= $ka['nama_dosen']; ?></b> <br>
                                NIP. <?= $ka['nip_dosen']; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>

                    <tr>
                        <?php foreach ($karpl as $rp) : ?>
                            <td>Ka. Lab. Rekayasa Perangkat Lunak </td>
                            <td>
                                <b><?= $rp['nama_dosen']; ?> </b> <br>
                                NIP. <?= $rp['nip_dosen']; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>

                    <tr>
                        <td>Alamat Website</td>
                        <td>
                            <img class="d-flex mb-2" src="https://api.qrserver.com/v1/create-qr-code/?data=http%3A%2F%2Filkom.unila.ac.id%2F&amp;size=115x115&amp;format=png&amp;margin=0&amp;color=28-58-176&amp;bgcolor=255-255-255">
                            <a href="http://ilkom.unila.ac.id" target="blank">
                                <b> http://ilkom.unila.ac.id </b>
                            </a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>