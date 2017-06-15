<?= validation_errors() ?>

<?= form_open_multipart("admin/settings/update", array('class' => 'editPage updateSetting')) ?>

<div class="input-field col s12">
  <?php
    $data = array('name' => 'office_address',
      'class' => 'validate materialize-textarea',
      'id' => 'office_address',
      'placeholder' => 'Office Address',
      'value' => $setting->office_address);
    echo form_textarea($data);
    echo form_label('Office Address', 'office_address');
  ?>
</div>

<div class="input-field col s12">
  <?php
    $data = array('name' => 'office_phone',
      'class' => 'validate',
      'id' => 'office_phone',
      'placeholder' => 'Office Phone',
      'value' => $setting->office_phone);
    echo form_input($data);
    echo form_label('Office Phone', 'office_phone');
  ?>
</div>

<div class="input-field col s12">
  <?php
    echo form_label('Workshop Address', 'workshop_address');
    $data = array('name' => 'workshop_address',
      'class' => 'validate materialize-textarea',
      'id' => 'workshop_address',
      'placeholder' => 'Workshop Address',
      'value' => $setting->workshop_address);
    echo form_textarea($data);
  ?>
</div>

<div class="input-field col s12">
  <?php
    $data = array('name' => 'workshop_phone',
      'class' => 'validate',
      'id' => 'workshop_phone',
      'placeholder' => 'Workshop Phone',
      'value' => $setting->workshop_phone);
    echo form_input($data);
    echo form_label('Workshop Phone', 'workshop_phone');
  ?>
</div>

<div class="input-field col s12">
  <?php
    $data = array('name' => 'email',
      'class' => 'validate',
      'id' => 'email',
      'placeholder' => 'Email',
      'value' => $setting->email);
    echo form_input($data);
    echo form_label('Email', 'email');
  ?>
</div>

<div class="input-field col s12">
  <?php
    echo form_label('Visi', 'visi');
    $data = array('name' => 'visi',
      'class' => 'validate materialize-textarea',
      'id' => 'visi',
      'placeholder' => 'Visi',
      'value' => $setting->visi);
    echo form_textarea($data);
  ?>
</div>

<div class="input-field col s12">
  <div class="addPrice">
    <a id="add_mission" class="waves-effect waves-light btn"><i class="material-icons">add</i></a>
    <span>Add Mission</span>
  </div>
</div>

<div class="input-field col s12">
  <?php
    echo "<div id='missions_container'>";
    if(count($missions) > 0){
      $missions_count = count($missions) - 1;
      foreach($missions as $mission){
        $this->load->view('admin/missions/_form', array('mission' => $mission, 'missions_count' => $missions_count));
        $missions_count --;
      }
    }
    echo "</div><!-- close #missions_container -->";
  ?>
</div>

<?= form_close() ?>

<div class="actionBtn">
  <a class="waves-effect waves-light btn btnSave">Save</a>
  <?= anchor('admin/dashboard', 'Cancel', array('class' => "waves-effect waves-light btn grey")) ?>
</div>

<script>
  $('.sideRight').addClass('detPage');

  $('#office_address').focus();

  $('body').on("click", ".btnSave", function(e){
    $('.updateSetting').submit();
    e.preventDefault();
  });

  $("body").on("click", "#add_mission", function(e){
    missions_count = $('.mission').length - 1;
    $.ajax({
      url: '<?= base_url() ?>' + 'admin/missions/new?missions_count=' + missions_count,
      success: function(result){
        $('#missions_container').prepend(result);
        $(".missions")[0].focus();
      }
    });
    e.preventDefault();
  });
</script>
