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
                ?>
                <div class="card p-2 mt-2 shadow-sm rounded">
                    <h3><?= $faq->pertanyaan ?></h3>
                    <div class="jawaban mt-2">
                        <p><?= $faq->jawaban ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2">

        </div>
    </section>
</div>