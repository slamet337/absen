<form action="<?= base_url('mahasiswa/uploadBerkas') ?>" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Profil Mahasiswa</h4>
            <div class="row">
                <div class="col-md-2">Nama</div>
                <div class="col-md-10">: <?= $mahasiswa['nama'] ?></div>
            </div>
            <div class="row">
                <div class="col-md-2">NIM</div>
                <div class="col-md-10">: <?= $mahasiswa['nim'] ?></div>
            </div>
            <div class="row">
                <div class="col-md-2">Prodi</div>
                <div class="col-md-10">: <?= $mahasiswa['prodi'] ?></div>
            </div>
            <div class="row">
                <div class="col-md-2">Fakultas</div>
                <div class="col-md-10">: <?php 
                    if ($mahasiswa['fakultas'] == 'A') {
                        echo 'Fakultas Kejuruan dan Ilmu Pendidikan';
                    } elseif ($mahasiswa['fakultas'] == 'B') {
                        echo 'Fakultas Ilmu Sosial dan Ilmu Politik';
                    } elseif ($mahasiswa['fakultas'] == 'C') {
                        echo 'Fakultas Ekonomi dan Bisnis';
                    } elseif ($mahasiswa['fakultas'] == 'D') {
                        echo 'Fakultas Hukum';
                    } elseif ($mahasiswa['fakultas'] == 'E') {
                        echo 'Fakultas Pertanian';
                    } elseif ($mahasiswa['fakultas'] == 'F') {
                        echo 'Fakultas Teknik';
                    } elseif ($mahasiswa['fakultas'] == 'G') {
                        echo 'Fakultas Matematika dan Ilmu Pengetahuan Alam';
                    } elseif ($mahasiswa['fakultas'] == 'L') {
                        echo 'Fakultas Kehutanan';
                    } elseif ($mahasiswa['fakultas'] == 'N') {
                        echo 'Fakultas Kedokteran';
                    } elseif ($mahasiswa['fakultas'] == 'O') {
                        echo 'Fakultas Peternakan dan Perikanan';
                    } elseif ($mahasiswa['fakultas'] == 'P') {
                        echo 'Fakultas Kesehatan Masyarakat';
                    } else {
                        echo 'Tidak Diketahui';
                    } ?>
                </div>
            </div>
            <h5 class="mt-3">Upload Surat Pernyataannya</h5>
            <div class="form-group">
                <label for="file_gambar">Silahkan Upload Surat Pernyataannya Anda (.PDF)</label>
                <input type="file" name="file_pdf" accept="sp/*" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Upload</button>
            <p>Setelah Upload File Anda dapat melakukan Cetak Id Card dan mendapatkan link Zoom</p>
        </div>
        <!-- <hr> -->
        <?php if (!empty($mahasiswa['file_pdf'])):?>
        <div class="card-footer">
            <a href="<?= base_url('mahasiswa/loadViewIDCard/getByNim/' . $this->session->userdata('nim')) ?>"
                class="btn btn-primary mt-3" target="_blank">
                🎫 Cetak ID Card
            </a>

            <a href="https://<?= $mahasiswa['link'] ?>" target="_blank" class="btn btn-secondary mt-3"
                rel="noopener noreferrer">
                link ZOOM</a>
        </div>
        <?php else:?>
        <div class="card-footer">
            <p class="text-danger">Anda belum mengupload surat pernyataan. Silakan upload terlebih dahulu.</p>
        </div>
        <?php endif; ?>
    </div>
</form>

<?php if (!empty($mahasiswa['foto'])): ?>
<div class="mt-3">
    <h6>Foto Saat Ini:</h6>
    <img src="<?= base_url('uploads/gambar/' . $mahasiswa['foto']) ?>" alt="Foto Mahasiswa" width="200"
        class="img-thumbnail">
</div>
<?php endif; ?>

<?php if (!empty($mahasiswa['file_pdf'])): ?>
<a href="<?= base_url('uploads/pdf/' . $mahasiswa['file_pdf']) ?>" target="_blank" class="btn btn-info mt-3">
    📄 Lihat PDF Terupload
</a>
<?php endif; ?>

<!-- <form action="<?= base_url('mahasiswa/uploadBerkas') ?>" method="post" enctype="multipart/form-data">
    <div class="card-footer">
        <h5>Upload Foto & PDF</h5>
        <div class="form-group">
            <label for="file_gambar">Upload Foto (jpg/png/jpeg)</label>
            <input type="file" name="file_gambar" accept="image/*" class="form-control">
        </div>
        <div class="form-group mt-2">
            <label for="file_pdf">Upload PDF</label>
            <input type="file" name="file_pdf" accept=".pdf" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Upload</button>
    </div>
</form> -->