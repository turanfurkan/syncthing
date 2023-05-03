<?php
if (!empty($_GET["tablo"]) && !empty($_GET["ID"])) {
  $tablo = $VT->filter($_GET["tablo"]);
  $ID = $VT->filter($_GET["ID"]);
  $lang_id = $VT->filter($_GET["lang_id"]);
  $kontrol = $VT->VeriGetir("moduller", "WHERE tablo=? AND durum=?", array($tablo, 1), "ORDER BY ID ASC", 1);
  if ($kontrol != false) {
    $veri = $VT->VeriGetir($kontrol[0]["tablo"], "WHERE ID=?", array($ID), "ORDER BY ID ASC", 1);
    if ($veri != false) {
      $tablo = $kontrol[0]["tablo"];

      if ($lang_id != 1) {
        $kontrol_t = $VT->VeriGetir($kontrol[0]["tablo"], "WHERE parent_id=? and lang_id=?", array($ID, $lang_id), "");
        if ($kontrol_t != false) {
          $c_baslik = stripslashes($kontrol_t[0]["baslik"]);
          $c_metin = stripslashes($kontrol_t[0]["metin"]);
          $c_resim = stripslashes($kontrol_t[0]["resim"]);
          $c_adres = stripslashes($kontrol_t[0]["anahtar"]);
          $c_harita = stripslashes($kontrol_t[0]["description"]);
          $c_alt_slide_aciklama = stripslashes($kontrol_t[0]["alt_slide_aciklama"]);
        } else {
          $c_baslik = "";
          $c_metin = "";
          $c_resim = "";
          $c_adres = "";
          $c_harita = "";
          $c_alt_slide_aciklama = "";
        }
      } else {
        $c_baslik = stripslashes($veri[0]["baslik"]);
        $c_metin = stripslashes($veri[0]["metin"]);
        $c_resim = stripslashes($veri[0]["resim"]);
        $c_adres = stripslashes($veri[0]["anahtar"]);
        $c_harita = stripslashes($veri[0]["description"]);
      }
?>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?= $kontrol[0]["baslik"] ?> Düzenleme Sayfası</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                  <li class="breadcrumb-item active"><?= $kontrol[0]["baslik"] ?></li>
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
                <a href="<?= SITE ?>liste/<?= $kontrol[0]["tablo"] ?>" class="btn btn-info" style="float:right; margin-bottom:10px; margin-left:10px;"><i class="fas fa-bars"></i> LİSTE</a>
                <a href="<?= SITE ?>ekle/<?= $kontrol[0]["tablo"] ?>" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> YENİ EKLE</a>
              </div>
            </div>
            <?php
            if ($_POST) {
              if (!empty($_POST["kategori"]) && !empty($_POST["baslik"])) {
                $kategori = $VT->filter($_POST["kategori"]);
                $baslik = $VT->filter($_POST["baslik"]);
                $seflink = $VT->seflink($baslik);
                $metin = $VT->filter($_POST["metin"], true);
                if ($kontrol[0]["tablo"] == "projeler") {

                  $durum = 1;
                  $anahtar = "";
                  $description ="";
                } else {
                  $durum = 1;

                  $anahtar = NULL;
                  $description = NULL;
                }

                if (!empty($_FILES["resim"]["name"])) {
                  function dosyaYukleBack($takeFile, $newfilenameback)
                  {
                    move_uploaded_file($takeFile["tmp_name"], "uploads/" . $newfilenameback);
                    return $newfilenameback;
                  }
                  $tempback = explode(".", $_FILES["resim"]["name"]);
                  $randback = uniqid(true);
                  $newfilenameback = $randback . '.' . end($tempback);


                  $resim = dosyaYukleBack($_FILES["resim"], $newfilenameback);
                } else {
                  $resim = $veri[0]["resim"];
                }



                if ($lang_id != 1) {
                  $parent_id = $ID;
                  if ($kontrol_t != false) {
                    $ekle = $VT->SorguCalistir("UPDATE " . $kontrol[0]["tablo"], "SET baslik=?, seflink=?, kategori=?, metin=?, resim=?, anahtar=?, description=?,  durum=?, tarih=? WHERE ID=?", array($baslik, $seflink, $kategori, $metin, $resim, $anahtar, $description, $durum, date("Y-m-d"), $kontrol_t[0]["ID"]));
                  } else {
                    $ekle = $VT->SorguCalistir("INSERT INTO " . $kontrol[0]["tablo"], "SET lang_id=?, parent_id=?, baslik=?, seflink=?, kategori=?, metin=?, resim=?, anahtar=?, description=?, durum=?, tarih=?", array($lang_id, $parent_id, $baslik, $seflink, $kategori, $metin, $resim, $anahtar, $description, $durum, date("Y-m-d")));
                  }
                } else {
                  $parent_id = 0;
                  $ekle = $VT->SorguCalistir("UPDATE " . $kontrol[0]["tablo"], "SET baslik=?, seflink=?, kategori=?, metin=?, resim=?, anahtar=?, description=?, durum=?, tarih=? WHERE ID=?", array($baslik, $seflink, $kategori, $metin, $resim, $anahtar, $description, $durum, date("Y-m-d"), $veri[0]["ID"]));
                }
                if ($kontrol[0]["tablo"] == "projeler") {

                  if (!empty($_FILES["catalog_file"]["name"])) {
                    function dosyaYukleBack($takeFile, $newfilenameback)
                    {
                      move_uploaded_file($takeFile["tmp_name"], "uploads/" . $newfilenameback);
                      return $newfilenameback;
                    }
                    $tempback = explode(".", $_FILES["catalog_file"]["name"]);
                    $randback = uniqid(true);
                    $newfilenameback = $randback . '.' . end($tempback);


                    $catalog_file = dosyaYukleBack($_FILES["catalog_file"], $newfilenameback);
                  } else {
                    $catalog_file = NULL;
                  }

                  $findCatalog = $VT->VeriGetir("project_catalogs", "WHERE project_id=?", array($ID), "ORDER BY catalog_id ASC");
                  if ($findCatalog != false) {
                    $eklecatalog = $VT->SorguCalistir("UPDATE " . "project_catalogs", "SET catalog_file=? WHERE project_id=?", array($catalog_file, $ID));
                  } else {
                    $eklecatalog = $VT->SorguCalistir("INSERT INTO " . "project_catalogs", "SET project_id=?, catalog_file=?, created_date=?", array($ID, $catalog_file, date("Y-m-d H:i:s")));
                  }
                }
                if ($ekle != false) {
                  $veri = $VT->VeriGetir($kontrol[0]["tablo"], "WHERE ID=?", array($veri[0]["ID"]), "ORDER BY ID ASC", 1);
            ?>
                  <div class="alert alert-success">İşleminiz başarıyla kaydedildi. <?= $kontrol[0]["baslik"] ?> alanına yönlendiriliyorsunuz...</div>
                  <meta http-equiv="refresh" content="1.5; url=<?= SITE ?>liste/<?= $kontrol[0]["tablo"] ?>">
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
            <div class="row justify-content-center">

              <div class="col-md-6">
                <form class="row justify-content-center" action="#" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">
                    <div class="card-body card card-primary">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Kategori Seç</label>
                            <select class="form-control select2" style="width: 100%;" name="kategori">
                              <?php
                              $sonuc = $VT->kategoriGetir($kontrol[0]["tablo"], $veri[0]["kategori"], -1);
                              if ($sonuc != false) {
                                echo $sonuc;
                              } else {
                                $VT->tekKategori($kontrol[0]["tablo"]);
                              }
                              ?>
                            </select>
                          </div>
                          <!-- /.col -->
                        </div>
                        <?php
                  if ($kontrol[0]["tablo"] == "musteriyorumlari") {
                  ?>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>İsim Soyisim</label>
                            <input type="text" class="form-control" placeholder="İsim Soyisim ..." name="baslik" value="<?= $c_baslik ?>">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Yorum</label>
                            <textarea placeholder="Yorum alanıdır." name="metin" style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                          <?= $c_metin ?>
                          </textarea>
                          </div>
                        </div>
<?php
                  }
                  else
                  {
                    ?>
                     <div class="col-md-12">
                          <div class="form-group">
                            <label>Başlık</label>
                            <input type="text" class="form-control" placeholder="Başlık ..." name="baslik" value="<?= $c_baslik ?>">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Açıklama</label>
                            <textarea class="textarea" placeholder="Açıklama alanıdır." name="metin" style="width: 100%; height: 350px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                          <?= $c_metin ?>
                          </textarea>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Resim</label>
                            <input type="file" class="form-control" placeholder="Resim Seçiniz ..." name="resim">
                          </div>
                        </div>

                    <?php
                  }
                  ?>


                        
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
              </div>
              <?php
              if ($kontrol[0]["tablo"] == "projeler" || $kontrol[0]["tablo"] == "hizmetler") {
              ?>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <h2>Slider Alanı</h2>
                      <section class="content">
                        <div class="container-fluid">

                          <form action="<?= SITE ?>ajax.php" method="post" class="dropzone" enctype="multipart/form-data">
                            <input type="hidden" name="tablo" value="<?= $tablo ?>">
                            <input type="hidden" name="ID" value="<?= $ID ?>">
                          </form>



                        </div><!-- /.container-fluid -->
                      </section>

                      <section class="content">
                        <div class="container-fluid">
                          <div class="card">
                            <div class="card-body">
                              <div class="row">
                                <?php
                                $veriler = $VT->VeriGetir("resimler", "WHERE tablo=? AND KID=?", array($tablo, $ID), "ORDER BY ID ASC");
                                if ($veriler != false) {
                                  $sira = 0;
                                  for ($i = 0; $i < count($veriler); $i++) {
                                    $sira++;
                                ?>
                                    <div class="card col-md-2">
                                      <div class="card-header">
                                        <a href="<?= SITE ?>resim-sil/<?= $tablo ?>/<?= $ID ?>/<?= $veriler[$i]["ID"] ?>/<?= $lang_id ?>" class="btn btn-danger btn-sm silmeAlani">Kaldır</a>

                                      </div>
                                      <div class="card-body p-0 m-0">
                                        <img class="img-fluid w-100 p-0 m-0" src="<?= ANASITE ?>images/resimler/<?= $veriler[$i]["resim"] ?>" alt="">
                                      </div>
                                      <!-- /.card-body -->
                                    </div>

                                <?php
                                  }
                                }
                                ?>
                              </div>
                            </div>
                          </div>



                        </div><!-- /.container-fluid -->
                      </section>
                      <!-- /.content -->
                    </div>
                  </div>

                </div>
              <?php
              }
              ?>
            </div>


          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->


      </div>

    <?php
    } else {
    ?>
      <meta http-equiv="refresh" content="0;url=<?= SITE ?>liste/<?= $kontrol[0]["tablo"] ?>">
    <?php
    }
  } else {
    ?>
    <meta http-equiv="refresh" content="0;url=<?= SITE ?>">
  <?php
  }
} else {
  ?>
  <meta http-equiv="refresh" content="0;url=<?= SITE ?>">
<?php
}
?>