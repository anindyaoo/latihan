<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? '' ?></title>
    <?= $this->renderSection('style') ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title><?= $title ?? '' ?></title>
    <?= $this->renderSection('style') ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav">
                    <a class="nav-link <?= ($active_nav ?? '') == 'index' ? 'active' : '' ?>" aria-current="page"
                        href="<?= base_url('index'); ?>">Daftar Buku</a>
                    <a class="nav-link <?= ($active_nav ?? '') == 'tambah' ? 'active' : '' ?>"
                        href="<?= base_url('tambah'); ?>">Tambah Buku</a>
                    <a class="nav-link" href="/penulis/">Daftar Penulis</a>
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </div>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content') ?>

    <script>
        function previewImg() {

            const sampul = document.querySelector('#sampul');
            const sampulLabel = document.querySelector('.input-group-text');
            const imgPreview = document.querySelector('.img_preview');

            if (sampul.files.length > 0) {
                sampulLabel.textContent = sampul.files[0].name;

                const fileSampul = new FileReader();
                fileSampul.readAsDataURL(sampul.files[0]);

                fileSampul.onload = function (e) {
                    imgPreview.src = e.target.result;
                }
            }
        }
    </script>
</body>