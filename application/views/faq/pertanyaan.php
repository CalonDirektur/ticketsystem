<div class="container-fluid">
    <section class="content-header text-center mt-4">
        <h4>Frequent Asked Question</h4>
        <p><?= date('d F, Y'); ?></p>
    </section>
    <section class="content">
        <div class="row p-2">
            <div class="col-lg-12">
                <!-- Large modal -->
                <div class="row">
                    <div class="col">
                        <form method="post" action="<?= site_url('faq/add') ?>" enctype="multipart/form-data">
                            <div class="card shadow p-4 rounded">
                                <div class="form-group">
                                    <label for="pertanyaan">Pertanyaan</label>
                                    <input class="form-control rounded" type="text" name="pertanyaan" id="pertanyaan" placeholder="Masukkan Pertanyaan">
                                </div>
                                <div class="form-group">
                                    <label for="jawaban">Jawaban</label>
                                    <textarea class="form-control ckeditor" name="content" id="content"></textarea>
                                </div>
                                <button class="btn btn-info" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                $no = 1;
                foreach ($data->result() as $faq) {
                    ?>
                    <div class="card mt-2">
                        <div class="card-header">
                            <?= $no++ . '. ' . $faq->pertanyaan ?>
                        </div>
                        <div class="card-body">
                            <?= $faq->jawaban ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</div>