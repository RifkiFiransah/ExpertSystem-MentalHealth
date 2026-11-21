<?= $this->extend('frontend/main'); ?>
<?= $this->section('frontend'); ?>
<section class="overflow-hidden min-h-[40vh] bg-white mx-auto max-w-screen-lg px-4 py-4 sm:px-6 sm:pt-2 lg:px-8 mt-20 mb-32">
  <div class="mx-auto text-center mb-16">
    <h2 class="text-2xl font-bold text-slate-900 md:text-3xl">
      Daftar Gangguan Kesehatan Mental
    </h2>
    <p id="riwayat-loading" role="status" class="mt-3 text-sm text-slate-600">Memuat riwayat diagnosa...</p>
  </div>

  <?php if (session()->getFlashdata('error')) : ?>
    <div class="mb-6 rounded border border-red-300 bg-red-50 p-4 text-sm text-red-800" role="alert">
      <?= session()->getFlashdata('error'); ?>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('message')) : ?>
    <div class="mb-6 rounded border border-teal-300 bg-teal-50 p-4 text-sm text-teal-800" role="status">
      <?= session()->getFlashdata('message'); ?>
    </div>
  <?php endif; ?>

  <div class="overflow-x-auto">
    <table class="min-w-full divide-y-2 divide-slate-200 bg-white text-sm">
      <thead class="ltr:text-left rtl:text-right">
        <tr>
          <th class="whitespace-nowrap px-4 py-2 font-semibold text-slate-900">No</th>
          <th class="whitespace-nowrap px-4 py-2 font-semibold text-slate-900">Nama</th>
          <th class="whitespace-nowrap px-4 py-2 font-semibold text-slate-900">Penyakit</th>
          <th class="whitespace-nowrap px-4 py-2 font-semibold text-slate-900">Skor Pencocokan</th>
        </tr>
      </thead>

      <tbody class="divide-y divide-slate-200 text-center">
        <?php if (!empty($diagnosis)) : ?>
          <?php $i = 1; ?>
          <?php foreach ($diagnosis as $diagnosa) : ?>
            <tr class="odd:bg-slate-50">
              <td class="whitespace-nowrap px-4 py-2 font-medium text-slate-900"><?= $i++; ?></td>
              <td class="whitespace-nowrap px-4 py-2 text-slate-700"><?= $diagnosa['nama_lengkap']; ?></td>
              <td class="whitespace-nowrap px-4 py-2 text-slate-700"><?= $diagnosa['nama_penyakit']; ?></td>
              <td class="whitespace-nowrap px-4 py-2 text-slate-700"><?= $diagnosa['persentase']; ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td class="whitespace-nowrap px-4 py-5 text-center text-slate-700" colspan="4">
              Belum ada riwayat diagnosa. Silakan lakukan
              <a href="/diagnosa-penyakit" class="font-medium text-teal-700 underline">diagnosa</a>
              terlebih dahulu.
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>
<script>
  const riwayatLoading = document.getElementById('riwayat-loading');
  if (riwayatLoading) {
    document.addEventListener('DOMContentLoaded', () => {
      riwayatLoading.hidden = true;
    });
  }
</script>
<?= $this->endSection(); ?>
