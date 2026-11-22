<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="admin-page-head">
    <div>
      <h2 class="app-page-title"><?= esc($title); ?></h2>
      <p class="admin-page-desc">Daftar pengguna yang terdaftar. Perubahan data pengguna memengaruhi hasil diagnosa yang tersimpan.</p>
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
      <h3 class="admin-card-title">Daftar pengguna</h3>
      <span class="admin-card-meta"><?= count($users); ?> data</span>
    </div>
    <div class="app-card-body p-0">
      <p id="user-loading" class="admin-status px-3 pt-3" role="status">Memuat data pengguna...</p>
      <div class="table-responsive">
        <table class="table admin-table">
          <thead>
            <tr>
              <th scope="col" class="cell-no">No</th>
              <th scope="col">Nama lengkap</th>
              <th scope="col">Email</th>
              <th scope="col">No telp</th>
              <th scope="col">Alamat</th>
              <th scope="col" class="cell-actions">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($users)) : ?>
              <?php $i = 1; ?>
              <?php foreach ($users as $user) : ?>
                <tr>
                  <td class="cell-no"><?= $i++; ?></td>
                  <td><?= esc($user['nama_lengkap']); ?></td>
                  <td><?= esc($user['user_email']); ?></td>
                  <td class="cell-muted"><?= esc($user['no_telp']); ?></td>
                  <td class="cell-muted"><span class="cell-clamp"><?= esc($user['alamat']); ?></span></td>
                  <td class="cell-actions">
                    <div class="admin-actions">
                      <a class="btn admin-btn-outline" href="/User/<?= $user['id']; ?>/edit" aria-label="Ubah pengguna <?= esc($user['nama_lengkap']); ?>">Ubah</a>
                      <form action="/User/<?= $user['id']; ?>/delete" method="post" onsubmit="return confirm('Hapus pengguna ini?');">
                        <?= csrf_field(); ?>
                        <button type="submit" class="btn admin-btn-danger" aria-label="Hapus pengguna <?= esc($user['nama_lengkap']); ?>">Hapus</button>
                      </form>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td class="admin-empty" colspan="6">Belum ada data pengguna.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  const userLoading = document.getElementById('user-loading');
  if (userLoading) {
    document.addEventListener('DOMContentLoaded', () => {
      userLoading.hidden = true;
    });
  }
</script>
<?= $this->endSection(); ?>
