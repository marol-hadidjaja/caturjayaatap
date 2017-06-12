<div class="specifications spec">
  <div class="input-field col s2">
  <h5>Spec <?= ($specs_count + 1)?>:</h5>
  </div>

  <?php
    if(isset($specification)){
      $data = array('name' => "prices[{$prices_count}][specifications][{$specs_count}][id]",
        'type' => 'hidden',
        'class' => 'specifications_id',
        'value' => isset($specification) ? set_value('id', $specification['id']) : set_value('id'));
      echo form_input($data);
    }
  ?>

  <div class="input-field col s3">
    <?php
      $data = array('name' => "prices[{$prices_count}][specifications][{$specs_count}][unit]",
        'class' => 'specification_unit');

      if(isset($specification))
        echo form_dropdown($data, $options_specs_unit, $specification['unit']);
      else
        echo form_dropdown($data, $options_specs_unit, '0');

      echo form_label('Spec:', 'specification_measurement');
    ?>
  </div>

  <div class="input-field col s3">
    <?php
      $data = array('name' => "prices[{$prices_count}][specifications][{$specs_count}][measurement]",
        'type' => 'text',
        'class' => 'specification_measurement',
        'placeholder' => 'Measurement',
        'value' => isset($specification) ? set_value('measurement', $specification['measurement']) : set_value('measurement'));
      echo form_input($data);

      echo form_label('Measurement:', 'specification_measurement');
    ?>
  </div>

  <div class="input-field col s3">
    <?php
      $data = array('name' => "prices[{$prices_count}][specifications][{$specs_count}][name]",
        'class' => 'specification_name');

      if(isset($specification))
        echo form_dropdown($data, $options_specs_name, $specification['name'], '0');
      else
        echo form_dropdown($data, $options_specs_name, '0');

      echo form_label('Size:', 'specification_measurement');
    ?>
  </div>
  <div class="input-field col s1 delSpec">
    <a class="waves-effect waves-light btn red delete_spec"><i class="material-icons">delete_forever</i></a>
  </div>
</div><!-- close .specifications.spec -->
