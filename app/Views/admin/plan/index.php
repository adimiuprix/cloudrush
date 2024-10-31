<?= $this->extend('admin/layout') ?>
<?= $this->section('admsec') ?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">All plans</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Plan name</th>
                            <th>Earning per day</th>
                            <th>Price</th>
                            <th>Profit</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr class="table-primary">
                            <td>#1</td>
                            <td>Tron 1</td>
                            <td>0.36666667</td>
                            <td>10.00000000</td>
                            <td>110 %</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ri-more-2-line"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item waves-effect" href="edit.html"><i class="ri-pencil-line me-1"></i> Edit</a>
                                        <a class="dropdown-item waves-effect" href=""><i class="ri-delete-bin-6-line me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <?= $this->include('admin/partialls/footer');?>
</div>
<?= $this->endSection() ?>