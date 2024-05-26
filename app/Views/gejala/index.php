<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="app-card shadow-sm">
    <div class="app-card-header p-3">
      <div class="row justify-content-between align-items-center">
        <div class="col-auto">
          <h2 class="app-card-title fs-3 text-uppercase fw-bold"><?= $title; ?></h2>
        </div><!--//col-->
        <div class="col-auto">
          <div class="card-header-action">
            <button type="button" class="text-white btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Data</button>
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
      <div class="table-responsive">
        <table class="table table-striped mb-3 text-left">
          <thead>
            <tr>
              <th class="cell">No</th>
              <th class="cell">Kode Gejala</th>
              <th class="cell">Nama Gejala</th>
              <th class="cell">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($gejalas as $gejala) :
            ?>
              <tr>
                <td class="cell"><?= $i++; ?></td>
                <td class="cell"><span class="truncate"><?= $gejala['kode_gejala']; ?></span></td>
                <td class="cell"><?= $gejala['nama_gejala']; ?></td>
                <!-- <td class="cell"><span class="cell-data">12 Oct</span><span class="note">04:23 PM</span></td> -->
                <td class="cell inline">
                  <a class="text-white btn btn-sm btn-warning" href="/Gejala/<?= $gejala['id']; ?>/edit">Edit</a>
                  <a class="text-white btn btn-sm btn-danger" href="/Gejala/<?= $gejala['id']; ?>/delete">Delete</a>
                </td>
              </tr>
            <?php
            endforeach;
            ?>
          </tbody>
        </table>
        <?php echo $pager->links('gejala', 'bootstrap_pagination') ?>
      </div><!--//table-responsive-->
    </div><!--//app-card-body-->
  </div><!--//app-card-->
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Gejala</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/Gejala" method="post">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="mb-3">
            <label for="kode_gejala" class="form-label">Kode Gejala</label>
            <input type="text" class="form-control <?= $validation->hasError('kode_penyakit') ?? 'is-invalid'; ?>" required name="kode_gejala" id="kode_gejala" value="G0<?= (count($id) < 10) ? '0' . count($id) + 1 : count($id) + 1 ?>" readonly>
            <div class="invalid-feedback">
              <?= $validation->getError('kode_gejala'); ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="nama_gejala" class="form-label">Nama Gejala</label>
            <input type="text" class="form-control <?= $validation->hasError('nama_penyakit') ?? 'is-invalid'; ?>" required name="nama_gejala" id="nama_gejala" value="<?= old('nama_gejala'); ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('nama_gejala'); ?>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="text-white btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="text-white btn btn-info">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>