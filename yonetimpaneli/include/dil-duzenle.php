<?php
if (!empty($_GET["ID"])) {
  $ID = $VT->filter($_GET["ID"]);
  $lang_id = $VT->filter($_GET["lang_id"]);
  $veri = $VT->VeriGetir("navmenu", "WHERE ID=?", array($ID), "ORDER BY ID ASC", 1);
  if ($veri != false) {
    $languages = $VT->VeriGetir("languages", "WHERE lang_id=?", array($lang_id), "ORDER BY lang_id ASC", 1);

    if ($lang_id != 1) {
      $kontrol = $VT->VeriGetir("navmenu", "WHERE parent_id=? and lang_id=?", array($ID, $lang_id), "");
      if ($kontrol != false) {
        $c_menu_title = stripslashes($kontrol[0]["menu_title"]);
      } else {
        $c_menu_title = "";
      }
    } else {
      $c_menu_title = $veri[0]["menu_title"];
    }

?>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><?= stripslashes($languages[0]["lang_title"]) ?> Menü Dili Sayfası</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                <li class="breadcrumb-item active">Menü Dili</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <a href="<?= SITE ?>menu" class="btn btn-info" style="float:left; margin-bottom:10px; margin-left:10px;"><i class="fas fa-arrow-left"></i> GERİ</a>

            </div>
          </div>
          <?php
          if ($_POST) {

            if (!empty($_POST["menu_title"])) {
              $lang_id = $languages[0]["lang_id"];
              $parent_id = $ID;
              $menu_title = $VT->filter($_POST["menu_title"]);
              $menu_seflink = $veri[0]["menu_seflink"];
              $status = 1;
              if ($lang_id != 1) {

              if ($kontrol != false) {
                $ekle = $VT->SorguCalistir("UPDATE " .  "navmenu", "SET menu_title=? WHERE ID=?", array($menu_title, $kontrol[0]["ID"]), 1);
              } else {
                $ekle = $VT->SorguCalistir("INSERT INTO " .  "navmenu", "SET lang_id=?, parent_id=?, status=?, menu_title=?, menu_seflink=?", array($lang_id, $parent_id, $status, $menu_title, $menu_seflink));
              }
            }
            else
            {
              $ekle = $VT->SorguCalistir("UPDATE " .  "navmenu", "SET menu_title=? WHERE ID=?", array($menu_title, $veri[0]["ID"]), 1);
            }
              if ($ekle != false) {
          ?>
                <div class="alert alert-success">İşleminiz başarılı bir şekilde gerçekleşti. Menü sayfasına yönlendiriliyorsunuz.</div>
                <meta http-equiv="refresh" content="1.3; url=<?= SITE ?>menu">
              <?php
              } else {
              ?>
                <div class="alert alert-danger">İşleminiz sırasında bir hata oluştu. Lütfen daha sonra tekrar deneyin.</div>
              <?php
              }
            } else {
              ?>
              <div class="alert alert-danger">Boş bıraktığınız alanları doldurunuz.</div>
          <?php
            }
          }
          ?>
          <form class="row justify-content-center" action="#" method="post" enctype="multipart/form-data">
            <div class="col-md-8">
              <div class="card-body card card-primary">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Türkçe Menü Başlığı</label>
                      <input type="text" class="form-control" value="<?= $veri[0]["menu_title"] ?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?= stripslashes($languages[0]["lang_title"]) ?> Başlık</label>
                      <input type="text" class="form-control" value="<?= $c_menu_title ?>" name="menu_title">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-block btn-primary">KAYDET</button>
                    </div>
                  </div>

                  <!-- /.row -->
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </form>

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

  <?php
  } else {
  ?>
    <meta http-equiv="refresh" content="0;url=<?= SITE ?>menu">
  <?php
  }
} else {
  ?>
  <meta http-equiv="refresh" content="0;url=<?= SITE ?>">
<?php
}
?>