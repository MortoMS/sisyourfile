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

<style>
.card-link {
    background: var(--color-dark-1);
    padding: 0.5em 1em;
    height: 250px;
}

.card-link.purple {
    background: var(--color-1);
}

.card-link.orange {
    background: var(--color-2);
}

.card-link-a {
    color: var(--color-white-1);
    text-decoration: none;
    font-size: 2em;
}

.card-link-a:hover {
    color: var(--color-white-1);
}
</style>