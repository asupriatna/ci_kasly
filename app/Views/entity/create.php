<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Create Entity</h1>
    <form action="/entities/store" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="referal_code" class="form-label">Referal Code</label>
            <input type="text" class="form-control" id="referal_code" name="referal_code" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?= $this->endSection() ?>