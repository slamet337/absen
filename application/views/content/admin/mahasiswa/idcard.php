<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
    @media print {
        .card-footer {
            background-color: red !important;
            color: #fff;
        }

        .page-break {
            page-break-before: always;
        }
    }
</style>
<?php foreach ($mhs as $mahasiswa) { ?>
    <div class="card align-center mb-3" style="max-width: 30rem;">
        <div class="card-body">
            <div class="text-center mt-2 mb-2">
                <img src="<?= base_url('assets/img/logo.png') ?>" width="30%">
            </div>
            <h4 class="card-title text-center">PESERTA</h4>
            <h4 class="card-title text-center mb-2">BELA NEGARA</h4>
            <div class="row">
                <div class="col">Nama</div>
                <div class="col">: <?= $mahasiswa['nama'] ?></div>
            </div>
            <div class="row">
                <div class="col">NIM</div>
                <div class="col">: <?= $mahasiswa['nim'] ?></div>
            </div>
            <div class="row">
                <div class="col">Prodi</div>
                <div class="col">: <?= $mahasiswa['prodi'] ?></div>
            </div>
            <div class="row">
                <div class="col">Fakultas</div>
                <div class="col">: <?= $mahasiswa['fakultas'] ?></div>
            </div>
            <div class="text-center">
                <img src="<?= $mahasiswa['qrcode'] ?>" style="max-width: 10rem;" alt="QR Code">
            </div>
        </div>
        <div class="card-footer text-center bg-info">
            <h6>KEMAHASISWAAN</h6>
            <h5>UNIVERSITAS TADULAKO</h5>
        </div>
    </div>
    <div class="page-break"></div>
<?php } ?>

<script>
    // Fungsi untuk mencetak otomatis saat halaman dimuat
    window.onload = function() {
        window.print();
    };
</script>
