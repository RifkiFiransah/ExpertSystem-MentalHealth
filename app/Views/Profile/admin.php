<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="admin-page-head">
    <div>
      <h2 class="app-page-title">Profil admin</h2>
      <p class="admin-page-desc">Perbarui username dan email akun admin yang sedang masuk.</p>
    </div>
  </div>

  <?php if (session()->getFlashdata('message')) : ?>
    <div class="admin-flash admin-flash-success" role="status"><?= esc(session()->getFlashdata('message')); ?></div>
  <?php endif; ?>

  <div class="app-card admin-card">
    <div class="app-card-header admin-card-header">
      <h3 class="admin-card-title"><?= esc($admin['username']); ?></h3>
    </div>
    <div class="app-card-body p-3 p-lg-4">
      <form action="/Profile/<?= $admin['id']; ?>/admin" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $admin['id']; ?>">
        <input type="hidden" name="password" value="<?= esc($admin['password']); ?>">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : ''; ?>" required autocomplete="off" name="username" id="username" value="<?= esc(old('username') ?? $admin['username']); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('username'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : ''; ?>" required autocomplete="off" name="email" id="email" value="<?= esc(old('email') ?? $admin['email']); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('email'); ?>
          </div>
        </div>
        <div class="admin-form-actions">
          <button type="submit" class="btn app-btn-primary">Simpan profil</button>
          <a href="/Dashboard" class="btn app-btn-secondary">Kembali ke dashboard</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
