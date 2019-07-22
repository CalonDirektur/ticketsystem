<section class="content-header">
  <h1>
    Detail My Ta'lim Tickets
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-6">
      <div class="row">
        <img id="gambar" class="img-fluid" src="<?= base_url('uploads/mytalim/' . $data->ktp) ?>" alt="no photo" width="550" height="400">
      </div>
      <div class="row">
        <img class="thumb" id="ktp" src="<?= base_url('uploads/mytalim/' . $data->ktp) ?>" alt="no photo" width="50" height="50">
        <img class="thumb" id="kk" src="<?= base_url('uploads/mytalim/' . $data->kk) ?>" alt="no photo" width="50" height="50">
        <img class="thumb" id="bukti_penghasilan" src="<?= base_url('uploads/mytalim/' . $data->bukti_penghasilan) ?>" alt="no photo" width="50" height="50">
        <img class="thumb" id="npwp" src="<?= base_url('uploads/mytalim/' . $data->npwp) ?>" alt="no photo" width="50" height="50">
        <img class="thumb" id="tambahan" src="<?= base_url('uploads/mytalim/' . $data->tambahan) ?>" alt="no photo" width="50" height="50">
      </div>
    </div>
    <div class="col-lg-6">
      <div class="box">
        <div class="box-header text-center">
          <h3 class="box-title">Data Ticket</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <thead>
              <th>Kolom</th>
              <th>Isi</th>
            </thead>
            <tr>
              <td><b>ID Ticket</b></td>
              <td><input type="text" class="form-control" name="id_mytalim" id="id_mytalim" value="<?= $data->id_mytalim ?>" readonly></td>
            </tr>
            <tr>
              <td><b>Nama Konsumen</b></td>
              <td><input type="text" class="form-control" name="nama_konsumen" id="nama_konsumen" value="<?= $data->nama_konsumen ?>" readonly></td>
            </tr>
            <tr>
              <td><b>Jenis Konsumen</b></td>
              <td><input type="text" class="form-control" name="jenis_konsumen" id="jenis_konsumen" value="<?= $data->jenis_konsumen ?>" readonly></td>
            </tr>
            <tr>
              <td><b>Pendidikan</b></td>
              <td><input type="text" class="form-control" name="pendidikan" id="pendidikan" value="<?= $data->pendidikan ?>" readonly></td>
            </tr>
            <tr>
              <td><b>Nama Lembaga</b></td>
              <td><input type="text" class="form-control" name="nama_lembaga" id="nama_lembaga" value="<?= $data->nama_lembaga ?>" readonly></td>
            </tr>
            <tr>
              <td><b>Tahun Berdiri</b></td>
              <td><input type="text" class="form-control" name="tahun_berdiri" id="tahun_berdiri" value="<?= $data->tahun_berdiri ?>" readonly></td>
            </tr>
            <tr>
              <td><b>Akreditasi</b></td>
              <td><input type="text" class="form-control" name="akreditasi" id="akreditasi" value="<?= $data->akreditasi ?>" readonly></td>
            </tr>
            <tr>
              <td><b>Tahun Periode</b></td>
              <td><input type="text" class="form-control" name="periode" id="periode" value="<?= $data->periode ?>" readonly></td>
            </tr>
            <tr>
              <td><b>Tujuan Pembiayaan</b></td>
              <td><input type="text" class="form-control" name="tujuan_pembiayaan" id="tujuan_pembiayaan" value="<?= $data->tujuan_pembiayaan ?>" readonly></td>
            </tr>
            <tr>
              <td><b>Nilai Pembiayaan</b></td>
              <td><input type="text" class="form-control" name="nilai_pembiayaan" id="nilai_pembiayaan" value="<?= $data->nilai_pembiayaan ?>" readonly></td>
            </tr>
            <tr>
              <td><b>Status:</b></td>
              <td>
                <?php
                if ($data->id_approval == 0) {
                  echo '<span class="label label-warning">Belum Direview</span>';
                }
                if ($data->id_approval == 1) {
                  echo '<span class="label label-danger">Ditolak</span>';
                }
                if ($data->id_approval == 2) {
                  echo '<span class="label label-success">Disetujui Admin 1</span>';
                }
                if ($data->id_approval == 3) {
                  echo '<span class="label label-primary">Selesai</span>';
                }
                ?>
              </td>
            </tr>
            <tr>
                <td>
                  <button id="ubah" class="btn btn-secondary">Ubah Data</button>
                  <a class="btn btn-primary" href="<?= base_url('ticket_register/edit/mytalim/id/' . $data->id_mytalim) ?>">Approve</a>
                </td>
            </tr>
            <!-- Tombol Aksi ini akan muncul untuk Admin 1 -->
            <?php if ($this->session->userdata('level') == 2 && $data->id_approval == 0) { ?>
              <tr>
                <td><b>Aksi:</b></td>
                <td>
                  <a class="btn btn-primary" href="<?= base_url('Admin1/approve/mytalim/id/' . $data->id_mytalim) ?>">Approve</a>
                  <a class="btn btn-danger" href="<?= base_url('Admin1/reject/mytalim/id/' . $data->id_mytalim) ?>">Reject</a>
                </td>
              </tr>
            <?php } ?>
            <?php if ($this->session->userdata('level') == 3 && $data->id_approval == 2) { ?>
              <tr>
                <td><b>Aksi:</b></td>
                <td>
                  <a class="btn btn-primary" href="<?= base_url('Admin2/complete/mytalim/id/' . $data->id_mytalim) ?>">Approve</a>
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
      <form method="post" action="<?= base_url('comment/post_comment/id_mytalim') ?>">
        <div class="box">
          <div class="box-header with-border">
            <b>Post Komentar</b>
          </div>
          <div class="box-body">
            <div class="form-group">
              <textarea class="form-control" name="post_comment" id="post_comment" cols="10" rows="2" placeholder="Masukkan Komentar Anda" required></textarea>
              <input type="hidden" name="id_komentar" value="<?= $data->id_mytalim ?>">
              <input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right" name="submit_komentar">Kirim</button>
          </div>
      </form>
    </div>
  </div>
  </div>

  <!-- Menampilkan Komentar -->
  <?php foreach ($komentar as $komen) { ?>
    <div class="row">
      <div class="col-lg-12 col-md-12">

        <div class="box box-widget">
          <div class="box-header with-border">
            <div class="user-block"> <span class="username"><?= $komen->name ?> (<?= $komen->nama_cabang ?>)</span>
              <span class="description">Diposting: <?= $komen->date ?></span>
            </div>
          </div>
          <div class="box-body">
            <p><?= $komen->comment ?></p>
          </div>

          <!-- Reply Box Comment -->
          <div class="box-footer box-comments">
            <?php
            $this->db->from('tb_comment, user, tb_cabang');
            $this->db->where('parent_comment_id = ' . $komen->id . ' AND
                              user.id_user = tb_comment.id_user AND
                              user.id_cabang = tb_cabang.id_cabang');
            $reply = $this->db->get();
            ?>
            <?php foreach ($reply->result() as $balasan) { ?>
              <div class="box-comment">
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
          <div class="box-footer">
            <form action="<?= base_url('comment/post_reply/id_mytalim'); ?>" method="post">
              <div class="img-push">
                <input name="parent_comment" type="hidden" value="<?= $komen->id ?>">
                <input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
                <input name="id_komentar" type="hidden" value="<?= $data->id_mytalim ?>">
                <input name="post_reply" type="text" class="form-control input-sm" placeholder="Press enter to post comment">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>
</section>