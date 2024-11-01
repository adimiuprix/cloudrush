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
                            <th>User wallet</th>
                            <th>Balance</th>
                            <th>Total earn</th>
                            <th>Earning balance</th>
                            <th>IP address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php $id_user = 1; ?>
                        <?php foreach($users as $user):?>
                        <tr class="table-primary">
                            <td>#<?= $id_user++; ?></td>
                            <td><?= $user->user_wallet; ?></td>
                            <td><?= $user->balance; ?></td>
                            <td><?= $user->total_earn; ?></td>
                            <td><?= $user->earning_balance; ?></td>
                            <td><?= $user->ip_address; ?></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ri-more-2-line"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item waves-effect" href="<?= base_url('admin/plan/edit/' . $user->id); ?>"><i class="ri-pencil-line me-1"></i> Edit</a>

                                        <!-- Button for delete -->
                                        <form action="<?= site_url('admin/plan/delete/' . $user->id); ?>" method="post">
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