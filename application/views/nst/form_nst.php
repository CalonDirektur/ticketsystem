<div class="container">
  <section class="content-header">
    <h1>Form NST</h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <form id="ticket_form" method="post" action="<?= site_url('Ticket_register/add') ?>" enctype="multipart/form-data">

      <div class="row">
        <div class="col-lg-12">
          <!-- card Data Konsumen -->
          <div class="card card-primary mt-4">
            <div class="card-header with-border">
              <h3 class="card-title">Konsumen</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="cabang">Cabang *</label>
                <select required name="-" id="cabang" class="form-control" disabled>
                  <option disabled selected value="">- Pilih Cabang -</option>
                  <?php
                  foreach ($pertanyaan as $p) {
                    ?>
                    <option value="<?= $p->id_cabang ?>" <?= $this->fungsi->user_login()->id_cabang == $p->id_cabang ? 'selected' : '' ?>><?= $p->nama_cabang ?></option>
                  <?php }  ?>
                </select>
                <input type="hidden" name="cabang" value="<?= $this->fungsi->user_login()->id_cabang ?>">
              </div>
              <!-- Insert ID Usser -->
              <input name="id_user" id="id_user" type="hidden" value="<?= $this->fungsi->user_login()->id_user ?>">
            </div>
          </div>

          <!-- card Pertanyaan form NST -->
          <div class="card card-primary mt-4">
            <div class="card-header with-border">
              <h3 class="card-title">Form NST </h3>
            </div>

            <div class="card-body">
              <!-- Nama Agent -->
              <div class="form-group">
                <label for="lead_id">Lead ID *</label>
                <input required name="lead_id" id="lead_id" type="number" class="form-control" placeholder="Lead ID" required>
              </div>
              <!-- Nama Agent -->
              <div class="form-group">
                <label for="nama_konsumen">Nama Konsumen *</label>
                <input required name="nama_konsumen" id="nama_konsumen" type="text" class="form-control" placeholder="Nama Konsumen" required>
              </div>
              <!-- Product -->
              <div class="form-group">
                <label for="produk">Produk *</label>
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
            <div class="card-header with-border">
              <h3 class="card-title">Upload File</h3>
            </div>

            <div class="card-body">
              <div class="form-group">
                <label for="upload_file1">Upload Berkas 1 *</label>
                <input name="upload_file1" id="upload_file1" type="file" class="form-control col-8" required>
              </div>
              <button type="button" id="add-upload" class="btn btn-sm btn-primary btn-icon-text"><i class="mdi mdi-plus btn-icon-prepend"></i> Add Upload</button>
              <div id="more-upload">
                <div class="form-group">
                  <label for="upload_file2">Upload Berkas 2</label>
                  <input name="upload_file2" id="upload_file2" type="file" class="form-control col-8">
                </div>
                <div class="form-group">
                  <label for="upload_file3">Upload Berkas 3</label>
                  <input name="upload_file3" id="upload_file3" type="file" class="form-control col-8">
                </div>
                <div class="form-group">
                  <label for="upload_file4">Upload Berkas 4</label>
                  <input name="upload_file4" id="upload_file4" type="file" class="form-control col-8">
                </div>
                <div class="form-group">
                  <label for="upload_file5">Upload Berkas 5</label>
                  <input name="upload_file5" id="upload_file5" type="file" class="form-control col-8">
                </div>
                <div class="form-group">
                  <label for="upload_file6">Upload Berkas 6</label>
                  <input name="upload_file6" id="upload_file6" type="file" class="form-control col-8">
                </div>
                <div class="form-group">
                  <label for="upload_file7">Upload Berkas 7</label>
                  <input name="upload_file7" id="upload_file7" type="file" class="form-control col-8">
                </div>
                <div class="form-group">
                  <label for="upload_file8">Upload Berkas 8</label>
                  <input name="upload_file8" id="upload_file8" type="file" class="form-control col-8">
                </div>
                <div class="form-group">
                  <label for="upload_file9">Upload Berkas 9</label>
                  <input name="upload_file9" id="upload_file9" type="file" class="form-control col-8">
                </div>
                <div class="form-group">
                  <label for="upload_file10">Upload Berkas 10</label>
                  <input name="upload_file10" id="upload_file10" type="file" class="form-control col-8">
                </div>
              </div>
              <p><b>Note: </b> Wajib diisi (*)</p>
            </div>
            <div class="card-footer text-center">
              <button onclick="return confirm('Harap periksa kembali\n, Apakah Anda yakin data yang diisi sudah benar?');" class="btn btn-primary" name="submit_nst">Kirim Data!</button>
    </form>
</div>
</div>
</div>

</div>
</div>
</section>