<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-xl">
  <div class="app-card">
    <div class="app-card-header p-3">
      <div class="row align-items-center">
        <div class="col-auto">
          <h2 class="app-card-title fs-3 fw-bold">Ringkasan</h2>
        </div>
      </div>
    </div>
    <div class="app-card-body p-3 p-lg-4">
      <p>Halaman ini tidak digunakan. Gunakan Dashboard untuk melihat data sistem.</p>
      <a class="btn app-btn-primary" href="/Dashboard">Buka dashboard</a>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
