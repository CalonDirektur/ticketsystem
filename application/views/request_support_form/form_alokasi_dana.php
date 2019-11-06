<div class="container mb-5">
  <section class="content-header text-center mt-4">
    <h4>Form Alokasi Dana</h4>
    <p><?= date('d F, Y'); ?></p>
  </section>

  <!-- Main content -->
  <section class="content">

    <form id="ticket_form" method="post" action="<?= site_url('Ticket_register/add') ?>" enctype="multipart/form-data">

      <div class="row">
        <div class="col-lg-12">
          <!-- card Data Konsumen -->
          <div class="card card-primary mt-4">
            <div class="card-header with-border">
              <h3 class="card-title">Alokasi Dana</h3>
            </div>
            <div class="card-body">

              <!-- Insert ID User -->
              <input name="id_user" id="id_user" type="hidden" value="<?= $this->fungsi->user_login()->id_user ?>">

              <!-- Nama Cabang -->
              <div class="form-group">
                <label for="cabang">Cabang </label>
                <select required name="-" id="cabang" class="form-control" disabled>
                  <option disabled selected value="">- Pilih Cabang -</option>
                  <?php
                  foreach ($pertanyaan as $p) {
                    ?>
                    <option value="<?= $p->id_cabang ?>" <?= $this->fungsi->user_login()->id_cabang == $p->id_cabang ? 'selected' : '' ?>><?= $p->nama_cabang ?></option>
                  <?php }  ?>
                </select>
                <input type="hidden" name="id_cabang" value="<?= $this->fungsi->user_login()->id_cabang ?>">
              </div>

              <!-- Nama -->
              <div class="form-group">
                <label for="nama_konsumen">Nama Konsumen</label>
                <input class="form-control" type="text" name="nama_konsumen" id="nama_konsumen" placeholder="Okky Aditya Wibowo" required>
              </div>

              <!-- Nomor Kontrak -->
              <div class="form-group">
                <label for="nama">Nomor Kontrak</label>
                <input class="form-control" type="number" name="nomor_kontrak" id="nomor_kontrak" placeholder="123456" required>
              </div>

              <!-- Angsuran -->
              <div class="form-group">
                <label for="nama">Angsuran</label>
                <input class="form-control" type="text" name="angsuran" id="angsuran" placeholder="Angsuran" required>
              </div>

              <!-- Dana yang ditransfer -->
              <div class="form-group">
                <label for="biaya_pertahun">Dana yang ditransfer</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white">Rp.</span>
                  </div>
                  <input name="dana" id="dana" type="number" class="form-control" placeholder="Dana yang ditransfer" required>
                </div>
              </div>

              <!-- Bank Tujuan -->
              <div class="form-group">
                <label for="nama">Bank Tujuan</label>
                <input class="form-control" type="text" name="bank_tujuan" id="bank_tujuan" placeholder="Mandiri / BCA / BRI / BNI" required>
              </div>

              <!-- Catatan -->
              <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea class="form-control" name="catatan" id="catatan" cols="30" rows="10"></textarea>
              </div>

              <!-- Lampiran -->
              <div class="form-group">
                <label>Lampiran</label>
                <input type="file" name="lampiran" class="file-upload-default" required>
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" required disabled placeholder="Upload Lampiran">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                  </span>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button onclick="return confirm('Apakah data-data yang diisi sudah valid? \nMohon periksa kembali data yang diinput.')" class="btn btn-info text-center pull-right" name="submit_alokasi_dana">Kirim Data!</button>
            </div>
          </div>

        </div>
      </div>
    </form>
  </section>
</div>