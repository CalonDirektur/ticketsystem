<section class="content-header">

</section>

<!-- Main content -->
<section class="content">
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3>Daftar Akun User Cabang</h3>
                    </div>
                    <form method="post" action="<?= base_url('Auth/process_daftar') ?>" autocomplete="off">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nik">Nomor Induk Karyawan</label>
                                <small></small>
                                <?= form_error('nik') ?>
                                <input name="nik" type="number" class="form-control" id="nik" value="<?= set_value('nik') ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <?= form_error('name') ?>
                                <input name="name" type="text" class="form-control" id="name" value="<?= set_value('name') ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <?= form_error('email') ?>
                                <input name="email" type="email" class="form-control" id="email" value="<?= set_value('email') ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <?= form_error('password') ?>
                                <input name="password" type="password" class="form-control" id="password">
                            </div>
                            <div class="form-group">
                                <label for="passconf">Password Confirmation</label>
                                <?= form_error('passconf') ?>
                                <input name="passconf" type="password" class="form-control" id="passwordconf">
                            </div>
                            <div class="form-group">
                                <label for="id_cabang">Cabang</label>
                                <?= form_error('id_cabang') ?>
                                <select name="id_cabang" id="id_cabang" class="form-control">
                                    <option disabled selected value="">- Pilih Cabang -</option>
                                    <?php
                                    foreach ($pertanyaan as $p) {
                                        ?>
                                        <option <?= $p->id_cabang == 46 ? 'disabled' : '' ?> value="<?= $p->id_cabang ?>"><?= $p->nama_cabang ?></option>
                                    <?php }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>