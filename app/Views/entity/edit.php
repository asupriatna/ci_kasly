<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Edit Entity</h1>
    <form action="/entities/update/<?= $entity['ety_guid'] ?>" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= esc($entity['ety_name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="referal_code" class="form-label">Referal Code</label>
            <input type="text" class="form-control" id="referal_code" name="referal_code" value="<?= esc($entity['ety_referal_code']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
<?= $this->endSection() ?>