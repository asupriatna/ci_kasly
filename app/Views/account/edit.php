<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Edit Account</h1>
    <form action="/accounts/update/<?= $account['acc_guid'] ?>" method="post">
        <div class="mb-3">
            <label for="account_name" class="form-label">Account Name</label>
            <input type="text" class="form-control" id="account_name" name="account_name" value="<?= esc($account['acc_name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="account_type" class="form-label">Account Type</label>
            <select class="form-control" id="account_type" name="account_type" required>
                <option value="bank" <?= $account['acc_type'] == 'bank' ? 'selected' : '' ?>>Bank</option>
                <option value="cash" <?= $account['acc_type'] == 'cash' ? 'selected' : '' ?>>Cash</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
<?= $this->endSection() ?>