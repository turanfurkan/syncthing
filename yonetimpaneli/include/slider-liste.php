<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Slider</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
            <li class="breadcrumb-item active">Slider</li>
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
          <a href="<?= SITE ?>slider-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> YENİ EKLE</a>
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
                <th>Görsel</th>
                <th>Başlık</th>
                <th style="width:80px;">Tarih</th>
                <th style="width:120px;">İşlem</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $veriler = $VT->VeriGetir("slider", "", "", "ORDER BY slide_id ASC");
              if ($veriler != false) {
                $sira = 0;
                for ($i = 0; $i < count($veriler); $i++) {
                  $sira++;

              ?>
                  <tr>
                    <td><?= $sira ?></td>
                    <td>
                      <?php
                      $language = $VT->VeriGetir("languages", "WHERE lang_id=?", array($veriler[$i]["lang_id"]), "");
                      if ($language != false) {
                        echo $language[0]["lang_title"];
                      }
                      ?>
                    </td>
                    <td><img class="img-fluid" width="150" src="<?= ANASITE ?>images/slider/<?= $veriler[$i]["slide_image"] ?>" alt=""></td>
                    <td><?php
                        echo stripslashes($veriler[$i]["slide_title"]);
                        ?>
                    </td>

                    <td><?= $veriler[$i]["created_date"] ?></td>
                    <td>
                      <a href="<?= SITE ?>slider-duzenle/<?= $veriler[$i]["slide_id"] ?>" class="btn btn-warning btn-sm">Düzenle</a>
                      <a href="<?= SITE ?>slider-sil/<?= $veriler[$i]["slide_id"] ?>" class="btn btn-danger btn-sm">Kaldır</a>
                    </td>
                  </tr>
              <?php
                }
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Sıra</th>
                <th>Görsel</th>
                <th>Başlık</th>
                <th>Tarih</th>
                <th>İşlem</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>


    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>