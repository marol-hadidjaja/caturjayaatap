<?php
  echo validation_errors();

  echo form_open("admin/settings/update");

  echo form_label('Office Address', 'office_address');
  $data = array('name' => 'office_address',
    'class' => '',
    'id' => 'office_address',
    'value' => $setting->office_address);
  echo form_textarea($data);

  echo form_label('Office Phone', 'office_phone');
  $data = array('name' => 'office_phone',
    'class' => '',
    'id' => 'office_phone',
    'value' => $setting->office_phone);
  echo form_input($data);

  echo form_label('Workshop Address', 'workshop_address');
  $data = array('name' => 'workshop_address',
    'class' => '',
    'id' => 'workshop_address',
    'value' => $setting->workshop_address);
  echo form_textarea($data);

  echo form_label('Workshop Phone', 'workshop_phone');
  $data = array('name' => 'workshop_phone',
    'class' => '',
    'id' => 'workshop_phone',
    'value' => $setting->workshop_phone);
  echo form_input($data);

  echo form_label('Email', 'email');
  $data = array('name' => 'email',
    'class' => '',
    'id' => 'email',
    'value' => $setting->email);
  echo form_input($data);

  echo form_label('Visi', 'visi');
  $data = array('name' => 'visi',
    'class' => '',
    'id' => 'visi',
    'value' => $setting->visi);
  echo form_textarea($data);

  echo form_label('Misi', 'misi');
  $data = array('name' => 'add_mission',
    'id' => 'add_mission');
  echo form_button($data, 'Add mission');

  echo "<div id='missions_container'>";
  if(count($missions) > 0){
    $missions_count = count($missions) - 1;
    foreach($missions as $mission){
      $this->load->view('admin/missions/_form', array('mission' => $mission, 'missions_count' => $missions_count));
      $missions_count --;
    }
  }
  echo "</div><!-- close #missions_container -->";

  echo form_submit('btn_save', 'Save');

  echo form_close();
?>

  <script>
  $("body").on("click", "#add_mission", function(e){
    missions_count = $('.mission').length - 1;
    $.ajax({
      url: '<?= base_url() ?>' + 'admin/missions/new?missions_count=' + missions_count,
      success: function(result){
        $('#missions_container').prepend(result);
      }
    });
    e.preventDefault();
  });
  </script>
