<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>
Detail Product
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Detail Product</h2>

<div class="card my-4" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="/img/<?php echo $product->image ?>" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?php echo $product->name ?></h5>
                <p class="card-text"><small class="text-muted"><?php echo $product->category_name ?></small></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>