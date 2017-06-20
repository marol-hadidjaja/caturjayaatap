<!DOCTYPE html>
<html>
  <head>
    <script src="<?= base_url() ?>public/javascripts/jquery-3.2.1.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/materialize.min.css">
    <script src="<?= base_url() ?>public/javascripts/materialize.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>public/stylesheets/admin/style.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Catur Jaya Atap - Login</title>
  </head>

  <body>
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
                    <div id="infoMessage" class="formLogin col s12"><?php echo $message;?></div>

                    <?php echo form_open("auth/forgot_password", array('class' => 'col s12 formLogin'));?>
                      <div class="row">
                        <div class="input-field col s12">
                          <label for="identity">
                            <?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?>
                          </label>
                          <?php
                            $identity['placeholder'] = 'Your Email';
                            $identity['class'] = 'validate';
                            $identity['autofocus'] = '';
                          ?>
                          <?php echo form_input($identity);?>
                        </div><!-- close .input-field.col.s12 -->
                      </div><!-- close .row -->
                    <?php echo form_close();?>
                  </div><!-- close .row -->

                  <a href="" class="waves-effect waves-light btn btnLogin"><?= lang('forgot_password_submit_btn') ?></a>
                </div><!-- backWhite -->
              </div><!-- close .tableCell -->
            </div>
          </div>
        </div>
      </div><!-- container -->
    </div>

    <script>
      $("body").on("keyup", "#identity", function(e){
        if(e.keyCode == 13)
          $('.formLogin').submit();

        e.preventDefault();
      });

      $("body").on("click", ".btnLogin", function(e){
        $('.formLogin').submit();
        e.preventDefault();
      });
    </script>
  </body>
</html>
