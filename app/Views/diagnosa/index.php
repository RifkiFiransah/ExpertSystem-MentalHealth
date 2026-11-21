<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="app-card app-card-chart h-100">
    <div class="app-card-header p-3">
      <div class="row justify-content-between align-items-center">
        <div class="col-auto">
          <h4 class="app-card-title fs-3 fw-bold">Data Hasil Diagnosa</h4>
        </div><!--//col-->
        <div class="col-auto">
          <div class="card-header-action">
          </div><!--//card-header-actions-->
        </div><!--//col-->
      </div><!--//row-->
    </div><!--//app-card-header-->
    <div class="app-card-body p-3 p-lg-4">
      <?php
      if (session()->getFlashdata('message')) :
      ?>
        <div class="alert alert-primary" role="alert">
          <?= session()->getFlashdata('message'); ?>
        </div>
      <?php
      endif;
      ?>
      <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger" role="alert">
          <?= session()->getFlashdata('error'); ?>
        </div>
      <?php endif; ?>
      <p id="diagnosa-loading" class="text-muted small" role="status">Memuat data diagnosa...</p>
      <div class="table-responsive">
        <table class="table table-striped mb-0 text-left">
          <thead>
            <tr>
              <th class="cell">No</th>
              <th class="cell">Nama Lengkap</th>
              <th class="cell">Penyakit</th>
              <th class="cell">Persentase</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($diagnosis)) : ?>
              <?php $i = 1; ?>
              <?php foreach ($diagnosis as $diagnosa) : ?>
                <tr>
                  <td class="cell"><?= $i++; ?></td>
                  <td class="cell"><span class="truncate"><?= $diagnosa['nama_lengkap']; ?></span></td>
                  <td class="cell"><?= $diagnosa['nama_penyakit']; ?></td>
                  <td class="cell"><?= $diagnosa['persentase']; ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td class="cell text-center" colspan="4">Belum ada data hasil diagnosa.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div><!--//table-responsive-->
    </div><!--//app-card-body-->
  </div><!--//app-card-->
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