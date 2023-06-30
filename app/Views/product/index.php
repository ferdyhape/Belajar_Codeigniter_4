<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>
Product
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Product</h2>
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
                    <td scope="row"><img src="" alt=""></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td><?php echo $product['category_name']; ?></td>
                    <td>
                        <a href="product/<?php echo $product['id']; ?>" class="btn btn-sm btn-success">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>