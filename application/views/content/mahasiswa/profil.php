<form action="<?= base_url('mahasiswa/uploadPdf') ?>" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <h4>Profil Mahasiswa</h4>
            <p><strong>Nama:</strong> <?= $mahasiswa['nama'] ?></p>
            <p><strong>NIM:</strong> <?= $mahasiswa['nim'] ?></p>
            <p><strong>Prodi:</strong> <?= $mahasiswa['prodi'] ?></p>
            <p><strong>Fakultas:</strong> <?= $mahasiswa['fakultas'] ?></p>

            <a href="<?= base_url('mahasiswa/loadViewIDCard/getByNim/' . $this->session->userdata('nim')) ?>"
                class="btn btn-primary mt-3" target="_blank">
                🎫 Cetak ID Card
            </a>
        </div>

        <div class="card-footer">
            <h5>Upload PDF ID Card</h5>
            <input type="file" name="file_pdf" accept=".pdf" required>
            <button type="submit" class="btn btn-success mt-2">Upload</button>
        </div>
    </div>
</form>

<?php if (!empty($mahasiswa['file_pdf'])): ?>
<a href="<?= base_url('uploads/pdf/' . $mahasiswa['file_pdf']) ?>" class="btn btn-info mt-2" target="_blank">
    📄 Lihat PDF Terupload
</a>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
<?php if ($this->session->flashdata('swetalert')): ?>
// Format swetalert: '`Title`, `Text`, `Icon`'
const swetalertData = "<?= $this->session->flashdata('swetalert') ?>";
const parts = swetalertData.split('`, `');
const title = parts[0].replace(/`/g, '');
const text = parts[1].replace(/`/g, '');
const icon = parts[2].replace(/`/g, '');

Swal.fire({
    title: title,
    text: text,
    icon: icon,
    confirmButtonText: 'OK'
});
<?php endif; ?>
</script>