<?= $this->extend('layout/layout'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <div class="row">
        <div class="col">
            <h1 class="mt-2">Daftar Penulis</h1>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan kata kunci"
                        aria-label="Recipent's username" name="keyword">
                    <button class="btn btn-outine-secondary" type="submit" name="submit">Search</button>
                </div>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (10 * ($pageSekarang - 1)) ?>
                    <?php foreach ($penulis as $p): ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $p['name']; ?></td>
                            <td><?= $p['address']; ?></td>
                            <td><a href="" class="btn btn-succes">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('penulis', 'penulis_pager'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>