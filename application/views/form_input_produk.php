<section class="content-header text-center mt-4 mb-4">
  <h4>Form Pengajuan Produk</h4>
  <p><?= date('d F, Y'); ?></p>
</section>

<form method="post" action="<?= site_url('Ticket_register/add') ?>" enctype="multipart/form-data" autocomplete="off">
  <section class="content mb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">

          <!-- card Data Konsumen -->
          <div id="card-konsumen" class="card card-primary">
            <div class="card-header">
              <b>Konsumen</b>
            </div>
            <div class="card-body">
              <!-- Nama Konsumen -->
              <div class="form-group">
                <label for="nama_konsumen">Nama Konsumen </label><br>
                <!-- <small>Isi kolom ini dengan nama calon konsumen yang mengajukan pembiayaan</small> -->
                <input name="nama_konsumen" id="nama_konsumen" type="text" class="form-control" placeholder="Nama Konsumen" required autofocus>
              </div>
              <!-- Jenis Calon Konsumen -->
              <div class="form-group">
                <label for="jenis_konsumen">Jenis Konsumen </label>
                <select name="jenis_konsumen" id="jenis_konsumen" class="form-control" required>
                  <option value="" selected required disabled>- Pilih Jenis Calon Konsumen -</option>
                  <option value="Internal">Internal (Karyawan)</option>
                  <option value="Eksternal">Eksternal</option>
                </select>
              </div>
              <!-- Cabang -->
              <div class="form-group">
                <input type="hidden" name="cabang" value="<?= $this->fungsi->user_login()->id_cabang ?>">
                <!-- Insert ID User -->
                <input name="id_user" id="id_user" type="hidden" value="<?= $this->fungsi->user_login()->id_user ?>">
              </div>
              <!-- Pilih Input Produk -->
              <div class="form-group">
                <label for="input_produk">Pilih Input Produk</label>
                <select name="input_produk" id="input_produk" class="form-control">
                  <option disabled selected>- Pilih Produk -</option>
                  <option value="My Ta'lim" id="mytalim">My Ta'lim</option>
                  <option value="My Hajat" id="myhajat">My Hajat</option>
                  <option value="My Ihram" id="myihram">My Ihram</option>
                  <option value="My Safar" id="mysafar">My Safar</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Card Pilih Input Produk -->
          <!-- <div id="card-produk" class="card mt-4">
            <div class="card-header">
              <b>Pilih Input Produk</b>
            </div>
            <div class="card-body">
              
            </div>
          </!-->

          <!-- CARD FORM MY TA'LIM -->
          <div id="card-mytalim" class="card card-primary mt-4 pertanyaan">
            <div class="card-header">
              <b>Form My Ta'lim</b>
              <p>Berikan informasi mengenai program pendidikan dan siswa/pelajar yang telah didaftarkan pada lembaga pendidikan yang calon konsumen pilih</p>
            </div>
            <div class="card-body">
              <!-- Nama Siswa -->
              <div class="form-group">
                <label for="nama_siswa">Nama Pelajar </label>
                <input name="nama_siswa" id="nama_siswa" type="text" class="form-control validasi mytalim-required" placeholder="Nama Pelajar">
              </div>
              <!-- Pendidikan -->
              <div class="form-group">
                <label for="pendidikan">Jenis Pembiayaan Pendidikan </label><br>
                <!-- <small>Berikan informasi mengenai program pendidikan dan siswa/pelajar yang telah didaftarkan pada lembaga pendidikan yang calon konsumen pilih</small> -->
                <select name="pendidikan" id="pendidikan" class="form-control validasi mytalim-required">
                  <option value="" required selected hidden>- Pilih Pendidikan -</option>
                  <option value="Sekolah">Sekolah (TK, SD, SMP, SMU, Pesantren)</option>
                  <option value="Universitas">Universitas (S1, S2, S3)</option>
                  <option value="Kursus">Kursus (English, Bimbel, Komputer, Lainnya)</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
              <!-- Nama Lembaga -->
              <div class="form-group">
                <label for="nama_lembaga">Nama Lembaga Pendidikan </label>
                <input name="nama_lembaga" id="nama_lembaga" type="text" class="form-control validasi mytalim-required" placeholder="Nama Lembaga">
              </div>
              <!-- Tahun Berdiri -->
              <div class="form-group">
                <label for="tahun_berdiri">Tahun Berdiri Lembaga </label>
                <input name="tahun_berdiri" id="tahun_berdiri" type="number" class="form-control validasi mytalim-required" placeholder="Tahun Berdiri">
              </div>
              <!-- Akreditasi -->
              <div class="form-group">
                <label for="akreditasi">Akreditasi lembaga pendidikan </label>
                <input name="akreditasi" id="akreditasi" type="text" class="form-control validasi mytalim-required" placeholder="Akreditasi A">
              </div>
              <!-- Tahun Periode Pendidikan -->
              <div class="form-group">
                <label for="periode">Tahun Periode Pendidikan </label>
                <!-- <small>(Contoh : 2018 - 2020)</small> -->
                <input name="periode" id="periode" type="text" class="form-control validasi mytalim-required" placeholder="2018 - 2020">
              </div>
              <!-- Tujuan Pembiayaan -->
              <div class="form-group">
                <label for="tujuan_pembiayaan">Tujuan Pembiayaan </label>
                <!-- <small>(Contoh: Uang masuk, uang paket semester, dll)</small> -->
                <input name="tujuan_pembiayaan" id="tujuan_pembiayaan" type="text" class="form-control validasi mytalim-required" placeholder="Uang Masuk / Uang Paket Semester / Lainnya">
              </div>
              <!-- Nilai Pembiayaan -->
              <div class="form-group">
                <label for="nilai_pembiayaan_mytalim">Nilai Pembiayaan </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white">Rp. </span>
                  </div>

                  <input name="nilai_pembiayaan_mytalim" id="nilai_pembiayaan_mytalim" type="number" class="form-control validasi mytalim-required" placeholder="Nilai Pembiayaan">
                </div>
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
            <div class="card-header">
              <b>Kategori My Hajat</b>
              <!-- <p>Informasikan secara detail pengajuan pembiayaaan Anda</p> -->
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check" id="renovasi" type="radio" name="kategori_myhajat">Renovasi Rumah</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check" id="sewa" type="radio" name="kategori_myhajat">Sewa Bangunan (Rumah/Ruko)</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input" id="wedding" type="radio" name="kategori_myhajat">Wedding Organizer</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input" id="franchise" type="radio" name="kategori_myhajat">Usaha Franchise</label>
                </div>
                <div class="form-check form-check-info">
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
            <div class="card-header">
              <b>Detail Renovasi</b>
              <!-- <p>Informasikan secara detail pengjaun pembiayaaan renovasi rumah</p> -->
            </div>
            <div class="card-body">
              <!-- Nama Vendor -->
              <div class="form-group">
                <label for="nama_vendor">Nama Vendor Renovasi </label>
                <input name="nama_vendor" id="nama_vendor" type="text" class="form-control validasi renovasi-required" placeholder="Nama Vendor">
              </div>
              <!-- Jenis Vendor -->
              <div class="form-group">
                <label for="jenis_vendor">Jenis Vendor Renovasi </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi renovasi-required" id="perorangan" type="radio" name="jenis_vendor" value="Perorangan">Perorangan</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi renovasi-required" id="badan_usaha" type="radio" name="jenis_vendor" value="Badan Usaha">Badan Usaha</label>
                </div>
              </div>
              <!-- Jenis Pekerjaan -->
              <div class="form-group">
                <label for="jenis_pekerjaan">Jenis Pekerjaan </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi renovasi-required" id="borongan" type="radio" name="jenis_pekerjaan" value="Borongan">Borongan</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi renovasi-required" id="harian" type="radio" name="jenis_pekerjaan" value="Harian">Harian</label>
                </div>

              </div>
              <!-- Bagian bangunan yang direnovasi -->
              <div class="form-group">

                <label for="bagian_bangunan">Bagian Bangunan Yang Direnovasi </label>
                <input name="bagian_bangunan" id="bagian_bangunan" type="text" class="form-control validasi renovasi-required" placeholder="Bagian Bangunan Yang Direnovasi">
              </div>
              <!-- Luas Bangunan -->
              <div class="form-group">

                <label for="luas_bangunan">Luas Bangunan (Panjang x Lebar)</label>
                <input name="luas_bangunan" id="luas_bangunan" type="text" class="form-control validasi renovasi-required" placeholder="Luas Bangunan">
              </div>
              <!-- Jumlah Pekerja -->
              <div class="form-group">

                <label for="jumlah_pekerja">Jumlah Tukang/Pekerja </label>
                <input name="jumlah_pekerja" id="jumlah_pekerja" type="text" class="form-control validasi renovasi-required" placeholder="Jumlah Tukang / Pekerja">
              </div>
              <!-- Estimasi Waktu -->
              <div class="form-group">

                <label for="estimasi_waktu">Estimasi Waktu Pelaksanaan </label>
                <input name="estimasi_waktu" id="estimasi_waktu" type="text" class="form-control validasi renovasi-required" placeholder="Estimasi Waktu Pelaksanaan">
              </div>
              <!-- Nilai Pengajuan Pembiayaan -->
              <div class="form-group">
                <label for="nilai_biaya">Nilai Pengajuan Pembiayaan </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white">Rp.</span>
                  </div>
                  <input name="nilai_biaya" id="nilai_biaya" type="number" class="form-control validasi renovasi-required" placeholder="Nilai Pembiayaan">
                </div>
              </div>
              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan">Informasi Tambahan</label>
                <textarea name="informasi_tambahan_renovasi" id="informasi_tambahan" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <!-- card Sewa -->
          <div id="card-sewa" class="card card-primary kategori-myhajat pertanyaan mt-4">
            <div class="card-header">
              <b>Sewa Bangunan</b>
            </div>
            <div class="card-body">
              <!-- Nama Pemilik -->
              <div class="form-group">
                <label for="nama_pemilik">Nama Pemilik </label>
                <input name="nama_pemilik" id="nama_pemilik" type="text" class="form-control validasi sewa-required" placeholder="Nama Konsumen">
              </div>
              <!-- Jenis Pemilik -->
              <div class="form-group">
                <label for="jenis_pemilik">Jenis Calon Konsumen </label>
                <!-- <select name="jenis_pemilik" id="jenis_pemilik" class="form-control validasi sewa-required">
                  <option value="Perorangan">Perorangan</option>
                  <option value="Perusahaan">Perusahaan/Badan Usaha</option>
                </select> -->
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input name="jenis_pemilik" class="validasi sewa-required form-check-input" type="radio" value="Perorangan" required>Perorangan</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input name="jenis_pemilik" class="validasi sewa-required form-check-input" type="radio" value="Perusahaan/Badan Usaha" required>Perusahaan/Badan Usaha</label>
                </div>
              </div>
              <!-- Hubungan dengan pemohon -->
              <div class="form-group">
                <label for="hubungan_pemohon">Hubungan dengan pemohon </label>
                <input name="hubungan_pemohon" id="hubungan_pemohon" type="text" class="form-control validasi sewa-required" placeholder="Orang Lain / Rekan ">
              </div>
              <!-- Luas x Panjang -->
              <div class="form-group">
                <label for="luas_panjang">Luas x Panjang </label>
                <input name="luas_panjang" id="luas_panjang" type="text" class="form-control validasi sewa-required" placeholder="Luas x Panjang">
              </div>
              <!-- Biaya sewa per tahun -->
              <div class="form-group">
                <label for="biaya_pertahun">Biaya Sewa per Tahun </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white">Rp.</span>
                  </div>
                  <input name="biaya_pertahun" id="biaya_pertahun" type="number" class="form-control validasi sewa-required" placeholder="Biaya Sewa per Tahun">
                </div>
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
            <div class="card-header">
              <b>Detail Wedding Organizer</b>
              <!-- <p>Informasikan secara detail pengajuan pembiayaaan detail WO</p> -->
            </div>
            <div class="card-body">
              <!-- Nama WO -->
              <div class="form-group">

                <label for="nama_wo">Nama Wedding Organizer </label>
                <input name="nama_wo" id="nama_wo" type="text" class="form-control validasi wedding-required" placeholder="Nama WO">
              </div>
              <!-- Jenis WO -->
              <div class="form-group">
                <label for="jenis_wo">Jenis Wedding Organizer </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input name="jenis_wo" class="validasi wedding-required form-check-input" type="radio" value="Perorangan" required>Perorangan</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input name="jenis_wo" class="validasi wedding-required form-check-input" type="radio" value="Perusahaan/Badan Usaha" required>Perusahaan/Badan Usaha</label>
                </div>
              </div>
              <!-- Lama Usaha Berdiri -->
              <div class="form-group">
                <label for="lama_berdiri">Lama Usaha Berdiri </label>
                <input name="lama_berdiri" id="lama_berdiri" type="text" class="form-control validasi wedding-required" placeholder="Lama Usaha Berdiri">
              </div>
              <!-- Jumlah Biaya -->
              <div class="form-group">
                <label for="jumlah_biaya">Jumlah Biaya Acara </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white">Rp.</span>
                  </div>
                  <input name="jumlah_biaya" id="jumlah_biaya" type="number" class="form-control validasi wedding-required" placeholder="Jumlah Biaya">
                </div>
              </div>
              <!-- Jumlah Undangan -->
              <div class="form-group">
                <label for="jumlah_undangan">Jumlah Undangan </label>
                <input name="jumlah_undangan" id="jumlah_undangan" type="text" class="form-control validasi wedding-required" placeholder="Jumlah Undangan">
              </div>
              <!-- Akun Sosial Media -->
              <div class="form-group">
                <label for="akun_sosmed">Akun Sosial Media WO</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-secondary text-black">@</span>
                  </div>
                  <!-- <small>Masukkan nama akun social media atau website yang dimiliki jika ada (contoh: Instagram = @namaakun)</small> -->
                  <input name="akun_sosmed" id="akun_sosmed" type="text" class="form-control validasi wedding-required" placeholder="Contoh : (Facebook : syariahbfi | Instagram : @syariahbfi)">
                </div>

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
            <div class="card-header">
              <b>Detail Franchise</b>
            </div>
            <div class="card-body">
              <!-- Nama Franchise -->
              <div class="form-group">
                <label for="nama_franchise">Nama Franchise </label>
                <input name="nama_franchise" id="nama_franchise" type="text" class="form-control validasi franchise-required" placeholder="Nama Franchise">
              </div>
              <!-- Jumlah Cabang -->
              <div class="form-group">
                <label for="jumlah_cabang">Jumlah Cabang Yang Dimiliki</label>
                <input name="jumlah_cabang" id="jumlah_cabang" type="number" class="form-control validasi franchise-required" placeholder="Jumlah Cabang">
              </div>
              <!-- Jenis Franchise -->
              <div class="form-group">
                <label for="jenis_franchise">Jenis Franchise </label>
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
                <label for="tahun_berdiri_franchise">Tahun Berdiri Franchise </label>
                <input name="tahun_berdiri_franchise" id="tahun_berdiri_franchise" type="number" class="form-control validasi franchise-required" placeholder="Tahun Berdiri">
              </div>
              <!-- Harga -->
              <div class="form-group">
                <label for="harga_franchise">Harga Franchise </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white">Rp.</span>
                  </div>
                  <input name="harga_franchise" id="harga_franchise" type="number" class="form-control validasi franchise-required" placeholder="Harga">
                </div>
              </div>
              <!-- Jangka Waktu Kepemilikan -->
              <div class="form-group">
                <label for="jangka_waktu_franchise">Jangka Waktu Franchise</label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input name="jangka_waktu_franchise" class="validasi franchise-required form-check-input" type="radio" value="Selamanya" required>Selamanya</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input name="jangka_waktu_franchise" class="validasi franchise-required form-check-input" type="radio" value="Jangka Tertentu" required>Jangka Tertentu</label>
                </div>
              </div>
              <!-- Akun Sosial Media -->
              <div class="form-group">
                <label for="akun_sosmed_website">Akun Sosial Media/Website </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-secondary text-black">@</span>
                  </div>
                  <input name="akun_sosmed_website" id="akun_sosmed_website" type="text" class="form-control validasi franchise-required" placeholder="Contoh : (Facebook : syariahbfi | Instagram : @syariahbfi)">
                </div>
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
            <div class="card-header">
              <b>Detail Penyedia Jasa</b>
            </div>
            <div class="card-body">
              <!-- Nama Penyedia Jasa -->
              <div class="form-group">
                <label for="nama_penyedia_jasa">Nama Penyedia Jasa </label>
                <input name="nama_penyedia_jasa" id="nama_penyedia_jasa" type="text" class="form-control validasi lainnya-required" placeholder="Nama Penyedia Jasa">
              </div>
              <!-- Jenis Penyedia Jasa -->
              <div class="form-group">
                <label for="jenis_penyedia_jasa">Jenis Penyedia Jasa </label>
                <select name="jenis_penyedia_jasa" id="jenis_penyedia_jasa" class="form-control validasi lainnya-required">
                  <option value="Perorangan">Perorangan</option>
                  <option value="Badan Usaha">Badan Usaha</option>
                </select>
              </div>
              <!-- Nilai Pengajuan Pembiayaan -->
              <div class="form-group">
                <label for="nilai_pembiayaan_lainnya">Nilai Pengajuan Pembiayaan </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white">Rp.</span>
                  </div>
                  <input name="nilai_pembiayaan_lainnya" id="nilai_pembiayaan_lainnya" type="number" class="form-control validasi lainnya-required" placeholder="Nilai Pengajuan Pembiayaan">
                </div>
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
            <div class="card-header">
              <b>Form My Ihram</b>
            </div>

            <div class="card-body">
              <!-- Nama travel -->
              <div class="form-group">
                <label for="nama_travel">Nama Travel </label>
                <input name="nama_travel_myihram" id="nama_travel_myihram" type="text" class="form-control validasi myihram-required" placeholder="Nama Travel">
              </div>
            </div>
          </div>

          <!-- CARD FORM My SAFAR -->
          <div id="card-mysafar" class="card card-primary mt-4 pertanyaan">
            <div class="card-header">
              <b>Form My Safar</b>
            </div>

            <div class="card-body">
              <!-- Nama travel -->
              <div class="form-group">
                <label for="nama_travel">Nama Travel </label>
                <input name="nama_travel_mysafar" id="nama_travel_mysafar" type="text" class="form-control validasi mysafar-required" placeholder="Nama Travel">
              </div>
            </div>
          </div>

          <!-- card Upload File -->
          <div class="card card-primary mt-4 pertanyaan upload">
            <div class="card-header">
              <b>Data Lampiran</b>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>File upload 1</label>
                <input type="file" name="upload_file1" class="file-upload-default" required>
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" required disabled placeholder="Upload Data">
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
            </div>
            <div class="card-footer">
              <button type="submit" id="submit" class="btn btn-info pull-right" name="">Kirim Data!</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</form>