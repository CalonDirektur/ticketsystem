<div class="container mb-5">
  <section class="content-header text-center mt-4">
    <h4>Form NST</h4>
    <p><?= date('d F, Y'); ?></p>
  </section>

  <!-- Main content -->
  <section class="content">

    <form id="ticket_form" method="post" action="<?= site_url('Ticket_register/add') ?>" enctype="multipart/form-data">

      <div class="row">
        <div class="col-lg-12">

          <input type="hidden" name="cabang" value="<?= $this->fungsi->user_login()->id_cabang ?>">
          <input name="id_user" id="id_user" type="hidden" value="<?= $this->fungsi->user_login()->id_user ?>">

          <!-- card Pertanyaan form NST -->
          <div class="card card-primary mt-4">
            <div class="card-header with-border">
              <h3 class="card-title">Form NST </h3>
            </div>

            <div class="card-body">
              <!-- Lead ID -->
              <div class="form-group">
                <?= form_error('lead_id') ?>
                <label for="lead_id">Lead ID </label>
                <input required name="lead_id" id="lead_id" type="text" class="form-control" placeholder="201908SLOS123456" maxlength="16" value="<?= set_value('lead_id') ?>" required>
              </div>
              <!-- Nama Konsumen -->
              <div class="form-group">
                <label for="nama_konsumen">Nama Konsumen </label>
                <input required name="nama_konsumen" id="nama_konsumen" type="text" class="form-control" placeholder="Nama Konsumen" value="<?= set_value('nama_konsumen') ?>" required>
              </div>
              <!-- Product -->
              <div class="form-group">
                <label for="produk">Produk </label>
                <select required name="produk" id="produk" class="form-control" required>
                  <option disabled selected value="">- Pilih Produk -</option>
                  <option value="My Ihram">My Ihram</option>
                  <option value="My Safar">My Safar</option>
                  <option value="My Ta'lim">My Ta'lim</option>
                  <option value="My Hajat">My Hajat</option>
                  <option value="My CarS">My CarS</option>
                  <option value="My Faedah">My Faedah</option>
                </select>
              </div>
            </div>
          </div>

          <!-- card Upload File -->
          <div class="card card-primary mt-4">
            <div class="card-header">
              <b>Data Lampiran</b>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>File upload 1</label>
                <input type="file" name="upload_file1" class="file-upload-default" required>
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                  </span>
                </div>
              </div>
              <button type="button" id="add-upload" class="btn btn-sm btn-info btn-icon-text"><i class="mdi mdi-plus btn-icon-prepend mb-4"></i> Add Upload</button>

              <div id="more-upload" class="mt-4 mb-4">
                <div class="form-group">
                  <label>Dokumen 2</label>
                  <input type="file" name="upload_file2" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Dokumen 3</label>
                  <input type="file" name="upload_file3" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Dokumen 4</label>
                  <input type="file" name="upload_file4" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Dokumen 5</label>
                  <input type="file" name="upload_file5" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Dokumen 6</label>
                  <input type="file" name="upload_file6" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Dokumen 7</label>
                  <input type="file" name="upload_file7" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Dokumen 8</label>
                  <input type="file" name="upload_file8" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Dokumen 9</label>
                  <input type="file" name="upload_file9" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Dokumen 10</label>
                  <input type="file" name="upload_file10" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
              </div>

              <div class="alert alert-success mt-4">
                <strong>Perhatian!</strong> File upload tidak boleh lebih dari 10 MB.
              </div>
            </div>
            <div class="card-footer text-center">
              <button type="submit" id="submit" class="btn btn-info pull-right" name="submit_nst">Kirim Data!</button>
            </div>
          </div>

        </div>

      </div>
    </form>
  </section>
</div>