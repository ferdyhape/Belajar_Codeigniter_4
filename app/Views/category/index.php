<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>
Category
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Category</h2>
<div class="table-responsive my-2">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($categories as $category) :
            ?>
                <tr class="">
                    <td><?php echo $category['name']; ?></td>
                    <td><?php echo $category['description']; ?></td>
                    <td>
                        <div class="btn btn-sm btn-success">Detail</div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>