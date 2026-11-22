<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="admin-page-head">
    <div>
      <h2 class="app-page-title">Detail penyakit</h2>
      <p class="admin-page-desc">Informasi ini tampil pada halaman data kondisi dan hasil diagnosa pengguna.</p>
    </div>
    <div class="admin-page-actions">
      <a href="/Penyakit" class="btn app-btn-secondary">Kembali ke data penyakit</a>
      <?php if (!empty($penyakit)) : ?>
        <a href="/Penyakit/<?= $penyakit['id']; ?>/edit" class="btn app-btn-primary">Ubah penyakit</a>
      <?php endif; ?>
    </div>
  </div>

  <div class="app-card admin-card">
    <?php if (empty($penyakit)) : ?>
      <div class="app-card-body p-3 p-lg-4">
        <p class="mb-0 text-secondary">Data penyakit tidak ditemukan.</p>
      </div>
    <?php else : ?>
      <div class="app-card-header admin-card-header">
        <h3 class="admin-card-title"><?= esc($penyakit['nama_penyakit']); ?></h3>
      </div>
      <div class="app-card-body p-3 p-lg-4 admin-detail">
        <h4 class="h6">Informasi</h4>
        <p><?= $penyakit['informasi']; ?></p>
        <h4 class="h6">Solusi</h4>
        <p class="mb-0"><?= $penyakit['solusi']; ?></p>
      </div>
    <?php endif; ?>
  </div>
</div>
<?= $this->endSection(); ?>
