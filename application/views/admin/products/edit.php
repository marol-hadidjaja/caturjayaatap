<div class="title">
  <h5>Product <?= $product['name'] ?></h5>
  <a href="<?= base_url().'admin/categories/edit/'.$product['category_id'] ?>" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Back to Product</a>
</div>

<?php echo validation_errors(); ?>

<?= form_open_multipart("admin/products/update", array('class' => 'editPage')) ?>

  <?php $this->load->view('admin/products/_form'); ?>

<?= form_close() ?>

<div class="actionBtn">
  <a class="waves-effect waves-light btn btnSave">Save</a>
  <?= anchor('admin/products', 'Cancel', array('class' => 'waves-effect waves-light btn grey')) ?>
</div>
