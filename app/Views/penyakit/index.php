<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="admin-page-head">
    <div>
      <h2 class="app-page-title"><?= esc($title); ?></h2>
      <p class="admin-page-desc">Kelola daftar penyakit beserta informasi dan solusinya. Data ini dipakai saat sistem mencocokkan gejala.</p>
    </div>
    <div class="admin-page-actions">
      <button type="button" class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah penyakit</button>
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
      <h3 class="admin-card-title">Daftar penyakit</h3>
      <span class="admin-card-meta"><?= count($penyakits); ?> data</span>
    </div>
    <div class="app-card-body p-0">
      <p id="penyakit-loading" class="admin-status px-3 pt-3" role="status">Memuat data penyakit...</p>
      <div class="table-responsive">
        <table class="table admin-table">
          <thead>
            <tr>
              <th scope="col" class="cell-no">No</th>
              <th scope="col">Nama penyakit</th>
              <th scope="col">Informasi</th>
              <th scope="col">Solusi</th>
              <th scope="col" class="cell-actions">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($penyakits)) : ?>
              <?php $i = 1; ?>
              <?php foreach ($penyakits as $penyakit) : ?>
                <tr>
                  <td class="cell-no"><?= $i++; ?></td>
                  <td><?= esc($penyakit['nama_penyakit']); ?></td>
                  <td class="cell-muted">
                    <span class="cell-clamp"><?= esc(strip_tags((string) $penyakit['informasi'])); ?></span>
                  </td>
                  <td class="cell-muted">
                    <span class="cell-clamp"><?= esc(strip_tags((string) $penyakit['solusi'])); ?></span>
                  </td>
                  <td class="cell-actions">
                    <div class="admin-actions">
                      <a class="btn admin-btn-accent" href="/Penyakit/<?= $penyakit['id']; ?>" aria-label="Lihat detail penyakit <?= esc($penyakit['nama_penyakit']); ?>">Lihat</a>
                      <a class="btn admin-btn-outline" href="/Penyakit/<?= $penyakit['id']; ?>/edit" aria-label="Ubah penyakit <?= esc($penyakit['nama_penyakit']); ?>">Ubah</a>
                      <form action="/Penyakit/<?= $penyakit['id']; ?>/delete" method="post" onsubmit="return confirm('Hapus penyakit ini?');">
                        <?= csrf_field(); ?>
                        <button type="submit" class="btn admin-btn-danger" aria-label="Hapus penyakit <?= esc($penyakit['nama_penyakit']); ?>">Hapus</button>
                      </form>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td class="admin-empty" colspan="5">Belum ada data penyakit.</td>
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
        <h2 class="modal-title fs-5" id="staticBackdropLabel">Tambah data penyakit</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <form action="/Penyakit" method="post">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama_penyakit" class="form-label">Nama penyakit</label>
            <input type="text" class="form-control <?= $validation->hasError('nama_penyakit') ? 'is-invalid' : ''; ?>" required autocomplete="off" name="nama_penyakit" id="nama_penyakit" value="<?= old('nama_penyakit'); ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('nama_penyakit'); ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="informasi" class="form-label">Informasi penyakit</label>
            <textarea rows="4" class="form-control <?= $validation->hasError('informasi') ? 'is-invalid' : ''; ?>" required autocomplete="off" name="informasi" id="informasi"><?= old('informasi'); ?></textarea>
            <div class="invalid-feedback">
              <?= $validation->getError('informasi'); ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="solusi" class="form-label">Solusi penyakit</label>
            <textarea rows="4" class="form-control <?= $validation->hasError('solusi') ? 'is-invalid' : ''; ?>" required autocomplete="off" name="solusi" id="solusi"><?= old('solusi'); ?></textarea>
            <div class="invalid-feedback">
              <?= $validation->getError('solusi'); ?>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn app-btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn app-btn-primary">Simpan penyakit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  const penyakitLoading = document.getElementById('penyakit-loading');
  if (penyakitLoading) {
    document.addEventListener('DOMContentLoaded', () => {
      penyakitLoading.hidden = true;
    });
  }
</script>
<?= $this->endSection(); ?>
