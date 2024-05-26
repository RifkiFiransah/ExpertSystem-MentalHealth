<!DOCTYPE html>
<html lang="en">

<head>
  <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>

  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
  <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
  <link rel="shortcut icon" href="<?= base_url('favicon.ico'); ?>">

  <!-- FontAwesome JS-->
  <script defer src="<?= base_url('assets/plugins/fontawesome/js/all.min.js'); ?>"></script>

  <!-- App CSS -->
  <link id="theme-style" rel="stylesheet" href="<?= base_url('assets/css/portal.css'); ?>">

</head>

<body class="app app-login p-0">
  <div class="row g-0 app-auth-wrapper">
    <div class="col-12 auth-main-col text-center p-5">
      <div class="d-flex flex-column align-content-end">
        <div class="app-auth-body mx-auto">
          <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="<?= base_url('assets/images/logo/logo-2.jpg'); ?>" alt="logo"></a></div>
          <h2 class="auth-heading text-center">Log in to MentalCare</h2>
          <?php
          if (session()->getFlashdata('message')) :
          ?>
            <div class="alert alert-danger" role="alert">
              <?= session()->getFlashdata('message'); ?>
            </div>
          <?php
          endif;
          ?>
          <div class="auth-form-container text-start mt-5">
            <form class="auth-form login-form" method="post" action="/Login">
              <?= csrf_field(); ?>
              <div class="email mb-3">
                <label class="sr-only" for="user_email">Email</label>
                <input id="user_email" name="user_email" type="email" class="form-control signin-email <?= $validation->hasError('user_email') ?? 'is_invalid'; ?>" placeholder="Email address" required="required">
                <div class="invalid-feedback">
                  <?= $validation->getError('user_email'); ?>
                </div>
              </div><!--//form-group-->
              <div class="password mb-3">
                <label class="sr-only" for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control signin-password  <?= $validation->hasError('password') ?? 'is_invalid'; ?>" placeholder="Password" required="required">
                <div class="invalid-feedback">
                  <?= $validation->getError('password'); ?>
                </div>
              </div><!--//form-group-->
              <div class="text-center">
                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto mb-3">Log In</button>
                <a href="/" class="btn btn-secondary w-100 theme-btn mx-auto">Back</a>
              </div>
            </form>

            <div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link" href="/Registrasi">here</a>.</div>
          </div><!--//auth-form-container-->

        </div><!--//auth-body-->

        <footer class="app-auth-footer">
          <div class="container text-center py-3">
            <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>

          </div>
        </footer><!--//app-auth-footer-->
      </div><!--//flex-column-->
    </div><!--//auth-main-col-->
  </div><!--//row-->


</body>

</html>