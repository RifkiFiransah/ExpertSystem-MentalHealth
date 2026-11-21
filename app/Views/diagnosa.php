<?= $this->extend('frontend/main'); ?>
<?= $this->section('frontend'); ?>
<div class="mx-auto text-center mt-20">
  <h2 class="text-2xl font-bold text-slate-900 md:text-3xl">
    Pilih gejala yang Anda rasakan
  </h2>
</div>
<!-- Hero -->
<div class="grid grid-cols-1 place-content-center gap-4 lg:grid-cols-2 mx-auto max-w-screen-xl max-h-screen-xl lg:min-h-[80vh] px-4 py-0 sm:px-6 sm:mb-16 mt-4 lg:px-8 bg-white">
  <div class="h-full rounded-lg">
    <div class="relative max-h-full block rounded-lg border border-slate-300 p-4 sm:p-6 lg:p-8">

      <form id="diagnosa-form" action="/hasil-diagnosa" method="post">
        <?= csrf_field(); ?>
        <p id="diagnosa-status" role="status" class="mb-3 text-sm text-slate-600">Pilih maksimal 8 gejala.</p>
        <div class="inputan pe-5 py-2 block max-h-[50vh] overflow-y-scroll text-slate-800">
          <?php
          $no = 1;
          foreach ($gejalas as $gejala) :
          ?>
            <div class="space-y-2 mb-3 ">
              <label for="<?= $gejala['id']; ?>" class="flex cursor-pointer items-start gap-4 rounded-lg border border-slate-300 p-4 transition-colors hover:bg-slate-50 has-[:checked]:border-teal-700 has-[:checked]:bg-slate-50">
                <div class="flex items-center">
                  <?= $no; ?>
                  &#8203;
                  <input type="checkbox" value="<?= $gejala['kode_gejala']; ?>" class="ms-3 size-4 rounded border-slate-500 check" id="<?= $gejala['id']; ?>" name="<?= $gejala['nama_gejala']; ?>" />
                </div>

                <div>
                  <strong class="font-semibold text-slate-900"> <?= $gejala['nama_gejala']; ?> </strong>
                </div>
              </label>
            </div>
          <?php
            $no++;
          endforeach;
          ?>
        </div>

        <div class="mt-8 d-flex flex-wrap gap-3">
          <button name="submit" class="rounded-md bg-teal-700 px-10 py-3 text-sm font-medium text-white transition-colors hover:bg-teal-800" type="submit">
            Lihat hasil
          </button>
          <button class="rounded-md border border-teal-700 bg-white px-10 py-3 text-sm font-medium text-teal-700 transition-colors hover:bg-slate-100" type="reset">
            Reset pilihan
          </button>
        </div>
      </form>
    </div>
  </div>
  <div class="h-full overflow-hidden rounded-lg">
    <img src="/assets/images/frontend/ilustr-3.jpg" width="2000" height="2000" loading="lazy" alt="Ilustrasi MentalCare" class="block h-full min-h-[240px] w-full object-cover">
  </div>
</div>
<script>
  const diagnosaForm = document.getElementById('diagnosa-form');
  const diagnosaStatus = document.getElementById('diagnosa-status');

  if (diagnosaForm && diagnosaStatus) {
    const checks = Array.from(diagnosaForm.querySelectorAll('input[type="checkbox"]'));

    const updateChecks = () => {
      const selected = checks.filter((check) => check.checked).length;
      checks.forEach((check) => {
        check.disabled = selected >= 8 && !check.checked;
      });
      diagnosaStatus.textContent = selected >= 8
        ? 'Batas 8 gejala tercapai. Hapus salah satu pilihan untuk menggantinya.'
        : 'Pilih maksimal 8 gejala. Terpilih ' + selected + ' gejala.';
    };

    checks.forEach((check) => check.addEventListener('change', updateChecks));
    diagnosaForm.addEventListener('reset', () => {
      window.setTimeout(() => {
        checks.forEach((check) => {
          check.disabled = false;
        });
        diagnosaStatus.textContent = 'Pilih maksimal 8 gejala.';
      });
    });
    updateChecks();
  }
</script>
<?= $this->endsection(); ?>