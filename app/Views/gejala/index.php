<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<?php
$maxKode = 0;
foreach ($id as $gejalaKode) {
  if (preg_match('/^G(\d+)$/', (string) $gejalaKode['kode_gejala'], $cocok)) {
    $maxKode = max($maxKode, (int) $cocok[1]);
  }
}
$nextKode = 'G' . str_pad((string) ($maxKode + 1), 3, '0', STR_PAD_LEFT);
?>
<div class="container-xl">
  <div class="admin-page-head">
    <div>
      <h2 class="app-page-title"><?= esc($title); ?></h2>
      <p class="admin-page-desc">Kelola gejala yang dipakai sebagai indikator dalam aturan diagnosa.</p>
    </div>
    <div class="admin-page-actions">
      <button type="button" class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah gejala</button>
    </div>
  </div>

  <?php if (session()->getFlashdata('message')) : ?>
    <div class="admin-flash admin-flash-success" role="status"><?= esc(session()->getFlashdata('message')); ?></div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('error')) : ?>
    <div class="admin-flash admin-flash-error" role="alert"><?= esc(session()->getFlashdata('error')); ?></div>
  <?php endif; ?>

  <div class="app-card admin-card">
    <div class="app-card-header admin-card-header">
      <h3 class="admin-card-title">Daftar gejala</h3>
      <span class="admin-card-meta"><?= count($id); ?> data</span>
    </div>
    <div class="app-card-body p-0">
      <p id="gejala-loading" class="admin-status px-3 pt-3" role="status">Memuat data gejala...</p>
      <div class="table-responsive">
        <table class="table admin-table">
          <thead>
            <tr>
              <th scope="col" class="cell-no">No</th>
              <th scope="col">Kode gejala</th>
              <th scope="col">Nama gejala</th>
              <th scope="col" class="cell-actions">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($gejalas)) : ?>
              <?php $i = 1; ?>
              <?php foreach ($gejalas as $gejala) : ?>
                <tr>
                  <td class="cell-no"><?= $i++; ?></td>
                  <td><span class="admin-code"><?= esc($gejala['kode_gejala']); ?></span></td>
                  <td><?= esc($gejala['nama_gejala']); ?></td>
                  <td class="cell-actions">
                    <div class="admin-actions">
                      <a class="btn admin-btn-outline" href="/Gejala/<?= $gejala['id']; ?>/edit" aria-label="Ubah gejala <?= esc($gejala['nama_gejala']); ?>">Ubah</a>
                      <form action="/Gejala/<?= $gejala['id']; ?>/delete" method="post" onsubmit="return confirm('Hapus gejala ini?');">
                        <?= csrf_field(); ?>
                        <button type="submit" class="btn admin-btn-danger" aria-label="Hapus gejala <?= esc($gejala['nama_gejala']); ?>">Hapus</button>
                      </form>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td class="admin-empty" colspan="4">Belum ada data gejala.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <?php if ($pager->getPageCount('gejala') > 1) : ?>
        <div class="admin-pagination">
          <?= $pager->links('gejala', 'bootstrap_pagination'); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="staticBackdropLabel">Tambah data gejala</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <form action="/Gejala" method="post">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="mb-3">
            <label for="kode_gejala" class="form-label">Kode gejala</label>
            <input type="text" class="form-control <?= $validation->hasError('kode_gejala') ? 'is-invalid' : ''; ?>" required name="kode_gejala" id="kode_gejala" value="<?= esc($nextKode); ?>" readonly>
            <div class="invalid-feedback">
              <?= $validation->getError('kode_gejala'); ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="nama_gejala" class="form-label">Nama gejala</label>
            <input type="text" class="form-control <?= $validation->hasError('nama_gejala') ? 'is-invalid' : ''; ?>" required name="nama_gejala" id="nama_gejala" value="<?= old('nama_gejala'); ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('nama_gejala'); ?>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn app-btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn app-btn-primary">Simpan gejala</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  const gejalaLoading = document.getElementById('gejala-loading');
  if (gejalaLoading) {
    document.addEventListener('DOMContentLoaded', () => {
      gejalaLoading.hidden = true;
    });
  }
</script>
<?= $this->endSection(); ?>
