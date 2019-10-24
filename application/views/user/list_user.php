<div class="container-fluid mt-4 mb-4">
  <section class="content-header text-center">
    <h4>
      Daftar Akun User
    </h4>
    <p><?= date('d F, Y'); ?></p>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row mt-4 m-1">
      <div class="col-lg-6">
        <h4>Tabel Request Support</h4>
      </div>
      <div class="col-lg-6">
        <form action="#" method="get" class="form-inline my-2 my-lg-0 pull-right">
          <div class="form-group">
            <div class="input-group">
              <input id="cariTiket" class="form-control form-rounded cariTiket" type="text" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sm btn-outline-secondary input-group-text form-rounded" type="button"><i class="icon-search"></i></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <form method="post" action="<?= base_url('auth/update_user') ?>">
          <div class="card">
            <div class="card-body p-0">
              <div class="table-responsive">
                <table id="table-user" class="table table-striped table-bordered responsive status" width="100%">
                  <thead>
                    <th class="all">Nama</th>
                    <th class="all">Tanggal Daftar</th>
                    <th class="none">NIK</th>
                    <th class="none">Email</th>
                    <th class="none">Level</th>
                    <th class="all">Active</th>
                    <th class="desktop">Cabang</th>
                    <th class="all">Jabatan</th>
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
                          <select class="form-control form-inline" name="level[<?= $user->id_user ?>]" id="level" <?= ($user->email == 'superuser@bfi.co.id') ? 'disabled' : '' ?> data-iduser="<?= $user->id_user ?>">
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
                        <td>
                          <select data-jabatan="<?= $user->id_user ?>" class="form-control jabatan" name="jabatan[<?= $user->id_user ?>]" <?= $user->id_cabang == 46 ? 'disabled' : '' ?>>
                            <option disabled selected value="">- Pilih Jabatan -</option>
                            <option <?= $user->jabatan == 'Sharia Manager' ? 'selected' : '' ?> value="Sharia Manager">Sharia Manager</option>
                            <option <?= $user->jabatan == 'Sharia Head' ? 'selected' : '' ?> value="Sharia Head">Sharia Head</option>
                            <option <?= $user->jabatan == 'CMS' ? 'selected' : '' ?> value="CMS">CMS</option>
                            <option disabled <?= $user->jabatan == 'Administrator' ? 'selected' : '' ?> value="Administrator">Administrator</option>
                          </select>
                          <input data-level="<?= $user->id_user ?>" type="hidden" id="level" name="level[<?= $user->id_user ?>]" value="<?= $user->level ?>">
                        </td>
                      </tr>
                    <?php
                      $no++;
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-info">Update User</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>