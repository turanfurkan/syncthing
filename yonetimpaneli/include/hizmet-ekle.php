    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Hizmet Ekle</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                <li class="breadcrumb-item active">Hizmet Ekle</li>
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
              <a href="<?= SITE ?>hizmetler" class="btn btn-info" style="float:right; margin-bottom:10px; margin-left:10px;"><i class="fas fa-bars"></i> LİSTE</a>
              <a href="<?= SITE ?>hizmet-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> YENİ EKLE</a>
            </div>
          </div>
          <?php
          $service_table="services";
          if ($_POST) {
            if (!empty($_POST["service_title"])) {
              $service_title = $VT->filter($_POST["service_title"]);
              $service_description = $VT->filter($_POST["service_description"]);

              $service_description = $VT->filter($_POST["service_description"]);


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
                $service_image = NULL;
              }


              $ekle = $VT->SorguCalistir("INSERT INTO " . $service_table, "SET lang_id=?, service_table=?, service_title=?, service_description=?, service_image=?, created_date=?", array(1, $service_table, $service_title, $service_description, $service_image, date("Y-m-d H:i:s")));



              if ($ekle != false) {

                ?>
                <div class="alert alert-success">İşleminiz başarıyla kaydedildi. Hizmet Ekle alanına yönlendiriliyorsunuz...</div>
                <meta http-equiv="refresh" content="1.5; url=<?= SITE ?>hizmetler"> <?php
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
                  
                  <?php
                  if ($service_table == "musteriyorumlari") {
                  ?>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>İsim Soyisim</label>
                        <input type="text" class="form-control" placeholder="İsim Soyisim ..." name="service_title">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Yorum</label>
                        <textarea placeholder="Yorum alanıdır." name="service_description" style="width: 100%; height: 350px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>
                    </div>
                  <?php
                  } else {
                  ?>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Başlık</label>
                        <input type="text" class="form-control" placeholder="Başlık ..." name="service_title">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Açıklama</label>
                        <input type="text" class="form-control" placeholder="Açıklama ..." name="service_description">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>service_image (768 x 608)</label>
                        <input type="file" class="form-control" placeholder="service_image Seçiniz ..." name="service_image">
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

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

