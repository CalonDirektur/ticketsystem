<section class="content-header">
      <h1>Form My Hajat</h1>
    </section>

    <form id="ticket_form" method="post" action="<?= site_url('Ticket_register/add') ?>">
    

    
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">     
            <!-- Box Data Konsumen -->
            <div id="box-konsumen" class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Konsumen</h3>
              </div>
              <div class="box-body">
                  <!-- Nama Konsumen -->
                  <div class="form-group">
                  <label for="nama_konsumen">Nama Konsumen</label>
                  <input name="nama_konsumen" id="nama_konsumen" type="text" class="form-control" placeholder="Nama Konsumen">                
                </div>
                <!-- Jenis Calon Konsumen -->
                <div class="form-group">
                   <label for="jenis_konsumen">Jenis Calon Konsumen</label>
                  <select name="jenis_konsumen" id="jenis_konsumen" class="form-control">
                    <option value="Internal">Internal</option>
                    <option value="Eksternal">Eksternal</option>
                  </select>
                </div>
              </div>
             <div class="box-footer">
 
            </div>
          </div>

          <!-- Box Kategori My Hajat -->
           <div id="box-kategori-myhajat" class="box box-primary">
             <div class="box-header with-border">
               <h3 class="box-title">Kategori My Hajat</h3>
             </div>
             <div class="box-body">
                 <div class="form-group">
                   <div class="radio">
                     <label><input class="kategori" id="renovasi" type="radio" name="kategori_myhajat">Renovasi</label>
                   </div>
                   <div class="radio">
                     <label><input class="kategori" id="sewa" type="radio" name="kategori_myhajat">Sewa</label>
                   </div>
                   <div class="radio">
                     <label><input class="kategori" id="wedding" type="radio" name="kategori_myhajat">Wedding</label>
                   </div>
                   <div class="radio">
                     <label><input class="kategori" id="franchise" type="radio" name="kategori_myhajat">Franchise</label>
                   </div>
                 </div>
             </div>
            <div class="box-footer">

           </div>
         </div> 

          <!-- Box Renovasi -->
            <div id="box-renovasi" class="box box-primary pertanyaan">
              <div class="box-header with-border">
                <h3 class="box-title">Renovasi</h3>
              </div>
              <div class="box-body">
                  <!-- Nama Vendor -->
                  <div class="form-group">
                  <label for="nama_vendor">Nama Vendor</label>
                  <input name="nama_vendor" id="nama_vendor" type="text" class="form-control" placeholder="Nama Vendor">                
                </div>
                <!-- Jenis Vendor -->
                <div class="form-group">
                  <label for="jenis_vendor">Jenis Vendor</label>
                  <input name="jenis_vendor" id="jenis_vendor" type="text" class="form-control" placeholder="Jenis Vendor">
                </div>
                <div class="form-group">
                  <label for="bagian_bangunan">Bagian Bangunan Yang Direnovasi</label>
                  <input name="bagian_bangunan" id="bagian_bangunan" type="text" class="form-control" placeholder="Bagian Bangunan Yang Direnovasi">
                </div>
                <div class="form-group">
                  <label for="luas_bangunan">Luas Bangunan</label>
                  <input name="luas_bangunan" id="luas_bangunan" type="text" class="form-control" placeholder="Luas Bangunan">
                </div>
                <div class="form-group">
                  <label for="jumlah_tukang">Jumlah Tukang/Pekerja</label>
                  <input name="jumlah_tukang" id="jumlah_tukang" type="text" class="form-control" placeholder="jumlah_tukang">
                </div>
                <div class="form-group">
                  <label for="estimasi_waktu">Estimasi Waktu Pelaksanaan</label>
                  <input name="estimasi_waktu" id="estimasi_waktu" type="text" class="form-control" placeholder="Estimasi Waktu Pelaksanaan">
                </div>
                <div class="form-group">
                  <label for="nilai_pembiayaan">Nilai Pembiayaan</label>
                  <input name="nilai_pembiayaan" id="nilai_pembiayaan" type="text" class="form-control" placeholder="Nilai Pembiayaan">
                </div>
              </div>
             <div class="box-footer">
 
            </div>
          </div>

          <!-- Box Sewa -->
          <div id="box-sewa" class="box box-primary pertanyaan">
              <div class="box-header with-border">
                <h3 class="box-title">Sewa</h3>
              </div>
              <div class="box-body">
                  <!-- Nama Pemilik -->
                  <div class="form-group">
                  <label for="nama_pemilik">Nama Pemilik</label>
                  <input name="nama_pemilik" id="nama_pemilik" type="text" class="form-control" placeholder="Nama Pemilik">                
                </div>
                <!-- Hubungan dengan pemohon -->
                <div class="form-group">
                  <label for="hubungan_pemohon">Hubungan dengan pemohon</label>
                  <input name="hubungan_pemohon" id="hubungan_pemohon" type="text" class="form-control" placeholder="Jenis Pemilik">
                </div>
                <!-- Luas x Panjang -->
                <div class="form-group">
                  <label for="luas_panjang">Luas x Panjang</label>
                  <input name="luas_panjang" id="luas_panjang" type="text" class="form-control" placeholder="Luas x Panjang">
                </div>
                <!-- Biaya sewa per tahun -->
                <div class="form-group">
                  <label for="biaya_pertahun">Biaya Sewa per Tahun</label>
                  <input name="biaya_pertahun" id="biaya_pertahun" type="text" class="form-control" placeholder="Biaya Sewa per Tahun">
                </div>
              </div>
             <div class="box-footer">
 
            </div>
          </div>

          <!-- Box Wedding -->
          <div id="box-wedding" class="box box-primary pertanyaan">
              <div class="box-header with-border">
                <h3 class="box-title">Wedding</h3>
              </div>
              <div class="box-body">
                  <!-- Nama WO -->
                  <div class="form-group">
                  <label for="nama_pemilik">Nama WO</label>
                  <input name="nama_pemilik" id="nama_pemilik" type="text" class="form-control" placeholder="Nama WO">                
                </div>
                <!-- Jenis WO -->
                <div class="form-group">
                  <label for="jenis_wo">Jenis WO</label>
                  <input name="jenis_wo" id="jenis_wo" type="text" class="form-control" placeholder="Jenis WO">
                </div>
                <!-- Lama Usaha Berdiri -->
                <div class="form-group">
                  <label for="lama_berdiri">Lama Usaha Berdiri</label>
                  <input name="lama_berdiri" id="lama_berdiri" type="text" class="form-control" placeholder="Lama Usaha Berdiri">
                </div>
                <!-- Jumlah Biaya -->
                <div class="form-group">
                  <label for="biaya_pertahun">Jumlah Biaya</label>
                  <input name="biaya_pertahun" id="biaya_pertahun" type="text" class="form-control" placeholder="Jumlah Biaya">
                </div>
                <!-- Jumlah Undangan -->
                <div class="form-group">
                  <label for="jumlah_undangan">Jumlah Undangan</label>
                  <input name="jumlah_undangan" id="jumlah_undangan" type="text" class="form-control" placeholder="Jumlah Undangan">
                </div>
                <!-- Akun Sosial Media -->
                <div class="form-group">
                  <label for="akun_sosmed">Akun Sosial Media</label>
                  <input name="akun_sosmed" id="akun_sosmed" type="text" class="form-control" placeholder="Akun Sosial Media">
                </div>
              </div>
             <div class="box-footer">
 
            </div>
          </div>

          <!-- Box Franchise -->
          <div id="box-franchise" class="box box-primary pertanyaan">
              <div class="box-header with-border">
                <h3 class="box-title">Franchise</h3>
              </div>
              <div class="box-body">
                  <!-- Nama Franchise -->
                  <div class="form-group">
                  <label for="nama_franchise">Nama Franchise</label>
                  <input name="nama_franchise" id="nama_franchise" type="text" class="form-control" placeholder="Nama Franchise">                
                </div>
                <!-- Jumlah Cabang -->
                <div class="form-group">
                  <label for="jumlah_cabang">Jumlah Cabang</label>
                  <input name="jumlah_cabang" id="jumlah_cabang" type="text" class="form-control" placeholder="Jumlah Cabang">
                </div>
                <!-- Jenis Franchise -->
                <div class="form-group">
                  <label for="jenis_franchise"></label>
                  <select name="jenis_franchise" id="jenis_franchise" class="form-control">
                    <option value="Makanan dan Minuman">Makanan dan Minuman</option>
                    <option value="otomotif">Otomotif</option>
                    <option value="pendidikan/pelatihan">Pendidikan/Pelatihan</option>
                    <option value="Hiburan & Hobi">Hiburan & Hobi</option>
                    <option value="Komputer/Teknologi">Komputer/Teknologi</option>
                    <option value="Kesehatan & Kecantikan">Kesehatan & Kecantikan</option>
                    <option value="Retail">Retail</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
                </div>
                <!-- Tahun Berdiri -->
                <div class="form-group">
                  <label for="tahun_berdiri">Tahun Berdiri</label>
                  <input name="tahun_berdiri" id="tahun_berdiri" type="text" class="form-control" placeholder="Tahun Berdiri">
                </div>
                <!-- Harga -->
                <div class="form-group">
                  <label for="harga">Harga</label>
                  <input name="harga" id="harga" type="text" class="form-control" placeholder="Harga">
                </div>
                <!-- Jangka Waktu Kepemilikan -->
                <div class="form-group">
                  <label for="jangka_kepemilikan">Jangka Waktu Kepemilikan</label>
                  <select name="jangka_kepemilikan" id="jangka_kepemilikan" class="form-control">
                    <option value="Selamanya">Selamanya</option>
                    <option value="Jangka Tertentu">Jangka Tertentu</option>
                  </select>
                </div>
                <!-- Akun Sosial Media -->
                <div class="form-group">
                  <label for="akun_sosmed_website">Akun Sosial Media/Website</label>
                  <input name="akun_sosmed_website" id="akun_sosmed_website" type="text" class="form-control" placeholder="Akun Sosial Media">
                </div>
                <button class="btn btn-primary" name="submit">Kirim Data!</button>
              </div>
             <div class="box-footer">
 
            </div>
          </form>
          </div>

          <!-- Box Penyedia Jasa -->
            <div id="box-penyedia-jasa" class="box box-primary pertanyaan">
              <div class="box-header with-border">
                <h3 class="box-title">Penyedia Jasa</h3>
              </div>
              <div class="box-body">
                  <!-- Nama Penyedia Jasa -->
                  <div class="form-group">
                  <label for="nama_penyedia_jasa">Nama Penyedia Jasa</label>
                  <input name="nama_penyedia_jasa" id="nama_penyedia_jasa" type="text" class="form-control" placeholder="Nama Penyedia Jasa">                
                </div>
                <!-- Jenis Penyedia Jasa -->
                <div class="form-group">
                   <label for="jenis_penyedia_jasa">Jenis Penyedia Jasa</label>
                  <select name="jenis_penyedia_jasa" id="jenis_penyedia_jasa" class="form-control">
                    <option value="Perorangan">Perorangan</option>
                    <option value="Badan Usaha">Badan Usaha</option>
                  </select>
                </div>
              </div>
             <div class="box-footer">
 
            </div>
          </div>
        </div>
    </div>
    </div>
  </section>
