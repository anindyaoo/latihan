<?= $this->extend('layout/layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Buku</h2>
            <form action="/update/<?= $buku['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $buku['slug']; ?>">
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="judul"
                            class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul"
                            name="judul" autofocus value="<?= (old('judul')) ? old('judul') : $buku['judul'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="penulis"
                            class="form-control <?= ($validation->hasError('penulis')) ? 'is-invalid' : ''; ?>"
                            id="penulis" name="penulis" autofocus
                            value="<?= (old('penulis')) ? old('penulis') : $buku['penulis'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('penulis'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="penerbit"
                            class="form-control <?= ($validation->hasError('penerbit')) ? 'is-invalid' : ''; ?>"
                            id="penerbit" name="penerbit" autofocus
                            value="<?= (old('penerbit')) ? old('penerbit') : $buku['penerbit'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('penerbit'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="img/no-cover.png" class="img-thumbnail img_preview" alt="">
                    </div>

                    <div class="col-sm-8">
                        <div class="input group mb-3">
                            <input type="file"
                                class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>"
                                id="sampul" name="sampul" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                        </div>
                        <label for="sampul" class="input-group-text">Upload</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Ubah data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>