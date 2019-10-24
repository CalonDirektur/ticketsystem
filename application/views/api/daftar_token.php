<div class="content-wrapper">
    <div class="container">
        <h3 class="text-center">Daftar API Key</h3>
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="<?= base_url('api/add_key') ?>" autocomplete="off">
                    <div class="card card-body">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input class="form-control" type="email" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="partner">Partner</label>
                            <input class="form-control" type="text" name="partner" id="partner">
                        </div>
                        <div class="form-group">
                            <label for="apikey">API Key</label> <small>(Key sudah ter-generate otomatis)</small>
                            <input class="form-control" type="text" name="apikey" id="apikey" value="<?= uniqid() ?>" readonly>
                        </div>
                        <button class="btn btn-info" type="submit" name="submitapi">Kirim API key!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>