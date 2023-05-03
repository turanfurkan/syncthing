<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Sosyal Medya Ayarları</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
            <li class="breadcrumb-item active">Sosyal Medya Ayarları</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">

      <?php
      $siteFacebook= $VT->VeriGetir("social_media", "WHERE social_media_id=?", array(1), "", 1);

      if (isset($_POST["update_facebook"])) {
          $social_media_link = $VT->filter($_POST["social_media_link"]);
         


          
          $guncelle = $VT->SorguCalistir("UPDATE social_media", "SET social_media_link=? WHERE social_media_id=?", array($social_media_link, 1), 1);

          if ($guncelle != false) {
            ?>
            <div class="alert alert-success">İşleminiz başarıyla kaydedildi.</div>
            <meta http-equiv="refresh" content="0.5;url=<?= SITE ?>sosyal-medya-ayarlari" />
          <?php
          } else {
          ?>
            <div class="alert alert-danger">İşleminiz sırasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz.</div>
          <?php
          }
        } 
    
      ?>
      <form class="row justify-content-center" action="#" method="post" enctype="multipart/form-data">
        <div class="col-md-8">
          <div class="card-body card card-primary">
            <div class="row">
              
              <div class="col-md-8">
                <div class="form-group">
                  <label>Facebook</label>
                  <input type="text" class="form-control" placeholder="Facebook Linki ..." name="social_media_link" value="<?= $siteFacebook[0]["social_media_link"] ?>">
                </div>
              </div>


              <div class="col-md-4">
                <div class="form-group mt-2">
                    <label for=""></label>
                  <button type="submit" name="update_facebook" class="btn btn-block btn-primary">GÜNCELLE</button>
                </div>
              </div>

            </div>

          </div>
        </div>
      </form>

      <?php
      $siteTwitter= $VT->VeriGetir("social_media", "WHERE social_media_id=?", array(2), "", 1);

      if (isset($_POST["update_twitter"])) {
          $social_media_link = $VT->filter($_POST["social_media_link"]);
         


          
          $guncelle = $VT->SorguCalistir("UPDATE social_media", "SET social_media_link=? WHERE social_media_id=?", array($social_media_link, 2), 1);

          if ($guncelle != false) {
            ?>
            <div class="alert alert-success">İşleminiz başarıyla kaydedildi.</div>
            <meta http-equiv="refresh" content="0.5;url=<?= SITE ?>sosyal-medya-ayarlari" />
          <?php
          } else {
          ?>
            <div class="alert alert-danger">İşleminiz sırasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz.</div>
          <?php
          }
        } 
    
      ?>
      <form class="row justify-content-center" action="#" method="post" enctype="multipart/form-data">
        <div class="col-md-8">
          <div class="card-body card card-primary">
            <div class="row">
              
              <div class="col-md-8">
                <div class="form-group">
                  <label>Twitter</label>
                  <input type="text" class="form-control" placeholder="Twitter Linki ..." name="social_media_link" value="<?= $siteTwitter[0]["social_media_link"] ?>">
                </div>
              </div>


              <div class="col-md-4">
                <div class="form-group mt-2">
                    <label for=""></label>
                  <button type="submit" name="update_twitter" class="btn btn-block btn-primary">GÜNCELLE</button>
                </div>
              </div>

            </div>

          </div>
        </div>
      </form>

      <?php
      $siteInstagram= $VT->VeriGetir("social_media", "WHERE social_media_id=?", array(3), "", 1);

      if (isset($_POST["update_instagram"])) {
          $social_media_link = $VT->filter($_POST["social_media_link"]);
         


          
          $guncelle = $VT->SorguCalistir("UPDATE social_media", "SET social_media_link=? WHERE social_media_id=?", array($social_media_link, 3), 1);

          if ($guncelle != false) {
            ?>
            <div class="alert alert-success">İşleminiz başarıyla kaydedildi.</div>
            <meta http-equiv="refresh" content="0.5;url=<?= SITE ?>sosyal-medya-ayarlari" />
          <?php
          } else {
          ?>
            <div class="alert alert-danger">İşleminiz sırasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz.</div>
          <?php
          }
        } 
    
      ?>
      <form class="row justify-content-center" action="#" method="post" enctype="multipart/form-data">
        <div class="col-md-8">
          <div class="card-body card card-primary">
            <div class="row">
              
              <div class="col-md-8">
                <div class="form-group">
                  <label>Instagram</label>
                  <input type="text" class="form-control" placeholder="Instagram Linki ..." name="social_media_link" value="<?= $siteInstagram[0]["social_media_link"] ?>">
                </div>
              </div>


              <div class="col-md-4">
                <div class="form-group mt-2">
                    <label for=""></label>
                  <button type="submit" name="update_instagram" class="btn btn-block btn-primary">GÜNCELLE</button>
                </div>
              </div>

            </div>

          </div>
        </div>
      </form>

      <?php
      $siteLinkedin= $VT->VeriGetir("social_media", "WHERE social_media_id=?", array(4), "", 1);

      if (isset($_POST["update_linkedin"])) {
          $social_media_link = $VT->filter($_POST["social_media_link"]);
         


          
          $guncelle = $VT->SorguCalistir("UPDATE social_media", "SET social_media_link=? WHERE social_media_id=?", array($social_media_link, 4), 1);

          if ($guncelle != false) {
            ?>
            <div class="alert alert-success">İşleminiz başarıyla kaydedildi.</div>
            <meta http-equiv="refresh" content="0.5;url=<?= SITE ?>sosyal-medya-ayarlari" />
          <?php
          } else {
          ?>
            <div class="alert alert-danger">İşleminiz sırasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz.</div>
          <?php
          }
        } 
    
      ?>
      <form class="row justify-content-center" action="#" method="post" enctype="multipart/form-data">
        <div class="col-md-8">
          <div class="card-body card card-primary">
            <div class="row">
              
              <div class="col-md-8">
                <div class="form-group">
                  <label>Linkedin</label>
                  <input type="text" class="form-control" placeholder="Linkedin Linki ..." name="social_media_link" value="<?= $siteLinkedin[0]["social_media_link"] ?>">
                </div>
              </div>


              <div class="col-md-4">
                <div class="form-group mt-2">
                    <label for=""></label>
                  <button type="submit" name="update_linkedin" class="btn btn-block btn-primary">GÜNCELLE</button>
                </div>
              </div>

            </div>

          </div>
        </div>
      </form>

      <?php
      $sitePinterest= $VT->VeriGetir("social_media", "WHERE social_media_id=?", array(5), "", 1);

      if (isset($_POST["update_pinterest"])) {
          $social_media_link = $VT->filter($_POST["social_media_link"]);
         


          
          $guncelle = $VT->SorguCalistir("UPDATE social_media", "SET social_media_link=? WHERE social_media_id=?", array($social_media_link, 5), 1);

          if ($guncelle != false) {
            ?>
            <div class="alert alert-success">İşleminiz başarıyla kaydedildi.</div>
            <meta http-equiv="refresh" content="0.5;url=<?= SITE ?>sosyal-medya-ayarlari" />
          <?php
          } else {
          ?>
            <div class="alert alert-danger">İşleminiz sırasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz.</div>
          <?php
          }
        } 
    
      ?>
      <form class="row justify-content-center" action="#" method="post" enctype="multipart/form-data">
        <div class="col-md-8">
          <div class="card-body card card-primary">
            <div class="row">
              
              <div class="col-md-8">
                <div class="form-group">
                  <label>Pinterest</label>
                  <input type="text" class="form-control" placeholder="Pinterest Linki ..." name="social_media_link" value="<?= $sitePinterest[0]["social_media_link"] ?>">
                </div>
              </div>


              <div class="col-md-4">
                <div class="form-group mt-2">
                    <label for=""></label>
                  <button type="submit" name="update_pinterest" class="btn btn-block btn-primary">GÜNCELLE</button>
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