<?php $this->extend('layout/default_layout') ?>

<?php $this->section('content') ?>
<a href="/users-list">&#8592; kembali</a>

<form action="/update-form/<?=$user['id']?>" method="POST" class="mt-3">
  <div class="mb-3">
    <label for="data" class="form-label">User Data</label>
    <p style="color: gray;">Masukkan data dengan format NAME[space]AGE[space]CITY</p>
    <input type="text" class="form-control" id="data" name="data" placeholder="Muhammad Fahrizal" value="<?= $user['data'] ?>">
  </div>
  <button type="submit" class="btn btn-primary">Update user</button>
</form>

<?php $this->endSection() ?>