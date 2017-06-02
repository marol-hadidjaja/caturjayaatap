<div class="row">
  <?php
    $data = array('name' => 'id',
      'type' => 'hidden',
      'id' => 'id',
      'value' => isset($slider) ? set_value('id', $slider['id']) : set_value('id'));
    echo form_input($data);
  ?>

  <div class="input-field col s12">
    <?php
      $data = array('name' => 'title',
        'class' => 'validate',
        'id' => 'title',
        'autofocus' => '',
        'placeholder' => 'Title',
        'value' => isset($slider) ? set_value('title', $slider['title']) : set_value('title'));
      echo form_input($data);
    ?>
    <?= form_label('Title', 'title') ?>
  </div>

  <div class="input-field col s12">
    <?php
      $data = array('name' => 'description',
        'class' => 'validate materialize-textarea',
        'id' => 'description',
        'placeholder' => 'Description',
        'value' => isset($slider) ? set_value('description', $slider['description']) : set_value('description'));
      echo form_textarea($data);
    ?>

    <?= form_label('Description', 'description') ?>
  </div>

  <div class="input-field col s12">
    <?php
      $data = array('name' => 'image',
        'class' => 'validate',
        'id' => 'image');
      echo form_upload($data);
      echo form_label('Image', 'image');

      if(isset($slider)){
        echo img("uploads/{$slider['filename']}");
      }
    ?>
  </div>
</div><!-- close .row -->
