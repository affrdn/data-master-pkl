<?= $this->extend('layout/template'); ?>

<?= $this->Section('content'); ?>

<div class="container-fluid mt-4 ">
    <form class="action" method="post" action="/admin">
        <div class="row">
            <div class="col-md ">
                <img src="fakultas.jpg" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-md-4 text-center align-self-center">
                <div class="container col-md">
                    <h2>Silahkan Masuk</h2>
                    <hr>
                    <?php if (session()->get('success')) : ?>
                        <div class=" alert alert-success" role="alert">
                            <?= session()->get('success') ?>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>" placeholder="Hanya admin">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" value="" placeholder="Masukan Password ">
                    </div>
                    <?php if (isset($validation)) : ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-12 col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary"> Masuk Aplikasi ></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>