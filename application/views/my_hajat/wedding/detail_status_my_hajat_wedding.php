<section class="content-header mt-4 mb-4 text-center">
  <h4>
    Detail My Hajat Wedding Tickets
  </h4>
  <p><?= date('d F, Y'); ?></p>
</section>

<!-- Main content -->
<section class="content">
  <form method="post" action="<?= base_url('ticket_register/edit') ?>" enctype="multipart/form-data">
    <div class="row">

      <!-- Formulir -->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Ticket</h3>
            <div class="row p-0 m-0">
              <div class="col-6 p-0 m-0">
                <a href="#" id="id-ticket">ID Ticket: #<?= $data->id_ticket ?></a>
              </div>
              <div class="col-6 p-0 m-0">
                <div id="status-ticket" class="pull-right">
                  <?php
                  if ($data->id_approval == 0) {
                    echo '<label class="badge badge-secondary">Pending</label>';
                  }
                  if ($data->id_approval == 1) {
                    echo '<label class="badge badge-danger">Ditolak</label>';
                  }
                  if ($data->id_approval == 2) {
                    echo '<label class="badge badge-success">Disetujui Admin 1</label>';
                  }
                  if ($data->id_approval == 3) {
                    echo '<label class="badge badge-info">Selesai</label>';
                  }
                  ?>
                </div>
              </div>
            </div>
            <hr class="hr">
            <div id="hide-detail-ticket" class="row p-0 m-0">
              <div class="col-6 p-0 m-0">
                <?= ($data->tanggal_dibuat != NULL ? '<p>Created on ' . $data->tanggal_dibuat . '</p>' : '') ?>
                <?= ($data->tanggal_diubah != NULL ? '<p>Terakhir diubah ' . $data->tanggal_diubah . '</p>' : '')  ?>
                <?= ($data->tanggal_disetujui != NULL ? '<p>Approved on ' . $data->tanggal_disetujui . '</p>' : '')  ?>
                <?= ($data->tanggal_diselesaikan != NULL ? '<p>Completed on ' . $data->tanggal_diselesaikan . '</p>' : '')  ?>
                <?php if ($data->id_approval == 1) {
                  echo ($data->tanggal_ditolak != NULL ? '<p>Rejected on ' . $data->tanggal_ditolak . '</p>' : '');
                } ?>
              </div>
              <div class="col-6 p-0 m-0">

              </div>
            </div>
          </div>
          <div class="card-body">
            <!-- ID Ticket -->
            <div class="form-group">
              <label>ID Ticket</label>
              <input type="text" class="form-control" name="id_ticket" id="id_ticket" value="<?= $data->id_ticket ?>" readonly required>
              <input type="hidden" class="form-control" name="id_wedding" id="id_wedding" value="<?= $data->id_wedding ?>" readonly required>
            </div>
            <div class="form-group">
              <label>Nama Cabang</label>
              <input type="text" class="form-control" name="nama_cabang" id="nama_cabang" value="<?= $data->nama_cabang ?>" readonly required>
            </div>
            <div class="form-group">
              <label>Nama Konsumen</label>
              <input type="text" class="form-control enable" name="nama_konsumen" id="nama_konsumen" value="<?= $data->nama_konsumen ?>" readonly required>
            </div>
            <div class="form-group">
              <label>Jenis Konsumen</label>
              <select class="form-control enable" name="jenis_konsumen" id="jenis_konsumen" disabled>
                <option value="Internal" <?= $data->jenis_konsumen == 'Internal' ? 'selected' : ''  ?>>
                  Internal</option>
                <option value="Eksternal" <?= $data->jenis_konsumen == 'Eksternal' ? 'selected' : ''  ?>>Eksternal</option>
              </select>
            </div>
            <div class="form-group">

            </div>
            <div class="form-group">
              <label>Nama Wedding Organizer</label>
              <input type="text" class="form-control enable" name="nama_wo" id="nama_wo" value="<?= $data->nama_wo ?>" readonly required>
            </div>
            <div class="form-group">
              <label>Jenis Wedding Organizer</label>
              <input type="text" class="form-control enable" name="jenis_wo" id="jenis_wo" value="<?= $data->jenis_wo ?>" readonly required>
            </div>
            <div class="form-group">
              <label>Lama Usaha Berdiri</label>
              <input type="text" class="form-control enable" name="lama_berdiri" id="lama_berdiri" value="<?= $data->lama_berdiri ?>" readonly required>
            </div>
            <div class="form-group">
              <label>Jumlah Biaya Acara</label>
              <input type="text" class="form-control enable" name="jumlah_biaya" id="jumlah_biaya" value="<?= $data->jumlah_biaya ?>" readonly required>
            </div>
            <div class="form-group">
              <label>Jumlah Undangan</label>
              <input type="number" class="form-control enable" name="jumlah_undangan" id="jumlah_undangan" value="<?= $data->jumlah_undangan ?>" readonly required>
            </div>
            <div class="form-group">
              <label>Akun Media Sosial Wedding Organizer</label>
              <input type="text" class="form-control enable" name="akun_sosmed" id="akun_sosmed" value="<?= $data->akun_sosmed ?>" readonly required>
            </div>
            <div class="form-group">
              <label>Informasi Tambahan</label>
              <textarea cols="40" rows="5" class="form-control enable" name="informasi_tambahan" id="informasi_tambahan" readonly> <?= $data->informasi_tambahan ?></textarea>
            </div>
            <div id="status-ticket" class="pull-right">
              <label for="">Status:</label>
              <?php
              if ($data->id_approval == 0) {
                echo '<label class="badge badge-secondary">Pending</label>';
              }
              if ($data->id_approval == 1) {
                echo '<label class="badge badge-danger">Ditolak</label>';
              }
              if ($data->id_approval == 2) {
                echo '<label class="badge badge-success">Disetujui Admin 1</label>';
              }
              if ($data->id_approval == 3) {
                echo '<label class="badge badge-success">Selesai</label>';
              }
              ?>
            </div>
            <!-- Tombol ini muncul khusus untuk user -->
            <?php if (($this->session->userdata('level') == 1) && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
            <button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button>
            <?php } ?>
            <?php if ($this->session->userdata('level') == 5) { ?>
            <button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button>
            <?php } ?>
          </div>
          <div class="card-footer">
            <!-- Tombol Aksi ini akan muncul untuk Admin 1 -->
            <?php if ($this->session->userdata('level') == 2 && $data->id_approval == 0) { ?>
            <a class="btn btn-info" onclick="return confirm('Apakah Anda yakin menyetujui request support?')" href="<?= base_url('Admin1/approve/myhajat/wedding/' . $data->id_wedding) ?>">Approve</a>
            <a class="btn btn-danger" onclick="return confirm('Apakah Anda yakin MENOLAK request support ini?')" href="<?= base_url('Admin1/reject/myhajat/wedding/' . $data->id_wedding) ?>">Reject</a>
            <?php } ?>
            <!-- Tombol Aksi ini akan muncul untuk Admin 1 -->
            <?php if ($this->session->userdata('level') == 3 && $data->id_approval == 2) { ?>
            <a class="btn btn-info" onclick="return confirm('Apakah Anda yakin MENYELESAIKAN request support ini?')" href="<?= base_url('Admin2/complete/myhajat/wedding/' . $data->id_wedding) ?>">Approve</a>
            <a class="btn btn-danger" onclick="return confirm('Apakah Anda yakin MENOLAK request support ini?')" href="<?= base_url('Admin2/reject/myhajat/wedding/' . $data->id_wedding) ?>">Reject</a>
            <?php } ?>
            <!-- Tombol Aksi ini akan muncul untuk Admin Superuser -->
            <?php if ($this->session->userdata('level') == 5) { ?>
            <a class="btn btn-info mt-1" href="<?= base_url('Superuser/complete/myhajat/wedding/' . $data->id_wedding) ?>">Complete</a>
            <a class="btn btn-danger mt-1" href="<?= base_url('Superuser/reject/myhajat/wedding/' . $data->id_wedding) ?>">Reject</a>
            <?php } ?>
          </div>
        </div>
      </div>

      <!-- Form Upload Lampiran -->
      <div class="col-lg-6">
        <div id="upload" class="card">
          <div class="card-header">
            <h3 class="card-title text-center">Lampiran (Attachment)</h3>
          </div>
          <div class="card-body p-0" id="dynamic-field">
            <table class="table text-center" width="100%">
              <thead>
                <th width="50%">File Terlampir</th>
                <th>Ubah/tambah file lampiran</th>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <?php if ($data->upload_file1 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file1) ?>"><?= $data->upload_file1 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file1" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file2 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file2) ?>"><?= $data->upload_file2 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file2" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file3 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file3) ?>"><?= $data->upload_file3 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file3" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file4 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file4) ?>"><?= $data->upload_file4 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file4" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file5 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file5) ?>"><?= $data->upload_file5 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file5" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file6 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file6) ?>"><?= $data->upload_file6 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file6" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file7 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file7) ?>"><?= $data->upload_file7 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file7" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file8 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file8) ?>"><?= $data->upload_file8 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file8" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file9 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file9) ?>"><?= $data->upload_file9 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file9" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php if ($data->upload_file10 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myhajat/' . $data->upload_file10) ?>"><?= $data->upload_file10 ?></a><?php } ?>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="file" name="upload_file10" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info enable" disabled type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <?php if (($this->session->userdata('level') == 1) && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
          <div class="card-footer text-center">
            <!-- Tombol ini muncul khusus untuk user -->
            <!-- <button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button> -->
            <button type="submit" id="edit_wedding" class="btn btn-info enable" name="edit_wedding" disabled>Update Data!</button>
          </div>
          <?php } ?>
          <?php if ($this->session->userdata('level') == 5) { ?>
          <div class="card-footer text-center">
            <!-- Tombol ini muncul khusus untuk SUPERUSER -->
            <button type="submit" id="edit_wedding_superuser" class="btn btn-info enable" name="edit_wedding_superuser" disabled>Update Data!</button>
          </div>
          <?php } ?>
        </div>
      </div>

    </div>
  </form>
  <?php if ($komentar->num_rows() == 0) { ?>
  <!-- Post Komentar -->
  <div class="row mt-4">
    <div class="col-lg-12 col-md-6">
      <form method="post" action="<?= base_url('comment/post_comment/id_wedding') ?>">
        <div class="card">
          <div class="card-header with-border">
            <label>Post Komentar</label>
          </div>
          <div class="card-body">
            <div class="form-group">
              <textarea class="form-control" name="post_comment" id="post_comment" cols="10" rows="2" placeholder="Masukkan Komentar Anda" required></textarea>
              <input type="hidden" name="id_komentar" value="<?= $data->id_wedding ?>">
              <input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
              <input type="hidden" name="id_ticket_komentar" value="<?= $data->id_ticket ?>">
              <input type="hidden" name="redirect" value="<?= $this->uri->uri_string() ?>">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-info pull-right" name="submit_komentar">Post Komentar</button>
          </div>
      </form>
    </div>
  </div>
  </div>
  <?php } ?>

  <!-- Reply Comment -->
  <?php foreach ($komentar->result() as $komen) { ?>
  <div class="row mt-4">
    <div class="col-lg-12 col-md-12">

      <div class="card card-widget">
        <div class="card-header with-border">
          <div class="user-block"><span class="username"><label><?= $komen->name ?> (<?= $komen->nama_cabang ?>)</label></span><br>
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
          <!-- // Menampilkan Balasan Komentar -->
          <?php foreach ($reply->result() as $balasan) { ?>
          <div class="card-comment">
            <div class="comment-text">
              <span class="username">
                <label><?= $balasan->name ?> (<?= $balasan->nama_cabang ?>)</label>:
                <span class="text-muted pull-right"> <?= $balasan->date ?></span>
              </span>
              <?= $balasan->comment ?>
            </div>
          </div>
          <?php } ?>
        </div>
        <div class="card-footer">
          <form action="<?= base_url('comment/post_reply/id_wedding'); ?>" method="post">
            <div class="img-push">
              <input name="parent_comment" type="hidden" value="<?= $komen->id ?>">
              <input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
              <input type="hidden" name="id_ticket_reply" value="<?= $data->id_ticket ?>">
              <input name="id_komentar" type="hidden" value="<?= $data->id_wedding ?>">
              <input type="hidden" name="redirect" value="<?= $this->uri->uri_string() ?>">
              <input name="post_reply" type="text" class="form-control input-sm" placeholder="Press enter to reply comment">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php } ?>

</section>