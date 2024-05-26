<?= $this->extend('frontend/main'); ?>
<?= $this->section('frontend'); ?>
<section class="overflow-hidden min-h-[30vh] bg-white mx-auto max-w-screen-lg px-4 py-4 sm:px-6 sm:pt-2 lg:px-8 mt-8 mb-32">
  <main class="flex items-center justify-center px-8 py-4 sm:px-12 lg:col-span-7 lg:px-16 lg:pt-4 lg:pb-10 xl:col-span-6">
    <div class="min-w-full lg:min-w-full">
      <h1 class="mt-0 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
        Profile <i class="fa fa-id-badge"></i>
      </h1>

      <p class="mt-4 leading-relaxed text-gray-500">
        Anda dapat mengubah identitas diri, dengan mengedit inputan dibawah ini
      </p>

      <?php
      if (session()->getFlashdata('message')) {
      ?>
        <div class="mt-4">
          <div class="flex items-center justify-between gap-4 rounded-lg bg-teal-600 px-4 py-3 text-white shadow-lg">
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
          <label for="FirstName" class="block text-sm font-medium text-gray-700">
            Nama Lengkap
          </label>

          <input type="text" id="FirstName" name="nama_lengkap" class="mt-1 w-full py-3 px-2  outline-teal-600 rounded-md border border-teal-500 bg-white text-sm text-gray-700 shadow-md" value="<?= $user['nama_lengkap']; ?>" />
        </div>

        <div class="col-span-6">
          <label for="LastName" class="block text-sm font-medium text-gray-700">
            Username
          </label>

          <input type="text" id="LastName" name="username" class="mt-1 w-full py-3 px-2  outline-teal-600 rounded-md border border-teal-500 bg-white text-sm text-gray-700 shadow-md" value="<?= $user['username']; ?>" />
        </div>

        <div class="col-span-6">
          <label for="user_email" class="block text-sm font-medium text-gray-700"> Email </label>

          <input type="email" id="user_email" name="user_email" class="mt-1 w-full py-3 px-2  outline-teal-600 rounded-md border border-teal-500 bg-white text-sm text-gray-700 shadow-md" value="<?= $user['user_email']; ?>" />
        </div>

        <div class="col-span-6">
          <label for="no_telp" class="block text-sm font-medium text-gray-700"> No Telp </label>

          <input type="number" id="no_telp" name="no_telp" class="mt-1 w-full py-3 px-2  outline-teal-600 rounded-md border border-teal-500 bg-white text-sm text-gray-700 shadow-md" value="<?= $user['no_telp']; ?>" />
        </div>

        <div class="col-span-6">
          <label for="alamat" class="block text-sm font-medium text-gray-700"> Alamat </label>

          <textarea id="alamat" name="alamat" class="mt-1 w-full py-3 px-2  outline-teal-600 rounded-md border border-teal-500 bg-white text-sm text-gray-700 shadow-md"><?= $user['alamat']; ?></textarea>
        </div>

        <div class="col-span-6">
          <label for="password" class="block text-sm font-medium text-gray-700"> password </label>
          <input type="hidden" name="old_password" value="<?= $user['password']; ?>">
          <input type="password" id="password" name="password" class="mt-1 w-full py-3 px-2  outline-teal-600 rounded-md border border-teal-500 bg-white text-sm text-gray-700 shadow-md" placeholder="kosongkan jika tidak ingin mengubah password" />
        </div>

        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
          <button class="inline-block shrink-0 rounded-md border border-teal-600 bg-teal-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-teal-600 focus:outline-none focus:ring active:text-teal-500" type="submit">
            Update Profile
          </button>
        </div>
      </form>
    </div>
  </main>
</section>
<?= $this->endsection(); ?>