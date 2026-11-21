<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="app-card app-card-chart h-100">
    <div class="app-card-header p-3">
      <div class="row justify-content-between align-items-center">
        <div class="col-auto">
          <h4 class="app-card-title fs-3 fw-bold">Detail Penyakit</h4>
        </div>
      </div>
    </div>
    <div class="app-card-body p-3 p-lg-4">
      <h5 class="mb-3"><?= $penyakit['nama_penyakit']; ?></h5>
      <p class="mb-2"><strong>Informasi:</strong> <?= $penyakit['informasi']; ?></p>
      <p class="mb-3"><strong>Solusi:</strong> <?= $penyakit['solusi']; ?></p>
      <div class="my-3">
        <a href="/Penyakit" class="text-white btn btn-secondary">Kembali</a>
        <a href="/Penyakit/<?= $penyakit['id']; ?>/edit" class="text-white btn btn-info">Ubah penyakit</a>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
