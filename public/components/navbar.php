<div class="site-mobile-menu site-navbar-target">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle" id="closeCanvas"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div> <!-- .site-mobile-menu -->


<!-- NAVBAR -->
<header class="site-navbar mt-3">
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="site-logo col-6">
        <a href="<?= SERVER_NAME . "/views/home" ?>">Job Portal</a>
      </div>

      <nav class="mx-auto site-navigation">
        <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
          <?php
          $get_navbar_data = $helpers->get_public_links();

          foreach ($get_navbar_data as $menu) :
            $menu = (object)$menu;
            $config = (object)$menu->config;
            if ($config->is_dropdown) :
              $dropdownActive = $helpers->is_self_in_dropdown($_SERVER["PHP_SELF"], $config->dropdown_data) ? "active" : "";
          ?>
              <li class="has-children">
                <a href="javascript:void(0)" class="<?= $dropdownActive ?>">
                  <?= $menu->title ?>
                </a>
                <ul class="dropdown">
                  <?php
                  foreach ($config->dropdown_data as $dropdown) :
                    $dropdown = (object)$dropdown;
                  ?>
                    <li>
                      <a href="<?= $dropdown->url ?>" class="<?= $helpers->is_active_menu($dropdown->url, $_SERVER["PHP_SELF"]) ?>">
                        <?= $dropdown->title ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </li>
            <?php else : ?>
              <li>
                <a href="<?= $config->url ?>" class="nav-link <?= $helpers->is_active_menu($config->url, $_SERVER["PHP_SELF"]) ?>">
                  <?= $menu->title ?>
                </a>
              </li>
            <?php endif; ?>
          <?php endforeach ?>

          <?php if (!$LOGIN_USER) : ?>
            <li class="d-lg-none">
              <a href="<?= SERVER_NAME . "/views/sign-in" ?>"> Sign In </a>
            </li>
          <?php else : ?>
            <li class="d-lg-none">
              <a class="dropdown-item" href="#">My Profile</a>
            </li>
            <li class="d-lg-none">
              <a class="dropdown-item" href="#">My Jobs</a>
            </li>
            <li class="d-lg-none">
              <a class="dropdown-item" href="<?= SERVER_NAME . "/backend/nodes?action=logout" ?>">Logout</a>
            </li>
          <?php endif; ?>
        </ul>
      </nav>

      <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
        <div class="ml-auto">
          <?php if (!$LOGIN_USER) : ?>
            <a href=" <?= SERVER_NAME . "/views/sign-in" ?>" class="btn btn-primary border-width-2 d-none d-lg-inline-block">
              <span class="mr-2 icon-lock_outline"></span>
              Sign In
            </a>
          <?php else : ?>
            <div class="avatar d-none d-lg-inline-block" id="avatarDropdown" data-toggle="dropdown"><!-- avatar-online -->
              <img src="<?= $helpers->get_avatar_link($LOGIN_USER->id) ?>" class="avatar rounded-circle" style="object-fit: cover" />
            </div>
            <div class="dropdown-menu" aria-labelledby="avatarDropdown">
              <h4 class="dropdown-header h4">
                <strong><?= $LOGIN_USER->email ?></strong>
              </h4>
              <a class="dropdown-item" href="#">My Profile</a>
              <a class="dropdown-item" href="#">My Jobs</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?= SERVER_NAME . "/backend/nodes?action=logout" ?>">Logout</a>
            </div>
          <?php endif; ?>
        </div>

        <a href="javascript:void(0)" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3">
          <span class="icon-menu h3 m-0 p-0 mt-2"></span>
        </a>
      </div>

    </div>
  </div>
</header>