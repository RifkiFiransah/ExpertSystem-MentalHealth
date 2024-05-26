<?= $this->extend('frontend/main'); ?>
<?= $this->section('frontend'); ?>
<div class="mx-auto text-center mt-20">
  <h2 class="text-2xl font-bold text-gray-900 md:text-3xl uppercase">
    Pilih Gejala Yang anda rasakan
  </h2>
</div>
<!-- Hero -->
<div class="grid grid-cols-1 place-content-center gap-4 lg:grid-cols-2 mx-auto max-w-screen-xl max-h-screen-xl lg:min-h-[80vh] px-4 py-0 sm:px-6 sm:mb-16 mt-4 lg:px-8 bg-white">
  <div class="h-full rounded-lg">
    <span class="relative inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"></span>
    <div class="relative max-h-full block rounded-lg border-2 border-emerald-600 p-4 sm:p-6 lg:p-8">

      <form action="/hasil-diagnosa" method="post">
        <?= csrf_field(); ?>
        <div class="inputan pe-5 py-2 block max-h-[50vh] overflow-y-scroll text-dark">
          <?php
          $no = 1;
          foreach ($gejalas as $gejala) :
          ?>
            <div class="space-y-2 mb-3 ">
              <label for="<?= $gejala['id']; ?>" class="flex cursor-pointer items-start gap-4 rounded-lg border border-green-600 p-4 transition hover:bg-white has-[:checked]:bg-blue-50">
                <div class="flex items-center">
                  <?= $no; ?>
                  &#8203;
                  <input type="checkbox" value="<?= $gejala['kode_gejala']; ?>" class="ms-3 size-4 rounded border-gray-300 check" id="<?= $gejala['id']; ?>" name="<?= $gejala['nama_gejala']; ?>" />
                </div>

                <div>
                  <strong class="font-semibold text-dark"> <?= $gejala['nama_gejala']; ?> </strong>
                </div>
              </label>
            </div>
          <?php
            $no++;
          endforeach;
          ?>
        </div>

        <div class="mt-8">
          <button name="submit" class="group me-5 relative inline-block text-sm font-medium text-white focus:outline-none focus:ring" type="submit">
            <span class="absolute inset-0 border border-emerald-600 group-active:border-emerald-500"></span>
            <span class="block border border-emerald-600 bg-emerald-600 px-12 py-3 transition-transform active:border-emerald-500 active:bg-emerald-500 group-hover:-translate-x-1 group-hover:-translate-y-1">
              Submit
            </span>
          </button>

          <button class="group me-5 relative inline-block text-sm font-medium text-emerald-600 focus:outline-none focus:ring active:text-emerald-500" type="reset">
            <span class="absolute inset-0 border border-current group-hover:bg-emerald-600"></span>
            <span class="block border border-current bg-white px-12 py-3 transition-transform group-hover:-translate-x-1 group-hover:-translate-y-1">
              Back
            </span>
          </button>
        </div>
      </form>
    </div>
  </div>
  <div class="h-full rounded-lg grid place-content-center">
    <img src="<?= base_url('/assets/images/frontend/ilustr-3.jpg'); ?>" alt="">
  </div>
</div>
<!-- Hero -->
<?= $this->endsection(); ?>