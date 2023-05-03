    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Makaleler</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                <li class="breadcrumb-item active">Makaleler</li>
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
              <a href="<?= SITE ?>makale-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> YENİ EKLE</a>
            </div>
          </div>
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width:50px;">Sıra</th>
                    <th>Dil</th>
                    <th>Resim</th>
                    <th>Açıklama</th>
                    <th style="width:50px;">Durum</th>
                    <th style="width:80px;">Tarih</th>
                    <th style="width: 200px;">İşlem</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $veriler = $VT->VeriGetir("articles", "WHERE 1", "", "ORDER BY ID ASC");
                  if ($veriler != false) {
                    $sira = 0;
                    for ($i = 0; $i < count($veriler); $i++) {
                      $sira++;
                      if ($veriler[$i]["status"] == 1) {
                        $aktifpasif = ' checked="checked"';
                      } else {
                        $aktifpasif = '';
                      }
                      $language=$VT->VeriGetir("languages", "WHERE lang_id=?", array($veriler[$i]["lang_id"]), "ORDER BY lang_id ASC");
                      if ($language!=false) {
                        $lang=stripslashes($language[0]["lang_title"]);
                      }
                      else
                      {
                        $lang="";
                      }
                  ?>
                      <tr>
                        <td><?= $sira ?></td>
                        <td>
                            <?=$lang?>
                        </td>
                        <td>
                            <img class="img-fluid" width="200" src="<?=SITE?>uploads/articles/<?=$veriler[$i]["image"]?>" alt="">
                        </td>
                        <td><?php
                            echo "<strong>".stripslashes($veriler[$i]["title"])."</strong>";
                            echo '<br/>' . mb_substr(strip_tags(stripslashes($veriler[$i]["description"])), 0, 130, "UTF-8") . "...";
                            ?>
                        </td>
                        <td>
                          <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input aktifpasif<?= $veriler[$i]["ID"] ?>" id="customSwitch3<?= $veriler[$i]["ID"] ?>" <?= $aktifpasif ?> value="<?= $veriler[$i]['ID'] ?>" onclick="aktifpasif(<?= $veriler[$i]['ID'] ?>,'articles');">
                            <label class="custom-control-label" for="customSwitch3<?= $veriler[$i]["ID"] ?>"></label>
                          </div>
                        </td>
                        <td><?= $veriler[$i]["created_date"] ?></td>
                        <td>
                          <a href="<?= SITE ?>makale-duzenle/<?= $veriler[$i]["ID"] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Düzenle</a>
                          <a href="<?= SITE ?>makale-sil/<?= $veriler[$i]["ID"] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Kaldır</a>
                        </td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>


        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

