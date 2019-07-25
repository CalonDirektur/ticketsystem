as<section class="content-header">
  <h1>
    Detail My Hajat Sewa Tickets
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- Rencana mau masukkin lampiran -->
    <div class="col-lg-6">

    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-header text-center">
          <h3 class="card-title">Data Ticket My Hajat Sewa</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body no-padding">
          <form method="post" action="<?= base_url('ticket_register/edit') ?>" enctype="multipart/form-data">
            <table class="table table-striped">
              <thead>
                <th>Kolom</th>
                <th>Isi</th>
              </thead>
              <tr>
                <td><b>ID Ticket</b></td>
                <td><input type="text" class="form-control enable" name="id_sewa" id="id_sewa" value="<?= $data->id_sewa ?>" readonly required></td>
              </tr>
              <tr>
                <td><b>Nama Konsumen</b></td>
                <td><input type="text" class="form-control enable" name="nama_konsumen" id="nama_konsumen" value="<?= $data->nama_konsumen ?>" readonly required></td>
              </tr>
              <tr>
                <td><b>Jenis Konsumen</b></td>
                <td>
                  <select class="form-control enable" name="jenis_konsumen" id="jenis_konsumen" disabled>
                    <option value="Internal" <?= $data->jenis_konsumen == 'Internal' ? 'selected' : ''  ?>>
                      Internal</option>
                    <option value="Eksternal" <?= $data->jenis_konsumen == 'Eksternal' ? 'selected' : ''  ?>>Eksternal</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td><b>Nama Pemilik</b></td>
                <td><input type="text" class="form-control enable" name="nama_pemilik" id="nama_pemilik" value="<?= $data->nama_pemilik ?>" readonly required></td>
              </tr>
              <tr>
                <td><b>Jenis Pemilik</b></td>
                <td><select class="form-control enable" name="jenis_pemilik" id="jenis_pemilik" disabled required>
                    <option value="Perorangan" <?= $data->jenis_pemilik == 'Perorangan' ? 'selected' : ''  ?>>
                      Perorangan</option>
                    <option value="Perusahaan" <?= $data->jenis_pemilik == 'Perusahaan' ? 'selected' : ''  ?>>Perusahaan/Badan Usaha</option>
                  </select></td>
              </tr>
              <tr>
                <td><b>Hubungan dengan Pemohon</b></td>
                <td><input type="text" class="form-control enable" name="hubungan_pemohon" id="hubungan_pemohon" value="<?= $data->hubungan_pemohon ?>" readonly required></td>
              </tr>
              <tr>
                <td><b>Luas Panjang</b></td>
                <td><input type="text" class="form-control enable" name="luas_panjang" id="luas_panjang" value="<?= $data->luas_panjang ?>" readonly required></td>
              </tr>
              <tr>
                <td><b>Biaya per Tahun</b></td>
                <td><input type="number" class="form-control enable" name="biaya_pertahun" id="biaya_pertahun" value="<?= $data->biaya_tahunan ?>" readonly required></td>
              </tr>
              <td><b>Informasi Tambahan</b></td>
              <td><textarea cols="40" rows="5" class="form-control enable" name="informasi_tambahan" id="informasi_tambahan" readonly> <?= $data->informasi_tambahan ?></textarea></td>
              </tr>
              <tr>
                <td></td>
                <!-- Tombol ini muncul khusus untuk user -->
                <?php if ($this->session->userdata('level') == 1 && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
                  <td>
                    <button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button>
                    <button type="submit" id="edit_sewa" class="btn btn-primary enable" name="edit_sewa" disabled>Kirim Data!</button>
            </form>
            </td>
            </tr>
          <?php } ?>
          <tr>
            <td><b>Status:</b></td>
            <td>
              <?php
              if ($data->id_approval == 0) {
                echo '<label class="badge badge-warning">Belum Direview</label>';
              }
              if ($data->id_approval == 1) {
                echo '<label class="badge badge-danger">Ditolak</label>';
              }
              if ($data->id_approval == 2) {
                echo '<label class="badge badge-success">Disetujui Admin 1</label>';
              }
              if ($data->id_approval == 3) {
                echo '<label class="badge badge-primary">Selesai</label>';
              }
              ?>
            </td>
          </tr>
          <!-- Tombol Aksi ini akan muncul untuk Admin 1 -->
          <?php if ($this->session->userdata('level') == 2 && $data->id_approval == 0) { ?>
            <tr>
              <td><b>Aksi:</b></td>
              <td>
                <a class="btn btn-primary" href="<?= base_url('Admin1/approve/myhajat/sewa/' . $data->id_sewa) ?>">Approve</a>
                <a class="btn btn-danger" href="<?= base_url('Admin1/reject/myhajat/sewa/' . $data->id_sewa) ?>">Reject</a>
              </td>
            </tr>
          <?php } ?>
          <?php if ($this->session->userdata('level') == 3 && $data->id_approval == 2) { ?>
            <tr>
              <td><b>Aksi:</b></td>
              <td>
                <a class="btn btn-primary" href="<?= base_url('Admin2/complete/myhajat/sewa/' . $data->id_sewa) ?>">Approve</a>
              </td>
            </tr>
          <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Post Komentar -->
  <div class="row">
    <div class="col-lg-12 col-md-6">
      <form method="post" action="<?= base_url('comment/post_comment/id_sewa') ?>">
        <div class="card">
          <div class="card-header with-border">
            <b>Post Komentar</b>
          </div>
          <div class="card-body">
            <div class="form-group">
              <textarea class="form-control" name="post_comment" id="post_comment" cols="10" rows="2" placeholder="Masukkan Komentar Anda" required></textarea>
              <input type="hidden" name="id_komentar" value="<?= $data->id_sewa ?>">
              <input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary pull-right" name="submit_komentar">Kirim</button>
          </div>
      </form>
    </div>
  </div>
  </div>


  <?php foreach ($komentar as $komen) { ?>
    <div class="row">
      <div class="col-lg-12 col-md-12">

        <div class="card card-widget">
          <div class="card-header with-border">
            <div class="user-block"> <span class="username"><?= $komen->name ?> (<?= $komen->nama_cabang ?>)</span>
              <span class="description">Diposting: <?= $komen->date ?></span>
            </div>
            <div class="card-tools">
              <button type="button" class="btn btn-card-tool" data-toggle="tooltip" title="Mark as read">
                <i class="fa fa-circle-o"></i></button>
              <button type="button" class="btn btn-card-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-card-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <p><?= $komen->comment ?></p>
          </div>
          <!-- Reply card Comment -->
          <div class="card-footer card-comments">
            <?php
            $this->db->from('tb_comment, user, tb_cabang');
            $this->db->where('parent_comment_id = ' . $komen->id . ' AND
                              user.id_user = tb_comment.id_user AND
                              user.id_cabang = tb_cabang.id_cabang');
            $reply = $this->db->get();
            ?>
            <?php foreach ($reply->result() as $balasan) { ?>
              <div class="card-comment">
                <div class="comment-text">
                  <span class="username">
                    <?= $balasan->name ?> (<?= $balasan->nama_cabang ?>)
                    <span class="text-muted pull-right"><?= $komen->date ?></span>
                  </span>
                  <?= $balasan->comment ?>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="card-footer">
            <form action="<?= base_url('comment/post_reply'); ?>" method="post">
              <div class="img-push">
                <input name="parent_comment" type="hidden" value="<?= $komen->id ?>">
                <input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
                <input name="id_komentar" type="hidden" value="<?= $data->id_sewa ?>">
                <input name="post_reply" type="text" class="form-control input-sm" placeholder="Press enter to post comment">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>

</section>