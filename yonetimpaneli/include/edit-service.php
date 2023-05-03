        <?php

        if (!empty($_GET["service_id"])) {
            $service_id = $VT->filter($_GET["service_id"]);
            $kontrol = $VT->VeriGetir("services", "WHERE service_id=?", array($service_id), "");
            if ($kontrol != false) {
                $section=$VT->VeriGetir("pages_sections", "WHERE section_seflink=?", array($kontrol[0]["service_table"]), "");
        ?>
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0 text-dark"><?= stripslashes($kontrol[0]["service_title"]) ?> Ekle</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                                        <li class="breadcrumb-item active"><?= stripslashes($kontrol[0]["service_title"]) ?> Ekle</li>
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
                <a href="<?= SITE ?>services/<?=$section[0]["section_id"]?>" class="btn btn-info" style="float:left; margin-bottom:10px; margin-left:10px;"><i class="fas fa-arrow-left"></i> GERİ</a>

              <a href="<?= SITE ?>add-service/<?=$section[0]["section_id"]?>" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> YENİ EKLE</a>
            </div>
          </div>
          <?php
          if ($_POST) {
            if (!empty($_POST["service_title"])) {
              $service_title = $VT->filter($_POST["service_title"]);

              $service_description = $VT->filter($_POST["service_description"]);

              $lang_id = $VT->filter($_POST["lang_id"]);

              if (!empty($_FILES["service_image"]["name"])) {
                function dosyaYukleBack($takeFile, $newfilenameback)
                {
                  move_uploaded_file($takeFile["tmp_name"], "uploads/" . $newfilenameback);
                  return $newfilenameback;
                }
                $tempback = explode(".", $_FILES["service_image"]["name"]);
                $randback = uniqid(true);
                $newfilenameback = $randback . '.' . end($tempback);


                $service_image = dosyaYukleBack($_FILES["service_image"], $newfilenameback);
              } else {
                $service_image = $kontrol[0]["service_image"];
              }


              $ekle = $VT->SorguCalistir("UPDATE " . "services", "SET lang_id=?, service_title=?, service_description=?, service_image=? WHERE service_id=?", array($lang_id, $service_title, $service_description, $service_image, $service_id),1);



              if ($ekle != false) {
                $lastProject = $VT->VeriGetir("projeler", "WHERE 1", "", "ORDER BY ID DESC", 1);
          ?>
                <div class="alert alert-success">İşleminiz başarıyla kaydedildi.</div>
                <meta http-equiv="refresh" content="0; url=<?= SITE ?>services/<?=$section[0]["section_id"]?>">
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
                    <div class="form-group">
                      <label>Dil Seç</label>
                      <select class="form-control select2" style="width: 100%;" name="lang_id">
                        <?php
                        $languages = $VT->VeriGetir("languages", "WHERE 1", "","");
                        if ($languages != false) {
                          foreach ($languages as $language) {
                            ?>
                            <option <?php if($language["lang_id"]==$kontrol[0]["lang_id"]){echo "selected";} ?> value="<?=$language["lang_id"]?>"><?=$language["lang_title"]?></option>
                            <?php
                          }
                        } 
                        ?>
                      </select>
                    </div>
                    <!-- /.col -->
                  </div>
              
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Başlık</label>
                        <input type="text" class="form-control" placeholder="Başlık ..." name="service_title" value="<?=stripslashes($kontrol[0]["service_title"])?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Açıklama</label>
                        <input type="text" class="form-control" placeholder="Açıklama ..." name="service_description" value="<?=stripslashes($kontrol[0]["service_description"])?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>service_image (768 x 608)</label>
                        <input type="file" class="form-control" placeholder="service_image Seçiniz ..." name="service_image">
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

            }
        }

        ?>