<div class="container-fluid">

  <section class="content-header">
    <h1>
      Detail My Hajat Renovasi Tickets
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- Rencana mau masukkin lampiran -->
      <div class="col-lg-6 col-md-6">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="card">
              <div class="card-header text-center">
                <b>Lampiran</b>
              </div>
              <img id="gambar" class="img-rounded" src="<?= base_url('uploads/mytalim/' . $data->upload_file1) ?>" alt="" width="400" height="400">
            </div>
          </div>
        </div>
        <div class="row mt-1">
          <div class="col-lg-2 col-md-2 col-sm-2 col-2">
            <img class="img-thumbnail <?= $data->upload_file1 != NULL ? 'thumb' : '' ?>" src="<?= base_url($data->upload_file1 != NULL ? 'uploads/mytalim/' . $data->upload_file1 : 'assets2/img/no-pict.png') ?>" alt="" width="100" height="100" data-toggle="tooltip" data-placement="top" title="File 1">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-2">
            <img class="img-thumbnail <?= $data->upload_file2 != NULL ? 'thumb' : '' ?>" src="<?= base_url($data->upload_file2 != NULL ? 'uploads/mytalim/' . $data->upload_file2 : 'assets2/img/no-pict.png') ?>" alt="" width="100" height="100" data-toggle="tooltip" data-placement="top" title="File 2">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-2">
            <img class="img-thumbnail <?= $data->upload_file3 != NULL ? 'thumb' : '' ?>" src="<?= base_url($data->upload_file3 != NULL ? 'uploads/mytalim/' . $data->upload_file3 : 'assets2/img/no-pict.png') ?>" alt="" width="100" height="100" data-toggle="tooltip" data-placement="top" title="File 3">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-2">
            <img class="img-thumbnail <?= $data->upload_file4 != NULL ? 'thumb' : '' ?>" src="<?= base_url($data->upload_file4 != NULL ? 'uploads/mytalim/' . $data->upload_file4 : 'assets2/img/no-pict.png') ?>" alt="" width="100" height="100" data-toggle="tooltip" data-placement="top" title="File 4">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-2">
            <img class="img-thumbnail <?= $data->upload_file5 != NULL ? 'thumb' : '' ?>" src="<?= base_url($data->upload_file5 != NULL ? 'uploads/mytalim/' . $data->upload_file5 : 'assets2/img/no-pict.png') ?>" alt="" width="100" height="100" data-toggle="tooltip" data-placement="top" title="File 5">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-2">

          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card">
          <div class="card-header text-center">
            <h3 class="card-title">Data Ticket My Hajat Renovasi</h3>
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
                    <input type="text" class="form-control" name="id_renovasi" id="id_mytalim" value="<?= $data->id_renovasi ?>" readonly required>
                  </td>
                </tr>
                <tr>
                  <td><b>Nama Cabang</b></td>
                  <td>
                    <input type="text" class="form-control" name="nama_cabang" id="nama_cabang" value="<?= $data->nama_cabang ?>" readonly required>
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
                  <td><b>Nama Vendor</b></td>
                  <td>
                    <input type="text" class="form-control enable" name="nama_vendor" id="nama_vendor" value="<?= $data->nama_vendor ?>" readonly required>
                  </td>
                </tr>
                <tr>
                  <td><b>Jenis Vendor</b></td>
                  <td>
                    <input type="text" class="form-control enable" name="jenis_vendor" id="jenis_vendor" value="<?= $data->jenis_vendor ?>" readonly required>
                  </td>
                </tr>
                <tr>
                  <td><b>Bagian Bangunan</b></td>
                  <td>
                    <input type="text" class="form-control enable" name="bagian_bangunan" id="bagian_bangunan" value="<?= $data->bagian_bangunan ?>" readonly required>
                  </td>
                </tr>
                <tr>
                  <td><b>Luas Bangunan</b></td>
                  <td>
                    <input type="text" class="form-control enable" name="luas_bangunan" id="luas_bangunan" value="<?= $data->luas_bangunan ?>" readonly required>
                  </td>
                </tr>
                <tr>
                  <td><b>Jumlah Pekerja</b></td>
                  <td>
                    <input type="text" class="form-control enable" name="jumlah_pekerja" id="jumlah_pekerja" value="<?= $data->jumlah_pekerja ?>" readonly required>
                  </td>
                </tr>
                <tr>
                  <td><b>Estimasi Waktu</b></td>
                  <td>
                    <input type="text" class="form-control enable" name="estimasi_waktu" id="estimasi_waktu" value="<?= $data->estimasi_waktu ?>" readonly required>
                  </td>
                </tr>
                <tr>
                  <td><b>Nilai Pembiayaan</b></td>
                  <td>
                    <input type="text" class="form-control enable" name="nilai_pembiayaan" id="nilai_pembiayaan" value="<?= $data->nilai_pembiayaan ?>" readonly required>
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
                    </td>
                  </tr>
                <?php } ?>
                <tr>
                  <td><b>Status:</b></td>
                  <td>
                    <?php
                    if ($data->id_approval == 0) {
                      echo '<label class="badge-warning">Belum Direview</label>';
                    }
                    if ($data->id_approval == 1) {
                      echo '<label class="badge-danger">Ditolak</label>';
                    }
                    if ($data->id_approval == 2) {
                      echo '<label class="badge-success">Disetujui Admin 1</label>';
                    }
                    if ($data->id_approval == 3) {
                      echo '<label class="badge-primary">Selesai</label>';
                    }
                    ?>
                  </td>
                </tr>
                <!-- Tombol Aksi ini akan muncul untuk Admin 1 -->
                <?php if ($this->session->userdata('level') == 2 && $data->id_approval == 0) { ?>
                  <tr>
                    <td><b>Aksi:</b></td>
                    <td>
                      <a class="btn btn-primary" href="<?= base_url('Admin1/approve/myhajat/renovasi/' . $data->id_renovasi) ?>">Approve</a>
                      <a class="btn btn-danger" href="<?= base_url('Admin1/reject/myhajat/renovasi/' . $data->id_renovasi) ?>">Reject</a>
                    </td>
                  </tr>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 3 && $data->id_approval == 2) { ?>
                  <tr>
                    <td><b>Aksi:</b></td>
                    <td>
                      <a class="btn btn-primary" href="<?= base_url('Admin2/complete/myhajat/renovasi/' . $data->id_renovasi) ?>">Approve</a>
                    </td>
                  </tr>
                <?php } ?>
              </table>
          </div>
        </div>
        <!-- Form Upload Lampiran -->
        <div class="card card-primary mt-4">
          <div class="card-header with-border">
            <h3 class="card-title">Upload File</h3>
          </div>
          <div class="card-body" id="dynamic-field">
            <div class="form-group">
              <label for="upload_file1">Upload Berkas 1</label>
              <input name="upload_file1" id="upload_file1" type="file" class="form-control enable col-10" disabled>
            </div>
            <div class="form-group">
              <label for="upload_file2">Upload Berkas 2</label>
              <input name="upload_file2" id="upload_file2" type="file" class="form-control enable col-10" disabled>
            </div>
            <div class="form-group">
              <label for="upload_file3">Upload Berkas 3</label>
              <input name="upload_file3" id="upload_file3" type="file" class="form-control enable col-10" disabled>
            </div>
            <div class="form-group">
              <label for="upload_file4">Upload Berkas 4</label>
              <input name="upload_file4" id="upload_file4" type="file" class="form-control enable col-10" disabled>
            </div>
            <div class="form-group">
              <label for="upload_file5">Upload Berkas 5</label>
              <input name="upload_file5" id="upload_file5" type="file" class="form-control enable col-10" disabled>
            </div>
          </div>
          <?php if ($this->session->userdata('level') == 1 && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
            <div class="card-footer text-center">
              <!-- Tombol ini muncul khusus untuk user -->
              <!-- <button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button> -->
              <button onclick="return confirm('Harap periksa kembali\n,Apakah Anda yakin data yang diisi sudah benar?');" type="submit" id="edit_renovasi" class="btn btn-primary enable" name="edit_renovasi" disabled>Kirim Data!</button>
            </form>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <!-- Post Komentar -->
    <div class="row">
      <div class="col-lg-12 col-md-6">
        <form method="post" action="<?= base_url('comment/post_comment/id_renovasi') ?>">
          <div class="card">
            <div class="card-header with-border">
              <b>Post Komentar</b>
            </div>
            <div class="card-body">
              <div class="form-group">
                <textarea class="form-control" name="post_comment" id="post_comment" cols="10" rows="2" placeholder="Masukkan Komentar Anda" required></textarea>
                <input type="hidden" name="id_komentar" value="<?= $data->id_renovasi ?>">
                <input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
                <input type="hidden" name="redirect" value="<?= $this->uri->uri_string() ?>">
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
  <div class="row mt-4">
    <div class="col-lg-12 col-md-12">

      <div class="card card-widget">
        <div class="card-header with-border">
          <div class="user-block"> <span class="username"><b><?= $komen->name ?> (<?= $komen->nama_cabang ?>)</span></b><br>
            <span class="description">Diposting: <?= $komen->date ?></span>
          </div>
        </div>
        <div class="card-body">
          <p><?= $komen->comment ?></p>
        </div>
        <!-- Reply card Comment -->
        <div class="card-footer card-comments">
          <?php
          $this->db->select('*, DATE_FORMAT(date, "%d %M %Y %H:%i:%s") AS date');
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
                  <b><?= $balasan->name ?> (<?= $balasan->nama_cabang ?>)</b>:
                  <span class="text-muted pull-right"> <?= $balasan->date ?></span>
                </span>
                <?= $balasan->comment ?>
              </div>
            </div>
            <hr>
          <?php } ?>
        </div>
        <div class="card-footer">
          <!-- Reply comment form -->
          <form action="<?= base_url('comment/post_reply/id_renovasi'); ?>" method="post">
            <div class="img-push">
              <input name="parent_comment" type="hidden" value="<?= $komen->id ?>">
              <input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
              <input name="id_komentar" type="hidden" value="<?= $data->id_renovasi ?>">
              <input type="hidden" name="redirect" value="<?= $this->uri->uri_string() ?>">
              <input name="post_reply" type="text" class="form-control input-sm" placeholder="Press enter to post comment">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php } ?>

</section>
</div>