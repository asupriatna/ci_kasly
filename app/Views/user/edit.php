<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h1>Edit User</h1>
    <form action="/users/update/<?= $user['usr_guid'] ?>" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= esc($user['usr_username']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= esc($user['usr_email']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="entity_id" class="form-label">Entity</label>
            <select class="form-control" id="entity_id" name="entity_id" required>
                <?php foreach ($entities as $entity): ?>
                    <option value="<?= $entity['id'] ?>" <?= $entity['id'] == $user['usr_entity_id'] ? 'selected' : '' ?>><?= esc($entity['ety_name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="role_id" class="form-label">Role</label>
            <select class="form-control" id="role_id" name="role_id" required>
                <?php foreach ($roles as $role): ?>
                    <option value="<?= $role['id'] ?>" <?= $role['id'] == $user['usr_role_id'] ? 'selected' : '' ?>><?= esc($role['rol_name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
<?= $this->endSection() ?>