<?= $this->extend('frontend/main'); ?>
<?= $this->section('frontend'); ?>
<section id="beranda" class="border-b border-slate-200 bg-white">
  <div class="mx-auto grid max-w-screen-xl gap-8 px-4 py-12 sm:px-6 sm:py-16 lg:grid-cols-2 lg:items-center lg:gap-12 lg:px-8 lg:py-20">
    <div>
      <h2 class="text-2xl font-bold leading-snug text-slate-900 md:text-3xl">
        Kenali kemungkinan gangguan kesehatan mental dari gejala yang Anda rasakan
      </h2>

      <p class="mt-4 max-w-2xl text-base leading-relaxed text-slate-700">
        Pilih gejala yang Anda rasakan untuk melihat kemungkinan kondisi yang sesuai. Skrining ini memakai aturan yang tersedia di sistem dan tidak melakukan pemeriksaan medis.
      </p>

      <div class="mt-6 flex flex-wrap gap-3">
        <a href="/diagnosa-penyakit" class="inline-flex min-h-11 items-center rounded-md bg-teal-700 px-6 py-3 text-sm font-semibold text-white transition-colors hover:bg-teal-800">
          Mulai diagnosa
        </a>
        <a href="#cara-kerja" class="inline-flex min-h-11 items-center rounded-md border border-slate-300 px-6 py-3 text-sm font-medium text-slate-800 transition-colors hover:bg-slate-100">
          Lihat cara kerja
        </a>
      </div>

      <p class="mt-6 max-w-2xl border-t border-slate-200 pt-4 text-sm leading-relaxed text-[#B45309]">
        Hasil skrining bukan diagnosis medis. Jika Anda membutuhkan bantuan segera, hubungi tenaga kesehatan atau fasilitas kesehatan terdekat.
      </p>
    </div>

    <img src="/assets/images/frontend/ilustr-1.jpg" width="2000" height="2000" fetchpriority="high" alt="Ilustrasi pendukung skrining kesehatan mental MentalCare" class="block min-h-[240px] w-full rounded-md object-cover lg:min-h-[320px]">
  </div>
</section>

<section id="cara-kerja" class="border-b border-slate-200 bg-slate-50">
  <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">
    <h2 class="text-2xl font-bold text-slate-900 md:text-3xl">
      Bagaimana skrining ini bekerja
    </h2>
    <p class="mt-4 max-w-3xl text-base leading-relaxed text-slate-700">
      Sistem pakar mencocokkan pilihan Anda dengan aturan yang tersedia. Alur berikut menggambarkan apa yang terjadi dari awal sampai hasil muncul.
    </p>

    <ol class="mt-8 border-t border-slate-200">
      <li class="grid gap-2 border-b border-slate-200 py-5 sm:grid-cols-[3rem_1fr] sm:gap-4">
        <span class="text-sm font-semibold text-slate-700">1</span>
        <div>
          <h3 class="text-base font-semibold text-slate-900">Pilih gejala</h3>
          <p class="mt-1 text-sm leading-relaxed text-slate-700">Halaman diagnosa menampilkan daftar gejala. Anda dapat memilih paling banyak delapan gejala yang paling menggambarkan kondisi Anda.</p>
        </div>
      </li>
      <li class="grid gap-2 border-b border-slate-200 py-5 sm:grid-cols-[3rem_1fr] sm:gap-4">
        <span class="text-sm font-semibold text-slate-700">2</span>
        <div>
          <h3 class="text-base font-semibold text-slate-900">Kirim pilihan</h3>
          <p class="mt-1 text-sm leading-relaxed text-slate-700">Sistem membandingkan gejala yang Anda pilih dengan aturan yang tersedia untuk setiap kondisi.</p>
        </div>
      </li>
      <li class="grid gap-2 border-b border-slate-200 py-5 sm:grid-cols-[3rem_1fr] sm:gap-4">
        <span class="text-sm font-semibold text-slate-700">3</span>
        <div>
          <h3 class="text-base font-semibold text-slate-900">Baca hasilnya</h3>
          <p class="mt-1 text-sm leading-relaxed text-slate-700">Hasil menunjukkan kemungkinan kondisi dan skor pencocokan, disertai penjelasan serta saran penanganan dari data sistem. Hasil tetap bukan diagnosis medis.</p>
        </div>
      </li>
    </ol>
  </div>
