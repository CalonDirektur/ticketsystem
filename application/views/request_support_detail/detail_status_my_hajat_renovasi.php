<div class="container-fluid mt-4 mb-4">

  <section class="content-header text-center">
    <h4>
      Detail My Hajat Renovasi Tickets
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
                  <?= ($data->tanggal_disetujui != NULL ? '<p>Approved on ' . $data->tanggal_disetujui . '</p>' : '')  ?>
                  <?= ($data->tanggal_diselesaikan != NULL ? '<p>Completed on ' . $data->tanggal_diselesaikan . '</p>' : '')  ?>
                  <?= ($data->tanggal_ditolak != NULL ? '<p>Rejected on ' . $data->tanggal_ditolak . '</p>' : '')  ?>
                </div>
                <div class="col-6 p-0 m-0">
                  <div class="selisih-tanggal float-right">
                    <?php
                    if ($data->id_approval == 0) {
                      echo 'Diubah ' . selisih_tanggal($data->tanggal_diubah);
                    }
                    if ($data->id_approval == 1) {
                      echo 'Ditolak <br>' . selisih_tanggal($data->date_rejected);
                    }
                    if ($data->id_approval == 2) {
                      echo 'Disetujui <br>' . selisih_tanggal($data->date_approved);
                    }
                    if ($data->id_approval == 3) {
                      echo 'Diselesaikan <br>' . selisih_tanggal($data->date_completed);
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- ID Ticket -->
              <div class="form-group">
                <label for="">ID Ticket</label>
                <input type="text" class="form-control" name="id_ticket" id="id_ticket" value="<?= $data->id_ticket ?>" readonly required>
                <input type="hidden" class="form-control" name="id_renovasi" id="id_renovasi" value="<?= $data->id_renovasi ?>" readonly required>
              </div>
              <!-- ID Vendor -->
              <input type="hidden" class="form-control id_vendor" name="id_vendor_renovasi" id="id_vendor_renovasi" value="<?= $data->id_vendor ?>" readonly required>

              <!-- Nama Cabang -->
              <div class="form-group">
                <label for="">Nama Cabang</label>
                <input type="text" class="form-control" name="nama_cabang" id="nama_cabang" value="<?= $data->nama_cabang ?>" readonly required>
              </div>

              <!-- Nama Konsumen -->
              <div class="form-group">
                <label for="">Nama Konsumen</label>
                <input type="text" class="form-control enable" name="nama_konsumen" id="nama_konsumen" value="<?= $data->nama_konsumen ?>" readonly required>
              </div>

              <!-- Jenis Konsumen -->
              <div class="form-group">
                <label for="">Jenis Konsumen</label>
                <select class="form-control enable" name="jenis_konsumen" id="jenis_konsumen" disabled>
                  <option value="Internal" <?= $data->jenis_konsumen == 'Internal' ? 'selected' : ''  ?>>
                    Internal</option>
                  <option value="Eksternal" <?= $data->jenis_konsumen == 'Eksternal' ? 'selected' : ''  ?>>Eksternal</option>
                </select>
              </div>

              <!-- Nama Vendor -->
              <div class="form-group">
                <label for="nama_vendor">Nama Vendor Renovasi</label><br>
                <div class="input-group">
                  <input name="nama_vendor" type="text" class="form-control nama_vendor_myhajat" placeholder="Nama Vendor" value="<?= $data->nama_vendor ?>" readonly required>
                  <div class="input-group-append">
                    <button type="button" class="btn btn-danger clear-nama-vendor enable" disabled>x</button>
                  </div>
                </div>
              </div>

              <!-- Jenis Vendor -->
              <div class="form-group jenis-vendor">
                <label for="jenis_vendor">Jenis Vendor Renovasi </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input perorangan" type="radio" name="jenis_vendor" value="Perorangan" <?= $data->jenis_vendor == 'Perorangan' ? 'checked' : '' ?> disabled required>Perorangan</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input badan_usaha" type="radio" name="jenis_vendor" value="Badan Usaha" <?= $data->jenis_vendor == 'Badan Usaha' ? 'checked' : '' ?> disabled required>Badan Usaha</label>
                </div>
              </div>

              <div class="form-group">
                <label for="">Jenis Pekerjaan</label>
                <select class="form-control enable" name="jenis_pekerjaan" id="jenis_pekerjaan" disabled>
                  <option value="Borongan" <?= $data->jenis_pekerjaan == 'Borongan' ? 'selected' : ''  ?>>Borongan</option>
                  <option value="Harian" <?= $data->jenis_pekerjaan == 'Harian' ? 'selected' : ''  ?>>Harian</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Bagian Bangunan</label>
                <input type="text" class="form-control enable" name="bagian_bangunan" id="bagian_bangunan" value="<?= $data->bagian_bangunan ?>" readonly required>
              </div>
              <div class="form-group">
                <label for="">Luas Bangunan</label>
                <input type="text" class="form-control enable" name="luas_bangunan" id="luas_bangunan" value="<?= $data->luas_bangunan ?>" readonly required>
              </div>
              <div class="form-group">
                <label for="">Jumlah Pekerja</label>
                <input type="text" class="form-control enable" name="jumlah_pekerja" id="jumlah_pekerja" value="<?= $data->jumlah_pekerja ?>" readonly required>
              </div>
              <div class="form-group">
                <label for="">Estimasi Waktu</label>
                <input type="text" class="form-control enable" name="estimasi_waktu" id="estimasi_waktu" value="<?= $data->estimasi_waktu ?>" readonly required>
              </div>
              <div class="form-group">
                <label for="">Nilai Pembiayaan</label>
                <input type="text" class="form-control enable" name="nilai_pembiayaan" id="nilai_pembiayaan" value="<?= $data->nilai_pembiayaan ?>" readonly required>
              </div>
              <div class="form-group">
                <label for="">Informasi Tambahan</label>
                <textarea name="informasi_tambahan" class="form-control enable" id="informasi_tambahan" cols="40" rows="5" readonly><?= $data->informasi_tambahan ?></textarea>
              </div>
              <!-- Tombol ini muncul khusus untuk user -->
              <?php if (($this->session->userdata('level') == 1 || $this->session->userdata('level') == 6) && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
                <button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button>
              <?php } ?>
              <?php if ($this->session->userdata('level') == 5) { ?>
                <button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button>
              <?php } ?>
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
            </div>
            <div class="card-footer">
              <!-- Tombol Aksi ini akan muncul untuk Admin 1 -->
              <?php if ($this->session->userdata('level') == 2 && $data->id_approval == 0) { ?>

                <a class="btn btn-info" onclick="return confirm('Apakah Anda yakin menyetujui request support?')" href="<?= base_url('Aksi/approve/myhajat/renovasi/' . $data->id_renovasi) ?>">Approve</a>
                <a class="btn btn-danger" onclick="return confirm('Apakah Anda yakin MENOLAK request support ini?')" href="<?= base_url('Aksi/reject/myhajat/renovasi/' . $data->id_renovasi) ?>">Reject</a>
              <?php } ?>
              <?php if ($this->session->userdata('level') == 3 && $data->id_approval == 2) { ?>

                <a class="btn btn-info" onclick="return confirm('Apakah Anda yakin MENYELESAIKAN request support ini?')" href="<?= base_url('Aksi/complete/myhajat/renovasi/' . $data->id_renovasi) ?>">Approve</a>
                <a class="btn btn-danger" onclick="return confirm('Apakah Anda yakin MENOLAK request support ini?')" href="<?= base_url('Aksi/reject/myhajat/renovasi/' . $data->id_renovasi) ?>">Reject</a>
              <?php } ?>
              <!-- Tombol Aksi ini akan muncul untuk Admin Superuser -->
              <?php if ($this->session->userdata('level') == 5) { ?>

                <a class="btn btn-info mt-1" href="<?= base_url('Aksi/complete/myhajat/renovasi/' . $data->id_renovasi) ?>">Complete</a>
                <a class="btn btn-danger mt-1" href="<?= base_url('Aksi/reject/myhajat/renovasi/' . $data->id_renovasi) ?>">Reject</a>
              <?php } ?>
            </div>
          </div>

        </div>

        <!-- Bagian Munculin lampiran -->
        <div class="col-lg-6">
          <!-- Form Upload Lampiran -->
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
            <?php if (($this->session->userdata('level') == 1 || $this->session->userdata('level') == 6) && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
              <div class="card-footer text-center">
                <!-- Tombol ini muncul khusus untuk user -->
                <!-- <button type="button" id="ubah" class="btn btn-secondary">Ubah Data</button> -->
                <button type="submit" id="edit_renovasi" class="btn btn-info enable" name="edit_renovasi" disabled>Update Data!</button>
              </div>
            <?php } ?>
            <?php if ($this->session->userdata('level') == 5) { ?>
              <div class="card-footer text-center">
                <!-- Tombol ini muncul khusus untuk SUPERUSER -->
                <button type="submit" id="edit_renovasi_superuser" class="btn btn-info enable" name="edit_renovasi_superuser" disabled>Update Data!</button>
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
          <form method="post" action="<?= base_url('comment/post_comment/id_renovasi') ?>">
            <div class="card">
              <div class="card-header with-border">
                <label for="">Post Komentar</label>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <textarea class="form-control" name="post_comment" id="post_comment" cols="10" rows="2" placeholder="Masukkan Komentar Anda" required></textarea>
                  <input type="hidden" name="id_komentar" value="<?= $data->id_renovasi ?>">
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


<?php foreach ($komentar->result() as $komen) { ?>
  <div class="row mt-4">
    <div class="col-lg-12 col-md-12">

      <div class="card card-widget">
        <div class="card-header with-border">
          <div class="user-block"> <span class="username"><label for=""><?= $komen->name ?> (<?= $komen->nama_cabang ?>)</span></label><br>
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
                  <label for=""><?= $balasan->name ?> (<?= $balasan->nama_cabang ?>)</label>:
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
              <input type="hidden" name="id_ticket_reply" value="<?= $data->id_ticket ?>">
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