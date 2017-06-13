<div class="title">
  <h5>Page <?= $page['title'] ?></h5>
  <a href="<?= base_url()."admin/dashboard" ?>" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Back to Pages</a>
</div>
<?= validation_errors() ?>

<?= form_open_multipart("admin/pages/update/{$url}", array('class' => 'editPage')) ?>
  <div class="row">
    <div class="input-field col s12">
      <?php
        $data = array('name' => 'title',
          'class' => 'validate',
          'id' => 'title',
          'value' => $page['title'],
          'placeholder' => 'Title');
        echo form_input($data);
      ?>
      <?= form_label('Title', 'title') ?>
    </div>

    <div class="input-field col s12">
      <?php
        $data = array('name' => 'summary',
          'placeholder' => 'Summary',
          'id' => 'summary',
          'class' => 'materialize-textarea',
          'value' => $page['summary']);
        echo form_textarea($data);
        echo form_label('Summary', 'summary');
      ?>
    </div>

    <div class="wysiwyg col s12">
      <?php
        echo form_label('Content', 'content');
        echo '<div class="row">';
        echo '<div>';
        $data = array('name' => 'content',
          'class' => '',
          'id' => 'content',
          'value' => $page['content']);
        echo form_textarea($data);
        echo '</div><!-- close .input-field.col.s12 -->';
        echo '</div><!-- close .row -->';
      ?>
    </div><!-- close .wysiwyg -->
  </div>

  <div class="input-field col s12">
    <?php
      if($page['url'] == 'about'){
        echo '<div class="file-field input-field">';
        echo '<div class="btn">';
        echo '<span>Select new image</span>';
        $data = array('name' => 'image',
          'id' => 'image');
        echo form_upload($data);
        echo '</div><!-- close .btn -->';
        echo '<div class="file-path-wrapper">';
        echo '<input class="file-path validate" type="text">';
        echo '</div><!-- close .file-path-wrapper -->';
        echo '</div><!-- close .file-field -->';

        echo '<div>Maximum file size: 2MB</div>';
        if(file_exists("uploads/about.jpg") == 1){
          echo img("uploads/about.jpg", TRUE, array('width' => '300', 'height' => '300'));
        }
      }
    ?>
  </div>
<?= form_close() ?>

<div class="actionBtn">
  <a class="waves-effect waves-light btn btnSave">Save</a>
  <a class="waves-effect waves-light btn grey">Cancel</a>
</div>

<script>
  $(document).ready(function() {
    $('.sideRight').addClass('detPage');

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

    $('body').on("click", ".btnSave", function(e){
      $('.editPage').submit();
      e.preventDefault();
    });
  });
</script>
