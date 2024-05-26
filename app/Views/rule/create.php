<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="app-card app-card-chart h-100 shadow-sm">
    <div class="app-card-header p-3">
      <div class="row justify-content-between align-items-center">
        <div class="col-auto">
          <h4 class="app-card-title fs-3 text-uppercase fw-bold">Tambah Rule <?= $kode_gejala; ?></h4>
        </div><!--//col-->
      </div><!--//row-->
    </div><!--//app-card-header-->
    <div class="app-card-body p-3 p-lg-4">
      <form action="/Rule/update" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="kode_gejala" value="<?= $kode_gejala; ?>">
        <input type="hidden" name="jml_penyakit" value="<?= count($penyakits); ?>">
        <?php
        foreach ($penyakits as $penyakit) :
        ?>
          <div class="mb-3">
            <label for="kode_gejala" class="form-label"><?= $penyakit->nama_penyakit; ?></label>
            <select name="<?= $penyakit->id; ?>" class="form-select">
              <option selected disabled>-------- Silahkan Pilih Opsi --------</option>
              <option value="1">IYA</option>
              <option value="0">Tidak</option>
            </select>
            <div class="invalid-feedback">
              <?= $validation->getError($penyakit->id); ?>
            </div>
          </div>
        <?php
        endforeach;
        ?>
        <div class="my-3">
          <a href="/Gejala" class="text-white btn btn-secondary">Back</a>
          <button type="submit" class="text-white btn btn-info">Update Data</button>
        </div>
      </form>
    </div><!--//app-card-body-->
  </div><!- </div>
    <?= $this->endsection(); ?>