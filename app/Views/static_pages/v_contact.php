<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>
Contact
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Contact Us</h2>
<div class="table-responsive my-2">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Alamat</th>
                <th scope="col">Telepon</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($alamat as $a) :
            ?>
                <tr class="">
                    <td scope="row"><?php echo $a['alamat']; ?></td>
                    <td><?php echo $a['telp']; ?></td>
                    <td><?php echo $a['email']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>