<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>
Login
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-center">
    <div class="card my-5 col-5 p-5 shadow border-0">
        <h4 class="text-center">Login</h4>
        <!-- login illustration -->
        <div class="d-flex justify-content-center">
            <img src="<?= base_url('/img/illustration/login.jpg') ?>" alt="login" class="img-fluid" width="200px">
        </div>
        <form action="<?php echo base_url('authenticate'); ?>" method="post">
            <?= csrf_field(); ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control <?php echo isset($errors['username']) ? 'is-invalid' : ''; ?>" name="username" id="username" placeholder="Input Username">
                <?php if (isset($errors['username'])) : ?>
                    <div class="invalid-feedback"><?= $errors['username'] ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder="Input Password">
                <?php if (isset($errors['password'])) : ?>
                    <div class="invalid-feedback"><?= $errors['password'] ?></div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn w-100 btn-primary">Login</button>

        </form>
    </div>
</div>


<?= $this->endSection() ?>