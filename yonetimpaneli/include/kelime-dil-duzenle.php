<?php
if (!empty($_GET["text_id"])) {
  $ID = $VT->filter($_GET["text_id"]);
  $lang_id = $VT->filter($_GET["lang_id"]);
  $veri = $VT->VeriGetir("texts_lang", "WHERE text_id=?", array($ID), "ORDER BY text_id ASC", 1);
  if ($veri != false) {
    $languages = $VT->VeriGetir("languages", "WHERE lang_id=?", array($lang_id), "ORDER BY lang_id ASC", 1);

    if ($lang_id != 1) {
      $kontrol = $VT->VeriGetir("texts_lang", "WHERE parent_id=? and lang_id=?", array($ID, $lang_id), "");
      if ($kontrol != false) {
        $c_text_title = stripslashes($kontrol[0]["text_title"]);
      } else {
        $c_text_title = "";
      }
    } else {
      $c_text_title = $veri[0]["text_title"];
    }

?>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark"><?= stripslashes($languages[0]["lang_title"]) ?> Kelime Dili Sayfası</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                <li class="breadcrumb-item active">Kelime Dili</li>
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
              <a href="<?= SITE ?>kelimeler" class="btn btn-info" style="float:left; margin-bottom:10px; margin-left:10px;"><i class="fas fa-arrow-left"></i> GERİ</a>

            </div>
          </div>
          <?php
          if ($_POST) {

            if (!empty($_POST["text_title"])) {
              $lang_id = $languages[0]["lang_id"];
              $parent_id = $ID;
              $text_title = $VT->filter($_POST["text_title"]);
              $order_st = $veri[0]["order_st"];

              $status = 1;
              if ($lang_id != 1) {

              if ($kontrol != false) {
                $ekle = $VT->SorguCalistir("UPDATE " .  "texts_lang", "SET text_title=? WHERE text_id=?", array($text_title, $kontrol[0]["text_id"]), 1);
              } else {
                $ekle = $VT->SorguCalistir("INSERT INTO " .  "texts_lang", "SET lang_id=?, parent_id=?, text_title=?, order_st=?", array($lang_id, $parent_id, $text_title,$order_st));
              }
            }
            else
            {
              $ekle = $VT->SorguCalistir("UPDATE " .  "texts_lang", "SET text_title=? WHERE text_id=?", array($text_title, $veri[0]["text_id"]), 1);
            }
              if ($ekle != false) {
          ?>
                <div class="alert alert-success">İşleminiz başarılı bir şekilde gerçekleşti. Kelime sayfasına yönlendiriliyorsunuz.</div>
                <meta http-equiv="refresh" content="1.3; url=<?= SITE ?>kelimeler">
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
                      <label>Türkçe Kelime Başlığı</label>
                      <input type="text" class="form-control" value="<?= $veri[0]["text_title"] ?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?= stripslashes($languages[0]["lang_title"]) ?> Başlık</label>
                      <input type="text" class="form-control" value="<?= $c_text_title ?>" name="text_title">
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
    <meta http-equiv="refresh" content="0;url=<?= SITE ?>kelimeler">
  <?php
  }
} else {
  ?>
  <meta http-equiv="refresh" content="0;url=<?= SITE ?>">
<?php
}
?>