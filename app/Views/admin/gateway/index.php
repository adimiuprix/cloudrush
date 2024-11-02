<?= $this->extend('admin/layout') ?>
<?= $this->section('admsec') ?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-md-12">
            <div class="card mb-6">
                <h5 class="card-header">Payment gateway setting</h5>
                <form action="<?= base_url('admin/gateway'); ?>" method="post">
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <small class="text-light fw-medium d-block">Deposit method</small>
                        <div class="input-group">
                            <select class="form-select" name="depo_mthd">
                                <option>Choose...</option>
                                <option value="manual" <?= ($paygateway->deposit_method == 'manual') ? 'selected' : '' ?>>Manual</option>
                                <option value="ccpayments" <?= ($paygateway->deposit_method == 'ccpayments') ? 'selected' : '' ?>>Ccpayment</option>
                            </select>
                        </div>
                        <small class="text-light fw-medium d-block">Withdraw method</small>
                        <div class="input-group">
                            <select class="form-select" name="wd_mthd">
                                <option>Choose...</option>
                                <option value="manual" <?= $paygateway->withdraw_method == 'manual' ? 'selected' : '' ?>>Manual</option>
                                <option value="ccpayments" <?= $paygateway->withdraw_method == 'ccpayments' ? 'selected' : '' ?>>Ccpayment</option>
                            </select>
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