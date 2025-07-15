<section class="section">
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
            <form action="<?= base_url('registrasi') ?>/regist" method="POST">
                <?php if ($this->session->userdata('role') == '2'):?>
                <div class="form-group">
                    <!-- <label for="nim">N I M</label> -->
                    <input type="text" class="form-control" name="nim" id="nim" placeholder="N I M">
                </div>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-search" aria-hidden="true"></i>
                    Cari</button>
                <?php elseif ($this->session->userdata('role') == 'mahasiswa'): ?>
                <div class="form-group">
                    <input type="text" class="form-control" name="nim" id="nim"
                        value="<?= $this->session->userdata('nim') ?>" readonly>
                </div>
                <p>Silahkan Klik Tombol Untuk melakukan Registrasi</p>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-search" aria-hidden="true"></i>
                    Registrasi</button>
                <?php endif; ?>
            </form>
            <!-- <hr>
            <a href="<?= base_url('mahasiswa/loadMhsRegist') ?>" class="btn btn-primary"> Tampilkan Mahasiswa
                Registed</a> -->
        </div>
    </div>

</section>