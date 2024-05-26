<header class="sticky top-0 z-50 bg-white shadow-lg">
  <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8 lg:py-2">
    <div class="flex h-16 items-center justify-between">
      <div class="md:flex md:items-center md:gap-12">
        <a class="block text-dark-600 font-semibold uppercase" href="/">
          <!-- <span class="sr-only">SehatMental</span> -->
          <img class="h-16 inline-block" src="<?= base_url('assets/images/logo/logo-2.jpg'); ?>" alt="logo">
          <span class="logo-text">MentalCare</span>
        </a>
      </div>

      <div class="hidden md:block">
        <nav aria-label="Global">
          <ul class="flex items-center gap-6 text-md">
            <li>
              <a class="<?= (request()->getPath() == "#beranda") ? 'text-black-900' : 'text-dark-500'; ?> transition hover:text-gray-500/75" href="/index.php#beranda"> Beranda </a>
            </li>

            <li>
              <a class="text-dark-500 transition hover:text-gray-500/75" href="/index.php#about"> Tentang </a>
            </li>
            <li>
              <a class="text-dark-500 transition hover:text-gray-500/75" href="/index.php#lokasi"> Lokasi </a>
            </li>
            <li>
              <a class="text-dark-500 transition hover:text-gray-500/75" href="/data-penyakit"> Penyakit </a>
            </li>
            <?php
            if (session()->get('logged_in')) {
            ?>
              <li>
                <a class="text-dark-500 transition hover:text-gray-500/75" href="/diagnosa-penyakit"> Diagnosa </a>
              </li>

              <li>
                <a class="text-dark-500 transition hover:text-gray-500/75" href="/riwayat-diagnosa"> Riwayat </a>
              </li>

              <li>
                <a class="text-dark-500 transition hover:text-gray-500/75" href="/info-profile"> Profile </a>
              </li>
            <?php
            }
            ?>
          </ul>
        </nav>
      </div>

      <div class="flex items-center gap-4">
        <div class="sm:flex sm:gap-4">
          <?php
          if (session()->get('logged_in')) { ?>
            <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-red-600" href="/Logout">
              Logout
            </a>
          <?php
          } else { ?>
            <a class="rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white shadow" href="/Login">
              Login
            </a>
            <div class="hidden sm:flex">
              <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600" href="/Registrasi">
                Register
              </a>
            </div>
          <?php
          }
          ?>
        </div>

        <div class="block md:hidden">
          <button class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</header>