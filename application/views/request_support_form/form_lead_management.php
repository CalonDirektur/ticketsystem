<div class="container mb-5">
  <section class="content-header text-center mt-4">
    <h4>Form Lead Management</h4>
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
              <h3 class="card-title">Detail Leads</h3>
            </div>
            <div class="card-body">
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
                <input type="hidden" name="cabang" value="<?= $this->fungsi->user_login()->id_cabang ?>">
              </div>
              <!-- Asal Leads -->
              <div class="form-group">
                <label>Asal Leads</label>
                <div class="form-check form-check-info">
                  <label class="form-check-label">
                    <input class="form-check-input" id="in_branch" type="radio" name="asal_leads" value="In Branch" required>
                    In Branch
                  </label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label">
                    <input class="form-check-input" id="cross_branch" type="radio" name="asal_leads" value="Cross-Branch" required>
                    Cross-Branch
                  </label>
                </div>
              </div>

              <!-- Asal Leads (muncul jika cross branch dipilih) -->
              <div class="cross-branch-div">
                <!-- Nama Cabang Tujuan -->
                <div class="form-group">
                  <label for="cabang_tujuan">Cabang Tujuan </label>
                  <select name="cabang_tujuan" id="cabang_tujuan" class="form-control cross_branch-required">
                    <option disabled selected value="">- Pilih Cabang -</option>
                    <?php
                    foreach ($pertanyaan as $p) {
                      ?>
                      <option value="<?= $p->id_cabang ?>" <?= $p->id_cabang == 46 ? 'disabled' : '' ?>><?= $p->nama_cabang ?></option>
                    <?php }  ?>
                  </select>
                </div>
                <!-- Surveyor -->
                <div class="form-group">
                  <label for="surveyor">Surveyor </label>
                  <input name="surveyor" id="surveyor" type="text" class="form-control cross_branch-required">
                </div>
                <!-- TTD PIC -->
                <div class="form-group">
                  <label for="ttd_pic">PIC Akad</label>
                  <input name="ttd_pic" id="ttd_pic" type="text" class="form-control cross_branch-required">
                </div>
              </div>

              <!-- Lead ID -->
              <div class="form-group">
                <?= form_error('lead_id') ?>
                <label for="lead_id">Lead ID </label><br>
                <!-- <small>Masukkan nomor Lead ID customer Anda</small> -->
                <input required name="lead_id" id="lead_id" type="text" class="form-control" maxlength="16" value="<?= set_value('lead_id') ?>" placeholder="201908SLOS123456" autocomplete="off" required>
              </div>
              <!-- No. KTP -->
              <div class="form-group">
                <label for="no_ktp">No. KTP</label>
                <input type="number" name="no_ktp" id="no_ktp" class="form-control" maxlength="16" value="<?= set_value('no_ktp') ?>" autocomplete="off" required>
              </div>
              <!-- Nama Konsumen -->
              <div class="form-group">
                <label for="nama_konsumen">Nama Konsumen </label><br>
                <!-- <small>Masukkan nama konsumen sesuai dengan KTP dan Nama Register di Web</small> -->
                <input required name="nama_konsumen" id="nama_konsumen" type="text" class="form-control" value="<?= set_value('nama_konsumen') ?>" required>
              </div>
              <!-- Sumber Lead -->
              <div class="form-group">
                <label for="sumber_lead">Sumber Lead </label>
                <select required name="sumber_lead" id="sumber_lead" class="form-control" required>
                  <option disabled selected value="">- Pilih Sumber Lead -</option>
                  <option value="Direct Selling">Direct Selling</option>
                  <option value="Tour & Travel / Penyedia Jasa">Tour & Travel / Penyedia Jasa</option>
                  <option value="Agent">Agent</option>
                  <option value="EGC">EGC</option>
                  <option value="CGC">CGC</option>
                  <option value="Digital Marketing">Digital Marketing</option>
                  <option value="Digital Partner">Digital Partner</option>
                  <option value="Website BFI Syariah">Website BFI Syariah</option>
                  <option value="Walk-in">Walk-in</option>
                  <option value="RO">RO</option>
                </select>
              </div>
              <!-- Nama Pemberi Lead -->
              <div class="form-group">
                <label for="nama_pemberi_lead">Nama Pemberi Lead </label><br>
                <input required name="nama_pemberi_lead" id="nama_pemberi_lead" type="text" class="form-control" value="<?= set_value('nama_pemberi_lead') ?>" required>
              </div>
              <!-- produk -->
              <div class="form-group">
                <label for="produk">Produk </label>
                <select required name="produk" id="produk" class="form-control" required>
                  <option disabled selected value="">- Pilih Produk -</option>
                  <option value="My Ihram">My Ihram</option>
                  <option value="My Safar">My Safar</option>
                  <option value="My Talim">My Talim</option>
                  <option value="My Hajat">My Hajat</option>
                  <option value="My Faedah">My Faedah</option>
                  <option value="My CarS">My CarS</option>
                </select>
              </div>
              <!-- Object Price -->
              <div class="form-group">
                <label for="object_price">Harga Beli </label><br>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text bg-success text-white">Rp.</div>
                  </div>
                  <!-- <small>Masukkan Object Price hanya angka saja, tanpa Rp, tanpa koma (,) ataupun tanpa (.) </small> -->
                  <input name="object_price" id="object_price" type="number" class="form-control" placeholder="Masukkan Harga Beli Cabang" value="<?= set_value('object_price') ?>" required>
                </div>
              </div>

              <!-- Insert ID User -->
              <input name="id_user" id="id_user" type="hidden" value="<?= $this->fungsi->user_login()->id_user ?>">

            </div>
            <div class="card-footer">
              <button class="btn btn-info text-center pull-right" name="submit_lead_management">Kirim Data!</button>
            </div>
          </div>

        </div>
      </div>
    </form>
  </section>
</div>