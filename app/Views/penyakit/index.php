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
        <table class="table table-striped mb-0 text-left">
          <thead>
            <tr>
              <th class="cell">No</th>
              <th class="cell">Nama Penyakit</th>
              <th class="cell">Informasi</th>
              <th class="cell">Solusi</th>
              <th class="cell">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($penyakits as $penyakit) :
            ?>
              <tr>
                <td class="cell"><?= $i++; ?></td>
                <td class="cell"><span class="truncate"><?= $penyakit['nama_penyakit']; ?></span></td>
                <td class="cell"><?= substr($penyakit['informasi'], 0, 100); ?>......</td>
                <td class="cell"><?= substr($penyakit['informasi'], 0, 100); ?>......</td>
                <!-- <td class="cell"><span class="cell-data">12 Oct</span><span class="note">04:23 PM</span></td> -->
                <td class="cell inline" style="width: 250px;">
                  <a class="text-white btn btn-sm btn-success" href="Penyakit/<?= $penyakit['id']; ?>">View</a>
                  <a class="text-white btn btn-sm btn-warning" href="Penyakit/<?= $penyakit['id']; ?>/edit">Edit</a>
                  <a onclick="" class="text-white btn btn-sm btn-danger" href="Penyakit/<?= $penyakit['id']; ?>/delete">Delete</a>
                </td>
              </tr>
            <?php
            endforeach;
            ?>
          </tbody>
        </table>
      </div><!--//table-responsive-->
    </div><!--//app-card-body-->
  </div><!--//app-card-->
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Penyakit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/Penyakit" method="post">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama_penyakit" class="form-label">Nama Penyakit</label>
            <input type="text" class="form-control <?= $validation->hasError('nama_penyakit') ?? 'is-invalid'; ?>" required autocomplete="FALSE" name="nama_penyakit" id="nama_penyakit" value="<?= old('nama_penyakit'); ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('nama_penyakit'); ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="informasi" class="form-label">Informasi Penyakit</label>
            <textarea style="height: 100px;" class="form-control <?= $validation->hasError('informasi') ?? 'is-invalid'; ?>" required autocomplete="FALSE" name="informasi" id="informasi"><?= old('informasi'); ?></textarea>
            <div class="invalid-feedback">
              <?= $validation->getError('informasi'); ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="solusi" class="form-label">Solusi Penyakit</label>
            <textarea style="height: 100px;" class="form-control <?= $validation->hasError('solusi') ?? 'is-invalid'; ?>" required autocomplete="FALSE" name="solusi" id="solusi"><?= old('solusi'); ?></textarea>
            <div class="invalid-feedback">
              <?= $validation->getError('solusi'); ?>
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