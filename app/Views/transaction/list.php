<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Transaction List</h1>
    <a href="/transactions/create" class="btn btn-primary mb-3">Add Transaction</a>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Account</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                    <tr>
                        <td><?= esc($transaction['trn_transaction_date']) ?></td>
                        <td><?= esc($transaction['acc_name']) ?> (<?=esc($transaction['acc_type'])?>)</td>
                        <td align="right"><?= number_format($transaction['trn_amount'], 0, '.', ',') ?></td>
                        <td><?= esc($transaction['type']) ?></td>
                        <td><?= esc($transaction['trn_description']) ?></td>
                        <td>
                            <a href="/transactions/edit/<?= $transaction['trn_guid'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/transactions/delete/<?= $transaction['trn_guid'] ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection() ?>