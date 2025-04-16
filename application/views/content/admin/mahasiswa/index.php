<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table caption-top table-hover table-responsive" id="mahasiswa">
                    <caption>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalDownloadAll">Download ID Card </button>
                    </caption>
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>NIM</td>
                            <td>Nama</td>
                            <td>Program Studi</td>
                            <td>Fakultas</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($mhs as $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->nim ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->prodi ?></td>
                                <td><?= $value->fakultas ?></td>
                                <td>
                                    <!-- <button class="btn btn-success btn-sm" data-bs-toggle="modal" onclick="updatepenyakit('<?= $value->nim ?>')" data-bs-target="#modaledit">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button> -->
                                    <a href="<?= base_url('mahasiswa/loadViewIDCard/getByNim/') . $value->nim ?> " class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download ID Card">
                                        <i class="fa fa-download"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>

<!-- Modal Download All -->
<div class="modal fade" id="modalDownloadAll" tabindex="-1" role="dialog" aria-labelledby="modalDownloadAll" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDownloadAll">Download ID Card per Program Study</h5>
            </div>
            <form action="<?= base_url('mahasiswa') ?>/loadViewIDCard/getAll" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <select class="form-select" id="prodi" name="prodi" aria-label="Default select example">
                                <option value="">Pilih Program Study</option>
                                <?php foreach ($prodi as $value) { ?>
                                    <option value="<?= $value->prodi; ?>"><?= $value->prodi ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<script>
    $(document).ready(function() {
        $('#mahasiswa').DataTable();
    });
</script>