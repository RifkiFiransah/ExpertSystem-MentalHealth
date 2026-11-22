<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="admin-page-head">
    <div>
      <h2 class="app-page-title">Ubah penyakit</h2>
      <p class="admin-page-desc">Perbarui informasi dan solusi penyakit. Perubahan dipakai pada proses diagnosa berikutnya.</p>
    </div>
  </div>

  <div class="app-card admin-card">
    <div class="app-card-header admin-card-header">
      <h3 class="admin-card-title"><?= esc($penyakit['nama_penyakit']); ?></h3>
    </div>
    <div class="app-card-body p-3 p-lg-4">
      <form action="/Penyakit/<?= $penyakit['id']; ?>/edit" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $penyakit['id']; ?>">
        <div class="mb-3">
          <label for="nama_penyakit" class="form-label">Nama penyakit</label>
          <input type="text" class="form-control <?= $validation->hasError('nama_penyakit') ? 'is-invalid' : ''; ?>" required autocomplete="off" name="nama_penyakit" id="nama_penyakit" value="<?= esc(old('nama_penyakit') ?? $penyakit['nama_penyakit']); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('nama_penyakit'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="informasi" class="form-label">Informasi penyakit</label>
          <textarea rows="6" class="form-control <?= $validation->hasError('informasi') ? 'is-invalid' : ''; ?>" required autocomplete="off" name="informasi" id="informasi"><?= esc(old('informasi') ?? $penyakit['informasi']); ?></textarea>
          <div class="invalid-feedback">
            <?= $validation->getError('informasi'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="solusi" class="form-label">Solusi penyakit</label>
          <textarea rows="6" class="form-control <?= $validation->hasError('solusi') ? 'is-invalid' : ''; ?>" required autocomplete="off" name="solusi" id="solusi"><?= esc(old('solusi') ?? $penyakit['solusi']); ?></textarea>
          <div class="invalid-feedback">
            <?= $validation->getError('solusi'); ?>
          </div>
        </div>
        <div class="admin-form-actions">
          <button type="submit" class="btn app-btn-primary">Simpan perubahan</button>
          <a href="/Penyakit" class="btn app-btn-secondary">Kembali ke data penyakit</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
