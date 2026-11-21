<?= $this->extend('frontend/main'); ?>
<?php
$ranking = session()->get('ranking');
$penyakit = session()->get('penyakit');
$penyakitId = $penyakit['id'] ?? '';
?>
<?= $this->section('frontend'); ?>

<?php if (empty($ranking) || empty($ranking[0])) : ?>
  <div class="mx-auto max-w-screen-lg px-4 pb-24 pt-28 text-center sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold text-slate-900 md:text-3xl">Hasil Diagnosa</h2>
    <div role="status" class="mt-8 rounded-lg border border-slate-300 bg-white p-6 text-slate-700">
      Belum ada hasil diagnosa untuk ditampilkan. Silakan pilih gejala terlebih dahulu.
      <a class="mt-4 inline-block rounded bg-teal-700 px-5 py-3 font-medium text-white" href="/diagnosa-penyakit">Mulai diagnosa</a>
    </div>
  </div>
<?php else : ?>
  <div class="mx-auto text-center mt-16 mb-5">
    <h2 class="text-2xl font-bold text-slate-900 md:text-3xl">
      Hasil Diagnosa
    </h2>
  </div>
  <section class="">
    <div class="mx-auto max-w-screen-lg px-4 sm:px-6 lg:px-8 py-5 sm:py-12 lg:py-8">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y-2 divide-slate-300 bg-white text-sm">
          <thead class="ltr:text-left rtl:text-right bg-slate-200">
            <tr>
              <th class="whitespace-nowrap px-4 py-2 font-semibold text-slate-900">ID</th>
              <th class="whitespace-nowrap px-4 py-2 font-semibold text-slate-900">Nama Penyakit</th>
              <th class="whitespace-nowrap px-4 py-2 font-semibold text-slate-900">Skor Pencocokan</th>
              <th class="whitespace-nowrap px-4 py-2 font-semibold text-slate-900">Ranking</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-slate-200 text-center">
            <?php
            $no_rank = 1;
            foreach ($ranking as $hasil) :
            ?>
              <tr class="odd:bg-slate-50">
                <td class="whitespace-nowrap px-4 py-2 text-slate-700"><?= $hasil['id']; ?> </td>
                <td class="whitespace-nowrap px-4 py-2 font-medium text-slate-900"><?= $hasil['nama_penyakit']; ?></td>
                <td class="whitespace-nowrap px-4 py-2 text-slate-700"><?= $hasil['persen']; ?>%</td>
                <td class="whitespace-nowrap px-4 py-2 text-slate-700"><?= $no_rank; ?> </td>
              </tr>
            <?php
              $no_rank++;
            endforeach;
            ?>
          </tbody>
        </table>
        <div class="mt-16 text-center text-xl font-bold text-slate-900">
          Berdasarkan gejala yang anda pilih, kemungkinan kondisi yang paling mendekati adalah <span class="text-teal-700"><?= $ranking[0]['nama_penyakit']; ?></span> dengan skor pencocokan <span class="text-teal-700"><?= $ranking[0]['persen'] . "%"; ?></span>. Hasil ini bukan diagnosis medis. Konsultasikan dengan profesional kesehatan untuk pemeriksaan lanjutan.
        </div>
      </div>
    </div>
  </section>

  <section class="text-slate-900 mb-24">
    <div class="mx-auto max-w-screen-lg px-4 sm:px-6 lg:px-8 text-lg">
      <div class="flow-root bg-slate-100 my-4">
        <dl class="-my-3 divide-y divide-slate-300 text-sm py-5 px-10">
          <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 border-b-2 border-slate-300">
            <dt class="font-medium text-slate-900 text-lg">Gangguan Penyakit</dt>
            <dd class="text-slate-700 sm:col-span-2 text-lg"><?= $penyakit['nama_penyakit'] ?? ''; ?></dd>
          </div>
        </dl>
      </div>

      <div class="flow-root bg-slate-100 my-6">
        <dl class="-my-3 divide-y divide-slate-300 text-sm p-10">
          <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-slate-900 text-lg">Info Penyakit</dt>
            <dd class="text-slate-700 sm:col-span-2 text-justify text-lg"><?= $penyakit['informasi'] ?? '' ?></dd>
          </div>

          <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-slate-900 text-lg">Saran</dt>
            <dd class="text-slate-700 sm:col-span-2 text-justify text-lg"><?= $penyakit['solusi'] ?? ''; ?></dd>
          </div>
        </dl>
      </div>

      <form action="/proses-diagnosa" method="post" class="mt-10">
        <?= csrf_field(); ?>
        <input type="hidden" name="persentase" value="<?= $ranking[0]['persen'] . "%"; ?>">
        <input type="hidden" name="id_penyakit" value="<?= $penyakitId; ?>">
        <input type="hidden" name="id_user" value="<?= session()->get('id') ?>">

        <a class="rounded-md bg-slate-100 px-10 py-4 text-sm font-medium text-teal-700 me-5" href="/diagnosa-penyakit">
          Kembali
        </a>
        <?php if ($penyakitId !== '') : ?>
          <button class="rounded-md bg-teal-700 px-10 py-4 text-sm font-medium text-white" type="submit">
            Simpan hasil
          </button>
        <?php else : ?>
          <span class="text-slate-700">Data penyakit tidak tersedia, hasil tidak dapat disimpan.</span>
        <?php endif; ?>
      </form>
    </div>
  </section>
<?php endif; ?>

<?= $this->endsection(); ?>
