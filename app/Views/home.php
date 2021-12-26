<section class="container-fluid w-100 h-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-4 mt-2">
                <a class="card-link-a" href="<?= base_url('UserLogin'); ?>">
                    <div class="card-link purple">
                        <div>
                            <?= lang('Login.defaultTextUser') ?><br>
                            <?= lang('Login.defaultClickHere') ?>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 mt-2">
                <a class="card-link-a" href="<?= base_url('CustomerLogin'); ?>">
                    <div class="card-link orange">
                        <div>
                            <?= lang('Login.defaultTextCustomer') ?><br>
                            <?= lang('Login.defaultClickHere') ?>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>