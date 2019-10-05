<div class="content-wrapper">
    <div class="container">
        <h3>Daftar Materi Promosi</h3>
        <hr>
        <p>Berikut akses file materi promosi cetak untuk kegiatan brand awareness BFI Syariah di cabang. Pastikan cabang sudah mengirimkan memo pengajuan
            materi promosi ke HO dan telah mendapat approval <b>sebelum</b> memakai file yang tersedia dibawah ke vendor percetakan. Desain materi
            promosi seawaktu-waktu dapat berubah.
        </p>

        <div class="card p-4">
            <?php if ($this->session->userdata('level') == 5) { ?>
                <div class="row">
                    <div class="col-12">
                        <!-- <button class="btn btn-info float-right">+ Tambah</button> -->
                        <button type="button" class="btn btn-info float-left" data-toggle="modal" data-target="#myModal">
                            + Tambah
                        </button>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <?php foreach ($data->result() as $materi) { ?>
                    <div class="col-md-4 col-sm-4 col-12 mt-1 mt-2">
                        <div class="card shadow-sm" style="width: 16rem">
                            <div class="card-header p-0 text-center">
                                <img class="img-fluid" src="<?= base_url('uploads/materi_promosi/' . $materi->thumb) ?>" style="width: 100%; object-fit: cover;" alt="">
                            </div>
                            <div class="card-body p-2 p-2">
                                <div class="row">
                                    <div class="col-6">
                                        <p><b><?= $materi->judul ?></b></p>
                                        <p><?= $materi->ukuran ?></p>
                                    </div>
                                    <div class="col-6">
                                        <a target="_blank" href="<?= $materi->link ?>"><button class="btn btn-info btn-rounded btn-icon shadow-sm pull-right"><i class="icon-download"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- Button to Open the Modal -->


<!-- The Modal -->
<form method="post" enctype="multipart/form-data" action="<?= base_url('materi_promosi/add') ?>" autocomplete="off">
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Berkas</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" class="form-control" id="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="ukuran">Ukuran</label>
                        <input type="text" name="ukuran" class="form-control" id="ukuran" required>
                    </div>
                    <div class="form-group">
                        <label for="link">Link URL</label>
                        <input type="text" name="link" class="form-control" id="link" required>
                    </div>
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <input type="file" name="thumb" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-secondary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-info">Tambah</button>
                </div>

            </div>
        </div>
    </div>
</form>