<?= $this->extend('admin/layout') ?>
<?= $this->section('admsec') ?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-header mb-0">All plans</h5>
                <button type="button" class="btn rounded-pill btn-primary">
                    <span class="tf-icons ri-add-box-fill ri-16px me-1_5"></span>
                    Add
                </button>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach($faqs as $faq):?>
                        <tr class="table-primary">
                            <td>#1</td>
                            <td><?= substr($faq->question, 0, 20); ?>...</td>
                            <td><?= substr($faq->question, 0, 20); ?>...</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ri-more-2-line"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item waves-effect" href="<?= base_url('admin/faqs/edit/'); ?>"><i class="ri-pencil-line me-1"></i> Edit</a>

                                        <!-- Button for delete -->
                                        <form action="<?= site_url('admin/faqs/delete/'); ?>" method="post">
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