<!doctype html>
<html lang="en">

<head>
    <?= $this->include('layouts/head'); ?>
    <title><?= $this->renderSection('title') ?></title>
</head>

<body>
    <?= $this->include('layouts/navbar'); ?>
    <div class="container my-3">
        <?= $this->renderSection('content') ?>
    </div>
    <?= $this->include('layouts/script'); ?>
</body>

</html>