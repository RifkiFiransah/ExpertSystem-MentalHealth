<?= $this->extend('frontend/main'); ?>
<?= $this->section('frontend'); ?>
<div class="mx-auto text-center mt-16 mb-5">
  <h2 class="text-2xl font-bold text-gray-900 md:text-3xl uppercase">
    Hasil Diagnosa
  </h2>
</div>
<!-- Hero -->
<section class="">
  <div class="mx-auto max-w-screen-lg px-4 sm:px-6 lg:px-8 py-5 sm:py-12 lg:py-8">
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
        <thead class="ltr:text-left rtl:text-right bg-blue-300">
          <tr>
            <th class="whitespace-nowrap px-4 py-2 font-large text-gray-900">ID</th>
            <th class="whitespace-nowrap px-4 py-2 font-large text-gray-900">Nama Penyakit</th>
            <th class="whitespace-nowrap px-4 py-2 font-large text-gray-900">Persentase</th>
            <th class="whitespace-nowrap px-4 py-2 font-large text-gray-900">Ranking</th>
          </tr>
        </thead>

        <tbody class="divide-y divide-gray-200 text-center">
          <?php
          $ranking = session()->get('ranking');
          $penyakit = session()->get('penyakit');

          if ($ranking) {
            $no_rank = 1;
            foreach ($ranking as $hasil) :
          ?>
              <tr class="odd:bg-gray-50">
                <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?= $hasil['id']; ?> </td>
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"><?= $hasil['nama_penyakit']; ?></td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?= $hasil['persen']; ?>%</td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?= $no_rank; ?> </td>
              </tr>
          <?php
              $no_rank++;
            endforeach;
          }
          ?>
      </table>
      <div class="text-center uppercase text-xl font-bold mt-16">
        Kesimpulannya adalah kesehatan mental anda mengalami penyakit <span class="text-red-500"><?= $ranking[0]['nama_penyakit']; ?></span> dengan tingkat akurasi sebesar <span class="text-green-500"><?= $ranking[0]['persen'] . "%"; ?></span>
      </div>
    </div>
  </div>
</section>
<!-- Hero -->

<!-- Hero -->
<section class="text-gray-900 mb-24">
  <div class="mx-auto max-w-screen-lg px-4 sm:px-6 lg:px-8 text-lg">
    <?php
    $id = $ranking[0]['id'];
    ?>
    <div class="flow-root bg-slate-600 my-4">
      <dl class="-my-3 divide-y divide-gray-100 text-sm dark:divide-gray-700 py-5 px-10">
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 border-b-2 border-gray-700">
          <dt class="font-medium text-gray-900 dark:text-white text-lg">Gangguan Penyakit</dt>
          <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200 text-lg"><?= $penyakit['nama_penyakit'] ?? ''; ?></dd>
        </div>
      </dl>
    </div>

    <div class="flow-root bg-slate-600 my-6">
      <dl class="-my-3 divide-y divide-gray-100 text-sm dark:divide-gray-700 p-10">
        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
          <dt class="font-medium text-gray-900 dark:text-white text-lg">Info Penyakit</dt>
          <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200 text-justify text-lg"><?= $penyakit['informasi'] ?? '' ?></dd>
        </div>

        <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
          <dt class="font-medium text-gray-900 dark:text-white text-lg">Solusi</dt>
          <dd class="text-gray-700 sm:col-span-2 dark:text-gray-200 text-justify text-lg"><?= $penyakit['solusi'] ?? ''; ?></dd>
        </div>

      </dl>
    </div>

    <form action="proses-diagnosa" method="post" class="mt-10">
      <?= csrf_field(); ?>
      <input type="hidden" name="persentase" value="<?= $ranking[0]['persen'] . "%"; ?>">
      <input type="hidden" name="id_penyakit" value="<?= $penyakit['id'] ?>">
      <input type="hidden" name="id_user" value="<?= session()->get('id') ?>">

      <a class="rounded-md bg-gray-200 px-10 py-4 text-sm font-medium text-blue-600 me-5" href="/diagnosa-penyakit">
        Back
      </a>
      <button class="rounded-md bg-blue-600 px-10 py-4 text-sm font-medium text-white shadow" type="submit">
        Simpan
      </button>
    </form>
  </div>
</section>
<!-- Hero -->
<?= $this->endsection(); ?>