<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>
Create Product
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-5 mx-auto">
    <h2 class="text-center">Create Product</h2>

    <form action="<?php echo base_url('product/store'); ?>" method="post">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>" name="name" id="name" placeholder="Name of product">
            <?php if (isset($errors['name'])) : ?>
                <div class="invalid-feedback"><?= $errors['name'] ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control <?php echo isset($errors['image']) ? 'is-invalid' : ''; ?>" name="image" id="image" placeholder="Image of product">
            <?php if (isset($errors['image'])) : ?>
                <div class="invalid-feedback"><?= $errors['image'] ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control <?php echo isset($errors['price']) ? 'is-invalid' : ''; ?>" name="price" id="price" placeholder="Price of product">
            <?php if (isset($errors['price'])) : ?>
                <div class="invalid-feedback"><?= $errors['price'] ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="category_id">Category:</label>
            <select class="form-select <?php echo isset($errors['category_id']) ? 'is-invalid' : ''; ?>" name="category_id" id="category_id" aria-label="Default select example">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($errors['category_id'])) : ?>
                <div class="invalid-feedback"><?= $errors['category_id'] ?></div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary w-100">Save</button>
    </form>

</div>


<?= $this->endSection() ?>