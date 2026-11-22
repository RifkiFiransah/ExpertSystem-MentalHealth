<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="admin-page-head">
    <div>
      <h2 class="app-page-title">Ubah pengguna</h2>
      <p class="admin-page-desc">Perbarui data pengguna. Kata sandi tidak diubah dari halaman ini.</p>
    </div>
  </div>

  <div class="app-card admin-card">
    <div class="app-card-header admin-card-header">
      <h3 class="admin-card-title"><?= esc($user['nama_lengkap']); ?></h3>
    </div>
    <div class="app-card-body p-3 p-lg-4">
      <form action="/User/<?= $user['id']; ?>/edit" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $user['id']; ?>">
        <input type="hidden" name="password" value="<?= esc($user['password']); ?>">
        <div class="mb-3">
          <label for="nama_lengkap" class="form-label">Nama lengkap</label>
          <input type="text" class="form-control <?= $validation->hasError('nama_lengkap') ? 'is-invalid' : ''; ?>" required autocomplete="off" name="nama_lengkap" id="nama_lengkap" value="<?= esc(old('nama_lengkap') ?? $user['nama_lengkap']); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('nama_lengkap'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="user_email" class="form-label">Email</label>
          <input type="email" class="form-control <?= $validation->hasError('user_email') ? 'is-invalid' : ''; ?>" required autocomplete="off" name="user_email" id="user_email" value="<?= esc(old('user_email') ?? $user['user_email']); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('user_email'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="no_telp" class="form-label">No telp</label>
          <input type="tel" class="form-control <?= $validation->hasError('no_telp') ? 'is-invalid' : ''; ?>" required autocomplete="off" name="no_telp" id="no_telp" value="<?= esc(old('no_telp') ?? $user['no_telp']); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('no_telp'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea rows="4" class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : ''; ?>" required autocomplete="off" name="alamat" id="alamat"><?= esc(old('alamat') ?? $user['alamat']); ?></textarea>
          <div class="invalid-feedback">
            <?= $validation->getError('alamat'); ?>
          </div>
        </div>
        <div class="admin-form-actions">
          <button type="submit" class="btn app-btn-primary">Simpan perubahan</button>
          <a href="/User" class="btn app-btn-secondary">Kembali ke data pengguna</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
