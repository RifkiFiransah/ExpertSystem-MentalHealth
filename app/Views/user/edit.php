<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="app-card app-card-chart h-100 shadow-sm">
    <div class="app-card-header p-3">
      <div class="row justify-content-between align-items-center">
        <div class="col-auto">
          <h4 class="app-card-title fs-3 text-uppercase fw-bold">Data Edit User</h4>
        </div><!--//col-->
      </div><!--//row-->
    </div><!--//app-card-header-->
    <div class="app-card-body p-3 p-lg-4">
      <form action="/User/<?= $user['id']; ?>/edit" method="post">
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
        <div class="my-3">
          <a href="/User" class="text-white btn btn-secondary">Back</a>
          <button type="submit" class="text-white btn btn-info">Update Data</button>
        </div>
      </form>
    </div><!--//app-card-body-->
  </div><!--//app-card-->
</div>
<?= $this->endsection(); ?>