<div id="app-sidepanel" class="app-sidepanel">
  <div id="sidepanel-drop" class="sidepanel-drop"></div>
  <div class="sidepanel-inner d-flex flex-column">
    <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
    <div class="app-branding">
      <a class="app-logo" href="/Dashboard"><img class="logo-icon me-2" src="<?= base_url('assets/images/logo/logo-2.jpg'); ?>" alt="logo"><span class="logo-text">MentalCare</span></a>

    </div><!--//app-branding-->

    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
      <ul class="app-menu list-unstyled accordion" id="menu-accordion">
        <li class="nav-item">
          <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
          <a class="nav-link <?= ($path == 'Dashboard' ? 'active' : ''); ?>" href="/Dashboard">
            <span class="nav-icon">
              <i style="height: 1.5em; width: 1.5em;" class="fa fa-house"></i>
            </span>
            <span class="nav-link-text">Dashboard</span>
          </a><!--//nav-link-->
          <a class="nav-link <?= ($path == 'Penyakit' ? 'active' : ''); ?>" href="/Penyakit">
            <span class="nav-icon">
              <i style="height: 1.5em; width: 1.5em;" class="fa fa-hospital"></i>
            </span>
            <span class="nav-link-text">Penyakit</span>
          </a><!--//nav-link-->
        </li><!--//nav-item-->
        <li class="nav-item">
          <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
          <a class="nav-link <?= ($path == 'Gejala' ? 'active' : ''); ?>" href="/Gejala">
            <span class="nav-icon">
              <i style="height: 1.5em; width: 1.5em;" class="fa fa-kit-medical"></i>
            </span>
            <span class="nav-link-text">Data Gejala</span>
          </a><!--//nav-link-->
          <a class="nav-link <?= ($path == 'Rule' ? 'active' : ''); ?>" href="/Rule">
            <span class="nav-icon">
              <i style="height: 1.5em; width: 1.5em;" class="fa fa-user-doctor"></i>
            </span>
            <span class="nav-link-text">Data Rule</span>
          </a><!--//nav-link-->
        </li><!--//nav-item-->
        <li class="nav-item">
          <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
          <a class="nav-link <?= ($path == 'Diagnosa' ? 'active' : ''); ?>" href="/Diagnosa">
            <span class="nav-icon">
              <i style="height: 1.5em; width: 1.5em;" class="fa fa-file-medical"></i>
            </span>
            <span class="nav-link-text">Data Diagnosa</span>
          </a>
          <a class="nav-link <?= ($path == 'User' ? 'active' : ''); ?>" href="/User">
            <span class="nav-icon">
              <i style="height: 1.5em; width: 1.5em;" class="fa fa-users"></i>
            </span>
            <span class="nav-link-text">Data User</span>
          </a><!--//nav-link-->
        </li><!--//nav-item-->
      </ul><!--//app-menu-->
    </nav><!--//app-nav-->
    <div class="app-sidepanel-footer">
      <nav class="app-nav app-nav-footer">
        <ul class="app-menu footer-menu list-unstyled">
          <li class="nav-item">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link <?= ($path == 'Profile/' . session()->get('username') ? 'active' : ''); ?>" href="/Profile/<?= session()->get('username'); ?>">
              <span class="nav-icon">
                <i style="height: 1.5em; width: 1.5em;" class="fa-regular fa-id-card"></i>
              </span>
              <span class="nav-link-text">Profile</span>
            </a><!--//nav-link-->
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link" href="/Logout">
              <span class="nav-icon">
                <i style="height: 1.5em; width: 1.5em;" class="fa fa-arrow-right-from-bracket"></i>
              </span>
              <span class="nav-link-text">Logout</span>
            </a><!--//nav-link-->
          </li><!--//nav-item-->
        </ul><!--//footer-menu-->
      </nav>
    </div><!--//app-sidepanel-footer-->

  </div><!--//sidepanel-inner-->
</div><!--//app-sidepanel-->
</header><!--//app-header-->