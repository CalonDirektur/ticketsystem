<?= $this->session->flashdata('update_profile_success') ?>
<?= $this->session->flashdata('upload_error') ?>
<section class="content-header mt-4 text-center">
    <h4>Profile</h4>
    <p><?= date('d F, Y'); ?></p>
</section>

<section class="content">
    <div class="row">
        <div class="col-lg-2">

        </div>
        <div class="col-lg-8">

            <div class="card card-primary">
                <form method="post" action="<?= base_url('Auth/update_profil') ?>" autocomplete="off" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="user-image text-center">
                            <img class="rounded-circle" width="100" width="100" src="<?= $this->fungsi->user_login()->foto != NULL ? base_url('uploads/foto_profil/' . $this->fungsi->user_login()->foto) : base_url('assets2/img/profile-pic.jpg') ?>">
                            <div class="form-group">
                                <input type="file" name="foto_profil" class="file-upload-default">
                                <div class="input-group col-3 mx-auto mt-2">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Ganti Foto Profil">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nik">Nomor Induk Karyawan (NIK)</label>
                            <small></small>
                            <?= form_error('nik') ?>
                            <input name="nik" type="number" class="form-control" id="nik" value="<?= $data->nik ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <?= form_error('email') ?>
                            <input name="email" type="email" class="form-control" id="email" value="<?= $data->email ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <?= form_error('name') ?>
                            <input name="name" type="text" class="form-control" id="name" value="<?= $data->name ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <?= form_error('password') ?>
                            <input name="password" type="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="passconf">Password Confirmation</label>
                            <?= form_error('passconf') ?>
                            <input name="passconf" type="password" class="form-control" id="passwordconf">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-2">

        </div>
    </div>

</section>