<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="app-card app-card-chart h-100 shadow-sm">
    <div class="app-card-header p-3">
      <div class="row justify-content-between align-items-center">
        <div class="col-auto">
          <h4 class="app-card-title fs-3 text-uppercase fw-bold">Data Hasil Diagnosa</h4>
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
      <div class="table-responsive">
        <table class="table table-striped mb-0 text-left">
          <thead>
            <tr>
              <th class="cell">No</th>
              <th class="cell">Nama Lengkap</th>
              <th class="cell">Penyakit</th>
              <th class="cell">Persentase</th>
              <th class="cell">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($diagnosis as $diagnosa) :
            ?>
              <tr>
                <td class="cell"><?= $i++; ?></td>
                <td class="cell"><span class="truncate"><?= $diagnosa['nama_lengkap']; ?></span></td>
                <td class="cell"><?= $diagnosa['nama_penyakit']; ?></td>
                <td class="cell"><?= $diagnosa['persentase']; ?></td>
                <!-- <td class="cell"><span class="cell-data">12 Oct</span><span class="note">04:23 PM</span></td> -->
                <td class="cell inline" style="width: 250px;">
                  <a class="text-white btn btn-sm btn-warning" href="User/<?= $diagnosa['id']; ?>/edit">Edit</a>
                  <a class="text-white btn btn-sm btn-danger" href="User/<?= $diagnosa['id']; ?>/delete">Delete</a>
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

<?= $this->endSection(); ?>