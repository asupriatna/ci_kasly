<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Account List</h1>
    <a href="/accounts/create" class="btn btn-primary mb-3">Add Account</a>
    <div class="row">
        <?php foreach ($accounts as $account): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($account['acc_name']) ?></h5>
                        <p class="card-text">Type: <?= esc($account['acc_type']) ?></p>
                        <a href="/accounts/edit/<?= $account['acc_guid'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/accounts/delete/<?= $account['acc_guid'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?= $this->endSection() ?>