<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="app-card app-card-account d-flex flex-column align-items-start">
    <div class="app-card-header p-3 border-bottom-0">
      <div class="row align-items-center gx-3">
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
          <a href="/Dashboard" class="text-white btn btn-secondary">Kembali ke dashboard</a>
          <button type="submit" class="text-white btn btn-info">Update Profile</button>
        </div>
      </form>
    </div><!--//app-card-body-->
  </div><!--//app-card-->
</div>
<?= $this->endsection(); ?>