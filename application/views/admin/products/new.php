<div class="title">
  <h5>New Product</h5>
  <?php if(isset($product)){ ?>
    <a href="<?= base_url().'admin/categories/edit/'.$product['category_id'] ?>" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Back to Product</a>
  <?php } else{ ?>
    <a href="<?= base_url().'admin/categories/edit/'.$category ?>" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Back to Product</a>
  <?php } ?>
</div>

<?php echo validation_errors(); ?>

<?= form_open_multipart("admin/products/create", array('class' => 'editPage')) ?>

  <?php $this->load->view('admin/products/_form'); ?>

<?= form_close() ?>

<div class="actionBtn">
  <a class="waves-effect waves-light btn btnSave">Save</a>
  <?php if(isset($product)){ ?>
    <?= anchor('admin/categories/'.$product['category_id'], 'Cancel', array('class' => 'waves-effect waves-light btn grey')) ?>
  <?php } else{ ?>
    <?= anchor('admin/categories/edit/'.$category, 'Cancel', array('class' => 'waves-effect waves-light btn grey')) ?>
  <?php } ?>
</div>
