<?= $this->extend('frontend/main'); ?>
<?= $this->section('frontend'); ?>
<?php
$formatTeks = static fn($nilai) => strip_tags((string) $nilai, '<br><b><strong><em><p><ul><ol><li>');
?>
<section class="bg-white">
  <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">
    <div class="max-w-3xl">
      <h2 class="text-2xl font-bold leading-snug text-slate-900 md:text-3xl">
        Daftar kondisi kesehatan mental
      </h2>
      <p class="mt-4 text-base leading-relaxed text-slate-700">
        Penjelasan berikut berasal dari data MentalCare. Bacalah sebagai informasi, bukan sebagai hasil pemeriksaan terhadap Anda.
      </p>
    </div>

    <div class="mt-8 max-w-xl">
      <label for="cari-penyakit" class="block text-sm font-medium text-slate-900">Cari kondisi</label>
      <input id="cari-penyakit" type="search" autocomplete="off" placeholder="Misalnya depresi" class="mt-2 block min-h-11 w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-base text-slate-900 transition-colors hover:border-slate-400">
    </div>

    <?php if (! empty($penyakitError)) : ?>
      <p role="alert" class="mt-8 max-w-xl rounded-md border border-[#B45309] bg-slate-50 p-5 text-sm leading-relaxed text-[#B45309]">
        Daftar kondisi belum dapat dimuat. Silakan coba lagi setelah beberapa saat.
      </p>
    <?php elseif (empty($penyakits)) : ?>
      <p role="status" class="mt-8 max-w-xl rounded-md border border-slate-300 bg-slate-50 p-5 text-sm leading-relaxed text-slate-700">
        Data kondisi belum tersedia. Silakan kembali lagi setelah data diperbarui.
      </p>
    <?php else : ?>
      <div class="mt-8 border-t border-slate-200">
        <?php foreach ($penyakits as $penyakit) : ?>
          <details class="group border-b border-slate-200" data-penyakit-item="<?= esc(strtolower($penyakit['nama_penyakit'])); ?>">
            <summary class="flex min-h-11 cursor-pointer flex-wrap items-center justify-between gap-3 py-5 text-left">
              <span class="text-lg font-semibold text-slate-900"><?= esc($penyakit['nama_penyakit']); ?></span>
              <span class="text-sm font-medium text-teal-700 group-open:hidden">Buka penjelasan</span>
              <span class="hidden text-sm font-medium text-teal-700 group-open:inline">Tutup penjelasan</span>
            </summary>

            <div class="grid gap-6 pb-7 sm:grid-cols-2 sm:gap-10">
              <div>
                <h3 class="text-sm font-semibold text-slate-900">Informasi</h3>
                <div class="mt-2 text-sm leading-relaxed text-slate-700"><?= $formatTeks($penyakit['informasi'] ?? ''); ?></div>
              </div>
              <div>
                <h3 class="text-sm font-semibold text-slate-900">Saran penanganan</h3>
                <div class="mt-2 text-sm leading-relaxed text-slate-700"><?= $formatTeks($penyakit['solusi'] ?? ''); ?></div>
              </div>
            </div>
          </details>
        <?php endforeach; ?>
      </div>

      <p id="penyakit-kosong" role="status" hidden class="mt-8 rounded-md border border-slate-300 bg-slate-50 p-5 text-sm leading-relaxed text-slate-700">
        Tidak ada kondisi yang cocok dengan kata kunci tersebut. Coba kata kunci lain atau lihat seluruh daftar.
      </p>
    <?php endif; ?>

    <div class="mt-8 flex flex-wrap gap-3">
      <a href="/" class="inline-flex min-h-11 items-center rounded-md border border-slate-300 px-6 py-3 text-sm font-medium text-slate-800 transition-colors hover:bg-slate-100">
        Kembali ke beranda
      </a>
      <?php if (session()->get('logged_in')) : ?>
        <a href="/diagnosa-penyakit" class="inline-flex min-h-11 items-center rounded-md bg-teal-700 px-6 py-3 text-sm font-semibold text-white transition-colors hover:bg-teal-800">
          Mulai diagnosa
        </a>
      <?php endif; ?>
    </div>
  </div>
</section>

<script>
  const cariPenyakit = document.getElementById('cari-penyakit');
  const daftarPenyakit = Array.from(document.querySelectorAll('[data-penyakit-item]'));
  const penyakitKosong = document.getElementById('penyakit-kosong');

  if (cariPenyakit && daftarPenyakit.length) {
    const saringPenyakit = () => {
      const kataKunci = cariPenyakit.value.trim().toLowerCase();
      let ditemukan = 0;

      daftarPenyakit.forEach((item) => {
        const cocok = item.getAttribute('data-penyakit-item').includes(kataKunci);
        item.hidden = !cocok;

        if (cocok) {
          ditemukan++;
        }
      });

      if (penyakitKosong) {
        penyakitKosong.hidden = ditemukan > 0;
      }
    };

    cariPenyakit.addEventListener('input', saringPenyakit);
  }
</script>
<?= $this->endsection(); ?>
