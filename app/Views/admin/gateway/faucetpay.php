<?= $this->extend('admin/layout') ?>
<?= $this->section('admsec') ?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-md-12">
            <div class="card mb-6">
                <h5 class="card-header">Ccpayment setting</h5>
                <form action="<?= base_url('admin/gateway/ccpayment'); ?>" method="post">
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <small class="text-light fw-medium d-block">App ID</small>
                        <div class="input-group">
                            <input type="text" class="form-control" value="" name="app_id" placeholder="Input app id">
                        </div>
                        <small class="text-light fw-medium d-block">App secret</small>
                        <div class="input-group">
                            <input type="text" class="form-control" value="" name="app_sec" placeholder="Input app secret">
                        </div>
                        <small class="text-light fw-medium d-block">Chain</small>
                        <div class="input-group">
                            <input type="text" class="form-control" value="" name="chain" placeholder="Input type chain">
                        </div>
                        <small class="text-light fw-medium d-block">Coin ID</small>
                        <div class="input-group">
                            <input type="text" class="form-control" value="" name="coin_id" placeholder="Input coin id">
                        </div>
                    </div>
                    <div class="d-grid col-lg-6 mx-auto mb-5">
                        <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <?= $this->include('admin/partialls/footer');?>
</div>
<?= $this->endSection() ?>