</section>

<section id="batasan" class="border-b border-slate-200 bg-white">
  <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">
    <h2 class="text-2xl font-bold text-slate-900 md:text-3xl">
      Batasan yang perlu Anda tahu
    </h2>
    <p class="mt-4 max-w-3xl text-base leading-relaxed text-slate-700">
      Skrining ini membantu Anda memahami kemungkinan, bukan memutuskan kondisi Anda.
    </p>

    <div class="mt-8 grid gap-8 border-t border-slate-200 pt-8 md:grid-cols-2 md:gap-12">
      <div>
        <h3 class="text-base font-semibold text-slate-900">Yang dilakukan sistem</h3>
        <ul class="mt-3 space-y-3 text-sm leading-relaxed text-slate-700">
          <li>Mencocokkan gejala pilihan Anda dengan aturan pada data sistem.</li>
          <li>Menampilkan skor pencocokan dan urutan kemungkinan kondisi.</li>
          <li>Menampilkan penjelasan dan saran penanganan yang tersedia di data penyakit.</li>
        </ul>
        <a href="/data-penyakit" class="mt-5 inline-flex min-h-11 items-center text-sm font-medium text-teal-700 transition-colors hover:text-teal-800">
          Baca penjelasan tiap kondisi
        </a>
      </div>
      <div>
        <h3 class="text-base font-semibold text-slate-900">Yang tidak dilakukan sistem</h3>
        <ul class="mt-3 space-y-3 text-sm leading-relaxed text-slate-700">
          <li>Menetapkan diagnosis medis.</li>
          <li>Menggantikan pemeriksaan atau pengobatan dari profesional kesehatan.</li>
          <li>Memastikan hasil selalu sesuai dengan kondisi Anda.</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section id="kondisi" class="border-b border-slate-200 bg-slate-50">
  <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">
    <h2 class="text-2xl font-bold text-slate-900 md:text-3xl">
      Kondisi yang tercatat dalam sistem
    </h2>
    <p class="mt-4 max-w-3xl text-base leading-relaxed text-slate-700">
      Daftar ini berasal dari data penyakit yang tersedia di MentalCare. Nama yang muncul di sini bukan hasil skrining Anda.
    </p>

    <?php if (! empty($penyakitError)) : ?>
      <p role="alert" class="mt-8 rounded-md border border-slate-300 bg-white p-5 text-sm leading-relaxed text-slate-700">
        Daftar kondisi tidak dapat dimuat saat ini. Buka halaman data penyakit untuk mencoba lagi.
      </p>
    <?php elseif (! empty($penyakits)) : ?>
      <ul class="mt-8 grid gap-x-12 border-t border-slate-200 sm:grid-cols-2">
        <?php foreach ($penyakits as $penyakit) : ?>
          <li class="border-b border-slate-200 py-4 text-base font-medium text-slate-900">
            <?= esc($penyakit['nama_penyakit']); ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else : ?>
      <p role="status" class="mt-8 rounded-md border border-slate-300 bg-white p-5 text-sm leading-relaxed text-slate-700">
        Daftar kondisi belum tersedia saat ini. Buka halaman data penyakit untuk melihat pembaruan.
      </p>
    <?php endif; ?>

    <a href="/data-penyakit" class="mt-6 inline-flex min-h-11 items-center text-sm font-medium text-teal-700 transition-colors hover:text-teal-800">
      Buka penjelasan lengkap di data penyakit
    </a>
  </div>
</section>

