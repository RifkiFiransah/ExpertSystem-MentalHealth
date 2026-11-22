<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="admin-page-head">
    <div>
      <h2 class="app-page-title">Tambah aturan gejala <?= esc($kode_gejala); ?></h2>
      <p class="admin-page-desc">Tentukan apakah gejala ini menjadi indikator untuk setiap penyakit.</p>
    </div>
  </div>

  <div class="app-card admin-card">
    <div class="app-card-header admin-card-header">
      <h3 class="admin-card-title">Nilai gejala per penyakit</h3>
    </div>
    <div class="app-card-body p-3 p-lg-4">
      <form action="/Rule/update" method="post">
        <?= csrf_field(); ?>
        <input type="hidden" name="kode_gejala" value="<?= esc($kode_gejala); ?>">
        <input type="hidden" name="jml_penyakit" value="<?= count($penyakits); ?>">
        <div class="admin-form-grid">
          <?php foreach ($penyakits as $penyakit) : ?>
            <div>
              <label for="penyakit_<?= $penyakit->id; ?>" class="form-label"><?= esc($penyakit->nama_penyakit); ?></label>
              <select id="penyakit_<?= $penyakit->id; ?>" name="<?= $penyakit->id; ?>" class="form-select" required>
                <option value="" selected disabled>Pilih Iya atau Tidak</option>
                <option value="1">Iya</option>
                <option value="0">Tidak</option>
              </select>
              <div class="invalid-feedback">
                <?= $validation->getError($penyakit->id); ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="admin-form-actions">
          <button type="submit" class="btn app-btn-primary">Simpan aturan</button>
          <a href="/Gejala" class="btn app-btn-secondary">Kembali ke data gejala</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
