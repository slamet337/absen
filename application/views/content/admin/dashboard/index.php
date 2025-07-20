<div class="row">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Mahasiswa</p>
                            <h1 class="font-weight-bolder">
                                <?= $mhs; ?>
                            </h1>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow-danger text-center rounded-circle">
                            <i class="ni ni-single-02 text-white text-sm opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Kegiatan</p>
                            <h1 class="font-weight-bolder">
                                10
                                </h3>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-danger shadow-success text-center rounded-circle">
                            <i class="ni ni-collection text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4  col-sm-6">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Registrasi</p>
                            <h1 class="font-weight-bolder">
                                <?= $registed; ?>
                            </h1>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow-warning text-center rounded-circle">
                            <i class="ni ni-ruler-pencil text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $role = $this->session->userdata('role');
if ($role == '2'|| $role == 'mahasiswa'){ ?>
<div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 mb-3 bg-transparent">
                <div class="row">
                    <div class="col-lg-9">
                        <h3 class="text-capitalize">Kemahasiswaan</h3>
                        <p>Aplikasi Absensi Kemahasiswaan adalah perangkat lunak yang digunakan untuk mencatat kehadiran
                            atau ketidakhadiran seseorang dalam suatu kegiatan, seperti kelas, pertemuan, atau acara.
                            Aplikasi ini dirancang dengan tujuan utama untuk memberikan wadah yang efisien dan efektif
                            bagi mahasiswa dalam mengakses informasi terkini mengenai lomba-lomba yang akan diadakan
                            dalam waktu dekat</p>
                    </div>
                    <div class="col-lg-3">
                        <img src="<?= base_url() ?>/assets/img/logo.png" width="100%" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 mb-3 bg-transparent">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table caption-top table-hover table-responsive" id="kelas">
                            <!-- <caption>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalDownloadAll">Download ID Card </button>
                            </caption> -->
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Ruangan</td>
                                    <td>Jumlah Peserta</td>
                                    <td>Hari ke 1</td>
                                    <td>Hari ke 2</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($kelas as $k) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $k->kode_kelas ?></td>
                                    <td><?= $k->total ?></td>
                                    <td><?= $k->status ?></td>
                                    <td><?= $k->status2 ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <script>
    $(document).ready(function() {
        $('#kelas').DataTable();
    });
    </script>