<section id="about" class="border-b border-slate-200 bg-white">
  <div class="mx-auto grid max-w-screen-xl gap-8 px-4 py-12 sm:px-6 sm:py-16 lg:grid-cols-2 lg:items-center lg:gap-12 lg:px-8">
    <img src="/assets/images/frontend/ilustr-2.jpg" width="2000" height="2000" loading="lazy" alt="Ilustrasi pendukung informasi tentang MentalCare" class="block min-h-[240px] w-full rounded-md object-cover lg:min-h-[320px]">

    <div>
      <h2 class="text-2xl font-bold text-slate-900 md:text-3xl">
        Tentang MentalCare
      </h2>
      <p class="mt-4 text-base leading-relaxed text-slate-700">
        MentalCare adalah sistem pakar yang memakai aturan gejala untuk menunjukkan kemungkinan gangguan kesehatan mental. Tujuannya membantu Anda memahami gejala yang Anda rasakan sebelum memutuskan langkah berikutnya.
      </p>
      <p class="mt-4 text-base leading-relaxed text-slate-700">
        Kami tidak melakukan diagnosis, tidak meresepkan obat, dan tidak menggantikan pemeriksaan oleh dokter atau tenaga kesehatan lain. Bila hasil skrining membuat Anda khawatir, gunakan hasil itu sebagai bahan diskusi saat berkonsultasi.
      </p>
    </div>
  </div>
</section>

<section id="lokasi" class="bg-slate-50">
  <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">
    <h2 class="text-2xl font-bold text-slate-900 md:text-3xl">
      Rumah sakit untuk bantuan langsung
    </h2>
    <p class="mt-4 max-w-3xl text-base leading-relaxed text-slate-700">
      Hubungi fasilitas kesehatan berikut bila Anda membutuhkan bantuan langsung dari profesional kesehatan mental.
    </p>
    <p class="mt-3 max-w-3xl text-sm leading-relaxed text-[#B45309]">
      Jika dalam kondisi mendesak, hubungi layanan darurat di wilayah Anda. Hasil skrining tidak menggantikan pertolongan langsung.
    </p>

    <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2">
      <article class="overflow-hidden rounded-md border border-slate-300 bg-white">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.319466110175!2d108.55280427531572!3d-6.730822293265277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1d89a485d007%3A0x5dbbae4963e15b0!2sRumah%20Sakit%20Daerah%20Gunung%20Jati%20Kota%20Cirebon!5e0!3m2!1sid!2sid!4v1716699811936!5m2!1sid!2sid" class="block w-full" width="600" height="250" title="Peta lokasi Rumah Sakit Daerah Gunung Jati Kota Cirebon" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        <div class="p-5 sm:p-6">
          <h3 class="text-lg font-semibold text-slate-900">
            Rumah Sakit Daerah Gunung Jati Kota Cirebon
          </h3>
          <p class="mt-2 text-sm leading-relaxed text-slate-700">
            Jl. Kesambi No.56, Kesambi, Kec. Kesambi, Kota Cirebon, Jawa Barat 45134
          </p>
          <a target="_blank" rel="noopener noreferrer" href="https://maps.app.goo.gl/uWULzN2aREn2Koim8" class="mt-3 inline-flex min-h-11 items-center text-sm font-medium text-teal-700 transition-colors hover:text-teal-800">
            Lihat rute di Google Maps
          </a>
        </div>
      </article>

      <article class="overflow-hidden rounded-md border border-slate-300 bg-white">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2114286569526!2d108.47880237531794!3d-6.984356593016554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14f01930751%3A0x4bb60c623ba5a502!2sRumah%20Sakit%20Umum%20Daerah%20(RSUD)%20%2245%22%20Kuningan!5e0!3m2!1sid!2sid!4v1716699613512!5m2!1sid!2sid" class="block w-full" width="600" height="250" title="Peta lokasi RSUD 45 Kuningan" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        <div class="p-5 sm:p-6">
          <h3 class="text-lg font-semibold text-slate-900">
            Rumah Sakit Umum Daerah (RSUD) "45" Kuningan
          </h3>
          <p class="mt-2 text-sm leading-relaxed text-slate-700">
            Jl. Jend. Sudirman No.68, Awirarangan, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45511
          </p>
          <a target="_blank" rel="noopener noreferrer" href="https://maps.app.goo.gl/HYWGcEULEbTfLkMEA" class="mt-3 inline-flex min-h-11 items-center text-sm font-medium text-teal-700 transition-colors hover:text-teal-800">
            Lihat rute di Google Maps
          </a>
        </div>
      </article>
    </div>
  </div>
</section>

<?= $this->endsection(); ?>
