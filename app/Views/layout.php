<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= env('app.name', 'My Application') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1;
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 5px 0;
        }
    </style>

</head>
<body>
 <header class="bg-success text-white text-center py-3">
        <h1><?= isset($entity_name) ? $entity_name : env('app.name', 'My Application') ?></h1>
    </header>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link <?= (session()->get('logged_in'))?"":"disabled" ?>" href="<?= base_url('/transactions') ?>">Transactions</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= (session()->get('logged_in'))?"":"disabled" ?>" href="<?= base_url('/users') ?>">Users</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= (session()->get('logged_in'))?"":"disabled" ?>" href="<?= base_url('/entities') ?>">Entities</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= (session()->get('logged_in'))?"":"disabled" ?>" href="<?= base_url('/accounts') ?>">Accounts</a>
                    </li>

                    <?php if (session()->get('logged_in')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/logout') ?>">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/login') ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/register') ?>">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?= $this->renderSection('content') ?>
    </div>

    <footer class="bg-dark text-white text-center"> <!--  py-3 mt-4 -->
        &copy; 2024 <?= env('app.name', 'My Application') ?> by agsp
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>