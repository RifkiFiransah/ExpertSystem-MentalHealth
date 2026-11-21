<?= $this->extend('frontend/main'); ?>
<?= $this->section('frontend'); ?>
<section class="bg-white">
  <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 sm:py-16 lg:px-8">
    <div class="mx-auto max-w-3xl">
      <h2 class="text-2xl font-bold leading-snug text-slate-900 md:text-3xl">
        Buat akun MentalCare
      </h2>
      <p class="mt-4 text-base leading-relaxed text-slate-700">
        Akun dipakai untuk menyimpan hasil skrining dan riwayat Anda. Isi data berikut dengan informasi yang dapat dihubungi.
      </p>
    </div>

    <div class="mx-auto mt-8 max-w-3xl rounded-md border border-slate-200 bg-white p-6 sm:p-8">
      <form method="post" action="/Registrasi" class="space-y-5">
        <?= csrf_field(); ?>

        <div class="grid gap-5 sm:grid-cols-2">
          <div>
            <label for="nama_lengkap" class="block text-sm font-medium text-slate-900">Nama lengkap</label>
            <input id="nama_lengkap" name="nama_lengkap" type="text" value="<?= old('nama_lengkap'); ?>" autocomplete="name" required class="mt-2 block min-h-11 w-full rounded-md border <?= $validation->hasError('nama_lengkap') ? 'border-[#B45309]' : 'border-slate-300'; ?> bg-white px-3 py-2 text-base text-slate-900 transition-colors hover:border-slate-400">
            <?php if ($validation->hasError('nama_lengkap')) : ?>
              <p class="mt-1 text-sm text-[#B45309]"><?= esc($validation->getError('nama_lengkap')); ?></p>
            <?php endif; ?>
          </div>

          <div>
            <label for="user_email" class="block text-sm font-medium text-slate-900">Email</label>
            <input id="user_email" name="user_email" type="email" value="<?= old('user_email'); ?>" autocomplete="email" required class="mt-2 block min-h-11 w-full rounded-md border <?= $validation->hasError('user_email') ? 'border-[#B45309]' : 'border-slate-300'; ?> bg-white px-3 py-2 text-base text-slate-900 transition-colors hover:border-slate-400">
            <?php if ($validation->hasError('user_email')) : ?>
              <p class="mt-1 text-sm text-[#B45309]"><?= esc($validation->getError('user_email')); ?></p>
            <?php endif; ?>
          </div>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-slate-900">Password</label>
          <input id="password" name="password" type="password" autocomplete="new-password" required class="mt-2 block min-h-11 w-full rounded-md border <?= $validation->hasError('password') ? 'border-[#B45309]' : 'border-slate-300'; ?> bg-white px-3 py-2 text-base text-slate-900 transition-colors hover:border-slate-400">
          <?php if ($validation->hasError('password')) : ?>
            <p class="mt-1 text-sm text-[#B45309]"><?= esc($validation->getError('password')); ?></p>
          <?php endif; ?>
          <label class="mt-3 flex min-h-11 cursor-pointer items-center gap-3 text-sm text-slate-700">
            <input id="tampil-password" type="checkbox" class="size-4 rounded border-slate-500">
            Tampilkan password
          </label>
        </div>

        <div class="grid gap-5 sm:grid-cols-2">
          <div>
            <label for="no_telp" class="block text-sm font-medium text-slate-900">Nomor telepon</label>
            <input id="no_telp" name="no_telp" type="tel" value="<?= old('no_telp'); ?>" autocomplete="tel" required class="mt-2 block min-h-11 w-full rounded-md border <?= $validation->hasError('no_telp') ? 'border-[#B45309]' : 'border-slate-300'; ?> bg-white px-3 py-2 text-base text-slate-900 transition-colors hover:border-slate-400">
            <?php if ($validation->hasError('no_telp')) : ?>
              <p class="mt-1 text-sm text-[#B45309]"><?= esc($validation->getError('no_telp')); ?></p>
            <?php endif; ?>
          </div>

          <div>
            <label for="alamat" class="block text-sm font-medium text-slate-900">Alamat</label>
            <input id="alamat" name="alamat" type="text" value="<?= old('alamat'); ?>" autocomplete="street-address" required class="mt-2 block min-h-11 w-full rounded-md border <?= $validation->hasError('alamat') ? 'border-[#B45309]' : 'border-slate-300'; ?> bg-white px-3 py-2 text-base text-slate-900 transition-colors hover:border-slate-400">
            <?php if ($validation->hasError('alamat')) : ?>
              <p class="mt-1 text-sm text-[#B45309]"><?= esc($validation->getError('alamat')); ?></p>
            <?php endif; ?>
          </div>
        </div>

        <p role="note" class="rounded-md border border-slate-200 bg-slate-50 p-4 text-sm leading-relaxed text-slate-700">
          Data yang Anda masukkan dipakai untuk proses skrining di MentalCare. Hasil skrining bukan diagnosis medis.
        </p>

        <button type="submit" class="inline-flex min-h-11 w-full items-center justify-center rounded-md bg-teal-700 px-5 py-3 text-sm font-semibold text-white transition-colors hover:bg-teal-800">
          Buat akun
        </button>
      </form>

      <p class="mt-6 border-t border-slate-200 pt-4 text-sm leading-relaxed text-slate-700">
        Sudah punya akun?
        <a href="/Login" class="font-medium text-teal-700 transition-colors hover:text-teal-800">Masuk</a>
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
