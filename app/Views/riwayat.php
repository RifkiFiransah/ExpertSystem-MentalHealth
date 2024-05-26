<?= $this->extend('frontend/main'); ?>
<?= $this->section('frontend'); ?>
<section class="overflow-hidden min-h-[40vh] bg-white mx-auto max-w-screen-lg px-4 py-4 sm:px-6 sm:pt-2 lg:px-8 mt-20 mb-32">
  <div class="mx-auto text-center mb-16">
    <h2 class="text-2xl font-bold text-gray-900 md:text-3xl uppercase">
      Daftar Penyakit Ganguan Kesehatan Mental
    </h2>
  </div>
  <?php
  if (session()->getFlashdata('message')) :
  ?>
    <div class="alert alert-primary" role="alert">
      <?= session()->getFlashdata('message'); ?>
    </div>
  <?php
  endif;
  ?>
  <div class="overflow-x-auto">
    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
      <thead class="ltr:text-left rtl:text-right">
        <tr>
          <th class="whitespace-nowrap px-4 py-2 font-semibold text-gray-900 uppercase">No</th>
          <th class="whitespace-nowrap px-4 py-2 font-semibold text-gray-900 uppercase">Nama</th>
          <th class="whitespace-nowrap px-4 py-2 font-semibold text-gray-900 uppercase">Penyakit</th>
          <th class="whitespace-nowrap px-4 py-2 font-semibold text-gray-900 uppercase">Persentase</th>
        </tr>
      </thead>

      <tbody class="divide-y divide-gray-200 text-center">
        <?php
        $i = 1;
        if (count($diagnosis) > 0) {
          foreach ($diagnosis as $diagnosa) :
        ?>
            <tr class="odd:bg-gray-50">
              <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"><?= $i++; ?></td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?= $diagnosa['nama_lengkap']; ?></td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?= $diagnosa['nama_penyakit']; ?></td>
              <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?= $diagnosa['persentase']; ?></td>
            </tr>
        <?php
          endforeach;
        } else {
        }
        ?>
        <tr class="odd:bg-gray-50">
          <td class="whitespace-nowrap px-4 py-5 font-medium text-gray-900 text-center" colspan="4">Data belum tersedia, silahkan lakukan <a href="/diagnosa-penyakit" class="text-teal-700 underline">diagnosa</a> terlebih dahulu</td>
        </tr>
      </tbody>
    </table>
  </div>
</section>
<?= $this->endSection(); ?>