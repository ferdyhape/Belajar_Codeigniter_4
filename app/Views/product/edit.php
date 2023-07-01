<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>
Edit Product
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="col-5 mx-auto">
    <h2 class="text-center">Edit Product</h2>

    <div class="my-4 text-center">
        <img id="image-preview" src="<?= base_url('img/' . $product['image']) ?>" alt="" class="img-fluid">
    </div>
    <form action="<?= base_url('product/update/' . $product['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="_method" value="PUT"> <!-- Hidden input for mimicking the PUT method -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>" name="name" id="name" placeholder="Name of product" value="<?= $product['name'] ?>">
            <?php if (isset($errors['name'])) : ?>
                <div class="invalid-feedback"><?= $errors['name'] ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control <?php echo isset($errors['price']) ? 'is-invalid' : ''; ?>" name="price" id="price" placeholder="Price of product" value="<?= $product['price'] ?>">
            <?php if (isset($errors['price'])) : ?>
                <div class="invalid-feedback"><?= $errors['price'] ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="category_id">Category:</label>
            <select class="form-select <?php echo isset($errors['category_id']) ? 'is-invalid' : ''; ?>" name="category_id" id="category_id" aria-label="Default select example">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['id'] ?>" <?php echo ($product['category_id'] == $category['id'] ? 'selected' : ''); ?>><?= $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($errors['category_id'])) : ?>
                <div class="invalid-feedback"><?= $errors['category_id'] ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control <?php echo isset($errors['image']) ? 'is-invalid' : ''; ?>" name="image" id="image" placeholder="Image of product">
            <?php if (isset($errors['image'])) : ?>
                <div class="invalid-feedback"><?= $errors['image'] ?></div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary w-100">Save</button>
    </form>
</div>
<script>
    $('#image').on('change', function() {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#image-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    });
</script>

<?= $this->endSection() ?>