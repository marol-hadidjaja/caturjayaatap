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
      echo '<div class="file-field input-field">';
      echo '<div class="btn">';
      echo '<span>File</span>';
      $data = array('name' => 'image',
        'class' => 'validate',
        'id' => 'image');
      echo form_upload($data);
      echo '</div><!-- close .btn -->';
      echo '<div class="file-path-wrapper">';
      echo '<input class="file-path validate" type="text">';
      echo '</div><!-- close .file-path-wrapper -->';
      echo '</div><!-- close .file-field -->';
      echo '<div>Maximum file size: 2MB</div>';

      if(isset($slider)){
        $extension_pos = strrpos($slider['filename'], '.'); // find position of the last dot, so where the extension starts
        $thumb = substr($slider['filename'], 0, $extension_pos) . '_thumb' . substr($slider['filename'], $extension_pos);
        echo img("uploads/{$thumb}");
      }
    ?>
  </div>
</div><!-- close .row -->
