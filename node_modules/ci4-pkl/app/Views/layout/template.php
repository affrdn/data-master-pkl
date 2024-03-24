<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!-- Data Table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <title><?= $title; ?></title>

</head>

<body class="d-flex flex-column">
    <?php
    $uri = service('uri');
    ?>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header d-flex justify-content-center">
                <img src="/Logo_UnivLampung.png" class="img-fluid " style="width: 80px;" loading="lazy">
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="/">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <?php if (session()->get('isLoggedIn')) : ?>
                        <a href="#listdata" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                            </svg>
                            Data
                        </a>
                    <?php endif; ?>
                    <ul class="collapse list-unstyled" id="listdata">
                        <li>
                            <a href="/dosen">Dosen</a>
                        </li>
                        <li>
                            <a href="/tendik">Tenaga Pendidik</a>
                        </li>
                        <li>
                            <a href="/mahasiswa">Mahasiswa</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#listjurusan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Jurusan</a>
                    <ul class="collapse list-unstyled" id="listjurusan">
                        <li>
                            <a href="/biologi">Biologi</a>
                        </li>
                        <li>
                            <a href="/kimia">Kimia</a>
                        </li>
                        <li>
                            <a href="/matematika">Matematika</a>
                        </li>
                        <li>
                            <a href="/fisika">Fisika</a>
                        </li>
                        <li>
                            <a href="/ilmu-komputer">Ilmu Komputer</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Laboratorium</a>
                </li>
                <li>
                    <a href="#">Gedung</a>
                </li>
                <li>
                    <a href="#">Jabatan Struktural</a>
                </li>
                <li>
                    <a href="#">Tugas Tambahan</a>
                </li>
                <li>
                    <a href="#">Pejabat Struktural</a>
                </li>
                <li>
                    <a href="#">Dosen Tugas Tambahan</a>
                </li>
                <?php if (session()->get('isLoggedIn')) : ?>
                    <li>
                        <a onclick="return confirm('Anda yakin ingin keluar?')" href="/logout" class="btn-sm">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-power" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.578 4.437a5 5 0 1 0 4.922.044l.5-.866a6 6 0 1 1-5.908-.053l.486.875z" />
                                <path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z" />
                            </svg>
                            Keluar
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- Page Content -->
        <div id="content">
            <nav class="navbar navbar-toggler-xl navbar-light mx-auto bg-light sticky-top">
                <div class="container-responsive">
                    <div class="row">
                        <div class="col-12 d-flex ">
                            <button type="button" id="sidebarCollapse" class="btn border-0">
                                <i class="fas fa-align-left"></i>
                            </button>
                            <a href="/" class="hidden-xs inline logo ml-3 justify-content-start">
                                <h4>FMIPA UNILA</h4>
                                <span>Fakultas Matematika dan Ilmu Pengetahuan Alam</span>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>

            <?= $this->renderSection('content'); ?>
            <!-- <div class="mb-auto absolute-bottom"> -->
            <footer class="bg-dark text-white-50 py-1 my-1 mt-5 text-center position-sticky">
                <small> &copy; 2020 Copyright: Afif Ramadhan</small>
            </footer>
            <!-- </div> -->
        </div>
    </div>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Data Table -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });

            // $('#DataMhs').DataTable();
            // $('#mhsilkom').DataTable();


        });
    </script>

    <script>
        function previewImgMhs() {
            const foto_mhs = document.querySelector('#foto_mhs');
            const foto_mhs_label = document.querySelector('.custom-file-label-mhs');
            const imgPreviewMhs = document.querySelector('.img-preview-mhs');

            foto_mhs_label.textContent = foto_mhs.files[0].name;

            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto_mhs.files[0]);

            fileFoto.onload = function(e) {
                imgPreviewMhs.src = e.target.result;
            }

        }

        function previewImgDosen() {
            const foto_dosen = document.querySelector('#foto_dosen');
            const foto_dosen_label = document.querySelector('.custom-file-label-dosen');
            const imgPreviewDosen = document.querySelector('.img-preview-dosen');

            foto_dosen_label.textContent = foto_dosen.files[0].name;

            const fileFotoDosen = new FileReader();
            fileFotoDosen.readAsDataURL(foto_dosen.files[0]);

            fileFotoDosen.onload = function(e) {
                imgPreviewDosen.src = e.target.result;
            }
        }
    </script>

</body>

</html>