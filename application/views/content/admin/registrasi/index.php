<section class="section">
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
            <form action="<?= base_url('registrasi') ?>/regist" method="POST">
                <div class="form-group">
                    <!-- <label for="nim">N I M</label> -->
                    <input type="text" class="form-control" name="nim" id="nim" placeholder="N I M">
                </div>

                <button type="submit" class="btn btn-primary"> <i class="fa fa-search" aria-hidden="true"></i> Cari</button>
            </form>
            <hr>
            <a href="<?= base_url('mahasiswa/loadMhsRegist') ?>" class="btn btn-primary"> Tampilkan Mahasiswa Registed</a>
        </div>
    </div>

</section>