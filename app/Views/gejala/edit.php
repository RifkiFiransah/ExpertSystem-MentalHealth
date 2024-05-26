<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="app-card app-card-chart h-100 shadow-sm">
    <div class="app-card-header p-3">
      <div class="row justify-content-between align-items-center">
        <div class="col-auto">
          <h4 class="app-card-title fs-3 text-uppercase fw-bold">Data Edit Gejala</h4>
        </div><!--//col-->
      </div><!--//row-->
    </div><!--//app-card-header-->
    <div class="app-card-body p-3 p-lg-4">
      <form action="/Gejala/<?= $gejala['id']; ?>/edit" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $gejala['id']; ?>">
        <div class="mb-3">
          <label for="kode_gejala" class="form-label">Kode Gejala</label>
          <input type="text" class="form-control <?= $validation->hasError('kode_gejala') ?? 'is-invalid'; ?>" required autocomplete="FALSE" name="kode_gejala" id="kode_gejala" value="<?= old('kode_gejala') ?? $gejala['kode_gejala']; ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('kode_gejala'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="nama_gejala" class="form-label">Nama Gejala</label>
          <textarea style="height: 100px" rows="30" class="form-control <?= $validation->hasError('nama_gejala') ?? 'is-invalid'; ?>" required autocomplete="FALSE" name="nama_gejala" id="nama_gejala"><?= old('nama_gejala') ?? $gejala['nama_gejala'];; ?></textarea>
          <div class="invalid-feedback">
            <?= $validation->getError('nama_gejala'); ?>
          </div>
        </div>
        <div class="my-3">
          <a href="/Gejala" class="text-white btn btn-secondary">Back</a>
          <button type="submit" class="text-white btn btn-info">Update Data</button>
        </div>
      </form>
    </div><!--//app-card-body-->
  </div><!--//app-card-->
</div>
<?= $this->endsection(); ?>