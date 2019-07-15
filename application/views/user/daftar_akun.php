<section class="content-header">
      <h1>
        Daftar Akun User Cabang
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
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Akun User Cabang</h3>
                    </div>
                    <form method="post" action="<?= base_url('Auth/process_daftar') ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input name="username" type="text" class="form-control" id="name" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="id_cabang">Cabang</label>
                            <select name="id_cabang" id="id_cabang" class="form-control">
                                <option disabled selected value="">- Pilih Cabang -</option>
                                <?php 
                                foreach($pertanyaan as $p){
                                    ?>
                                    <option value="<?= $p->id_cabang ?>"><?= $p->nama_cabang ?></option>
                                <?php }  ?>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
  </section>