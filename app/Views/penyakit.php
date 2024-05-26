<?= $this->extend('frontend/main'); ?>
<?= $this->section('frontend'); ?>
<div class="mx-auto text-center mt-20 mb-16">
  <h2 class="text-2xl font-bold text-gray-900 md:text-3xl uppercase">
    Daftar Penyakit Ganguan Kesehatan Mental
  </h2>
</div>
<section class="overflow-hidden bg-white sm:grid sm:items-center mx-auto max-w-screen-lg px-4 py-4 sm:px-6 sm:pt-2 lg:px-8 mt-12 mb-32">
  <div class="flow-root">
    <div class="-my-8 divide-y divide-gray-100">
      <?php
      $i = 1;
      foreach ($penyakits as $penyakit) :
      ?>
        <details class="group py-8 [&_summary::-webkit-details-marker]:hidden shadow-lg px-10 mb-10" <?= ($i == 1) ? 'open' : ''; ?>>
          <summary class="flex cursor-pointer items-center justify-between text-gray-900">
            <h2 class="text-lg font-medium"><?= "$i . " . $penyakit['nama_penyakit']; ?></h2>

            <span class="relative size-5 shrink-0">
              <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 size-5 opacity-100 group-open:opacity-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>

              <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 size-5 opacity-0 group-open:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </span>
          </summary>

          <p class="mt-8 leading-relaxed text-gray-700 text-lg text-justify">
            <?= $penyakit['informasi']; ?>
          </p>
        </details>
      <?php
        $i++;
      endforeach;
      ?>
    </div>
  </div>
</section>
<?= $this->endsection(); ?>