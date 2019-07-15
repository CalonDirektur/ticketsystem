<section class="content-header">
      <h1>Form My Talim</h1>
    </section>

    <!-- Main content -->
    <section class="content">
   
    <form id="ticket_form" method="post" action="<?= site_url('Ticket_register/add') ?>" enctype="multipart/form-data">

      <div class="container">
        <div class="row">
          <div class="col-lg-12">
          <!-- Box Data Konsumen -->
            <div class="box box-primary">
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
                  <div class="form-group">
                    <label for="cabang">Cabang</label>
                      <select name="cabang" id="cabang" class="form-control">
                    <option disabled selected value="">- Pilih Cabang -</option>
                    <?php 
                      foreach($pertanyaan as $p){
                        ?>
                        <option value="<?= $p->id_cabang ?>"><?= $p->nama_cabang ?></option>
                     <?php }  ?>
                  </select>
                </div>
             <div class="box-footer">
 
            </div>
          </div>
        </div>

          <!-- Box Pertanyaan form My'Talim -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Form My Ta'lim</h3>
              </div>
              <div class="box-body">
                <!-- Pendidikan -->
                <div class="form-group">
                  <label for="pendidikan">Pendidikan</label>
                  <select name="pendidikan" id="pendidikan" class="form-control">
                    <option value="sekolah">Sekolah</option>
                    <option value="universitas">Universitas</option>
                    <option value="Kursus">Kursus</option>
                    <option value="lainnya">Lainnya</option>
                  </select>
                </div>
                <!-- Nama Lembaga -->
                <div class="form-group">
                  <label for="nama_lembaga">Nama Lembaga</label>
                  <input name="nama_lembaga" id="nama_lembaga" type="text" class="form-control" placeholder="Nama Lembaga">
                </div>
                <!-- Tahun Berdiri -->
                <div class="form-group">
                  <label for="tahun_berdiri">Tahun Berdiri</label>
                  <input name="tahun_berdiri" id="tahun_berdiri" type="number" class="form-control" placeholder="Tahun Berdiri">
                </div>
                <!-- Akreditasi -->
                <div class="form-group">
                  <label for="akreditasi">Akreditasi</label>
                  <input name="akreditasi" id="akreditasi" type="text" class="form-control" placeholder="Akreditasi">
                </div>
                <!-- Tahun Periode Pendidikan -->
                <div class="form-group">
                  <label for="periode">Tahun Periode Pendidikan</label>
                  <input name="periode" id="periode" type="text" class="form-control" placeholder="periode">
                </div>
                <!-- Tujuan Pembiayaan -->
                <div class="form-group">
                  <label for="tujuan_pembiayaan">Tujuan Pembiayaan</label>
                  <input name="tujuan_pembiayaan" id="tujuan_pembiayaan" type="text" class="form-control" placeholder="Tujuan Pembiayaan">
                </div>
                <!-- Nilai Pembiayaan -->
                <div class="form-group">
                  <label for="nilai_pembiayaan">Nilai Pembiayaan</label>
                  <input name="nilai_pembiayaan" id="nilai_pembiayaan" type="text" class="form-control" placeholder="Nilai Pembiayaan">
                </div>
              </div>
             <div class="box-footer">
 
            </div>
          </div>

          <!-- Box Upload File -->
          <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Upload File</h3>
              </div>
              <div class="box-body">
                <div class="col-lg-6">
                   <div class="form-group">
                    <label for="ktp">KTP</label>
                    <input name="ktp" id="ktp" type="file" class="form-control">                
                  </div>
                  <div class="form-group">
                    <label for="kk">KK</label>
                    <input name="kk" id="kk" type="file" class="form-control">                
                  </div>
                  <div class="form-group">
                    <label for="bukti_penghasilan">Bukti Penghasilan</label>
                    <input name="bukti_penghasilan" id="bukti_penghasilan" type="file" class="form-control">                
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="npwp">NPWP</label>
                    <input name="npwp" id="npwp" type="file" class="form-control">                
                  </div>
                  <div class="form-group">
                    <label for="tambahan">Tambahan</label>
                    <input name="tambahan" id="tambahan" type="file" class="form-control">                
                  </div>
                </div>
              </form>
              </div>
             <div class="box-footer text-center">
                  <button class="btn btn-primary" name="submit_mytalim">Kirim Data!</button> 
            </div>
          </div>
        </div>
    </div>
    </div>
  </section>