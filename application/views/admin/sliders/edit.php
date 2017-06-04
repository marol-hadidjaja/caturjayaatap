<div class="title">
  <a href="<?= base_url()."admin/sliders" ?>" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Back to Sliders</a>
</div>
<?= validation_errors() ?>

<?= form_open_multipart("admin/sliders/update/{$id}", array('class' => 'editPage updateSlider')) ?>

<?php $this->load->view('admin/sliders/_form'); ?>

<?= form_close() ?>

<div class="actionBtn">
  <a class="waves-effect waves-light btn btnSave">Save</a>
  <?= anchor('admin/sliders', 'Cancel', array('class' => "waves-effect waves-light btn grey")) ?>
</div>

<script>
  $('.sideRight').addClass('detPage');

  $('body').on("click", ".btnSave", function(e){
    $('.updateSlider').submit();
    e.preventDefault();
  });
</script>
