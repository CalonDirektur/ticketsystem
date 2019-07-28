<div class="container">
  <section class="content-header">
    <h1>Form My Talim</h1>
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
                <label for="nama_konsumen">Nama Konsumen *</label>
                <input required name="nama_konsumen" id="nama_konsumen" type="text" class="form-control" placeholder="Nama Konsumen">
              </div>
              <!-- Jenis Calon Konsumen -->
              <div class="form-group">
                <label for="jenis_konsumen">Jenis Calon Konsumen *</label>
                <select required name="jenis_konsumen" id="jenis_konsumen" class="form-control">
                  <option value="Internal">Internal</option>
                  <option value="Eksternal">Eksternal</option>
                </select>
              </div>
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

          <!-- card Pertanyaan form My'Talim -->
          <div class="card card-primary mt-4">
            <div class="card-header with-border">
              <h3 class="card-title">Form My Ta'lim</h3>
            </div>

            <div class="card-body">
              <!-- Pendidikan -->
              <div class="form-group">
                <label for="pendidikan">Pendidikan *</label>
                <select required name="pendidikan" id="pendidikan" class="form-control">
                  <option value="Sekolah">Sekolah</option>
                  <option value="Universitas">Universitas</option>
                  <option value="Kursus">Kursus</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
              <!-- Nama Lembaga -->
              <div class="form-group">
                <label for="nama_lembaga">Nama Lembaga *</label>
                <input required name="nama_lembaga" id="nama_lembaga" type="text" class="form-control" placeholder="Nama Lembaga">
              </div>
              <!-- Tahun Berdiri -->
              <div class="form-group">
                <label for="tahun_berdiri">Tahun Berdiri *</label>
                <input required name="tahun_berdiri" id="tahun_berdiri" type="number" class="form-control" placeholder="Tahun Berdiri">
              </div>
              <!-- Akreditasi -->
              <div class="form-group">
                <label for="akreditasi">Akreditasi *</label>
                <input required name="akreditasi" id="akreditasi" type="text" class="form-control" placeholder="Akreditasi">
              </div>
              <!-- Tahun Periode Pendidikan -->
              <div class="form-group">
                <label for="periode">Tahun Periode Pendidikan *</label>
                <input required name="periode" id="periode" type="text" class="form-control" placeholder="periode">
              </div>
              <!-- Tujuan Pembiayaan -->
              <div class="form-group">
                <label for="tujuan_pembiayaan">Tujuan Pembiayaan *</label>
                <input required name="tujuan_pembiayaan" id="tujuan_pembiayaan" type="text" class="form-control" placeholder="Tujuan Pembiayaan">
              </div>
              <!-- Nilai Pembiayaan -->
              <div class="form-group">
                <label for="nilai_pembiayaan">Nilai Pembiayaan *</label>
                <input required name="nilai_pembiayaan" id="nilai_pembiayaan" type="text" class="form-control" placeholder="Nilai Pembiayaan">
              </div>
              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan">Informasi Tambahan</label>
                <textarea name="informasi_tambahan" id="informasi_tambahan" cols="30" rows="10" class="form-control"></textarea>
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
              <p><b>Note: </b> Wajib diisi (*)</p>
            </div>
            <div class="card-footer text-center">
              <button onclick="return confirm('Harap periksa kembali\n, Apakah Anda yakin data yang diisi sudah benar?');" class="btn btn-primary" name="submit_mytalim">Kirim Data!</button>
    </form>
</div>
</div>
</div>

</div>
</div>
</section>