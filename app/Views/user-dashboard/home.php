<section class="container-fluid">
    <div class="container">
        <a class="btn-logout" href="<?= base_url('/Login/logout') ?>">
            <img src="<?= base_url('/img/off.png') ?>"/>
        </a>
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <a class="button user" href="<?=base_url('admin/user')?>">
                    <div><?=lang('Home.titleButtonUser')?></div>
                    <img class="w-100" src="<?= base_url('/img/undraw_add_user_ipe3.svg') ?>" />
                </a>
            </div>
            <div class="col-lg-4 col-sm-12">
                <a class="button customer" href="<?=base_url('admin/customer')?>">
                    <div><?=lang('Home.titleButtonCustumer')?></div>
                    <img class="w-100" src="<?=base_url('/img/undraw_detailed_analysis_xn7y.svg')?>" />
                </a>
            </div>
            <div class="col-lg-4 col-sm-12">
                <a class="button file" href="<?=base_url('admin/file')?>">
                    <div><?=lang('Home.titleButtonFile')?></div>
                    <img class="w-100" src="<?=base_url('/img/undraw_add_file2_gvbb.svg')?>" />
                </a>
            </div>
        </div>
    </div>
</section>