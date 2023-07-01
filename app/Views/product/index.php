<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>
Product
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between">
    <h2>Product</h2>
    <a href="/product/create" class="btn btn-primary my-auto btn-sm">Create</a>
</div>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success my-2">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<div class="table-responsive my-2">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($products as $product) :
            ?>
                <tr class="">
                    <td><img src="/img/<?= $product['image']; ?>" alt="" class="img-fluid" width="100"></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['category_name']; ?></td>
                    <td>
                        <a href="product/<?php echo $product['id']; ?>" class="btn btn-sm btn-success">Detail</a>
                        <a href="product/edit/<?php echo $product['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="product/delete/<?php echo $product['id']; ?>" method="post" class="d-inline">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>