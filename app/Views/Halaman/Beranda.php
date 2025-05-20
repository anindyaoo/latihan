<?= $this->extend('layout/layout.php') ?>


<?= $this->section('content') ?>
<!-- Landing Page -->
<section class="landing">
    <img src="https://source.unsplash.com/800x400/?flowers,floral" alt="Bunga Estetik" />
    <p class="tagline">"Pesan berbagai jenis rangkaian bunga eksklusif lalu pesan di toko kami"</p>
</section>

<!-- Menu Toko Bunga -->
<section class="menu-section">
    <h2>Menu Toko Bunga</h2>
    <div class="menu-grid">
        <div class="menu-item">
            <h3>Buket Romantis</h3>
            <p>Buket mawar merah untuk pasangan tercinta.</p>
        </div>
        <div class="menu-item">
            <h3>Rangkaian Ulang Tahun</h3>
            <p>Bunga ceria dan balon untuk hari spesial.</p>
        </div>
        <div class="menu-item">
            <cdh3>Karangan Duka</h3>
                <p>Rangkaian bunga untuk mengungkapkan belasungkawa.</p>
        </div>
        <div class="menu-item">
            <h3>Hiasan Meja</h3>
            <p>Bunga segar untuk mempercantik ruangan.</p>
        </div>
    </div>
</section>



<?= $this->endSection() ?>