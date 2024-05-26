<?= $this->extend('frontend/main'); ?>
<?= $this->section('frontend'); ?>
<section class="overflow-hidden bg-white sm:grid sm:grid-cols-2 sm:items-center mx-auto max-w-screen-xl px-4 py-4 sm:px-6 sm:pt-2 lg:px-8 mt-20 mb-32" id="beranda">
  <div class="p-8 md:p-12 lg:ps-2 lg:py-24">
    <div class="ltr:sm:text-left rtl:sm:text-right">
      <h2 class="text-2xl font-bold text-gray-900 md:text-3xl">
        Temukan Solusi untuk Kesehatan Mental Anda
      </h2>

      <p class="hidden text-gray-500 md:mt-4 md:block text-lg">
        Dengan sistem pakar diagnosa kesehatan mental kami, dapatkan analisis cepat dan akurat untuk membantu Anda memahami kondisi mental Anda. Mulai perjalanan Anda menuju kesehatan mental yang lebih baik hari ini!
      </p>

      <div class="mt-4 md:mt-8">
        <a href="#" class="inline-block rounded bg-emerald-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-emerald-700 focus:outline-none focus:ring focus:ring-yellow-400">
          Mulai Diagnosa Sekarang
        </a>
      </div>
    </div>
  </div>

  <img alt="" src="<?= base_url('assets/images/frontend/ilustr-1.jpg'); ?>" class="h-full w-full object-cover sm:h-[calc(100%_-_2rem)] sm:self-end sm:rounded-ss-[30px] md:h-[calc(100%_-_4rem)] md:rounded-ss-[60px]" />
</section>

<section class="overflow-hidden bg-white sm:grid sm:grid-cols-2 sm:items-center mx-auto max-w-screen-xl px-4 py-4 sm:px-6 sm:pt-2 lg:px-8 mt-20 mb-32" id="about">
  <img alt="" src="<?= base_url('assets/images/frontend/ilustr-2.jpg'); ?>" class="h-full w-full object-cover sm:h-[calc(100%_-_2rem)] sm:self-end sm:rounded-ss-[30px] md:h-[calc(100%_-_4rem)] md:rounded-ss-[60px]" />

  <div class="p-8 md:p-12 lg:ps-20 lg:py-24 text-end">
    <div class="ltr:sm:text-right rtl:sm:text-justify">
      <h2 class="text-2xl font-bold text-gray-900 md:text-3xl">
        Tentang Kami
      </h2>

      <p class="hidden text-gray-500 md:mt-4 md:block text-lg">
        Kami adalah tim ahli dalam bidang kesehatan mental yang berdedikasi untuk menyediakan solusi berbasis teknologi yang membantu mendiagnosa berbagai kondisi mental. Sistem kami menggunakan algoritma canggih dan basis data pengetahuan yang luas untuk memberikan hasil yang akurat dan dapat diandalkan.
      </p>

      <!-- <div class="my-4 md:my-8">
        <p class="hidden text-dark-500 text-semibold md:mt-4 md:block">
          Mengapa Memilih Kami?
        </p>
      </div>
      <div class="grid grid-cols-3 items-end text-center">
        <div class="py-5 mx-3 shadow-2xl">
          <h5 class="text-2xl font-bold text-emerald-600">Mudah Digunakan</h5>
          <p class="text-gray-500">
            Meninggal
          </p>
        </div>
        <div class="py-5 mx-3 shadow-2xl">
          <h5 class="text-2xl font-bold text-emerald-600">Aksesibilitas</h5>
          <p class="text-gray-500">
            Meninggal
          </p>
        </div>
        <div class="py-5 mx-3 shadow-2xl">
          <h5 class="text-2xl font-bold text-emerald-600">Berdasarkan Penelitian</h5>
          <p class="text-gray-500">
            Meninggal
          </p>
        </div>
      </div> -->
    </div>
  </div>
</section>

<section class="bg-white" id="lokasi">
  <div class="p-8 md:p-12 lg:px-16 lg:pb-24">
    <div class="mx-auto max-w-xl text-center">
      <h2 class="text-2xl font-bold text-gray-900 md:text-3xl">
        Temukan Rumah Kesehatan di Lokasi Terdekat
      </h2>

      <p class="hidden text-gray-500 sm:mt-4 sm:block">
        Kunjungi lokasi Rumah Kesehatan untuk mendapatkan bantuan langsung dari profesional kesehatan mental kami.
      </p>
    </div>

    <div class="mx-auto mt-8 max-w-screen-lg">
      <div class="grid items-center grid-cols-2 gap-10">
        <article class="overflow-hidden rounded-lg border border-gray-100 bg-white shadow-sm">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.319466110175!2d108.55280427531572!3d-6.730822293265277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1d89a485d007%3A0x5dbbae4963e15b0!2sRumah%20Sakit%20Daerah%20Gunung%20Jati%20Kota%20Cirebon!5e0!3m2!1sid!2sid!4v1716699811936!5m2!1sid!2sid" class="w-full object-cover" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

          <div class="p-4 sm:p-6">
            <a href="#">
              <h3 class="text-lg font-semibold text-white">
                Rumah Sakit Umum Daerah (RSUD) "45" Kuningan
              </h3>
            </a>

            <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
              <span class="text-lg font-bold block text-black mb-3">Rumah Sakit Daerah Gunung Jati Kota Cirebon</span>
              Jl. Kesambi No.56, Kesambi, Kec. Kesambi, Kota Cirebon, Jawa Barat 45134
            </p>

            <a target="__blank" href="https://maps.app.goo.gl/uWULzN2aREn2Koim8" class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
              Lihat di Google Maps
              <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
                &rarr;
              </span>
            </a>
          </div>
        </article>
        <article class="overflow-hidden rounded-lg border border-gray-100 bg-white shadow-sm">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2114286569526!2d108.47880237531794!3d-6.984356593016554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14f01930751%3A0x4bb60c623ba5a502!2sRumah%20Sakit%20Umum%20Daerah%20(RSUD)%20%2245%22%20Kuningan!5e0!3m2!1sid!2sid!4v1716699613512!5m2!1sid!2sid" class="w-full object-cover" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

          <div class="p-4 sm:p-6">
            <a href="#">
              <h3 class="text-lg font-semibold text-white">
                Rumah Sakit Umum Daerah (RSUD) "45" Kuningan
              </h3>
            </a>

            <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
              <span class="text-lg font-bold block text-black mb-3">Rumah Sakit Umum Daerah (RSUD) "45" Kuningan</span>
              Jl. Jend. Sudirman No.68, Awirarangan, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45511
            </p>

            <a target="__blank" href="https://maps.app.goo.gl/HYWGcEULEbTfLkMEA" class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600">
              Lihat di Google Maps
              <span aria-hidden="true" class="block transition-all group-hover:ms-0.5 rtl:rotate-180">
                &rarr;
              </span>
            </a>
          </div>
        </article>
      </div>
    </div>
  </div>
</section>

<?= $this->endsection(); ?>