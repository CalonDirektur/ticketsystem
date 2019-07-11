<section class="content-header">
      <h1>Form My Talim</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Isilah form dibawah wkwkwkwk</h3>
              </div>
              <div class="box-body">
                <form id="ticket_form" method="post" action="<?= site_url('Ticket_register/add') ?>">
                <div class="form-group">
                  <input id="nama" type="text" class="form-control col-5" placeholder="Nama Lengkap" name="nama">
                </div>
                <div class="form-group">
                  <textarea id="alamat" cols="30" rows="10" placeholder="Alamat" name="alamat"></textarea>
                </div>
                <div class="form-group">
                  <input id="hobi" type="text" class="form-control" placeholder="Hobi" name="hobi">
                </div>
                <button class="btn btn-primary" name="submit">Kirim Data!</button>
                </form>
              </div>
             <div class="box-footer">
 
            </div>
          </div>
        </div>
    </div>
    </div>
  </section>