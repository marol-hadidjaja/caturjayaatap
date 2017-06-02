<script src="<?= base_url() ?>public/javascripts/jquery-3.2.1.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/materialize.min.css">
<script src="<?= base_url() ?>public/javascripts/materialize.min.js"></script>
<link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/admin/style.css">

<div class="login">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <div class="table">
          <div class="tableCell">
            <div class="backWhite">
              <div class="logo">
                <?= img('public/images/logo.png') ?>
              </div>
              <div class="row">
                <div id="infoMessage"><?php echo $message;?></div>

                <?php echo form_open("auth/login", array('class' => 'col s12 formLogin'));?>
                  <div class="row">
                    <div class="input-field col s12">
                      <?php echo lang('login_identity_label', 'identity');?>
                      <?php
                        $identity['placeholder'] = 'Your Email';
                        $identity['class'] = 'validate';
                      ?>
                      <?php echo form_input($identity);?>
                    </div><!-- close .input-field.col.s12 -->

                    <div class="input-field col s12">
                      <?php echo lang('login_password_label', 'password'); ?>
                      <?php
                        $password['placeholder'] = 'Your Password';
                        $password['class'] = 'validate';
                      ?>
                      <?php echo form_input($password);?>
                    </div><!-- close .input-field.col.s12 -->

                    <div class="col s12">
                      <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                      <?php echo lang('login_remember_label', 'remember');?>
                    </div><!-- close .input-field.col.s12 -->

                  </div><!-- close .row -->
                <?php echo form_close();?>
              </div><!-- close .row -->
              <a href="pages.html" class="waves-effect waves-light btn btnLogin">Login</a>
            </div><!-- backWhite -->

            <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>

            <a class="forgot" href="#">Forgot Your Password?</a>
          </div><!-- close .tableCell -->
        </div>
      </div>
    </div>
  </div><!-- container -->
</div>

<script>
  $("body").on("click", ".btnLogin", function(e){
    $('.formLogin').submit();
    e.preventDefault();
  });
</script>
