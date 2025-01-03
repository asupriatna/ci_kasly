<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>User List</h1>
    <a href="/users/create" class="btn btn-primary mb-3">Add User</a>
    <div class="row">
        <?php foreach ($users as $user): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($user['usr_username']) ?></h5>
                        <p class="card-text"><?= esc($user['usr_email']) ?></p>
                        <a href="/users/edit/<?= $user['usr_guid'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/users/delete/<?= $user['usr_guid'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?= $this->endSection() ?>