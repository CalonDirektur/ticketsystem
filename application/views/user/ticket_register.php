<section class="content-header">
      <h1>
        Daftar Ticket Suppoer
        <!-- <small>it all starts here</small> -->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <form method="post" action="<?= site_url('Ticket_register/add') ?>">
            <div class="form-group">
              <input type="text" class="form-control col-5" placeholder="Nama Lengkap" name="nama">
            </div>
            <div class="form-group">
              <textarea id="alamat" cols="30" rows="10" placeholder="Alamat" name="alamat"></textarea>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Hobi" name="hobi">
            </div>
            <button class="btn btn-primary" name="submit">Kirim Data!</button>
            </form>
          </div>
        </div>
        
    </div>
  </section>