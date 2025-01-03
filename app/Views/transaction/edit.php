<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Edit Transaction</h1>
    <form action="/transactions/update/<?= $transaction['trn_guid'] ?>" method="post">
        <div class="mb-3">
            <label for="transaction_date" class="form-label">Date</label>
            <input type="date" class="form-control" id="transaction_date" name="transaction_date" value="<?= esc($transaction['trn_transaction_date']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="account_id" class="form-label">Account</label>
            <select class="form-control" id="account_id" name="account_id" required>
                <?php foreach ($accounts as $account): ?>
                    <option value="<?= $account['id'] ?>" <?= $account['id'] == $transaction['trn_account_id'] ? 'selected' : '' ?>><?= esc($account['acc_name']) ?> (<?= esc($account['acc_type']) ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="<?= esc($transaction['trn_amount']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-control" id="type" name="type" required>
                <option value="income" <?= $transaction['type'] == 'income' ? 'selected' : '' ?>>Income</option>
                <option value="expense" <?= $transaction['type'] == 'expense' ? 'selected' : '' ?>>Expense</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="<?= esc($transaction['trn_description']) ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
<?= $this->endSection() ?>