 <!-- Menu -->
 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
   <div class="app-brand justify-content-center">
     <a href="./dashboard" class="app-brand-link">
       <span class="app-brand-logo demo"></span>
       <span class="app-brand-text demo menu-text fw-bolder m-3 h4">Job Portal</span>
     </a>

     <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
       <i class="bx bx-chevron-left bx-sm align-middle"></i>
     </a>
   </div>

   <ul class="menu-inner py-1">
     <?php
      $get_sidebar_data = $helpers->get_sidebar_data($LOGIN_USER->role);

      foreach ($get_sidebar_data as $menu) :
        $menu = (object)$menu;
        $config = (object)$menu->config;

        if ($config->is_dropdown) :
          $dropdownActive = $helpers->is_self_in_dropdown($_SERVER["PHP_SELF"], $config->dropdown_data) ? "active open" : "";
      ?>
         <li class="menu-item <?= $dropdownActive ?>">
           <a href="javascript:void(0);" class="menu-link menu-toggle">
             <i class="menu-icon tf-icons <?= $config->icon ?>"></i>
             <div><?= $menu->title ?></div>
           </a>

           <ul class="menu-sub">
             <?php
              foreach ($config->dropdown_data as $dropdown) :
                $dropdown = (object)$dropdown;
              ?>
               <li class="menu-item <?= $helpers->is_active_menu($dropdown->url, $_SERVER["PHP_SELF"]) ?>">
                 <a href="<?= $dropdown->url ?>" class="menu-link">
                   <div><?= $dropdown->title ?></div>
                 </a>
               </li>
             <?php endforeach; ?>
           </ul>
         </li>
       <?php else : ?>
         <li class="menu-item <?= $helpers->is_active_menu($config->url, $_SERVER["PHP_SELF"]) ?>">
           <a href="<?= $config->url ?>" class="menu-link">
             <i class="menu-icon tf-icons <?= $config->icon ?>"></i>
             <div><?= $menu->title ?></div>
           </a>
         </li>
       <?php endif; ?>
     <?php endforeach; ?>

     <!-- Layouts -->
   </ul>
 </aside>
 <!-- / Menu -->