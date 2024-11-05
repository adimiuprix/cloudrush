<?= $this->extend('admin/layout') ?>
<?= $this->section('admsec') ?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">About aplication</h5>
            <div class="card-body">
                <div class="deposit-content pt-2">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 align-items-center pb-2">
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                                <h6 class="mb-0">App name:</h6>
                                <h6 class="text-success mb-0">Foren core</h6>
                            </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center pb-2">
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                                <h6 class="mb-0">App version:</h6>
                                <h6 class="text-success mb-0">1.0 Beta</h6>
                            </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center pb-2">
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                                <h6 class="mb-0">Framework:</h6>
                                <h6 class="text-success mb-0">Codeigniter 4.5.1</h6>
                            </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center pb-2">
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                                <h6 class="mb-0">Guzzle installed:</h6>
                                <h6 class="text-success mb-0">true</h6>
                            </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center pb-2">
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                                <h6 class="mb-0">Author:</h6>
                                <h6 class="text-success mb-0">Adi miuprix</h6>
                            </div>
                        </li>
                        <li class="d-flex mb-4 align-items-center pb-2">
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                                <h6 class="mb-0">Homepage:</h6>
                                <h6 class="text-success mb-0">not set</h6>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
    <?= $this->include('admin/partialls/footer');?>
</div>
<?= $this->endSection() ?>