<?= $this->extend('frontend/main'); ?>
<?= $this->section('frontend'); ?>
<section class="overflow-hidden min-h-[30vh] bg-white mx-auto max-w-screen-lg px-4 py-4 sm:px-6 sm:pt-2 lg:px-8 mt-8 mb-32">
  <div class="flex items-center justify-center px-8 py-4 sm:px-12 lg:col-span-7 lg:px-16 lg:pt-4 lg:pb-10 xl:col-span-6">
    <div class="min-w-full lg:min-w-full">
      <h2 class="mt-0 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
        Profil
      </h2>

      <p class="mt-4 leading-relaxed text-slate-700">
        Anda dapat mengubah identitas diri melalui formulir di bawah ini.
      </p>

      <?php
      if (session()->getFlashdata('message')) {
      ?>
        <div class="mt-4">
          <div class="flex items-center justify-between gap-4 rounded-lg bg-teal-700 px-4 py-3 text-white">
            <p class="text-sm font-medium">
              <?= session()->getFlashdata('message'); ?>
            </p>
          </div>
        </div>
      <?php } ?>

      <form action="/update-profile" method="post" class="mt-4 grid grid-cols-6 gap-6">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $user['id']; ?>">
        <div class="col-span-6">
          <label for="nama-lengkap" class="block text-sm font-medium text-gray-700">
            Nama Lengkap
          </label>

          <input type="text" id="nama-lengkap" name="nama_lengkap" class="mt-1 w-full py-3 px-2  outline-teal-700 rounded-md border border-teal-700 bg-white text-sm text-gray-700 shadow-md" value="<?= $user['nama_lengkap']; ?>" />
        </div>

        <div class="col-span-6">
          <label for="username" class="block text-sm font-medium text-gray-700">
            Username
          </label>

          <input type="text" id="username" name="username" class="mt-1 w-full py-3 px-2  outline-teal-700 rounded-md border border-teal-700 bg-white text-sm text-gray-700 shadow-md" value="<?= $user['username']; ?>" />
        </div>

        <div class="col-span-6">
          <label for="user_email" class="block text-sm font-medium text-gray-700"> Email </label>

          <input type="email" id="user_email" name="user_email" class="mt-1 w-full py-3 px-2  outline-teal-700 rounded-md border border-teal-700 bg-white text-sm text-gray-700 shadow-md" value="<?= $user['user_email']; ?>" />
        </div>

        <div class="col-span-6">
          <label for="no_telp" class="block text-sm font-medium text-gray-700"> No Telp </label>

          <input type="number" id="no_telp" name="no_telp" class="mt-1 w-full py-3 px-2  outline-teal-700 rounded-md border border-teal-700 bg-white text-sm text-gray-700 shadow-md" value="<?= $user['no_telp']; ?>" />
        </div>

        <div class="col-span-6">
          <label for="alamat" class="block text-sm font-medium text-gray-700"> Alamat </label>

          <textarea id="alamat" name="alamat" class="mt-1 w-full py-3 px-2  outline-teal-700 rounded-md border border-teal-700 bg-white text-sm text-gray-700 shadow-md"><?= $user['alamat']; ?></textarea>
        </div>

        <div class="col-span-6">
          <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
          <input type="hidden" name="old_password" value="<?= $user['password']; ?>">
          <input type="password" id="password" name="password" class="mt-1 w-full py-3 px-2  outline-teal-700 rounded-md border border-teal-700 bg-white text-sm text-gray-700 shadow-md" placeholder="Kosongkan jika tidak ingin mengubah password" />
        </div>

        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
          <button class="inline-block shrink-0 rounded-md border border-teal-700 bg-teal-700 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-teal-700 focus:outline-none focus:ring active:text-teal-800" type="submit">
            Simpan perubahan
          </button>
        </div>
      </form>
    </div>
  </div>
</section>
<?= $this->endsection(); ?>