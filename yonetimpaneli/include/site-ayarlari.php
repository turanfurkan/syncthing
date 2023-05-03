<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Site Ayarları</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
            <li class="breadcrumb-item active">Site Ayarları</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">

      <?php
            $veri = $VT->VeriGetir("ayarlar", "WHERE ID=?", array(1), "", 1);

      if ($_POST) {
        if (!empty($_POST["site_title"])) {
          $site_title = $VT->filter($_POST["site_title"]);
          $site_description = $VT->filter($_POST["site_description"]);
          $site_keywords = $VT->filter($_POST["site_keywords"]);


          if (!empty($_FILES["site_logo"]["name"])) {
            $yukle = $VT->upload("site_logo", "../images/" . "ayarlar" . "/");
            if ($yukle != false) {
              $site_logo=$yukle;
            } else {
              $site_logo=$siteLogo;
      ?>
              <div class="alert alert-info">site_logo_de yükleme işleminiz başarısız.</div>
            <?php
            }
          } else {
            $site_logo=$siteLogo;
          }

          if (!empty($_FILES["site_logo_de"]["name"])) {
            function dosyaYukleBack($takeFile, $newfilenameback)
            {
              move_uploaded_file($takeFile["tmp_name"], "../images/ayarlar/" . $newfilenameback);
              return $newfilenameback;
            }
            $tempback = explode(".", $_FILES["site_logo_de"]["name"]);
            $randback = uniqid(true);
            $newfilenameback = $randback . '.' . end($tempback);


            $site_logo_de = dosyaYukleBack($_FILES["site_logo_de"], $newfilenameback);
          } else {
            $site_logo_de = $siteLogoDe;
          }

          $guncelle = $VT->SorguCalistir("UPDATE settings", "SET site_title=?, site_description=?, site_keywords=?, site_logo=?, site_logo_de=? WHERE ID=?", array($site_title, $site_description, $site_keywords, $site_logo, $site_logo_de, 1), 1);

          if ($guncelle != false) {
            ?>
            <div class="alert alert-success">İşleminiz başarıyla kaydedildi.</div>
            <meta http-equiv="refresh" content="1.5;url=<?= SITE ?>site-ayarlari" />
          <?php
          } else {
          ?>
            <div class="alert alert-danger">İşleminiz sırasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz.</div>
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
                <img class="img-fluid w-25" src="<?= ANASITE ?>images/ayarlar/<?= $siteLogo ?>" alt="">
                <div class="form-group">
                  <label>Logo</label>
                  <input type="file" class="form-control" placeholder="site_logo_de Seçiniz ..." name="site_logo">
                </div>
              </div>
              <div class="col-md-12">
                <img class="img-fluid w-25" src="<?= ANASITE ?>images/ayarlar/<?= $siteLogoDe ?>" alt="">
                <div class="form-group">
                  <label>Logo Almanca</label>
                  <input type="file" class="form-control" placeholder="Almanca Logo Seçiniz ..." name="site_logo_de">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>İsim Soyisim</label>
                  <input type="text" class="form-control" placeholder="İsim Soyisim ..." name="site_title" value="<?= $siteTitle ?>">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Site Açıklama</label>
                  <input type="text" class="form-control" placeholder="Site Açıklaması ..." name="site_description" value="<?= $siteDescription ?>">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Site Anahtar Kelimeleri</label>
                  <input type="text" class="form-control" placeholder="Anahtar Kelime 1, Anahtar Kelime 2,  ..." name="site_keywords" value="<?= $siteKeywords ?>">
                </div>
              </div>
              

              <div class="col-md-12">
                <div class="form-group">
                  <button type="submit" class="btn btn-block btn-primary">GÜNCELLE</button>
                </div>
              </div>
              
            </div>

          </div>
        </div>
      </form>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>