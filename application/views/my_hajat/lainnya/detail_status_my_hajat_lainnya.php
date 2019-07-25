<section class="content-header">
  <h1>
    Detail My Hajat Lainnya Tickets
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
          <h3 class="card-title">Data Ticket My Hajat Lainnya</h3>
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
                <td>
                  <input type="text" class="form-control" name="id_myhajat_lainnya" id="id_mytalim" value="<?= $data->id_myhajat_lainnya ?>" readonly required>
                </td>
              </tr>
              <tr>
                <td><b>Nama Konsumen</b></td>
                <td>
                  <input type="text" class="form-control enable" name="nama_konsumen" id="nama_konsumen" value="<?= $data->nama_konsumen ?>" readonly required>
                </td>
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
                <td><b>Nama Penyedia Jasa</b></td>
                <td>
                  <input type="text" class="form-control enable" name="nama_penyedia_jasa" id="nama_penyedia_jasa" value="<?= $data->nama_penyedia_jasa ?>" readonly required>
                </td>
              </tr>
              <tr>
                <td><b>Jenis Penyedia Jasa</b></Penyedia Jasa>
                <td>
                  <select class="form-control enable" name="jenis_penyedia_jasa" id="jenis_penyedia_jasa" required disabled>
                    <option value="Perorangan" <?= $data->jenis_penyedia_jasa == 'Perorangan' ? 'selected' : '' ?>>Perorangan</option>
                    <option value="Badan Usaha" <?= $data->jenis_penyedia_jasa == 'Badan Usaha' ? 'selected' : '' ?>>Badan Usaha</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td><b>Nilai Pengajuan Pembiayaan</b></td>
                <td>
                  <input type="number" class="form-control enable" name="nilai_pembiayaan" id="nilai_pembiayaan" value="<?= $data->nilai_pembiayaan ?>" readonly required>
                </td>
              </tr>
              <tr>
                <td><b>Informasi Tambahan</b></td>
                <td>
                  <textarea name="informasi_tambahan" class="form-control enable" id="informasi_tambahan" cols="40" rows="5" readonly><?= $data->informasi_tambahan ?></textarea>
                </td>
              </tr>
              <!-- Tombol ini muncul khusus untuk user -->
              <?php if ($this->session->userdata('level') == 1 && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
                <tr>
                  <td></td>
                  <td>
                    <button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button>
                    <button type="submit" id="edit_lainnya" class="btn btn-primary enable" name="edit_lainnya" disabled>Kirim Data!</button>
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
                <a class="btn btn-primary" href="<?= base_url('Admin1/approve/myhajat/lainnya/' . $data->id_myhajat_lainnya) ?>">Approve</a>
                <a class="btn btn-danger" href="<?= base_url('Admin1/reject/myhajat/lainnya/' . $data->id_myhajat_lainnya) ?>">Reject</a>
              </td>
            </tr>
          <?php } ?>
          <?php if ($this->session->userdata('level') == 3 && $data->id_approval == 2) { ?>
            <tr>
              <td><b>Aksi:</b></td>
              <td>
                <a class="btn btn-primary" href="<?= base_url('Admin2/complete/myhajat/lainnya/' . $data->id_myhajat_lainnya) ?>">Approve</a>
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
      <form method="post" action="<?= base_url('comment/post_comment/id_myhajat_lainnya') ?>">
        <div class="card">
          <div class="card-header with-border">
            <b>Post Komentar</b>
          </div>
          <div class="card-body">
            <div class="form-group">
              <textarea class="form-control" name="post_comment" id="post_comment" cols="10" rows="2" placeholder="Masukkan Komentar Anda" required></textarea>
              <input type="hidden" name="id_komentar" value="<?= $data->id_myhajat_lainnya ?>">
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
                    <span class="pull-right"><?= $balasan->date ?></span>
                  </span>
                  <?= $balasan->comment ?>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="card-footer">
            <form action="<?= base_url('comment/post_reply/id_myhajat_lainnya'); ?>" method="post">
              <div class="img-push">
                <input name="parent_comment" type="hidden" value="<?= $komen->id ?>">
                <input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
                <input name="id_komentar" type="hidden" value="<?= $data->id_myhajat_lainnya ?>">
                <input name="post_reply" type="text" class="form-control input-sm" placeholder="Press enter to post comment">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>

</section>