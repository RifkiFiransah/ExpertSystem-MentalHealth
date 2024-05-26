<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="app-card app-card-chart h-100 shadow-sm">
    <div class="app-card-header p-3">
      <div class="row justify-content-between align-items-center">
        <div class="col-auto">
          <h4 class="app-card-title fs-3 text-uppercase fw-bold">Data Edit Penyakit</h4>
        </div><!--//col-->
      </div><!--//row-->
    </div><!--//app-card-header-->
    <div class="app-card-body p-3 p-lg-4">
      <form action="/Penyakit/<?= $penyakit['id']; ?>/edit" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $penyakit['id']; ?>">
        <div class="mb-3">
          <label for="nama_penyakit" class="form-label">Nama Penyakit</label>
          <input type="text" class="form-control <?= $validation->hasError('nama_penyakit') ?? 'is-invalid'; ?>" required autocomplete="FALSE" name="nama_penyakit" id="nama_penyakit" value="<?= old('nama_penyakit') ?? $penyakit['nama_penyakit']; ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('nama_penyakit'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="informasi" class="form-label">Informasi Penyakit</label>
          <textarea style="height: 100px" rows="30" class="form-control <?= $validation->hasError('informasi') ?? 'is-invalid'; ?>" required autocomplete="FALSE" name="informasi" id="informasi"><?= old('informasi') ?? $penyakit['informasi'];; ?></textarea>
          <div class="invalid-feedback">
            <?= $validation->getError('informasi'); ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="solusi" class="form-label">Solusi Penyakit</label>
          <textarea style="height: 100px" rows="10" class="form-control <?= $validation->hasError('solusi') ?? 'is-invalid'; ?>" required autocomplete="FALSE" name="solusi" id="solusi"><?= old('solusi') ?? $penyakit['solusi'];; ?></textarea>
          <div class="invalid-feedback">
            <?= $validation->getError('solusi'); ?>
          </div>
        </div>
        <div class="my-3">
          <a href="/Penyakit" class="text-white btn btn-secondary">Back</a>
          <button type="submit" class="text-white btn btn-info">Update Data</button>
        </div>
      </form>
    </div><!--//app-card-body-->
  </div><!--//app-card-->
</div>
<?= $this->endsection(); ?>