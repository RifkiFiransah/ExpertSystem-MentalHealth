<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="app-card app-card-chart h-100">
    <div class="app-card-header p-3">
      <div class="row justify-content-between align-items-center">
        <div class="col-auto">
          <h4 class="app-card-title fs-3 fw-bold">Data User</h4>
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
      <p id="user-loading" class="text-muted small" role="status">Memuat data pengguna...</p>
      <div class="table-responsive">
        <table class="table table-striped mb-0 text-left">
          <thead>
            <tr>
              <th class="cell">No</th>
              <th class="cell">Nama Lengkap</th>
              <th class="cell">Email</th>
              <th class="cell">No Telp</th>
              <th class="cell">Alamat</th>
              <th class="cell">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($users)) : ?>
              <?php $i = 1; ?>
              <?php foreach ($users as $user) : ?>
                <tr>
                  <td class="cell"><?= $i++; ?></td>
                  <td class="cell"><span class="truncate"><?= $user['nama_lengkap']; ?></span></td>
                  <td class="cell"><?= $user['user_email']; ?></td>
                  <td class="cell"><?= $user['no_telp']; ?></td>
                  <td class="cell"><?= $user['alamat']; ?></td>
                  <td class="cell inline" style="width: 250px;">
                    <a class="text-white btn btn-sm btn-warning" href="/User/<?= $user['id']; ?>/edit">Ubah pengguna</a>
                    <form action="/User/<?= $user['id']; ?>/delete" method="post" class="d-inline" onsubmit="return confirm('Hapus pengguna ini?');">
                      <?= csrf_field(); ?>
                      <button type="submit" class="text-white btn btn-sm btn-danger">Hapus pengguna</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td class="cell text-center" colspan="6">Belum ada data pengguna.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div><!--//table-responsive-->
    </div><!--//app-card-body-->
  </div><!--//app-card-->
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