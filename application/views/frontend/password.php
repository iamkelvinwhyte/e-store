<?php include 'inc/header.php';?>
<?php include 'inc/nav.php';?>
<!--Login Page-->
<div class="site-main clearfix" style="margin-top: 5em;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="wrap-login-forms other-page margin-top-140">
                    <!--Title-->
                    <h3 class="page-title">Reset Password</h3>

                    <!--End Title-->
                    <!--Form-->
                    <form action="<?=base_url()?>app/activ_login_user" method="POST" class="login-forms">
                      <p class="form-row">
                  <?=validation_errors('<div class="alert alert-danger">
                  <center><strong>','</strong></center></div>'); ?>

                  <?php
                  if(isset($_SESSION['error'])){
                    echo '<div class="alert alert-danger">
                    <center><strong>'.$this->session->flashdata('error').'</strong></center></div>';
                  }
                  if(isset($_SESSION['success'])){
                    echo '<div class="alert alert-success">
                    <center><strong>'.$this->session->flashdata('success').'</strong></center></div>';
                  }
                  ?>
                </p>
                        <p class="form-row">
                            <input type="email" class="input-text required" placeholder="Email" name="email"/>
                        </p>

                        <p class="lost_password">
                            <a href="<?=base_url()?>app/app_password">forgot your password?</a>
                        </p>
                        <p class="form-row">
                            <input type="submit" class="button" value="Reset Password"/>
                        </p>
                        <p class="create-account">
                            <a href="<?=base_url()?>app/app_register">create account</a>
                        </p>
                    </form>
                    <!--End Form-->
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include 'inc/footer.php';?>
