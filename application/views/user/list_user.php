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
          <table id="table-admin1" class="table responsive status" width="100%">
            <thead>
              <th class="all" width="1%">ID User</th>
              <th class="all" width="15%">Nama</th>
              <th>Username</th>
              <th class="all" width="15%">Email</th>
              <th>Level</th>
              <th>Active</th>
              <th>ID Cabang</th>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($list_user->result() as $user) {  ?>
                <tr>
                  <td>#<?= $user->id_user ?></td>
                  <td><?= $user->name ?></td>
                  <td><?= $user->username ?></td>
                  <td><?= $user->email ?></td>
                  <td><?= $user->level ?></td>
                  <td>
                    <select class="form-control col-8" name="is_active[<?= $user->id_user ?>]" id="is_active" <?= ($user->level == 5) ? 'disabled' : '' ?>>
                      <option value="0" <?= $user->is_active == 0 ? 'selected' : '' ?>>Nonaktif</option>
                      <option value="1" <?= $user->is_active == 1 ? 'selected' : '' ?>>Aktif</option>
                    </select>
                  </td>
                  <td><?= $user->nama_cabang ?></td>
                </tr>
                <?php
                $no++;
              } ?>
            </tbody>
          </table>
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Update User</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>