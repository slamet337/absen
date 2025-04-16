<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table caption-top table-hover table-responsive" id="mahasiswa">
                    <caption>
                        Data Mahasiswa Registed
                    </caption>
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>NIM</td>
                            <td>Nama</td>
                            <td>Program Studi</td>
                            <td>Fakultas</td>
                            <td>Status</td>
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
                                    <?php if($value->status == '1') {
                                        echo 'Registed';
                                    } else {
                                        echo 'Unregisted';
                                    } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <a href="<?= base_url('registrasi') ?>" type="button" class="btn btn-primary btn-sm">
            <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                 Kembali
            </a>
        </div>
    </div>

</section>