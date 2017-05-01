<?php
  echo validation_errors();

  echo form_open("admin/pages/update/{$url}");

  echo form_label('Title', 'title');
  $data = array('name' => 'title',
    'class' => '',
    'id' => 'title',
    'value' => $page['title']);
  echo form_input($data);

  echo form_label('Summary', 'summary');
  $data = array('name' => 'summary',
    'class' => '',
    'id' => 'summary',
    'value' => $page['summary']);
  echo form_textarea($data);

  echo form_label('Content', 'content');
  $data = array('name' => 'content',
    'class' => '',
    'id' => 'content',
    'value' => $page['content']);
  echo form_textarea($data);

  echo form_submit('btn_save', 'Save');

  echo form_close();
?>

<script>
  $(document).ready(function() {
    var toolbar = [
                    ['style', ['style', 'bold', 'italic', 'underline', 'strikethrough', 'clear']],
                    ['fonts', ['fontsize', 'fontname']],
                    ['color', ['color']],
                    ['undo', ['undo', 'redo', 'help']],
                    ['misc', ['link', 'table', 'hr', 'fullscreen']],
                    ['para', ['ul', 'ol', 'leftButton', 'centerButton', 'rightButton', 'justifyButton', 'outdentButton', 'indentButton']],
                    ['height', ['lineheight']],
                ];
    $('#content').materialnote({
      height: 550,
      toolbar: toolbar
    });

    $('button.dropdown').click(function(event){
      event.preventDefault();
      event.stopPropagation();
    });

    // $('#content').summernote();

    /*
    var quill = new Quill('#content', {
      theme: 'snow'
    });
    */
  });
</script>
