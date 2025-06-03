<?= $this->section('style') ?>
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
<?= $this->endSection() ?>
<?= $this->extend('layout/layout'); ?>

<?php $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Buku</h2>
            <!-- validasi -->
            <?php if (isset($validation)): ?>
            <?php endif; ?>

            <form action="/simpan" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="judul"
                            class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul"
                            name="judul" autofocus value="<?= old('judul'); ?>">
                    </div>
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="penulis" class="form-control" id="penulis" name="penulis"
                            value="<?= old('penulis'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penberit" class="col-sm-2 col-form-label">Penberit</label>
                    <div class="col-sm-10">
                        <input type="penerbit" class="form-control" id="penberit" name="penerbit">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-10">
                        <input type="sampul" class="form-control" id="sampul" name="sampul">
                    </div>
                </div>

                <button type="sumbit" class="btn btn-primary">Tambah Data</button>
            </form>

        </div>
    </div>
</div>
<?php $this->endSection(); ?>