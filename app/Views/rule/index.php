<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container-xl">
  <div class="app-card app-card-chart h-100 shadow-sm">
    <div class="app-card-header p-3">
      <div class="row justify-content-between align-items-center">
        <div class="col-auto">
          <h4 class="app-card-title">Rule Diagnosa</h4>
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
              <?php
              $i = 0;
              foreach ($columns as $column) :
              ?>
                <th class="cell"><?= $column['Field']; ?></th>
              <?php
              endforeach;
              ?>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($rules as $rule) :
            ?>
              <tr>
                <td class="cell"><?= $i++; ?></td>
                <?php
                for ($j = 1; $j <= count($columns); $j++) :
                ?>
                  <?php
                  if ($j < 10) {
                  ?>
                    <td class="cell"><span class="truncate"><?= $rule["G00$j"] ?></span></td>
                  <?php
                  } else if ($j >= 10) {
                  ?>
                    <td class="cell"><span class="truncate"><?= $rule["G0$j"] ?></span></td>
                <?php
                  }
                endfor;
                ?>
                <!-- <td class="cell inline" style="width: 550px;">
                  <a class="text-white btn btn-sm btn-success" href="#">View</a>
                  <a class="text-white btn btn-sm btn-warning" href="#">Edit</a>
                  <a class="text-white btn btn-sm btn-danger" href="#">Delete</a>
                </td> -->
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Rule Penyakit <?= $penyakit['nama_penyakit']; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/Rule/store" method="post">
        <?= csrf_field(); ?>
        <div class="modal-body">
          <div class="mb-3">
            <?php
            for ($j = 3; $j <= count($columns) + 2; $j++) :
              // if ($j < 10) {
            ?>
              <label class="form-label mb-3"><?= $columns[$j]['Field'] ?></label>
              <select name="<?= $columns[$j]['Field'] ?>" class="form-select mb-2">
                <option selected disabled>-------- Silahkan Pilih Opsi --------</option>
                <option value="1">IYA</option>
                <option value="0">TIDAK</option>
              </select>
            <?php
            endfor;
            ?>
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