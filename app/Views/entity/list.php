<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Entity List</h1>
    <a href="/entities/create" class="btn btn-primary mb-3">Add Entity</a>
    <div class="row">
        <?php foreach ($entities as $entity): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($entity['ety_name']) ?></h5>
                        <p class="card-text">Referal Code: <?= esc($entity['ety_referal_code']) ?></p>
                        <a href="/entities/edit/<?= $entity['ety_guid'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/entities/delete/<?= $entity['ety_guid'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?= $this->endSection() ?>