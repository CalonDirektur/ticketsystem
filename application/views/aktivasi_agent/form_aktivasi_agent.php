<div class="container">
  <section class="content-header text-center mt-4">
    <h4>Form Aktivasi Agent</h4>
    <p><?= date('d F, Y'); ?></p>
  </section>

  <!-- Main content -->
  <section class="content">

    <form id="ticket_form" method="post" action="<?= site_url('Ticket_register/add') ?>" enctype="multipart/form-data">

      <div class="row">
        <div class="col-lg-12">

          <input type="hidden" name="cabang" value="<?= $this->fungsi->user_login()->id_cabang ?>">
          <input name="id_user" id="id_user" type="hidden" value="<?= $this->fungsi->user_login()->id_user ?>">

          <!-- card Pertanyaan form My Ihram -->
          <div class="card card-primary mt-4">
            <div class="card-header with-border">
              <h3 class="card-title">Form Aktivasi Agent</h3>
            </div>

            <div class="card-body">
              <!-- Nama Agent -->
              <div class="form-group">
                <label for="nama_agent">Nama Agent </label>
                <input required name="nama_agent" id="nama_agent" type="text" class="form-control" placeholder="Nama Agent" required>
              </div>
              <!-- Jenis Agent -->
              <div class="form-group">
                <label for="jenis_agent">Jenis Agent </label>
                <select name="jenis_agent" id="jenis_agent" class="form-control" required>
                  <option disabled selected value="">- Jenis Agent -</option>
                  <option value="Syariah Ambassador">Syariah Ambassador</option>
                  <option value="Syariah Agent">Syariah Agent</option>
                  <option value="Syariah Point">Syariah Point</option>
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
                <input type="file" name="file_upload1" class="file-upload-default" required>
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
                  <input type="file" name="file_upload2" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Dokumen 3</label>
                  <input type="file" name="file_upload3" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Dokumen 4</label>
                  <input type="file" name="file_upload4" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Dokumen 5</label>
                  <input type="file" name="file_upload5" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Dokumen 6</label>
                  <input type="file" name="file_upload6" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Dokumen 7</label>
                  <input type="file" name="file_upload7" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Dokumen 8</label>
                  <input type="file" name="file_upload8" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Dokumen 9</label>
                  <input type="file" name="file_upload9" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
                <div class="form-group">
                  <label>Dokumen 10</label>
                  <input type="file" name="file_upload10" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Data">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-center">
              <button type="submit" id="submit" class="btn btn-info pull-right" name="">Kirim Data!</button>
            </div>
          </div>
        </div>

      </div>
</div>
</section>
</form>