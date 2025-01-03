
<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Create Account</h1>
    <form action="/accounts/store" method="post">
        <div class="mb-3">
            <label for="account_name" class="form-label">Account Name</label>
            <input type="text" class="form-control" id="account_name" name="account_name" required>
        </div>
        <div class="mb-3">
            <label for="account_type" class="form-label">Account Type</label>
            <select class="form-control" id="account_type" name="account_type" required>
                <option value="bank">Bank</option>
                <option value="cash">Cash</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?= $this->endSection() ?>