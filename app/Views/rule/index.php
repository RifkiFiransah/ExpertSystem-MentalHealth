<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<?php
$gejalaMap = [];
foreach ($gejalas as $gejala) {
  $gejalaMap[$gejala['kode_gejala']] = $gejala['nama_gejala'];
}
$kodeList = array_map(static fn ($column) => $column['Field'], $columns);
?>
<div class="container-xl">
  <div class="admin-page-head">
    <div>
      <h2 class="app-page-title"><?= esc($title); ?></h2>
      <p class="admin-page-desc">Setiap baris aturan berisi nilai gejala. Nilai Iya berarti gejala menjadi indikator pada aturan tersebut.</p>
    </div>
    <div class="admin-page-actions">
      <button type="button" class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah aturan</button>
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
      <h3 class="admin-card-title">Matriks aturan diagnosa</h3>
      <span class="admin-card-meta"><?= count($rules); ?> aturan, <?= count($kodeList); ?> gejala</span>
    </div>
    <div class="app-card-body p-0">
      <p id="rule-loading" class="admin-status px-3 pt-3" role="status">Memuat aturan diagnosa...</p>
      <div class="table-responsive">
        <table class="table admin-table">
          <thead>
            <tr>
              <th scope="col">Aturan</th>
              <?php foreach ($kodeList as $kode) : ?>
                <th scope="col" class="admin-th-gejala">
                  <span class="admin-code"><?= esc($kode); ?></span>
                  <span class="admin-th-name"><?= esc($gejalaMap[$kode] ?? 'Gejala tidak ditemukan'); ?></span>
                </th>
              <?php endforeach; ?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($rules) && !empty($kodeList)) : ?>
              <?php foreach ($rules as $ruleIndex => $rule) : ?>
                <tr>
                  <th scope="row" class="cell-rule">Aturan <?= $ruleIndex + 1; ?></th>
                  <?php foreach ($kodeList as $kode) : ?>
                    <?php $nilai = isset($rule[$kode]) ? (int) $rule[$kode] : null; ?>
                    <td>
                      <?php if ($nilai === 1) : ?>
                        <span class="admin-pill admin-pill-on">Iya</span>
                      <?php elseif ($nilai === 0) : ?>
                        <span class="admin-pill admin-pill-off">Tidak</span>
                      <?php else : ?>
                        <span class="admin-pill admin-pill-empty">Belum diatur</span>
                      <?php endif; ?>
                    </td>
                  <?php endforeach; ?>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td class="admin-empty" colspan="<?= count($kodeList) + 1; ?>">Belum ada aturan diagnosa.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="staticBackdropLabel">Tambah aturan diagnosa</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <form action="/Rule/store" method="post">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <p class="admin-card-subtitle mb-3">Pilih Iya atau Tidak untuk setiap gejala pada aturan baru.</p>
          <div class="admin-form-grid">
            <?php foreach ($kodeList as $kode) : ?>
              <div>
                <label for="rule_<?= esc($kode); ?>" class="form-label">
                  <span class="admin-code"><?= esc($kode); ?></span> <?= esc($gejalaMap[$kode] ?? 'Gejala tidak ditemukan'); ?>
                </label>
                <select id="rule_<?= esc($kode); ?>" name="<?= esc($kode); ?>" class="form-select" required>
                  <option value="" selected disabled>Pilih Iya atau Tidak</option>
                  <option value="1">Iya</option>
                  <option value="0">Tidak</option>
                </select>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn app-btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn app-btn-primary">Simpan aturan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  const ruleLoading = document.getElementById('rule-loading');
  if (ruleLoading) {
    document.addEventListener('DOMContentLoaded', () => {
      ruleLoading.hidden = true;
    });
  }
</script>
<?= $this->endSection(); ?>
