<?= validation_errors() ?>

<?= form_open_multipart("admin/user/edit", array('class' => 'editPage updatePassword')) ?>

<div class="input-field col s12">
  <?php
    $old_password['placeholder'] = 'Your Old Password';
    $old_password['class'] = 'validate';
    $old_password['autofocus'] = '';
  ?>
  <?php echo form_input($old_password);?>
  <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
</div>

<div class="input-field col s12">
  <?php
    $new_password['placeholder'] = 'Your Email';
    $new_password['class'] = 'validate';
  ?>
  <?php echo form_input($new_password);?>
  <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
</div>

<div class="input-field col s12">
  <?php
    $new_password_confirm['placeholder'] = 'Your Email';
    $new_password_confirm['class'] = 'validate';
  ?>
  <?php echo form_input($new_password_confirm);?>
  <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
</div>

<?php echo form_input($user_id);?>

<?= form_close() ?>

<div class="actionBtn">
  <a class="waves-effect waves-light btn btnSave"><?= lang('change_password_submit_btn') ?></a>
  <?= anchor('admin/dashboard', 'Cancel', array('class' => "waves-effect waves-light btn grey")) ?>
</div>

<script>
  $('.sideRight').addClass('detPage');

  $('body').on("click", ".btnSave", function(e){
    $('.updatePassword').submit();
    e.preventDefault();
  });
</script>
