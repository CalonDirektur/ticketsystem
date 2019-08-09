<section class="content-header">
  <h1>Form Pengajuan Produk</h1>
</section>

<form method="post" action="<?= site_url('Ticket_register/add') ?>" enctype="multipart/form-data" autocomplete="off">
  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">

          <!-- card Data Konsumen -->
          <div id="card-konsumen" class="card card-primary">
            <div class="card-header with-border">
              <h3 class="card-title">Konsumen</h3>
            </div>
            <div class="card-body">
              <!-- Nama Konsumen -->
              <div class="form-group">
                <label for="nama_konsumen">Nama Calon Konsumen *</label><br>
                <small>Isi kolom ini dengan nama calon konsumen yang mengajukan pembiayaan</small>
                <input name="nama_konsumen" id="nama_konsumen" type="text" class="form-control" required autofocus>
              </div>
              <!-- Jenis Calon Konsumen -->
              <div class="form-group">
                <label for="jenis_konsumen">Jenis Calon Konsumen *</label>
                <select name="jenis_konsumen" id="jenis_konsumen" class="form-control" required>
                  <option value="" selected required disabled>- Pilih Jenis Calon Konsumen -</option>
                  <option value="Internal">Internal (Karyawan)</option>
                  <option value="Eksternal">Eksternal</option>
                </select>
              </div>
              <!-- Cabang -->
              <div class="form-group">
                <label for="cabang">Cabang *</label>
                <select name="cabang" id="cabang" class="form-control" disabled required>
                  <option disabled selected>- Pilih Cabang -</option>
                  <?php
                  foreach ($pertanyaan as $p) {
                    ?>
                    <option value="<?= $p->id_cabang ?>" <?= $this->fungsi->user_login()->id_cabang == $p->id_cabang ? 'selected' : '' ?>><?= $p->nama_cabang ?></option>
                  <?php }  ?>
                </select>
                <input type="hidden" name="cabang" value="<?= $this->fungsi->user_login()->id_cabang ?>">
                <!-- Insert ID User -->
                <input name="id_user" id="id_user" type="hidden" value="<?= $this->fungsi->user_login()->id_user ?>">
              </div>
            </div>
          </div>

          <!-- Card Pilih Input Produk -->
          <div id="card-produk" class="card mt-4">
            <div class="card-header">
              <b>Pilih Input Produk *</b>
            </div>
            <div class="card-body">
              <select name="input_produk" id="input_produk" class="form-control">
                <option disabled selected>- Pilih Produk -</option>
                <option value="My Ta'lim" id="mytalim">My Ta'lim</option>
                <option value="My Hajat" id="myhajat">My Hajat</option>
                <option value="My Ihram" id="myihram">My Ihram</option>
                <option value="My Safar" id="mysafar">My Safar</option>
              </select>
            </div>
          </div>

          <!-- CARD FORM MY TA'LIM -->
          <div id="card-mytalim" class="card card-primary mt-4 pertanyaan">
            <div class="card-header with-border">
              <h3 class="card-title">Form My Ta'lim</h3>
              <p>Berikan informasi mengenai program pendidikan dan siswa/pelajar yang telah didaftarkan pada lembaga pendidikan yang calon konsumen pilih</p>
            </div>
            <div class="card-body">
              <!-- Nama Siswa -->
              <div class="form-group">
                <label for="nama_siswa">Nama Siswa / Mahasiswa / Pelajar Yang Didaftarkan *</label>
                <input name="nama_siswa" id="nama_siswa" type="text" class="form-control validasi mytalim-required">
              </div>
              <!-- Pendidikan -->
              <div class="form-group">
                <label for="pendidikan">Jenis Pembiayaan Pendidikan *</label><br>
                <small>Berikan informasi mengenai program pendidikan dan siswa/pelajar yang telah didaftarkan pada lembaga pendidikan yang calon konsumen pilih</small>
                <select name="pendidikan" id="pendidikan" class="form-control validasi mytalim-required">
                  <option value="" required selected disabled>- Pilih Pendidikan -</option>
                  <option value="Sekolah">Sekolah (TK, SD, SMP, SMU, Pesantren)</option>
                  <option value="Universitas">Universitas (S1, S2, S3)</option>
                  <option value="Kursus">Kursus (English, Bimbel, Komputer, Lainnya)</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
              <!-- Nama Lembaga -->
              <div class="form-group">
                <label for="nama_lembaga">Nama Lembaga Pendidikan *</label>
                <input name="nama_lembaga" id="nama_lembaga" type="text" class="form-control validasi mytalim-required" placeholder="Nama Lembaga">
              </div>
              <!-- Tahun Berdiri -->
              <div class="form-group">
                <label for="tahun_berdiri">Tahun Berdiri Lembaga / Beroperasi Sejak Kapan *</label>
                <input name="tahun_berdiri" id="tahun_berdiri" type="number" class="form-control validasi mytalim-required" placeholder="Tahun Berdiri">
              </div>
              <!-- Akreditasi -->
              <div class="form-group">
                <label for="akreditasi">Akreditasi yang dimiliki lembaga tersebut *</label>
                <input name="akreditasi" id="akreditasi" type="text" class="form-control validasi mytalim-required" placeholder="Akreditasi">
              </div>
              <!-- Tahun Periode Pendidikan -->
              <div class="form-group">
                <label for="periode">Tahun Periode Pendidikan *</label>
                <small>(Contoh : 2018 - 2020)</small>
                <input name="periode" id="periode" type="text" class="form-control validasi mytalim-required" placeholder="periode">
              </div>
              <!-- Tujuan Pembiayaan -->
              <div class="form-group">
                <label for="tujuan_pembiayaan">Tujuan Pembiayaan *</label>
                <small>(Contoh: Uang masuk, uang paket semester, dll)</small>
                <input name="tujuan_pembiayaan" id="tujuan_pembiayaan" type="text" class="form-control validasi mytalim-required" placeholder="Tujuan Pembiayaan">
              </div>
              <!-- Nilai Pembiayaan -->
              <div class="form-group">
                <label for="nilai_pembiayaan_mytalim">Nilai Pembiayaan *</label>
                <input name="nilai_pembiayaan_mytalim" id="nilai_pembiayaan_mytalim" type="number" class="form-control validasi mytalim-required" placeholder="Nilai Pembiayaan">
              </div>
              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan">Informasi Tambahan</label>
                <textarea name="informasi_tambahan_mytalim" id="informasi_tambahan" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>


          <!-- CARD KATEGORI My Hajat -->
          <div id="card-kategori-myhajat" class="card card-primary mt-4 pertanyaan">
            <div class="card-header with-border">
              <h3 class="card-title">Kategori My Hajat</h3>
              <p>Informasikan secara detail pengajuan pembiayaaan Anda</p>
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input" id="renovasi" type="radio" name="kategori_myhajat">Renovasi Rumah</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input" id="sewa" type="radio" name="kategori_myhajat">Sewa Bangunan (Rumah/Ruko)</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input" id="wedding" type="radio" name="kategori_myhajat">Wedding Organizer</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input" id="franchise" type="radio" name="kategori_myhajat">Usaha Franchise</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input" id="lainnya" type="radio" name="kategori_myhajat">Lainnya</label>
                </div>
              </div>
            </div>
            <div class="card-footer">

            </div>
          </div>

          <!-- FORM KATEGORI MY HAJAT -->
          <!-- card Renovasi -->
          <div id="card-renovasi" class="card card-primary kategori-myhajat pertanyaan mt-4">
            <div class="card-header with-border">
              <h3 class="card-title">Detail Renovasi</h3>
              <p>Informasikan secara detail pengjaun pembiayaaan renovasi rumah</p>
            </div>
            <div class="card-body">
              <!-- Nama Vendor -->
              <div class="form-group">
                <label for="nama_vendor">Nama Vendor Renovasi *</label>
                <input name="nama_vendor" id="nama_vendor" type="text" class="form-control validasi renovasi-required" placeholder="Nama Vendor">
              </div>
              <!-- Jenis Vendor -->
              <div class="form-group">
                <label for="jenis_vendor">Jenis Vendor Renovasi *</label>
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input validasi renovasi-required" id="perorangan" type="radio" name="jenis_vendor" value="Perorangan">Perorangan</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input validasi renovasi-required" id="badan_usaha" type="radio" name="jenis_vendor" value="Badan Usaha">Badan Usaha</label>
                </div>
              </div>
              <div class="form-group">
                <label for="jenis_pekerjaan">Jenis Pekerjaan *</label>
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input validasi renovasi-required" id="borongan" type="radio" name="jenis_pekerjaan" value="Borongan">Borongan</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label"><input class="kategori form-check-input validasi renovasi-required" id="harian" type="radio" name="jenis_pekerjaan" value="Harian">Harian</label>
                </div>

              </div>
              <div class="form-group">

                <label for="bagian_bangunan">Bagian Bangunan Yang Direnovasi *</label>
                <input name="bagian_bangunan" id="bagian_bangunan" type="text" class="form-control validasi renovasi-required" placeholder="Bagian Bangunan Yang Direnovasi">
              </div>
              <div class="form-group">

                <label for="luas_bangunan">Luas Bangunan (Panjang x Lebar)*</label>
                <input name="luas_bangunan" id="luas_bangunan" type="text" class="form-control validasi renovasi-required" placeholder="Luas Bangunan">
              </div>
              <div class="form-group">

                <label for="jumlah_pekerja">Jumlah Tukang/Pekerja *</label>
                <input name="jumlah_pekerja" id="jumlah_pekerja" type="text" class="form-control validasi renovasi-required" placeholder="Jumlah Tukang / Pekerja">
              </div>
              <div class="form-group">

                <label for="estimasi_waktu">Estimasi Waktu Pelaksanaan *</label>
                <input name="estimasi_waktu" id="estimasi_waktu" type="text" class="form-control validasi renovasi-required" placeholder="Estimasi Waktu Pelaksanaan">
              </div>
              <div class="form-group">
                <label for="nilai_biaya">Nilai Pengajuan Pembiayaan *</label>
                <input name="nilai_biaya" id="nilai_biaya" type="number" class="form-control validasi renovasi-required" placeholder="Nilai Pembiayaan">
              </div>
              <div class="form-group">
                <label for="informasi_tambahan">Informasi Tambahan</label>
                <textarea name="informasi_tambahan_renovasi" id="informasi_tambahan" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <!-- card Sewa -->
          <div id="card-sewa" class="card card-primary kategori-myhajat pertanyaan mt-4">
            <div class="card-header with-border">
              <h3 class="card-title">Sewa</h3>
            </div>
            <div class="card-body">
              <!-- Nama Pemilik -->
              <div class="form-group">
                <label for="nama_pemilik">Nama Pemilik *</label>
                <input name="nama_pemilik" id="nama_pemilik" type="text" class="form-control validasi sewa-required" placeholder="Nama Konsumen">
              </div>
              <!-- Jenis Pemilik -->
              <div class="form-group">
                <label for="jenis_pemilik">Jenis Calon Konsumen *</label>
                <!-- <select name="jenis_pemilik" id="jenis_pemilik" class="form-control validasi sewa-required">
                  <option value="Perorangan">Perorangan</option>
                  <option value="Perusahaan">Perusahaan/Badan Usaha</option>
                </select> -->
                <div class="form-check">
                  <label class="form-check-label"><input name="jenis_pemilik" class="validasi sewa-required form-check-input" type="radio" value="Perorangan" required>Perorangan</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label"><input name="jenis_pemilik" class="validasi sewa-required form-check-input" type="radio" value="Perusahaan/Badan Usaha" required>Perusahaan/Badan Usaha</label>
                </div>
              </div>
              <!-- Hubungan dengan pemohon -->
              <div class="form-group">
                <label for="hubungan_pemohon">Hubungan dengan pemohon *</label>
                <input name="hubungan_pemohon" id="hubungan_pemohon" type="text" class="form-control validasi sewa-required" placeholder="Jenis Pemilik">
              </div>
              <!-- Luas x Panjang -->
              <div class="form-group">
                <label for="luas_panjang">Luas x Panjang *</label>
                <input name="luas_panjang" id="luas_panjang" type="text" class="form-control validasi sewa-required" placeholder="Luas x Panjang">
              </div>
              <!-- Biaya sewa per tahun -->
              <div class="form-group">
                <label for="biaya_pertahun">Biaya Sewa per Tahun *</label>
                <input name="biaya_pertahun" id="biaya_pertahun" type="text" class="form-control validasi sewa-required" placeholder="Biaya Sewa per Tahun">
              </div>
              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan">Informasi Tambahan</label>
                <textarea name="informasi_tambahan_sewa" id="informasi_tambahan" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <!-- card Wedding -->
          <div id="card-wedding" class="card card-primary kategori-myhajat pertanyaan mt-4">
            <div class="card-header with-border">
              <h3 class="card-title">Detail Wedding Organizer</h3>
              <p>Informasikan secara detail pengajuan pembiayaaan detail WO</p>
            </div>
            <div class="card-body">
              <!-- Nama WO -->
              <div class="form-group">

                <label for="nama_wo">Nama Wedding Organizer *</label>
                <input name="nama_wo" id="nama_wo" type="text" class="form-control validasi wedding-required" placeholder="Nama WO">
              </div>
              <!-- Jenis WO -->
              <div class="form-group">
                <label for="jenis_wo">Jenis Wedding Organizer *</label>
                <div class="form-check">
                  <label class="form-check-label"><input name="jenis_wo" class="validasi wedding-required form-check-input" type="radio" value="Perorangan" required>Perorangan</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label"><input name="jenis_wo" class="validasi wedding-required form-check-input" type="radio" value="Perusahaan/Badan Usaha" required>Perusahaan/Badan Usaha</label>
                </div>
              </div>
              <!-- Lama Usaha Berdiri -->
              <div class="form-group">
                <label for="lama_berdiri">Lama Usaha Berdiri *</label>
                <input name="lama_berdiri" id="lama_berdiri" type="text" class="form-control validasi wedding-required" placeholder="Lama Usaha Berdiri">
              </div>
              <!-- Jumlah Biaya -->
              <div class="form-group">
                <label for="jumlah_biaya">Jumlah Biaya Acara *</label>
                <input name="jumlah_biaya" id="jumlah_biaya" type="number" class="form-control validasi wedding-required" placeholder="Jumlah Biaya">
              </div>
              <!-- Jumlah Undangan -->
              <div class="form-group">
                <label for="jumlah_undangan">Jumlah Undangan *</label>
                <input name="jumlah_undangan" id="jumlah_undangan" type="text" class="form-control validasi wedding-required" placeholder="Jumlah Undangan">
              </div>
              <!-- Akun Sosial Media -->
              <div class="form-group">
                <label for="akun_sosmed">Akun Sosial Media WO*</label>
                <small>Masukkan nama akun social media atau website yang dimiliki jika ada (contoh: Instagram = @namaakun)</small>
                <input name="akun_sosmed" id="akun_sosmed" type="text" class="form-control validasi wedding-required" placeholder="Akun Sosial Media">
              </div>
              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan">Informasi Tambahan</label>
                <textarea name="informasi_tambahan_wedding" id="informasi_tambahan" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <!-- card Franchise -->
          <div id="card-franchise" class="card card-primary kategori-myhajat pertanyaan mt-4">
            <div class="card-header with-border">
              <h3 class="card-title">Franchise</h3>
            </div>
            <div class="card-body">
              <!-- Nama Franchise -->
              <div class="form-group">
                <label for="nama_franchise">Nama Franchise *</label>
                <input name="nama_franchise" id="nama_franchise" type="text" class="form-control validasi franchise-required" placeholder="Nama Franchise">
              </div>
              <!-- Jumlah Cabang -->
              <div class="form-group">
                <label for="jumlah_cabang">Jumlah Cabang Yang Dimiliki*</label>
                <input name="jumlah_cabang" id="jumlah_cabang" type="number" class="form-control validasi franchise-required" placeholder="Jumlah Cabang">
              </div>
              <!-- Jenis Franchise -->
              <div class="form-group">
                <label for="jenis_franchise">Jenis Franchise *</label>
                <select name="jenis_franchise" id="jenis_franchise" class="form-control validasi franchise-required">
                  <option value="Makanan dan Minuman">Makanan dan Minuman</option>
                  <option value="Otomotif">Otomotif</option>
                  <option value="Pendidikan/pelatihan">Pendidikan/Pelatihan</option>
                  <option value="Hiburan & Hobi">Hiburan & Hobi</option>
                  <option value="Komputer/Teknologi">Komputer/Teknologi</option>
                  <option value="Kesehatan & Kecantikan">Kesehatan & Kecantikan</option>
                  <option value="Retail">Retail</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
              <!-- Tahun Berdiri -->
              <div class="form-group">
                <label for="tahun_berdiri_franchise">Tahun Berdiri Franchise *</label>
                <input name="tahun_berdiri_franchise" id="tahun_berdiri_franchise" type="text" class="form-control validasi franchise-required" placeholder="Tahun Berdiri">
              </div>
              <!-- Harga -->
              <div class="form-group">
                <label for="harga_franchise">Harga Franchise *</label>
                <input name="harga_franchise" id="harga_franchise" type="number" class="form-control validasi franchise-required" placeholder="Harga">
              </div>
              <!-- Jangka Waktu Kepemilikan -->
              <div class="form-group">
                <label for="jangka_waktu_franchise">Jangka Waktu Franchise*</label>
                <div class="form-check">
                  <label class="form-check-label"><input name="jangka_waktu_franchise" class="validasi franchise-required form-check-input" type="radio" value="Selamanya" required>Selamanya</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label"><input name="jangka_waktu_franchise" class="validasi franchise-required form-check-input" type="radio" value="Jangka Tertentu" required>Jangka Tertentu</label>
                </div>
              </div>
              <!-- Akun Sosial Media -->
              <div class="form-group">
                <label for="akun_sosmed_website">Akun Sosial Media/Website *</label>
                <input name="akun_sosmed_website" id="akun_sosmed_website" type="text" class="form-control validasi franchise-required" placeholder="Akun Sosial Media">
              </div>
              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan">Informasi Tambahan</label>
                <textarea name="informasi_tambahan_franchise" id="informasi_tambahan" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <!-- card lainnya -->
          <div id="card-lainnya" class="card card-primary kategori-myhajat pertanyaan mt-4">
            <div class="card-header with-border">
              <h3 class="card-title">Penyedia Jasa</h3>
            </div>
            <div class="card-body">
              <!-- Nama Penyedia Jasa -->
              <div class="form-group">
                <label for="nama_penyedia_jasa">Nama Penyedia Jasa *</label>
                <input name="nama_penyedia_jasa" id="nama_penyedia_jasa" type="text" class="form-control validasi lainnya-required" placeholder="Nama Penyedia Jasa">
              </div>
              <!-- Jenis Penyedia Jasa -->
              <div class="form-group">
                <label for="jenis_penyedia_jasa">Jenis Penyedia Jasa *</label>
                <select name="jenis_penyedia_jasa" id="jenis_penyedia_jasa" class="form-control validasi lainnya-required">
                  <option value="Perorangan">Perorangan</option>
                  <option value="Badan Usaha">Badan Usaha</option>
                </select>
              </div>
              <!-- Nilai Pengajuan Pembiayaan -->
              <div class="form-group">
                <label for="nilai_pembiayaan_lainnya">Nilai Pengajuan Pembiayaan *</label>
                <input name="nilai_pembiayaan_lainnya" id="nilai_pembiayaan_lainnya" type="number" class="form-control validasi lainnya-required" placeholder="Nilai Pengajuan Pembiayaan">
              </div>
              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan">Informasi Tambahan</label>
                <textarea name="informasi_tambahan_lainnya" id="informasi_tambahan" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <!-- CARD FORM My Ihram -->
          <div id="card-myihram" class="card card-primary mt-4 pertanyaan">
            <div class="card-header with-border">
              <h3 class="card-title">Form My Ihram</h3>
            </div>

            <div class="card-body">
              <!-- Nama travel -->
              <div class="form-group">
                <label for="nama_travel">Nama Travel *</label>
                <input name="nama_travel_myihram" id="nama_travel_myihram" type="text" class="form-control validasi myihram-required" placeholder="Nama Travel">
              </div>
            </div>
          </div>

          <!-- CARD FORM My SAFAR -->
          <div id="card-mysafar" class="card card-primary mt-4 pertanyaan">
            <div class="card-header with-border">
              <h3 class="card-title">Form My Safar</h3>
            </div>

            <div class="card-body">
              <!-- Nama travel -->
              <div class="form-group">
                <label for="nama_travel">Nama Travel *</label>
                <input name="nama_travel_mysafar" id="nama_travel_mysafar" type="text" class="form-control validasi mysafar-required" placeholder="Nama Travel">
              </div>
            </div>
          </div>

          <!-- card Upload File -->
          <div class="card card-primary mt-4 pertanyaan upload">
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
              <button id="submit" class="btn btn-primary" name="">Kirim Data!</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>