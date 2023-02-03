<?php $this->extend('layout/default_layout') ?>

<?php $this->section('content') ?>
<a href="<?= base_url('user-form');?>" class="btn btn-success btn-sm">Add User</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">City</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $key => $data) : ?>
      <tr>
        <th scope="row"><?= $key+1 ?></th>
        <td><?= $data['name'] ?></td>
        <td><?= $data['age'] ?></td>
        <td><?= $data['city'] ?></td>
        <td>
          <a href="<?= base_url('edit-view/'.$data['id']);?>" class="btn btn-primary btn-sm">Edit</a>
          <a href="<?= base_url('delete/'.$data['id']);?>" class="btn btn-danger btn-sm">Delete</a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<?php $this->endSection() ?>