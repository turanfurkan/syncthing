<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">İletişim Ayarları</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
            <li class="breadcrumb-item active">İletişim Ayarları</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">

      <?php
      if ($_POST) {
          $contact_phone = $VT->filter($_POST["contact_phone"]);
          $contact_email = $VT->filter($_POST["contact_email"]);
          $contact_adress = $VT->filter($_POST["contact_adress"]);
                    $contact_adress_link = $VT->filter($_POST["contact_adress_link"]);



          $guncelle = $VT->SorguCalistir("UPDATE contact_settings", "SET contact_phone=?, contact_email=?, contact_adress=?, contact_adress_link=? WHERE ID=?", array($contact_phone, $contact_email, $contact_adress,$contact_adress_link, 1), 1);

          if ($guncelle != false) {
            ?>
            <div class="alert alert-success">İşleminiz başarıyla kaydedildi.</div>
            <meta http-equiv="refresh" content="0.5;url=<?= SITE ?>iletisim-ayarlari" />
          <?php
          } else {
          ?>
            <div class="alert alert-danger">İşleminiz sırasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz.</div>
          <?php
          }
        
      }
      $veri = $VT->VeriGetir("contact_settings", "WHERE ID=?", array(1), "", 1);
      ?>
      <form class="row justify-content-center" action="#" method="post" enctype="multipart/form-data">
        <div class="col-md-8">
          <div class="card-body card card-primary">
            <div class="row">
              
              <div class="col-md-12">
                <div class="form-group">
                  <label>Telefon Numarası</label>
                  <input type="text" class="form-control" placeholder="Telefon Numarası ..." name="contact_phone" value="<?= $sitePhone ?>">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>E-Posta Adresi</label>
                  <input type="text" class="form-control" placeholder="E-Posta Adresi ..." name="contact_email" value="<?= $siteMail ?>">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Adres</label>
                  <input type="text" class="form-control" placeholder="Adres" name="contact_adress" value="<?= $siteAdress ?>">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Adres Linki</label>
                  <input type="text" class="form-control" placeholder="Adres" name="contact_adress_link" value="<?= $siteAdressLink ?>">
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