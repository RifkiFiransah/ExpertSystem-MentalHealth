<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
    <div class="app-card-header p-3 border-bottom-0">
      <div class="row align-items-center gx-3">
        <div class="col-auto">
          <div class="app-icon-holder">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
            </svg>
          </div><!--//icon-holder-->

        </div><!--//col-->
        <div class="col-auto">
          <h4 class="app-card-title">Profile Admin</h4>
        </div><!--//col-->
      </div><!--//row-->
    </div><!--//app-card-header-->
    <div class="app-card-body px-4 w-100">
      <?php
      if (session()->getFlashdata('message')) :
      ?>
        <div class="alert alert-primary" role="alert">
          <?= session()->getFlashdata('message'); ?>
        </div>
      <?php
      endif;
      ?>
      <form action="/Profile/<?= $admin['id']; ?>/admin" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $admin['id']; ?>">
        <input type="hidden" name="password" value="<?= $admin['password']; ?>">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control <?= $validation->hasError('username') ?? 'is-invalid'; ?>" required autocomplete="FALSE" name="username" id="username" value="<?= old('username') ?? $admin['username']; ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('username'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control <?= $validation->hasError('email') ?? 'is-invalid'; ?>" required autocomplete="FALSE" name="email" id="email" value="<?= old('email') ?? $admin['email']; ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('email'); ?>
          </div>
        </div>
        <div class="my-4">
          <a href="/Dashboard" class="text-white btn btn-secondary">Back</a>
          <button type="submit" class="text-white btn btn-info">Update Profile</button>
        </div>
      </form>
    </div><!--//app-card-body-->
  </div><!--//app-card-->
</div>
<?= $this->endsection(); ?>