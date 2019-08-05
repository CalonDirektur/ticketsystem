<div class="container">
  <section class="content-header">
    <h1>Form Lead Management</h1>
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
              <!-- Nama Konsumen -->
              <div class="form-group">
                <label for="email">Email *</label>
                <input required name="email" id="email" type="text" class="form-control" value="<?= $this->fungsi->user_login()->email ?>" readonly>
              </div>
              <!-- Nama Konsumen -->
              <div class="form-group">
                <label for="nama_konsumen">Nama Konsumen *</label>
                <input required name="nama_konsumen" id="nama_konsumen" type="text" class="form-control" placeholder="Nama Konsumen" required>
              </div>
              <!-- NIK -->
              <div class="form-group">
                <label for="nik">NIK *</label><br>
                <small>Masukkan 6 digit NIK Anda</small>
                <input required name="nik" id="nik" type="text" class="form-control" placeholder="NIK" value="<?= $this->fungsi->user_login()->nik ?>" required readonly>
              </div>
              <!-- Nama Cabang -->
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
              <!-- Insert ID User -->
              <input name="id_user" id="id_user" type="hidden" value="<?= $this->fungsi->user_login()->id_user ?>">
            </div>
          </div>

          <!-- card Pertanyaan form My'Talim -->
          <div class="card card-primary mt-4">
            <div class="card-header with-border">
              <h3 class="card-title">Form My Lead Management</h3>
            </div>

            <div class="card-body">
              <!-- Lead ID -->
              <div class="form-group">
                <label for="lead_id">Lead ID *</label><br>
                <small>Masukkan nomor Lead ID customer Anda</small>
                <input required name="lead_id" id="lead_id" type="text" class="form-control" required>
              </div>
              <!-- Nama Konsumen -->
              <div class="form-group">
                <label for="nama_konsumen">Nama Konsumen *</label><br>
                <small>Masukkan nama konsumen sesuai dengan KTP dan Nama Register di Web</small>
                <input required name="nama_konsumen" id="nama_konsumen" type="text" class="form-control" required>
              </div>
              <!-- Nomor KTP Konsumen -->
              <div class="form-group">
                <label for="ktp_konsumen">Nomor KTP Konsumen *</label><br>
                <small>Masukkan 16 digit nomor KTP tanpa spaci, -atau titik (.)</small>
                <input required name="ktp_konsumen" id="ktp_konsumen" type="text" class="form-control" required>
              </div>
              <!-- Sumber Lead -->
              <div class="form-group">
                <label for="sumber_lead">Sumber Lead *</label>
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
                <label for="nama_pemberi_lead">Nama Pemberi Lead *</label><br>
                <small>Masukkan nama perusahaan (Tour & Travel) jika pemberi lead perusahaan (Tour & Travel)</small>
                <input required name="nama_pemberi_lead" id="nama_pemberi_lead" type="text" class="form-control" required>
              </div>
              <!-- produk -->
              <div class="form-group">
                <label for="produk">Produk *</label>
                <select required name="produk" id="produk" class="form-control" required>
                  <option disabled selected value="">- Pilih Produk -</option>
                  <option value="My Ihram">My Ihram</option>
                  <option value="My Safar">My Safar</option>
                  <option value="My Ta'lim">My Ta'lim</option>
                  <option value="My Hajat">My Hajat</option>
                </select>
              </div>
              <!-- Object Price -->
              <div class="form-group">
                <label for="object_price">Object Price *</label><br>
                <small>Masukkan Object Price hanya angka saja, tanpa Rp, tanpa koma (,) ataupun tanpa (.) </small>
                <input name="object_price" id="object_price" type="text" class="form-control" required>
              </div>
            </div>
            <div class="card-footer text-center">
              <button class="btn btn-primary" name="submit_lead_management">Kirim Data!</button>
    </form>
</div>
</div>
</div>
</div>
</div>
</section>