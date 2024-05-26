<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="app-card app-card-chart h-100 shadow-sm">
    <div class="app-card-header p-3">
      <div class="row justify-content-between align-items-center">
        <div class="col-auto">
          <h4 class="app-card-title fs-3 text-uppercase fw-bold">Data Penyakit</h4>
        </div><!--//col-->
        <div class="col-auto">
          <div class="card-header-action">
            <button type="button" class="text-white btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah</button>
          </div><!--//card-header-actions-->
        </div><!--//col-->
      </div><!--//row-->
    </div><!--//app-card-header-->
    <div class="app-card-body p-3 p-lg-4">
      <!-- <div class="app-card app-card-stat shadow-sm h-100">
        <div class="app-card-body p-3 p-lg-4"> -->
      <h4 class="stats-type mb-1">Invoices</h4>
      <div class="stats-figure">6</div>
      <div class="stats-meta">New</div>
      <!-- </div>//app-card-body -->
      <!-- <a class="app-card-link-mask" href="#"></a> -->
      <!-- </div> -->
      <div class="my-3">
        <a href="<?= base_url('/Penyakit'); ?>" class="text-white btn btn-secondary">Back</a>
        <a href="/Penyakit/<?= $penyakit['id']; ?>/edit" class="text-white btn btn-info">Edit</a>
      </div>
    </div><!--//app-card-body-->
  </div><!--//app-card-->
</div>
<?= $this->endsection(); ?>