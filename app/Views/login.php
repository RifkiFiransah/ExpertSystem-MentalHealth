<?= $this->extend('frontend/main'); ?>
<?= $this->section('frontend'); ?>
<section class="bg-white">
  <div class="mx-auto grid max-w-screen-xl gap-10 px-4 py-12 sm:px-6 sm:py-16 lg:grid-cols-2 lg:items-center lg:gap-16 lg:px-8">
    <div>
      <h2 class="text-2xl font-bold leading-snug text-slate-900 md:text-3xl">
        Masuk ke MentalCare
      </h2>
      <p class="mt-4 max-w-xl text-base leading-relaxed text-slate-700">
        Gunakan akun Anda untuk membuka diagnosa, melihat hasil, dan menyimpan riwayat skrining kesehatan mental.
      </p>
      <p class="mt-6 max-w-xl border-t border-slate-200 pt-4 text-sm leading-relaxed text-[#B45309]">
        Hasil skrining bukan diagnosis medis. Untuk bantuan langsung, hubungi tenaga kesehatan atau fasilitas kesehatan terdekat.
      </p>
    </div>

    <div class="rounded-md border border-slate-200 bg-white p-6 sm:p-8">
      <?php if (session()->getFlashdata('success')) : ?>
        <p role="status" class="mb-5 rounded-md border border-teal-700 bg-slate-50 p-4 text-sm leading-relaxed text-teal-700">
          <?= esc(session()->getFlashdata('success')); ?>
        </p>
      <?php endif; ?>

      <?php if (session()->getFlashdata('message')) : ?>
        <p role="alert" class="mb-5 rounded-md border border-[#B45309] bg-slate-50 p-4 text-sm leading-relaxed text-[#B45309]">
          <?= esc(session()->getFlashdata('message')); ?>
        </p>
      <?php endif; ?>

      <form method="post" action="/Login" class="space-y-5">
        <?= csrf_field(); ?>

        <div>
          <label for="user_email" class="block text-sm font-medium text-slate-900">Email</label>
          <input id="user_email" name="user_email" type="email" value="<?= old('user_email'); ?>" autocomplete="email" required class="mt-2 block min-h-11 w-full rounded-md border <?= $validation->hasError('user_email') ? 'border-[#B45309]' : 'border-slate-300'; ?> bg-white px-3 py-2 text-base text-slate-900 transition-colors hover:border-slate-400">
          <?php if ($validation->hasError('user_email')) : ?>
            <p class="mt-1 text-sm text-[#B45309]"><?= esc($validation->getError('user_email')); ?></p>
          <?php endif; ?>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-slate-900">Password</label>
          <input id="password" name="password" type="password" autocomplete="current-password" required class="mt-2 block min-h-11 w-full rounded-md border <?= $validation->hasError('password') ? 'border-[#B45309]' : 'border-slate-300'; ?> bg-white px-3 py-2 text-base text-slate-900 transition-colors hover:border-slate-400">
          <?php if ($validation->hasError('password')) : ?>
            <p class="mt-1 text-sm text-[#B45309]"><?= esc($validation->getError('password')); ?></p>
          <?php endif; ?>
          <label class="mt-3 flex min-h-11 cursor-pointer items-center gap-3 text-sm text-slate-700">
            <input id="tampil-password" type="checkbox" class="size-4 rounded border-slate-500">
            Tampilkan password
          </label>
        </div>

        <button type="submit" class="inline-flex min-h-11 w-full items-center justify-center rounded-md bg-teal-700 px-5 py-3 text-sm font-semibold text-white transition-colors hover:bg-teal-800">
          Masuk ke akun
        </button>
        <a href="/" class="inline-flex min-h-11 w-full items-center justify-center rounded-md border border-slate-300 px-5 py-3 text-sm font-medium text-slate-800 transition-colors hover:bg-slate-100">
          Kembali ke beranda
        </a>
      </form>

      <p class="mt-6 border-t border-slate-200 pt-4 text-sm leading-relaxed text-slate-700">
        Belum punya akun?
        <a href="/Registrasi" class="font-medium text-teal-700 transition-colors hover:text-teal-800">Buat akun</a>
      </p>
    </div>
  </div>
</section>

<script>
  const passwordField = document.getElementById('password');
  const passwordToggle = document.getElementById('tampil-password');

  if (passwordField && passwordToggle) {
    passwordToggle.addEventListener('change', () => {
      passwordField.type = passwordToggle.checked ? 'text' : 'password';
    });
  }
</script>
<?= $this->endsection(); ?>
