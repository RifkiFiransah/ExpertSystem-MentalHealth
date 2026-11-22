<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="admin-page-head">
    <div>
      <h2 class="app-page-title">Data hasil diagnosa</h2>
      <p class="admin-page-desc">Riwayat hasil skrining pengguna. Persentase menunjukkan kecocokan gejala dengan aturan yang tersimpan.</p>
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
      <h3 class="admin-card-title">Daftar hasil diagnosa</h3>
      <span class="admin-card-meta"><?= count($diagnosis); ?> data</span>
    </div>
    <div class="app-card-body p-0">
      <p id="diagnosa-loading" class="admin-status px-3 pt-3" role="status">Memuat data diagnosa...</p>
      <div class="table-responsive">
        <table class="table admin-table">
          <thead>
            <tr>
              <th scope="col" class="cell-no">No</th>
              <th scope="col">Nama lengkap</th>
              <th scope="col">Penyakit</th>
              <th scope="col">Persentase</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($diagnosis)) : ?>
              <?php $i = 1; ?>
              <?php foreach ($diagnosis as $diagnosa) : ?>
                <tr>
                  <td class="cell-no"><?= $i++; ?></td>
                  <td><?= esc($diagnosa['nama_lengkap']); ?></td>
                  <td><?= esc($diagnosa['nama_penyakit']); ?></td>
                  <td class="cell-muted"><?= esc($diagnosa['persentase']); ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td class="admin-empty" colspan="4">Belum ada data hasil diagnosa.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  const diagnosaLoading = document.getElementById('diagnosa-loading');
  if (diagnosaLoading) {
    document.addEventListener('DOMContentLoaded', () => {
      diagnosaLoading.hidden = true;
    });
  }
</script>
<?= $this->endSection(); ?>
