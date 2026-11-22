<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="admin-page-head">
    <div>
      <h2 class="app-page-title">Ubah gejala</h2>
      <p class="admin-page-desc">Perbarui kode atau nama gejala. Kode gejala dipakai sebagai nama kolom pada matriks aturan.</p>
    </div>
  </div>

  <div class="app-card admin-card">
    <div class="app-card-header admin-card-header">
      <h3 class="admin-card-title"><?= esc($gejala['kode_gejala']); ?></h3>
    </div>
    <div class="app-card-body p-3 p-lg-4">
      <form action="/Gejala/<?= $gejala['id']; ?>/edit" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $gejala['id']; ?>">
        <div class="mb-3">
          <label for="kode_gejala" class="form-label">Kode gejala</label>
          <input type="text" class="form-control <?= $validation->hasError('kode_gejala') ? 'is-invalid' : ''; ?>" required autocomplete="off" name="kode_gejala" id="kode_gejala" value="<?= esc(old('kode_gejala') ?? $gejala['kode_gejala']); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('kode_gejala'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="nama_gejala" class="form-label">Nama gejala</label>
          <input type="text" class="form-control <?= $validation->hasError('nama_gejala') ? 'is-invalid' : ''; ?>" required autocomplete="off" name="nama_gejala" id="nama_gejala" value="<?= esc(old('nama_gejala') ?? $gejala['nama_gejala']); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('nama_gejala'); ?>
          </div>
        </div>
        <div class="admin-form-actions">
          <button type="submit" class="btn app-btn-primary">Simpan perubahan</button>
          <a href="/Gejala" class="btn app-btn-secondary">Kembali ke data gejala</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
