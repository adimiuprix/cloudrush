<?= $this->extend('admin/layout') ?>
<?= $this->section('admsec') ?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-md-12">
            <div class="card mb-6">
                <h5 class="card-header">Plan maker</h5>
                <form action="" method="post">
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <small class="text-light fw-medium d-block">Plan name</small>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Plan name">
                        </div>
                        <small class="text-light fw-medium d-block">Free Plan</small>
                        <div class="input-group">
                            <select class="form-select">
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                            </select>
                        </div>
                        <small class="text-light fw-medium d-block">Earning (day)</small>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Earning per day">
                        </div>
                        <small class="text-light fw-medium d-block">Earning rate</small>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Earning rate">
                        </div>
                        <small class="text-light fw-medium d-block">Price</small>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Price">
                        </div>
                        <small class="text-light fw-medium d-block">Profit</small>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Profit">
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