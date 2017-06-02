<?php
  echo "<div class='mission'>";
  echo form_hidden("misi[{$missions_count}][id]", isset($mission) ? set_value('id', $mission['id']) : set_value('mission_id'));

  $data = array('name' => "misi[{$missions_count}][mission]",
    'class' => 'validate materialize-textarea',
    'placeholder' => 'Misi',
    'value' => isset($mission) ? set_value('mission', $mission['mission']) : set_value('mission_mission'));
  echo form_textarea($data);
  echo "</div><!-- close .mission -->";
?>
