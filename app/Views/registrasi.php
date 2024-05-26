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
          <h2 class="auth-heading text-center mb-4">Registrasi To MentalCare</h2>

          <div class="auth-form-container text-start mx-auto">
            <form class="auth-form auth-signup-form" method="POST" action="/Registrasi">
              <?= csrf_field(); ?>
              <div class="mb-3">
                <label class="sr-only" for="nama_lengkap">Nama Lengkap</label>
                <input id="nama_lengkap" name="nama_lengkap" type="text" class="form-control <?= $validation->hasError('nama_lengkap') ?? 'is_invalid'; ?> signup-name" placeholder="Full name" required="required">
                <div class="invalid-feedback">
                  <?= $validation->getError('nama_lengkap'); ?>
                </div>
              </div>
              <div class="mb-3">
                <label class="sr-only" for="user_email">Email Anda</label>
                <input id="user_email" name="user_email" type="email" class="form-control <?= $validation->hasError('user_email') ?? 'is_invalid'; ?> signup-email" placeholder="Email" required="required">
                <div class="invalid-feedback">
                  <?= $validation->getError('user_email'); ?>
                </div>
              </div>
              <div class="password mb-3">
                <label class="sr-only" for="password">Password</label>
                <input id="password" name="password" type="password" class="form-control <?= $validation->hasError('password') ?? 'is_invalid'; ?> signup-password" placeholder="Create a password" required="required">
                <div class="invalid-feedback">
                  <?= $validation->getError('password'); ?>
                </div>
              </div>
              <div class="mb-3">
                <label class="sr-only" for="no_telp">Telp Anda</label>
                <input id="no_telp" name="no_telp" type="number" class="form-control <?= $validation->hasError('no_telp') ?? 'is_invalid'; ?> signup-email" placeholder="No Telp" required="required">
                <div class="invalid-feedback">
                  <?= $validation->getError('no_telp'); ?>
                </div>
              </div>
              <div class="mb-3">
                <label class="sr-only" for="alamat">Alamat Anda</label>
                <textarea id="alamat" name="alamat" style="height: 100px;" class="form-control <?= $validation->hasError('alamat') ?? 'is_invalid'; ?> signup-email" placeholder="Alamat Anda" required="required"></textarea>
                <div class="invalid-feedback">
                  <?= $validation->getError('alamat'); ?>
                </div>
              </div>
              <div class="extra mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="RememberPassword">
                  <label class="form-check-label" for="RememberPassword">
                    I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and <a href="#" class="app-link">Privacy Policy</a>.
                  </label>
                </div>
              </div><!--//extra-->

              <div class="text-center">
                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign Up</button>
              </div>
            </form><!--//auth-form-->

            <div class="auth-option text-center pt-5">Already have an account? <a class="text-link" href="Login">Log in</a></div>
          </div><!--//auth-form-container-->



        </div><!--//auth-body-->

        <footer class="app-auth-footer">
          <div class="container text-center py-3">
            <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
            <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>

          </div>
        </footer><!--//app-auth-footer-->
      </div><!--//flex-column-->
    </div>
  </div><!--//row-->


</body>

</html>