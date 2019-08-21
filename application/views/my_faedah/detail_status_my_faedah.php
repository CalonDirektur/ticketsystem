<div class="container-fluid mt-4 mb-4">

  <section class="content-header text-center">
    <h4>
      Detail My Faedah
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
            <!-- /.card-header -->
            <div class="card-body">
              <!-- ID Ticket -->
              <div class="form-group">
                <label for="">ID Ticket</label>
                <input type="text" class="form-control" name="id_ticket" id="id_ticket" value="<?= $data->id_ticket ?>" readonly required>
                <input type="hidden" class="form-control" name="id_myfaedah" id="id_myfaedah" value="<?= $data->id_myfaedah ?>" readonly required>
              </div>
              <div class="form-group">
                <label for="">Nama Cabang</label>
                <input type="text" class="form-control" name="nama_cabang" id="nama_cabang" value="<?= $data->nama_cabang ?>" readonly required>
              </div>
              <div class="form-group">
                <label for="">Nama Konsumen</label>
                <input type="text" class="form-control enable" name="nama_konsumen" id="nama_konsumen" value="<?= $data->nama_konsumen ?>" readonly required>
              </div>
              <div class="form-group">
                <label for="">Jenis Konsumen</label>
                <select class="form-control enable" name="jenis_konsumen" id="jenis_konsumen" disabled>
                  <option value="Internal" <?= $data->jenis_konsumen == 'Internal' ? 'selected' : ''  ?>>
                    Internal</option>
                  <option value="Eksternal" <?= $data->jenis_konsumen == 'Eksternal' ? 'selected' : ''  ?>>Eksternal</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Nama Vendor</label>
                <input type="text" class="form-control enable" name="nama_vendor_myfaedah" id="nama_vendor_myfaedah" value="<?= $data->nama_vendor ?>" readonly required>
              </div>
              <div class="form-group">
                <label for="">Jenis Vendor</label>
                <input type="text" class="form-control enable" name="jenis_vendor_myfaedah" id="jenis_vendor_myfaedah" value="<?= $data->jenis_vendor ?>" readonly required>
              </div>
              <!-- Lama Usaha -->
              <div class="form-group">
                <label for="lama_usaha_myfaedah">Lama Usaha </label>
                <input name="lama_usaha_myfaedah" id="lama_usaha_myfaedah" type="text" class="form-control enable" value="<?= $data->lama_usaha ?>" placeholder="Lama Usaha" disabled>
              </div><!-- Nama Barang -->
              <div class="form-group">
                <label for="nama_barang">Nama Barang </label>
                <input name="nama_barang" id="nama_barang" type="text" class="form-control enable" value="<?= $data->nama_barang ?>" placeholder="Nama Barang" disabled>
              </div>

              <!-- Kondisi Barang -->
              <div class="form-group">
                <label for="kondisi_barang">Kondisi Barang</label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="form-check-input enable" value="Baru" <?= $data->kondisi_barang == 'Baru' ? 'checked' : '' ?> id="baru" type="radio" name="kondisi_barang" value="Baru" disabled>Baru</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="form-check-input enable" value="Bekas" <?= $data->kondisi_barang == 'Bekas' ? 'checked' : '' ?> id="bekas" type="radio" name="kondisi_barang" value="Bekas" disabled>Bekas</label>
                </div>
              </div>

              <!-- Jumlah Barang -->
              <div class="form-group">
                <label for="jumlah_barang">Jumlah Barang</label>
                <input name="jumlah_barang" id="jumlah_barang" type="number" class="form-control enable" value="<?= $data->jumlah_barang ?>" placeholder="Jumlah Barang" disabled>
              </div>

              <!-- Merek & Tipe -->
              <div class="form-group">
                <label for="merek_barang">Merek & Tipe Barang</label>
                <input name="merek_barang" id="merek_barang" type="text" class="form-control enable" value="<?= $data->merek_barang ?>" placeholder="Merek & Tipe" disabled>
              </div>

              <!-- Warna -->
              <div class="form-group">
                <label for="warna_barang">Warna Barang</label>
                <input name="warna_barang" id="warna_barang" type="text" class="form-control enable" value="<?= $data->warna_barang ?>" placeholder="Warna" disabled>
              </div>

              <!-- Tahun -->
              <div class="form-group">
                <label for="tahun_barang">Tahun</label>
                <input name="tahun_barang" id="tahun_barang" type="number" class="form-control enable" value="<?= $data->tahun ?>" placeholder="Tahun" disabled>
              </div>

              <!-- Harga Barang -->
              <div class="form-group">
                <label for="harga_barang">Harga Barang </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white">Rp.</span>
                  </div>
                  <input name="harga_barang" id="harga_barang" type="number" class="form-control enable" value="<?= $data->harga_barang ?>" placeholder="Harga Barang" disabled>
                </div>
              </div>

              <!-- Tujuan Pembelian -->
              <div class="form-group">
                <label for="tujuan_pembelian">Tujuan Pembelian</label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input enable" value="Konsumtif" <?= $data->tujuan_pembelian == 'Konsumtif' ? 'checked' : '' ?> id="konsumtif" type="radio" name="tujuan_pembelian" value="Konsumtif" disabled>Konsumtif</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input enable" value="Produktif" <?= $data->tujuan_pembelian == 'Produktif' ? 'checked' : '' ?> id="produktif" type="radio" name="tujuan_pembelian" value="Produktif" disabled>Produktif</label>
                </div>
              </div>
              <!-- informasi tambahan -->
              <div class="form-group">
                <label for="">Informasi Tambahan</label>
                <textarea name="informasi_tambahan_myfaedah" class="form-control enable" id="informasi_tambahan_myfaedah" cols="40" rows="5" readonly><?= $data->informasi_tambahan ?></textarea>
              </div>
              <!-- Tombol ini muncul khusus untuk user -->
              <?php if (($this->session->userdata('level') == 1) && ($data->id_approval == 0 || $data->id_approval == 1)) { ?>
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

              <a class="btn btn-info" onclick="return confirm('Apakah Anda yakin MENYETUJUI request support ini?')" href="<?= base_url('Admin1/approve/myfaedah/id/' . $data->id_myfaedah) ?>">Approve</a>
              <a class="btn btn-danger" onclick="return confirm('Apakah Anda yakin MENOLAK request support ini?')" href="<?= base_url('Admin1/reject/myfaedah/id/' . $data->id_myfaedah) ?>">Reject</a>
              <?php } ?>
              <?php if ($this->session->userdata('level') == 3 && $data->id_approval == 2) { ?>

              <a class="btn btn-info" onclick="return confirm('Apakah Anda yakin MENYELESAIKAN request support ini?')" href="<?= base_url('Admin2/complete/myfaedah/id/' . $data->id_myfaedah) ?>">Approve</a>
              <a class="btn btn-danger" onclick="return confirm('Apakah Anda yakin MENOLAK request support ini?')" href="<?= base_url('Admin2/reject/myfaedah/id/' . $data->id_myfaedah) ?>">Reject</a>
              <?php } ?>
              <!-- Tombol Aksi ini akan muncul untuk Admin Superuser -->
              <?php if ($this->session->userdata('level') == 5) { ?>

              <a class="btn btn-info mt-1" href="<?= base_url('Superuser/complete/myfaedah/id/' . $data->id_myfaedah) ?>">Complete</a>
              <a class="btn btn-danger mt-1" href="<?= base_url('Superuser/reject/myfaedah/id/' . $data->id_myfaedah) ?>">Reject</a>
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
                      <?php if ($data->upload_file1 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myfaedah/' . $data->upload_file1) ?>"><?= $data->upload_file1 ?></a><?php } ?>
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
                      <?php if ($data->upload_file2 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myfaedah/' . $data->upload_file2) ?>"><?= $data->upload_file2 ?></a><?php } ?>
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
                      <?php if ($data->upload_file3 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myfaedah/' . $data->upload_file3) ?>"><?= $data->upload_file3 ?></a><?php } ?>
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
                      <?php if ($data->upload_file4 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myfaedah/' . $data->upload_file4) ?>"><?= $data->upload_file4 ?></a><?php } ?>
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
                      <?php if ($data->upload_file5 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myfaedah/' . $data->upload_file5) ?>"><?= $data->upload_file5 ?></a><?php } ?>
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
                      <?php if ($data->upload_file6 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myfaedah/' . $data->upload_file6) ?>"><?= $data->upload_file6 ?></a><?php } ?>
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
                      <?php if ($data->upload_file7 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myfaedah/' . $data->upload_file7) ?>"><?= $data->upload_file7 ?></a><?php } ?>
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
                      <?php if ($data->upload_file8 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myfaedah/' . $data->upload_file8) ?>"><?= $data->upload_file8 ?></a><?php } ?>
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
                      <?php if ($data->upload_file9 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myfaedah/' . $data->upload_file9) ?>"><?= $data->upload_file9 ?></a><?php } ?>
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
                      <?php if ($data->upload_file10 != NULL) { ?><a target="_blank" href="<?= base_url('uploads/myfaedah/' . $data->upload_file10) ?>"><?= $data->upload_file10 ?></a><?php } ?>
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
              <button type="submit" id="edit_myfaedah" class="btn btn-info enable" name="edit_myfaedah" disabled>Update Data!</button>
            </div>
            <?php } ?>
            <?php if ($this->session->userdata('level') == 5) { ?>
            <div class="card-footer text-center">
              <!-- Tombol ini muncul khusus untuk SUPERUSER -->
              <button type="submit" id="edit_myfaedah_superuser" class="btn btn-info enable" name="edit_myfaedah_superuser" disabled>Update Data!</button>
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
        <form method="post" action="<?= base_url('comment/post_comment/id_myfaedah') ?>">
          <div class="card">
            <div class="card-header with-border">
              <label for="">Post Komentar</label>
            </div>
            <div class="card-body">
              <div class="form-group">
                <textarea class="form-control" name="post_comment" id="post_comment" cols="10" rows="2" placeholder="Masukkan Komentar Anda" required></textarea>
                <input type="hidden" name="id_komentar" value="<?= $data->id_myfaedah ?>">
                <input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
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
        <form action="<?= base_url('comment/post_reply/id_myfaedah'); ?>" method="post">
          <div class="img-push">
            <input name="parent_comment" type="hidden" value="<?= $komen->id ?>">
            <input type="hidden" name="id_user" value="<?= $this->fungsi->user_login()->id_user ?>">
            <input name="id_komentar" type="hidden" value="<?= $data->id_myfaedah ?>">
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