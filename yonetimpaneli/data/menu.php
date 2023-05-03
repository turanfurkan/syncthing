<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= SITE ?>" class="brand-link w-100 text-center">

    <img src="<?= SITE ?>uploads/bmq.png" alt="AdminLTE Logo" class="img-fluid" style="opacity: .8" width="100"> </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= SITE ?>uploads/home/" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $user[0]["user_fullname"] ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= SITE ?>dil-ayarlari" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dil Ayarları

            </p>
          </a>
        </li>
        <?php
        $pages = $VT->VeriGetir("pages", "WHERE lang_id=?", array(1), "ORDER BY page_id ASC");
        if ($pages != false) {
          foreach ($pages as $page) {
        ?>
            <li class="nav-item">
              <a href="<?= SITE ?>sayfa/<?= $page["page_seflink"] ?>" class="nav-link">
                <?= stripslashes($page["page_icon"]) ?>
                <p>
                  <?= stripslashes($page["page_title"]) ?> Yönetimi

                </p>
              </a>
            </li>
        <?php
          }
        }

        ?>
        <li class="nav-item">
          <a href="<?= SITE ?>makaleler" class="nav-link">
            <i class="nav-icon fa-solid fa-blog"></i>
            <p>
              Makaleler
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= SITE ?>site-ayarlari" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Site Ayarları
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= SITE ?>sosyal-medya-ayarlari" class="nav-link">
            <i class="nav-icon fa-solid fa-hashtag"></i>
            <p>
              Sosyal Medya Ayarları
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= SITE ?>iletisim-ayarlari" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>
              İletişim Ayarları
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= SITE ?>smtp-ayarlari" class="nav-link">
            <i class="nav-icon fa-solid fa-envelope"></i>
            <p>
              Mail SMTP Ayarları
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= SITE ?>kullanici-ayarlari" class="nav-link">
            <i class="nav-icon fa fa-user-cog"></i>
            <p>
              Kullanıcı Ayarları
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= SITE ?>cikis" class="nav-link">
            <i class="nav-icon fas fa-power-off"></i>
            <p>
              Çıkış Yap
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>