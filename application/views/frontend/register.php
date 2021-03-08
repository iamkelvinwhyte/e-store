<?php include 'inc/header.php';?>
<?php include 'inc/nav.php';?>
<!--Login Page-->
<div class="site-main clearfix" style="margin-top: 5em;">
    <div class="container">
        <div class="row">
          <div class="col-sm-12">
              <div class="wrap-account-forms other-page margin-top-140">
                  <!--Title-->
                  <h3 class="page-title">create account</h3>
                  <!--End Title-->
                  <!--Form-->
                  <form action="<?=base_url()?>app/register_user" method="POST" class="account-forms">
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
                          <input type="text" class="input-text required name" placeholder="first name" name="first_name"/>
                          <input type="text" class="input-text required last-name" placeholder="last name" name="last_name"/>
                      </p>
                      <p class="form-row">
                          <input type="text" class="input-text required" placeholder="email" name="email"/>
                      </p>
                      <p class="form-row">
                          <input type="password" class="input-text required" placeholder="password" name="password"/>
                      </p>
                      <p class="form-row">
                          <input type="submit" class="button" value="sign in"/>
                      </p>
                      <p class="create-account">
                          <a href="#">already a customer?</a>
                          <a href="<?=base_url()?>app/app_login" class="create-account-login">log in</a>
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
