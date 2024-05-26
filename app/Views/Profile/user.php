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
          <h4 class="app-card-title">Profile</h4>
        </div><!--//col-->
      </div><!--//row-->
    </div><!--//app-card-header-->
    <div class="app-card-body px-4 w-100">
      <form action="/Profile/<?= $user['id']; ?>/user" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $user['id']; ?>">
        <input type="hidden" name="password" value="<?= $user['password']; ?>">
        <div class="mb-3">
          <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control <?= $validation->hasError('nama_lengkap') ?? 'is-invalid'; ?>" required autocomplete="FALSE" name="nama_lengkap" id="nama_lengkap" value="<?= old('nama_lengkap') ?? $user['nama_lengkap']; ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('nama_lengkap'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="user_email" class="form-label">Email</label>
          <input type="email" class="form-control <?= $validation->hasError('user_email') ?? 'is-invalid'; ?>" required autocomplete="FALSE" name="user_email" id="user_email" value="<?= old('user_email') ?? $user['user_email']; ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('user_email'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="no_telp" class="form-label">No Telp</label>
          <input type="number" class="form-control <?= $validation->hasError('no_telp') ?? 'is-invalid'; ?>" required autocomplete="FALSE" name="no_telp" id="no_telp" value="<?= old('no_telp') ?? $user['no_telp']; ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('no_telp'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea style="height: 100px" rows="30" class="form-control <?= $validation->hasError('alamat') ?? 'is-invalid'; ?>" required autocomplete="FALSE" name="alamat" id="alamat"><?= old('alamat') ?? $user['alamat'];; ?></textarea>
          <div class="invalid-feedback">
            <?= $validation->getError('alamat'); ?>
          </div>
        </div>
        <div class="my-4">
          <a href="/Dashboard" class="text-white btn btn-secondary">Back</a>
          <button type="submit" class="text-white btn btn-info">Update Data</button>
        </div>
      </form>
    </div><!--//app-card-body-->

  </div><!--//app-card-->
</div>
<?= $this->endsection(); ?>