<div class="container-fluid">
    <section class="content-header text-center mt-4">
        <h4>Frequent Asked Question</h4>
        <p><?= date('d F, Y'); ?></p>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-8">
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
            <div class="col-lg-2">

            </div>
        </div>
    </section>
</div>