<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
  <script defer src="https://cdn.tailwindcss.com"></script>
  <style>
    body { background: #F8FAFC; color: #0F172A; font-family: "Segoe UI", system-ui, sans-serif; }
    section[id] { scroll-margin-top: 5rem; }
    [data-nav-link] { padding-bottom: 2px; }
    [data-nav-link][aria-current] { color: #0F766E; font-weight: 600; box-shadow: inset 0 -2px 0 #0F766E; }
    #mobile-menu [data-nav-link] { padding-bottom: 0; }
    #mobile-menu [data-nav-link][aria-current] { box-shadow: none; background: #F1F5F9; }
    .sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border-width: 0; }
    :focus-visible { outline: 2px solid #0f766e !important; outline-offset: 2px; }
    a[href], button, summary, select, label[for], [role="button"], input[type="checkbox"], input[type="radio"], input[type="submit"], input[type="button"], input[type="reset"], input[type="file"] { cursor: pointer !important; }
    :disabled, [aria-disabled="true"] { cursor: not-allowed !important; }
    @media (prefers-reduced-motion: reduce) { *, *::before, *::after { animation-duration: .01ms !important; animation-iteration-count: 1 !important; transition-duration: .01ms !important; scroll-behavior: auto !important; } }
  </style>
  <link rel="shortcut icon" href="<?= base_url('assets/images/logo/logo-2.jpg'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-[60] focus:rounded focus:bg-white focus:px-4 focus:py-2 focus:text-slate-900">Lewati ke konten</a>

  <!-- Header -->
  <?= $this->include('frontend/header'); ?>
  <!-- Header -->

  <!-- Content -->
  <main id="main-content">
    <h1 class="sr-only"><?= $pageHeading ?? $title; ?></h1>
    <?= $this->renderSection('frontend'); ?>
  </main>
  <!-- Content -->

  <!-- footer -->
  <?= $this->include('frontend/footer'); ?>
  <!-- footer -->

  <script>
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuButton && mobileMenu) {
      const setMenu = (open) => {
        mobileMenu.classList.toggle('hidden', !open);
        menuButton.setAttribute('aria-expanded', String(open));
        menuButton.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
      };

      menuButton.addEventListener('click', () => {
        setMenu(mobileMenu.classList.contains('hidden'));
      });

      document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
          setMenu(false);
          menuButton.focus();
        }
      });
    }

    const navLinks = Array.from(document.querySelectorAll('[data-nav-link]'));
    const sectionLinks = navLinks.filter((link) => (link.getAttribute('href') || '').includes('#'));
    const sections = sectionLinks
      .map((link) => document.getElementById(link.getAttribute('href').split('#')[1]))
      .filter(Boolean);

    const setActiveSection = (id) => {
      sectionLinks.forEach((link) => {
        const isActive = link.getAttribute('href') === '/#' + id;

        if (isActive) {
          link.setAttribute('aria-current', 'location');
        } else if (link.getAttribute('aria-current') === 'location') {
          link.removeAttribute('aria-current');
        }
      });
    };

    if ('IntersectionObserver' in window && sections.length) {
      const observer = new IntersectionObserver((entries) => {
        const visible = entries
          .filter((entry) => entry.isIntersecting)
          .sort((a, b) => a.boundingClientRect.top - b.boundingClientRect.top);

        if (visible.length) {
          setActiveSection(visible[0].target.id);
        }
      }, { rootMargin: '-80px 0px -55% 0px', threshold: 0 });

      sections.forEach((section) => observer.observe(section));
    }
  </script>
</body>

</html>