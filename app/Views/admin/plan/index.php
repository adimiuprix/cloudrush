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
                        <?php $id_plan = 1; ?>
                        <?php foreach($plans as $plan):?>
                        <tr class="table-primary">
                            <td>#<?= $id_plan++; ?></td>
                            <td><?= $plan['plan_name']; ?></td>
                            <td><?= $plan['earning_per_day']; ?></td>
                            <td><?= $plan['price']; ?></td>
                            <td><?= $plan['profit']; ?> %</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ri-more-2-line"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item waves-effect" href="<?= base_url('admin/plan/edit/' . $plan['id']); ?>"><i class="ri-pencil-line me-1"></i> Edit</a>

                                        <!-- Button for delete -->
                                        <form action="<?= site_url('admin/plan/delete/' . $plan['id']); ?>" method="post">
                                            <?= csrf_field() ?>
                                            <button class="dropdown-item waves-effect"><i class="ri-delete-bin-6-line me-1"></i> Delete</button>
                                        </form>

                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <?= $this->include('admin/partialls/footer');?>
</div>
<?= $this->endSection() ?>