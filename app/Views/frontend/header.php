<?php $currentPath = request()->getPath(); ?>
<header class="sticky top-0 z-50 bg-white shadow-sm">
  <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8 lg:py-2">
    <div class="flex h-16 items-center justify-between">
      <div class="md:flex md:items-center md:gap-12">
        <a class="block text-slate-800 font-semibold" href="/">
          <span class="logo-text">MentalCare</span>
        </a>
      </div>

      <div class="hidden md:block">
        <nav aria-label="Navigasi utama">
          <ul class="flex items-center gap-6 text-base">
            <li>
              <a data-nav-link class="text-slate-700 transition-colors hover:text-teal-700" href="/#beranda">Beranda</a>
            </li>
            <li>
              <a data-nav-link class="text-slate-700 transition-colors hover:text-teal-700" href="/#cara-kerja">Cara kerja</a>
            </li>
            <li>
              <a data-nav-link class="text-slate-700 transition-colors hover:text-teal-700" href="/#about">Tentang</a>
            </li>
            <li>
              <a data-nav-link class="text-slate-700 transition-colors hover:text-teal-700" href="/#lokasi">Lokasi</a>
            </li>
            <li>
              <a data-nav-link class="text-slate-700 transition-colors hover:text-teal-700" href="/data-penyakit" <?= $currentPath === '/data-penyakit' ? 'aria-current="page"' : ''; ?>>Penyakit</a>
            </li>
            <?php if (session()->get('logged_in')) : ?>
              <li>
                <a data-nav-link class="text-slate-700 transition-colors hover:text-teal-700" href="/diagnosa-penyakit" <?= $currentPath === '/diagnosa-penyakit' ? 'aria-current="page"' : ''; ?>>Diagnosa</a>
              </li>
              <li>
                <a data-nav-link class="text-slate-700 transition-colors hover:text-teal-700" href="/riwayat-diagnosa" <?= $currentPath === '/riwayat-diagnosa' ? 'aria-current="page"' : ''; ?>>Riwayat</a>
              </li>
              <li>
                <a data-nav-link class="text-slate-700 transition-colors hover:text-teal-700" href="/info-profile" <?= $currentPath === '/info-profile' ? 'aria-current="page"' : ''; ?>>Profile</a>
              </li>
            <?php endif; ?>
          </ul>
        </nav>
      </div>

      <div class="flex items-center gap-4">
        <div class="sm:flex sm:gap-4">
          <?php if (session()->get('logged_in')) { ?>
            <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-red-600" href="/Logout">
              Logout
            </a>
          <?php } else { ?>
            <a class="rounded-md bg-teal-700 px-5 py-2.5 text-sm font-medium text-white shadow" href="/Login">
              Login
            </a>
            <div class="hidden sm:flex">
              <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-700" href="/Registrasi">
                Register
              </a>
            </div>
          <?php } ?>
        </div>

        <div class="block md:hidden">
          <button id="mobile-menu-button" type="button" class="rounded bg-gray-100 p-3 text-slate-700 transition hover:text-slate-900" aria-label="Buka menu" aria-expanded="false" aria-controls="mobile-menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>

  <nav id="mobile-menu" aria-label="Navigasi seluler" class="hidden border-t border-slate-200 bg-white md:hidden">
    <ul class="space-y-1 px-4 py-3 text-sm font-medium text-slate-700">
      <li><a data-nav-link class="block rounded px-4 py-3" href="/#beranda">Beranda</a></li>
      <li><a data-nav-link class="block rounded px-4 py-3" href="/#cara-kerja">Cara kerja</a></li>
      <li><a data-nav-link class="block rounded px-4 py-3" href="/#about">Tentang</a></li>
      <li><a data-nav-link class="block rounded px-4 py-3" href="/#lokasi">Lokasi</a></li>
      <li><a data-nav-link class="block rounded px-4 py-3" href="/data-penyakit" <?= $currentPath === '/data-penyakit' ? 'aria-current="page"' : ''; ?>>Penyakit</a></li>
      <?php if (session()->get('logged_in')) : ?>
        <li><a data-nav-link class="block rounded px-4 py-3" href="/diagnosa-penyakit" <?= $currentPath === '/diagnosa-penyakit' ? 'aria-current="page"' : ''; ?>>Diagnosa</a></li>
        <li><a data-nav-link class="block rounded px-4 py-3" href="/riwayat-diagnosa" <?= $currentPath === '/riwayat-diagnosa' ? 'aria-current="page"' : ''; ?>>Riwayat</a></li>
        <li><a data-nav-link class="block rounded px-4 py-3" href="/info-profile" <?= $currentPath === '/info-profile' ? 'aria-current="page"' : ''; ?>>Profile</a></li>
        <li><a class="block rounded px-4 py-3" href="/Logout">Logout</a></li>
      <?php else : ?>
        <li><a class="block rounded px-4 py-3" href="/Login">Login</a></li>
        <li><a class="block rounded px-4 py-3" href="/Registrasi">Register</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>
