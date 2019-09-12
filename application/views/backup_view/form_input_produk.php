<section class="content-header text-center mt-4 mb-4">
  <h4>Form Pengajuan Produk</h4>
  <p><?= date('d F, Y'); ?></p>
</section>

<form id="submit-produk" method="post" action="<?= site_url('Ticket_register/add') ?>" enctype="multipart/form-data" autocomplete="off">
  <section class="content mb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">

          <!-- card Data Konsumen -->
          <div id="card-konsumen" class="card">
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
                  <option value="My Faedah" id="myfaedah">My Faedah</option>
                  <option value="My Cars" id="mycars">My Cars</option>
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
          <div id="card-mytalim" class="card mt-4 pertanyaan">
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
          <div id="card-kategori-myhajat" class="card mt-4 pertanyaan">
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

          <!-- CARD KATEGORI My Faedah -->
          <div id="card-kategori-myfaedah" class="card mt-4 pertanyaan">
            <div class="card-header">
              <b>Kategori My Faedah</b>
              <!-- <p>Informasikan secara detail pengajuan pembiayaaan Anda</p> -->
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check" id="bangunan" type="radio" name="kategori_myfaedah">Bahan Material Bangunan</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check" id="elektronik" type="radio" name="kategori_myfaedah">Elektronik</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input" id="modal" type="radio" name="kategori_myfaedah">Barang Modal</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input" id="qurban" type="radio" name="kategori_myfaedah">Hewan Qurban</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input" id="myfaedah_lainnya" type="radio" name="kategori_myfaedah">Lainnya</label>
                </div>
              </div>
            </div>
            <div class="card-footer">

            </div>
          </div>

          <!-- FORM KATEGORI MY HAJAT -->
          <!-- card Renovasi -->
          <div id="card-renovasi" class="card kategori-myhajat pertanyaan mt-4">
            <div class="card-header">
              <b>Detail Renovasi</b>
              <!-- <p>Informasikan secara detail pengjaun pembiayaaan renovasi rumah</p> -->
            </div>
            <div class="card-body">
              <!-- ID Vendor -->
              <input class="form-control id_vendor" type="hidden" name="id_vendor_renovasi" readonly>
              <!-- Nama Vendor -->
              <div class="form-group">
                <label for="nama_vendor">Nama Vendor Renovasi</label><br>
                <div class="input-group">
                  <input name="nama_vendor" type="text" class="form-control validasi renovasi-required nama_vendor_myhajat" placeholder="Nama Vendor">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-danger clear-nama-vendor">x</button>
                  </div>
                </div>
              </div>

              <!-- Jenis Vendor -->
              <div class="form-group jenis-vendor">
                <label for="jenis_vendor">Jenis Vendor Renovasi </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi renovasi-required perorangan" type="radio" name="jenis_vendor" value="Perorangan">Perorangan</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi renovasi-required badan_usaha" type="radio" name="jenis_vendor" value="Badan Usaha">Badan Usaha</label>
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
          <div id="card-sewa" class="card kategori-myhajat pertanyaan mt-4">
            <div class="card-header">
              <b>Sewa Bangunan</b>
            </div>
            <div class="card-body">
              <!-- Nama Pemilik -->
              <!-- <div class="form-group">
                <label for="nama_pemilik">Nama Pemilik </label>
                <input name="nama_pemilik" id="nama_pemilik" type="text" class="form-control validasi sewa-required" placeholder="Nama Pemilik">
              </div> -->
              <!-- Jenis Pemilik -->
              <!-- <div class="form-group jenis-vendor">
                <label for="jenis_pemilik">Jenis Calon Konsumen </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input name="jenis_pemilik" class="validasi sewa-required form-check-input" type="radio" value="Perorangan" required>Perorangan</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input name="jenis_pemilik" class="validasi sewa-required form-check-input" type="radio" value="Perusahaan/Badan Usaha" required>Perusahaan/Badan Usaha</label>
                </div>
              </div> -->

              <input class="form-control id_vendor" type="hidden" name="id_vendor_sewa" readonly>
              <!-- Nama Vendor -->
              <div class="form-group">
                <label for="nama_vendor">Nama Pemilik</label><br>
                <div class="input-group">
                  <input name="nama_pemilik" id="nama_pemilik" type="text" class="form-control validasi sewa-required nama_vendor_myhajat" placeholder="Nama Vendor">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-danger clear-nama-vendor">x</button>
                  </div>
                </div>
              </div>
              <!-- Jenis Vendor -->
              <div class="form-group jenis-vendor">
                <label for="jenis_vendor">Jenis Pemilik </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi sewa-required perorangan" type="radio" name="jenis_pemilik" value="Perorangan">Perorangan</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi sewa-required badan_usaha" type="radio" name="jenis_pemilik" value="Perusahaan/Badan Usaha">Badan Usaha</label>
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
          <div id="card-wedding" class="card kategori-myhajat pertanyaan mt-4">
            <div class="card-header">
              <b>Detail Wedding Organizer</b>
              <!-- <p>Informasikan secara detail pengajuan pembiayaaan detail WO</p> -->
            </div>
            <div class="card-body">
              <!-- Nama WO -->
              <!-- <div class="form-group">
                <label for="nama_wo">Nama Wedding Organizer </label>
                <input name="nama_wo" id="nama_wo" type="text" class="form-control validasi wedding-required" placeholder="Nama WO">
              </div> -->
              <!-- Jenis WO -->
              <!-- <div class="form-group jenis-vendor">
                <label for="jenis_wo">Jenis Wedding Organizer </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input name="jenis_wo" class="validasi wedding-required form-check-input" type="radio" value="Perorangan" required>Perorangan</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input name="jenis_wo" class="validasi wedding-required form-check-input" type="radio" value="Perusahaan/Badan Usaha" required>Perusahaan/Badan Usaha</label>
                </div>
              </div> -->

              <input class="form-control id_vendor" type="hidden" name="id_vendor_wo" readonly>
              <!-- Nama Vendor -->
              <div class="form-group">
                <label for="nama_wo">Nama Wedding Organizer</label><br>
                <div class="input-group">
                  <input name="nama_wo" id="nama_wo" type="text" class="form-control validasi wedding-required nama_vendor_myhajat" placeholder="Nama Vendor">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-danger clear-nama-vendor">x</button>
                  </div>
                </div>
              </div>
              <!-- Jenis Vendor -->
              <div class="form-group jenis-vendor">
                <label for="jenis_vendor">Jenis Wedding Organizer </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi wedding-required perorangan" type="radio" name="jenis_wo" value="Perorangan">Perorangan</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi wedding-required badan_usaha" type="radio" name="jenis_wo" value="Perusahaan/Badan Usaha">Badan Usaha</label>
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
          <div id="card-franchise" class="card kategori-myhajat pertanyaan mt-4">
            <div class="card-header">
              <b>Detail Franchise</b>
            </div>
            <div class="card-body">
              <!-- Nama Franchise -->
              <!-- <div class="form-group">
                <label for="nama_franchise">Nama Franchise </label>
                <input name="nama_franchise" id="nama_franchise" type="text" class="form-control validasi franchise-required" placeholder="Nama Franchise">
              </div> -->

              <input class="form-control id_vendor" type="hidden" name="id_vendor_franchise" readonly>
              <!-- Nama Vendor -->
              <div class="form-group">
                <label for="nama_franchise">Nama Franchise</label><br>
                <div class="input-group">
                  <input name="nama_franchise" type="text" class="form-control validasi franchise-required nama_vendor_myhajat" placeholder="Nama Vendor">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-danger clear-nama-vendor">x</button>
                  </div>
                </div>
              </div>

              <!-- Jenis Vendor -->
              <!-- <div class="form-group jenis-vendor">
                <label for="jenis_vendor">Jenis Vendor Renovasi </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi renovasi-required perorangan" type="radio" name="jenis_vendor" value="Perorangan">Perorangan</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi renovasi-required badan_usaha" type="radio" name="jenis_vendor" value="Badan Usaha">Badan Usaha</label>
                </div>
              </div> -->
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
          <div id="card-lainnya" class="card kategori-myhajat pertanyaan mt-4">
            <div class="card-header">
              <b>Detail Penyedia Jasa</b>
            </div>
            <div class="card-body">
              <!-- Nama Penyedia Jasa -->
              <!-- <div class="form-group">
                <label for="nama_penyedia_jasa">Nama Penyedia Jasa </label>
                <input name="nama_penyedia_jasa" id="nama_penyedia_jasa" type="text" class="form-control validasi lainnya-required" placeholder="Nama Penyedia Jasa">
              </div> -->
              <!-- Jenis Penyedia Jasa -->
              <!-- <div class="form-group">
                <label for="jenis_penyedia_jasa">Jenis Penyedia Jasa </label>
                <select name="jenis_penyedia_jasa" id="jenis_penyedia_jasa" class="form-control validasi lainnya-required">
                  <option value="Perorangan">Perorangan</option>
                  <option value="Badan Usaha">Badan Usaha</option>
                </select>
              </div> -->
              <!-- Jenis Vendor -->
              <!-- <div class="form-group jenis-vendor">
                <label for="jenis_penyedia_jasa">Jenis Penyedia Jasa </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi lainnya-required" type="radio" name="jenis_penyedia_jasa" value="Perorangan">Perorangan</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi lainnya-required" type="radio" name="jenis_penyedia_jasa" value="Badan Usaha">Badan Usaha</label>
                </div>
              </div> -->
              <input class="form-control id_vendor" type="hidden" name="id_vendor_lainnya" readonly>
              <!-- Nama Vendor -->
              <div class="form-group">
                <label for="nama_penyedia_jasa">Nama Penyedia Jasa</label><br>
                <div class="input-group">
                  <input name="nama_penyedia_jasa" type="text" class="form-control validasi lainnya-required nama_vendor_myhajat" placeholder="Nama Vendor">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-danger clear-nama-vendor">x</button>
                  </div>
                </div>
              </div>
              <!-- Jenis Vendor -->
              <div class="form-group jenis-vendor">
                <label for="jenis_vendor">Jenis Vendor Renovasi </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi lainnya-required perorangan" type="radio" name="jenis_penyedia_jasa" value="Perorangan">Perorangan</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi lainnya-required badan_usaha" type="radio" name="jenis_penyedia_jasa" value="Badan Usaha">Badan Usaha</label>
                </div>
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
          <!-- End Kategori My Hajat -->

          <!-- FORM KATEGORI MY FAEDAH -->
          <!-- card bangunan -->
          <div id="card-bangunan" class="card kategori-myfaedah pertanyaan mt-4">
            <div class="card-header">
              <b>Detail Bangunan</b>
              <!-- <p>Informasikan secara detail pengjaun pembiayaaan renovasi rumah</p> -->
            </div>
            <div class="card-body">

              <!-- Nama Penyedia Bangunan -->
              <!-- <div class="form-group">
                <label for="nama_penyedia_bangunan">Nama Penyedia Barang </label>
                <input name="nama_penyedia_bangunan" id="nama_penyedia_bangunan" type="text" class="form-control validasi bangunan-required" placeholder="Nama Penyedia Barang">
              </div> -->

              <!-- ID Vendor -->
              <input class="form-control id_vendor" type="hidden" name="id_vendor_bangunan" readonly>

              <!-- Nama Vendor -->
              <div class="form-group">
                <label for="nama_penyedia_bangunan">Nama Penyedia Barang</label><br>
                <div class="input-group">
                  <input name="nama_penyedia_bangunan" type="text" class="form-control validasi bangunan-required nama_vendor_myfaedah" placeholder="Nama Vendor">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-danger clear-nama-vendor">x</button>
                  </div>
                </div>
              </div>

              <!-- Jenis Penyedia Barang -->
              <div class="form-group">
                <label for="jenis_penyedia_bangunan">Jenis Penyedia Barang </label>
                <select class="form-control validasi bangunan-required jenis-penyedia" name="jenis_penyedia_bangunan" id="jenis_penyedia_bangunan">
                  <option selected disabled value="">- Pilih Jenis Penyedia Barang -</option>
                  <option value="Toko/Agen">Toko / AGEN</option>
                  <option value="Authorized Distributor">Authorized Distributor</option>
                  <option value="Penjual Perorangan">Penjual Perorangan</option>
                  <option value="Modern Store/Supermarket">Supermarket</option>
                </select>
              </div>
              <!-- Tujuan Pembelian -->
              <div class="form-group">
                <label for="tujuan_pembelian_bangunan">Tujuan Pembelian Barang </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi bangunan-required" id="borongan" type="radio" name="tujuan_pembelian_bangunan" value="Konsumtif">Konsumtif</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi bangunan-required" id="harian" type="radio" name="tujuan_pembelian_bangunan" value="Produktif">Produktif</label>
                </div>
              </div>
              <!-- Bagian bangunan yang direnovasi -->
              <div class="form-group">

                <label for="lokasi_pembangunan">Lokasi yang akan dibangun/direnovasi </label>
                <input name="lokasi_pembangunan" id="lokasi_pembangunan" type="text" class="form-control validasi bangunan-required" placeholder="Lokasi yang akan dibangun/direnovasi">
              </div>
              <!-- Luas Bangunan -->
              <div class="form-group">
                <label for="luas_bangunan_bangunan">Luas Bangunan (Panjang x Lebar)</label>
                <input name="luas_bangunan_bangunan" id="luas_bangunan_bangunan" type="text" class="form-control validasi bangunan-required" placeholder="Luas Bangunan (Panjang x Lebar)">
              </div>
              <!-- Estimasi Waktu -->
              <div class="form-group">
                <label for="waktu_pelaksanaan">Estimasi Waktu Pelaksanaan </label>
                <input name="waktu_pelaksanaan" id="waktu_pelaksanaan" type="text" class="form-control validasi bangunan-required" placeholder="Estimasi Waktu Pelaksanaan">
              </div>
              <!-- Nilai Pengajuan Pembiayaan -->
              <div class="form-group">
                <label for="nilai_pembiayaan_bangunan">Nilai Pengajuan Pembiayaan </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white">Rp.</span>
                  </div>
                  <input name="nilai_pembiayaan_bangunan" id="nilai_pembiayaan_bangunan" type="number" class="form-control validasi bangunan-required" placeholder="Nilai Pembiayaan">
                </div>
              </div>
              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan_bangunan">Informasi Tambahan</label>
                <textarea name="informasi_tambahan_bangunan" id="informasi_tambahan_bangunan" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <!-- card elektronik -->
          <div id="card-elektronik" class="card kategori-myfaedah pertanyaan mt-4">
            <div class="card-header">
              <b>Detail Elektronik</b>
            </div>
            <div class="card-body">
              <!-- ID Vendor -->
              <input class="form-control id_vendor" type="hidden" name="id_vendor_elektronik" readonly>
              <!-- Nama Penyedia elektronik -->
              <!-- <div class="form-group">
                <label for="nama_penyedia_elektronik">Nama Penyedia Barang </label>
                <input name="nama_penyedia_elektronik" id="nama_penyedia_elektronik" type="text" class="form-control validasi elektronik-required" placeholder="Nama Penyedia Barang">
              </div> -->
              <!-- Nama Vendor -->
              <div class="form-group">
                <label for="nama_penyedia_elektronik">Nama Penyedia Barang</label><br>
                <div class="input-group">
                  <input name="nama_penyedia_elektronik" type="text" class="form-control validasi elektronik-required nama_vendor_myfaedah" placeholder="Nama Vendor">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-danger clear-nama-vendor">x</button>
                  </div>
                </div>
              </div>
              <!-- Jenis Penyedia Barang -->
              <div class="form-group">
                <label for="jenis_penyedia_elektronik">Jenis Penyedia Barang </label>
                <select class="form-control validasi elektronik-required jenis-penyedia" name="jenis_penyedia_elektronik" id="jenis_penyedia_elektronik">
                  <option selected disabled value="">- Pilih Jenis Penyedia Barang -</option>
                  <option value="Toko/Agen">Toko / AGEN</option>
                  <option value="Authorized Distributor">Authorized Distributor</option>
                  <option value="Penjual Perorangan">Penjual Perorangan</option>
                  <option value="Modern Store/Supermarket">Supermarket</option>
                </select>
              </div>
              <!-- Tujuan Pembelian -->
              <div class="form-group">
                <label for="tujuan_pembelian_elektronik">Tujuan Pembelian Barang </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi elektronik-required" id="borongan" type="radio" name="tujuan_pembelian_elektronik" value="Konsumtif">Konsumtif</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi elektronik-required" id="harian" type="radio" name="tujuan_pembelian_elektronik" value="Produktif">Produktif</label>
                </div>
              </div>
              <!-- Lama Usaha -->
              <div class="form-group">
                <label for="lama_usaha_elektronik">Lama Usaha </label>
                <input name="lama_usaha_elektronik" id="lama_usaha_elektronik" type="text" class="form-control validasi elektronik-required" placeholder="Lama Usaha">
              </div>
              <!-- Jenis Barang Elektronik yang akan dibeli -->
              <div class="form-group">
                <label for="jenis_barang_elektronik">Jenis Barang Elektronik yang akan dibeli </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi elektronik-required" id="tv" type="radio" name="jenis_barang_elektronik" value="TV">TV</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi elektronik-required" id="laptop" type="radio" name="jenis_barang_elektronik" value="Laptop">Laptop</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi elektronik-required" id="kulkas" type="radio" name="jenis_barang_elektronik" value="Kulkas">Kulkas</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi elektronik-required" id="harian" type="radio" name="jenis_barang_elektronik" value="Handphone">Handphone</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi elektronik-required" id="mesincuci" type="radio" name="jenis_barang_elektronik" value="Mesin Cuci">Mesin Cuci</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label">
                    <input class="kategori form-check-input validasi elektronik-required" id="others" type="radio" name="jenis_barang_elektronik" value="">Others...
                  </label>
                  <input id="other_jenis_barang_elektronik" type="text" class="form-control" name="other_jenis_barang_elektronik" placeholder="masukkan jenis elektronik yang akan dibeli" disabled>​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​
                </div>
              </div>
              <!-- Jumlah Barang -->
              <div class="form-group">
                <label for="jumlah_barang_elektronik">Jumlah Barang </label>
                <input name="jumlah_barang_elektronik" id="jumlah_barang_elektronik" type="text" class="form-control validasi elektronik-required" placeholder="Jumlah Barang">
              </div>
              <!-- Nilai Pengajuan Pembiayaan -->
              <div class="form-group">
                <label for="nilai_pembiayaan_elektronik">Nilai Pengajuan Pembiayaan </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white">Rp.</span>
                  </div>
                  <input name="nilai_pembiayaan_elektronik" id="nilai_pembiayaan_elektronik" type="number" class="form-control validasi elektronik-required" placeholder="Nilai Pengajuan Pembiayaan">
                </div>
              </div>
              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan">Informasi Tambahan</label>
                <textarea name="informasi_tambahan_elektronik" id="informasi_tambahan" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <!-- card modal -->
          <div id="card-modal" class="card kategori-myfaedah pertanyaan mt-4">
            <div class="card-header">
              <b>Detail Barang Modal</b>
              <!-- <p>Informasikan secara detail pengajuan pembiayaaan detail WO</p> -->
            </div>
            <div class="card-body">
              <!-- Nama Penyedia modal -->
              <!-- <div class="form-group">
                <label for="nama_penyedia_modal">Nama Penyedia Barang </label>
                <input name="nama_penyedia_modal" id="nama_penyedia_modal" type="text" class="form-control validasi modal-required" placeholder="Nama Penyedia Barang">
              </div> -->
              <!-- Nama Vendor -->
              <div class="form-group">
                <label for="nama_penyedia_modal">Nama Penyedia Barang</label><br>
                <div class="input-group">
                  <input name="nama_penyedia_modal" type="text" class="form-control validasi modal-required nama_vendor_myfaedah" placeholder="Nama Vendor">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-danger clear-nama-vendor">x</button>
                  </div>
                </div>
              </div>
              <!-- Jenis Penyedia Barang -->
              <div class="form-group">
                <label for="jenis_penyedia_modal">Jenis Penyedia Barang </label>
                <select class="form-control validasi modal-required jenis-penyedia" name="jenis_penyedia_modal" id="jenis_penyedia_modal">
                  <option selected disabled value="">- Pilih Jenis Penyedia Barang -</option>
                  <option value="Toko/Agen">Toko / AGEN</option>
                  <option value="Authorized Distributor">Authorized Distributor</option>
                  <option value="Penjual Perorangan">Penjual Perorangan</option>
                  <option value="Modern Store/Supermarket">Supermarket</option>
                </select>
              </div>
              <!-- Jenis Barang -->
              <div class="form-group">
                <label for="jenis_barang_modal">Jenis Barang </label>
                <input name="jenis_barang_modal" id="jenis_barang_modal" type="text" class="form-control validasi modal-required" placeholder="Jenis Barang">
              </div>
              <!-- Tujuan Pembelian -->
              <div class="form-group">
                <label for="tujuan_pembelian_modal">Tujuan Pembelian Barang </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi modal-required" id="borongan" type="radio" name="tujuan_pembelian_modal" value="Konsumtif">Konsumtif</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi modal-required" id="harian" type="radio" name="tujuan_pembelian_modal" value="Produktif">Produktif</label>
                </div>
              </div>
              <!-- Jumlah Biaya -->
              <div class="form-group">
                <label for="nilai_pembiayaan_modal">Nilai Pengajuan Pembiayaan </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white">Rp.</span>
                  </div>
                  <input name="nilai_pembiayaan_modal" id="nilai_pembiayaan_modal" type="number" class="form-control validasi modal-required" placeholder="Jumlah Biaya">
                </div>
              </div>

              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan">Informasi Tambahan</label>
                <textarea name="informasi_tambahan_modal" id="informasi_tambahan" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <!-- card qurban -->
          <div id="card-qurban" class="card kategori-myfaedah pertanyaan mt-4">
            <div class="card-header">
              <b>Detail Qurban</b>
            </div>
            <div class="card-body">
              <!-- Nama Penyedia modal -->
              <!-- <div class="form-group">
                <label for="nama_penyedia_qurban">Nama Penyedia Barang </label>
                <input name="nama_penyedia_qurban" id="nama_penyedia_qurban" type="text" class="form-control validasi qurban-required" placeholder="Nama Penyedia Barang">
              </div> -->

              <!-- Nama Vendor -->
              <div class="form-group">
                <label for="nama_penyedia_qurban">Nama Penyedia Barang</label><br>
                <div class="input-group">
                  <input name="nama_penyedia_qurban" type="text" class="form-control validasi qurban-required nama_vendor_myfaedah" placeholder="Nama Vendor">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-danger clear-nama-vendor">x</button>
                  </div>
                </div>
              </div>

              <!-- Jenis Penyedia Barang -->
              <div class="form-group">
                <label for="jenis_penyedia_qurban">Jenis Penyedia Barang </label>
                <select class="form-control validasi qurban-required jenis-penyedia" name="jenis_penyedia_qurban" id="jenis_penyedia_qurban">
                  <option selected disabled value="">- Pilih Jenis Penyedia Barang -</option>
                  <option value="Toko/Agen">Toko / AGEN</option>
                  <option value="Authorized Distributor">Authorized Distributor</option>
                  <option value="Penjual Perorangan">Penjual Perorangan</option>
                  <option value="Modern Store/Supermarket">Supermarket</option>
                </select>
              </div>

              <!-- Lama Usaha -->
              <div class="form-group">
                <label for="lama_usaha_qurban">Lama Usaha </label>
                <input name="lama_usaha_qurban" id="lama_usaha_qurban" type="text" class="form-control validasi qurban-required" placeholder="Lama Usaha">
              </div>

              <!-- Tujuan Pembelian -->
              <div class="form-group">
                <label for="tujuan_pembelian_qurban">Tujuan Pembelian Barang </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi qurban-required" id="borongan" type="radio" name="tujuan_pembelian_qurban" value="Konsumtif">Konsumtif</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi qurban-required" id="harian" type="radio" name="tujuan_pembelian_qurban" value="Produktif">Produktif</label>
                </div>
              </div>

              <!-- Jenis Hewan -->
              <div class="form-group">
                <label for="jenis_hewan_qurban">Jenis Hewan</label>
                <input name="jenis_hewan_qurban" id="jenis_hewan_qurban" type="text" class="form-control validasi qurban-required" placeholder="Jenis Hewan">
              </div>
              <!-- Jumlah Hewan -->
              <div class="form-group">
                <label for="jumlah_hewan_qurban">Jumlah Hewan</label>
                <input name="jumlah_hewan_qurban" id="jumlah_hewan_qurban" type="number" class="form-control validasi qurban-required" placeholder="Jumlah Hewan">
              </div>
              <!-- Nilai Pengajuan Pembiayaan -->
              <div class="form-group">
                <label for="nilai_pembiayaan_qurban">Nilai Pengajuan Pembiayaan </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white">Rp.</span>
                  </div>
                  <input name="nilai_pembiayaan_qurban" id="nilai_pembiayaan_qurban" type="number" class="form-control validasi qurban-required" placeholder="Jumlah Biaya">
                </div>
              </div>
              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan">Informasi Tambahan</label>
                <textarea name="informasi_tambahan_qurban" id="informasi_tambahan" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <!-- card lainnya -->
          <div id="card-myfaedah-lainnya" class="card kategori-myfaedah pertanyaan mt-4">
            <div class="card-header">
              <b>Detail My Faedah Lainnya</b>
            </div>
            <div class="card-body">
              <!-- Nama Penyedia modal -->
              <!-- <div class="form-group">
                <label for="nama_penyedia_myfaedah_lainnya">Nama Penyedia Barang </label>
                <input name="nama_penyedia_myfaedah_lainnya" id="nama_penyedia_myfaedah_lainnya" type="text" class="form-control validasi myfaedah-lainnya-required" placeholder="Nama Penyedia Barang">
              </div> -->
              <!-- Nama Vendor -->
              <div class="form-group">
                <label for="nama_penyedia_myfaedah_lainnya">Nama Penyedia Barang</label><br>
                <div class="input-group">
                  <input name="nama_penyedia_myfaedah_lainnya" type="text" class="form-control validasi myfaedah-lainnya-required nama_vendor_myfaedah" placeholder="Nama Vendor">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-danger clear-nama-vendor">x</button>
                  </div>
                </div>
              </div>
              <!-- Jenis Penyedia Barang -->
              <div class="form-group">
                <label for="jenis_penyedia_myfaedah_lainnya">Jenis Penyedia Barang </label>
                <select class="form-control validasi myfaedah-lainnya-required jenis-penyedia" name="jenis_penyedia_myfaedah_lainnya" id="jenis_penyedia_myfaedah_lainnya">
                  <option selected disabled value="">- Pilih Jenis Penyedia Barang -</option>
                  <option value="Toko/Agen">Toko / AGEN</option>
                  <option value="Authorized Distributor">Authorized Distributor</option>
                  <option value="Penjual Perorangan">Penjual Perorangan</option>
                  <option value="Modern Store/Supermarket">Supermarket</option>
                </select>
              </div>

              <!-- Lama Usaha -->
              <div class="form-group">
                <label for="lama_usaha_myfaedah_lainnya">Lama Usaha </label>
                <input name="lama_usaha_myfaedah_lainnya" id="lama_usaha_myfaedah_lainnya" type="text" class="form-control validasi myfaedah-lainnya-required" placeholder="Lama Usaha">
              </div>

              <!-- Tujuan Pembelian -->
              <div class="form-group">
                <label for="tujuan_pembelian_myfaedah_lainnya">Tujuan Pembelian Barang </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi myfaedah-lainnya-required" type="radio" name="tujuan_pembelian_myfaedah_lainnya" value="Konsumtif">Konsumtif</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi myfaedah-lainnya-required" type="radio" name="tujuan_pembelian_myfaedah_lainnya" value="Produktif">Produktif</label>
                </div>
              </div>

              <!-- Nilai Pengajuan Pembiayaan -->
              <div class="form-group">
                <label for="nilai_pembiayaan_myfaedah_lainnya">Nilai Pengajuan Pembiayaan </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white">Rp.</span>
                  </div>
                  <input name="nilai_pembiayaan_myfaedah_lainnya" id="nilai_pembiayaan_myfaedah_lainnya" type="number" class="form-control validasi myfaedah-lainnya-required" placeholder="Nilai Pengajuan Pembiayaan">
                </div>
              </div>
              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan_myfaedah_lainnya">Informasi Tambahan</label>
                <textarea name="informasi_tambahan_myfaedah_lainnya" id="informasi_tambahan_myfaedah_lainnya" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>
          <!-- End Kategori My Hajat -->

          <!-- CARD FORM My Ihram -->
          <div id="card-myihram" class="card mt-4 pertanyaan">
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
          <div id="card-mysafar" class="card mt-4 pertanyaan">
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

          <!-- card myfaedah -->
          <div id="card-myfaedah" class="card pertanyaan mt-4">
            <div class="card-header">
              <b>Detail My Faedah</b>
              <!-- <p>Informasikan secara detail pengjaun pembiayaaan My Faedah rumah</p> -->
            </div>
            <div class="card-body">

              <!-- Nama Vendor -->
              <div class="form-group">
                <label for="nama_vendor_myfaedah">Nama Vendor </label>
                <input name="nama_vendor_myfaedah" id="nama_vendor_myfaedah" type="text" class="form-control validasi myfaedah-required" placeholder="Nama Vendor">
              </div>
              <!-- Jenis Vendor -->
              <div class="form-group">
                <label for="jenis_vendor_myfaedah">Jenis Vendor</label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi myfaedah-required" id="perorangan" type="radio" name="jenis_vendor_myfaedah" value="Perorangan">Perorangan</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi myfaedah-required" id="badan_usaha" type="radio" name="jenis_vendor_myfaedah" value="Badan Usaha">Badan Usaha</label>
                </div>
              </div>

              <!-- Lama Usaha -->
              <div class="form-group">
                <label for="lama_usaha_myfaedah">Lama Usaha </label>
                <input name="lama_usaha_myfaedah" id="lama_usaha_myfaedah" type="text" class="form-control validasi myfaedah-required" placeholder="Lama Usaha">
              </div>

              <!-- Nama Barang -->
              <div class="form-group">
                <label for="nama_barang">Nama Barang </label>
                <input name="nama_barang" id="nama_barang" type="text" class="form-control validasi myfaedah-required" placeholder="Nama Barang">
              </div>

              <!-- Kondisi Barang -->
              <div class="form-group">
                <label for="kondisi_barang">Kondisi Barang</label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi myfaedah-required" id="baru" type="radio" name="kondisi_barang" value="Baru">Baru</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi myfaedah-required" id="bekas" type="radio" name="kondisi_barang" value="Bekas">Bekas</label>
                </div>
              </div>

              <!-- Jumlah Barang -->
              <div class="form-group">
                <label for="jumlah_barang">Jumlah Barang</label>
                <input name="jumlah_barang" id="jumlah_barang" type="number" class="form-control validasi myfaedah-required" placeholder="Jumlah Barang">
              </div>

              <!-- Merek & Tipe -->
              <div class="form-group">
                <label for="merek_barang">Merek & Tipe Barang</label>
                <input name="merek_barang" id="merek_barang" type="text" class="form-control validasi myfaedah-required" placeholder="Merek & Tipe">
              </div>

              <!-- Warna -->
              <div class="form-group">
                <label for="warna_barang">Warna Barang</label>
                <input name="warna_barang" id="warna_barang" type="text" class="form-control validasi myfaedah-required" placeholder="Warna">
              </div>

              <!-- Tahun -->
              <div class="form-group">
                <label for="tahun_barang">Tahun</label>
                <input name="tahun_barang" id="tahun_barang" type="number" class="form-control validasi myfaedah-required" placeholder="Tahun">
              </div>

              <!-- Harga Barang -->
              <div class="form-group">
                <label for="harga_barang">Harga Barang </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white">Rp.</span>
                  </div>
                  <input name="harga_barang" id="harga_barang" type="number" class="form-control validasi myfaedah-required" placeholder="Harga Barang">
                </div>
              </div>

              <!-- Tujuan Pembelian -->
              <div class="form-group">
                <label for="tujuan_pembelian">Tujuan Pembelian</label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi myfaedah-required" id="konsumtif" type="radio" name="tujuan_pembelian" value="Konsumtif">Konsumtif</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi myfaedah-required" id="produktif" type="radio" name="tujuan_pembelian" value="Produktif">Produktif</label>
                </div>
              </div>

              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan_myfaedah">Informasi Tambahan</label>
                <textarea name="informasi_tambahan_myfaedah" id="informasi_tambahan_myfaedah" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <!-- card mycars -->
          <div id="card-mycars" class="card pertanyaan mt-4">
            <div class="card-header">
              <b>Detail My Cars</b>
              <!-- <p>Informasikan secara detail pengjaun pembiayaaan My Cars rumah</p> -->
            </div>
            <div class="card-body">
              <!-- Nama Penyedia Barang -->
              <div class="form-group">
                <label for="nama_penyedia_mycars">Nama Penyedia Barang </label>
                <input name="nama_penyedia_mycars" id="nama_penyedia_mycars" type="text" class="form-control validasi mycars-required" placeholder="Nama Penyedia Barang">
              </div>

              <!-- Jenis Penyedia Barang -->
              <div class="form-group">
                <label for="jenis_penyedia_mycars">Jenis Penyedia Barang </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi mycars-required" id="authorized" type="radio" name="jenis_penyedia_mycars" value="Authorized">Authorized</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi mycars-required" id="non-authorized" type="radio" name="jenis_penyedia_mycars" value="Non-Authorized">Non-Authorized</label>
                </div>
              </div>

              <!-- Kategori Penyedia Barang Detail -->
              <div class="form-group">
                <label for="jenis_penyedia_detail_mycars">Kategori Penyedia Barang Detail</label>
                <select class="form-control validasi mycars-required" name="jenis_penyedia_detail_mycars" id="jenis_penyedia_detail_mycars">
                  <option selected disabled value="">- Kategori Penyedia Barang Detail -</option>
                  <option value="Dealer ATPM">Dealer ATPM</option>
                  <option value="Penjual Perorangan">Penjual Perorangan</option>
                  <option value="Pemilik Langsung">Pemilik Langsung</option>
                  <option value="Showroom tanpa izin usaha">Showroom tanpa izin usaha</option>
                  <option value="Showroom dengan izin usaha">Showroom dengan izin usaha</option>
                </select>
              </div>

              <!-- Kategori Aset -->
              <div class="form-group">
                <label for="kategori_aset_mycars">Kategori Aset </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi mycars-required" id="NewCar" type="radio" name="kategori_aset_mycars" value="New Car">New Car</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi mycars-required" id="UsedCar" type="radio" name="kategori_aset_mycars" value="Used Car">Used Car</label>
                </div>
              </div>

              <!-- Lama Usaha -->
              <div class="form-group">
                <label for="lama_usaha_mycars">Lama Usaha</label>
                <input name="lama_usaha_mycars" id="lama_usaha_mycars" type="text" class="form-control validasi mycars-required" placeholder="Lama Usaha">
              </div>

              <!-- Kepemilikan Tempat Usaha -->
              <div class="form-group">
                <label for="kepemilikan_tempat_mycars">Kepemilikan Tempat Usaha </label>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi mycars-required" id="" type="radio" name="kepemilikan_tempat_mycars" value="Milik Sendiri">Milik Sendiri</label>
                </div>
                <div class="form-check form-check-info">
                  <label class="form-check-label"><input class="kategori form-check-input validasi mycars-required" id="" type="radio" name="kepemilikan_tempat_mycars" value="Sewa">Sewa</label>
                </div>
              </div>

              <!-- Jumlah Stok Unit -->
              <div class="form-group">
                <label for="jumlah_stok_mycars">Jumlah Stok Unit</label>
                <input name="jumlah_stok_mycars" id="jumlah_stok_mycars" type="number" class="form-control validasi mycars-required" placeholder="Jumlah Stok Unit">
              </div>

              <!-- Tipe Kendaraan -->
              <div class="form-group">
                <label for="tipe_kendaraan_mycars">Tipe Kendaraan</label>
                <input name="tipe_kendaraan_mycars" id="tipe_kendaraan_mycars" type="text" class="form-control validasi mycars-required" placeholder="Tipe Kendaraan">
              </div>

              <!-- Jenis Kendaraan -->
              <div class="form-group">
                <label for="jenis_kendaraan_mycars">Jenis Kendaraan</label>
                <input name="jenis_kendaraan_mycars" id="jenis_kendaraan_mycars" type="text" class="form-control validasi mycars-required" placeholder="Jenis Kendaraan">
              </div>

              <!-- Tahun -->
              <div class="form-group">
                <label for="tahun_mobil_mycars">Tahun</label>
                <input name="tahun_mobil_mycars" id="tahun_mobil_mycars" type="number" class="form-control validasi mycars-required" placeholder="Tahun">
              </div>

              <!-- Warna Kendaraan -->
              <div class="form-group">
                <label for="warna_kendaraan_mycars">Warna Kendaraan</label>
                <input name="warna_kendaraan_mycars" id="warna_kendaraan_mycars" type="text" class="form-control validasi mycars-required" placeholder="Warna Kendaraan">
              </div>

              <!-- Nilai Pengajuan Pembiayaan -->
              <div class="form-group">
                <label for="nilai_pembiayaan_mycars">Nilai Pengajuan Pembiayaan </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-success text-white">Rp.</span>
                  </div>
                  <input name="nilai_pembiayaan_mycars" id="nilai_pembiayaan_mycars" type="number" class="form-control validasi mycars-required" placeholder="Nilai Pengajuan Pembiayaan">
                </div>
              </div>

              <!-- Informasi Tambahan -->
              <div class="form-group">
                <label for="informasi_tambahan_mycars">Informasi Tambahan</label>
                <textarea name="informasi_tambahan_mycars" id="informasi_tambahan_mycars" cols="30" rows="10" class="form-control"></textarea>
              </div>

            </div>
          </div>

          <!-- card Upload File -->
          <div class="card mt-4 pertanyaan upload">
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

              <div class="alert alert-success mt-4">
                <strong>Perhatian!</strong> File upload tidak boleh lebih dari 10 MB.
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