<section class="content-header">

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <form method="post" action="<?= base_url('auth/update_user') ?>">
        <div class="card">
          <div class="card-header">
            <b>Daftar Akun User</b>
          </div>
          <table id="table-user" class="table responsive status" width="100%">
            <thead>
              <th class="all">Nama</th>
              <th class="all">Tanggal Daftar</th>
              <th class="none">NIK</th>
              <th class="none">Email</th>
              <th class="none">Level</th>
              <th class="all">Active</th>
              <th class="desktop">ID Cabang</th>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($list_user->result() as $user) {  ?>
              <tr>
                <td><?= $user->name ?></td>
                <td><?= $user->tanggal_daftar ?></td>
                <td>
                  <?= $user->nik ?>
                </td>
                <td><?= $user->email ?></td>
                <td>
                  <select class="form-control col-12" name="level[<?= $user->id_user ?>]" id="level" <?= ($user->email == 'superuser@bfi.co.id') ? 'disabled' : '' ?> data-iduser="<?= $user->id_user ?>">
                    <option value="1" <?= $user->level == 1 ? 'selected' : '' ?>>User Cabang</option>
                    <option value="2" <?= $user->level == 2 ? 'selected' : '' ?>>Admin Level 1</option>
                    <option value="3" <?= $user->level == 3 ? 'selected' : '' ?>>Admin level 2</option>
                    <option value="4" <?= $user->level == 4 ? 'selected' : '' ?>>Admin NST</option>
                    <option value="5" <?= $user->level == 5 ? 'selected' : '' ?>>Superuser</option>
                  </select>
                </td>
                <td>
                  <select class="form-control col-12" name="is_active[<?= $user->id_user ?>]" id="is_active" <?= ($user->email == 'superuser@bfi.co.id') ? 'disabled' : '' ?>>
                    <option value="0" <?= $user->is_active == 0 ? 'selected' : '' ?>>Nonaktif</option>
                    <option value="1" <?= $user->is_active == 1 ? 'selected' : '' ?>>Aktif</option>
                  </select>
                </td>
                <td>
                  <span data-namacabang="nama_cabang[<?= $user->id_user ?>]"><?= $user->nama_cabang ?></span>
                </td>
              </tr>
              <?php
                $no++;
              } ?>
            </tbody>
          </table>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-info">Update User</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>