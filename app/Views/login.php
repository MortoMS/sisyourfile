<section class="container-fluid w-100 h-100 d-flex align-items-center"> 
    <form action="<?= $urlLogin ?>" method="post" class="m-auto shadow-lg">
        <div class="text-center mb-2">
            <h2><?= $title ?></h2>
        </div>
        <hr />
        <?php if (!empty($messageInfo)): ?>
            <div class="alert alert-info">
                <?= $messageInfo ?>
            </div>
        <?php endif; ?>
        <?= csrf_field() ?>
        <div class="form-group mb-3 mt-4">
            <label for="email">E-mail</label>
            <input 
                type="text" 
                id="email" 
                class="form-control" 
                name="email" 
                value="<?= old('email') ?>" 
                required
            />
        </div>
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <input 
                id="password" 
                type="password" 
                name="password"
                class="form-control" 
                value="<?= old('password') ?>" 
                required
            />
        </div>
        <a 
            class="forgot-password" 
            href="<?= $linkForgotPassword ?>"
        >
            <?=lang('Login.defaultForgotPassword')?>
        </a>
        <div class="mt-4 text-end">
            <button class="btn btn-success">Login</button>
        </div>
        <?php if (!empty($message)): ?>
            <div class="alert alert-danger mt-4">
                <?= empty($message) ? '' : $message ?>
            </div>
        <?php endif; ?>
    </form>
</section>

<style>
form {
    max-width: 380px;
    width: 100%;
    display: block;
    background: var(--color-white-1);
    padding: 2em;
}
</style>