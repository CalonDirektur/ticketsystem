<div class="container mb-5">
  <section class="content-header text-center mt-4">
    <h4>Form Lead Interest</h4>
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

              <!-- Source -->
              <!-- <div class="form-group">
                <label for="source">Source</label>
                <input class="form-control" type="text" name="source" id="source" placeholder="http://www.natieva.com/" required>
              </div> -->

              <!-- Nama -->
              <div class="form-group">
                <label for="nama">Nama</label>
                <input class="form-control" type="text" name="nama" id="nama" placeholder="Okky Aditya Wibowo" required>
              </div>

              <!-- email -->
              <div class="form-group">
                <label for="email">E-mail</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="its.okkay@gmail.com" required>
              </div>

              <!-- telepon -->
              <div class="form-group">
                <label for="telepon">Telepon</label>
                <input class="form-control" type="number" name="telepon" id="telepon" placeholder="08xxxxxxxxxx" required>
              </div>

              <!-- kota -->
              <!-- <div class="form-group">
                <label for="kota">Kota</label>
                <input class="form-control" type="text" name="kota" id="kota" placeholder="Tangerang" required>
              </div> -->

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

              <!-- produk -->
              <!-- <div class="form-group">
                <label for="produk">Produk </label>
                <select class="form-control" name="produk" id="produk" required>
                  <optgroup label="Umroh">
                    <option value="Paket A">Paket A</option>
                    <option value="Paket B">Paket B</option>
                    <option value="Paket C">Paket C</option>
                  </optgroup>
                  <optgroup label="Lainnya">
                    <option value="Pendidikan/Renovasi/Lainnya">Pendidikan/Renovasi/Lainnya</option>
                    <option value="Nilai Pembiayaan">Nilai Pembiayaan</option>
                    <option value="Nama Instansi">Nama Instansi</option>
                    <option value="Telepon Instansi">Telepon Instansi</option>
                  </optgroup>
                </select>
              </div> -->

              <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea class="form-control" name="catatan" id="catatan" cols="30" rows="10"></textarea>
              </div>

              <!-- Insert ID User -->
              <input name="id_user" id="id_user" type="hidden" value="<?= $this->fungsi->user_login()->id_user ?>">

            </div>
            <div class="card-footer">
              <button onclick="return confirm('Apakah data-data yang diisi sudah valid? \nMohon periksa kembali data yang diinput.')" class="btn btn-info text-center pull-right" name="submit_lead_interest">Kirim Data!</button>
            </div>
          </div>

        </div>
      </div>
    </form>
  </section>
</div>