
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dil Ayarları</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                <li class="breadcrumb-item active">Dil Ayarları</li>
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
              <a href="<?= SITE ?>site-ayarlari" class="btn btn-success" style="float:right; margin-bottom:10px;">Site Ana Dili Düzenle</a>
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
                    <th style="width:50px;">Durum</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $veriler = $VT->VeriGetir("languages", "WHERE 1", "", "ORDER BY lang_id ASC");
                  if ($veriler != false) {
                    $sira = 0;
                    for ($i = 0; $i < count($veriler); $i++) {
                      $sira++;
                      if ($veriler[$i]["lang_status"] == 1) {
                        $aktifpasif = ' checked="checked"';
                      } else {
                        $aktifpasif = '';
                      }


                    
                  ?>
                      <tr>
                        <td><?= $sira ?></td>
                        <td><?php
                            echo stripslashes($veriler[$i]["lang_title"]);
                            ?>
                        </td>
                        <td>
                          <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input aktifpasif<?= $veriler[$i]["lang_id"] ?>" id="customSwitch3<?= $veriler[$i]["lang_id"] ?>" <?= $aktifpasif ?> value="<?= $veriler[$i]["lang_id"] ?>" onclick="aktifpasif(<?= $veriler[$i]["lang_id"] ?>,'<?= "languages" ?>');">
                            <label class="custom-control-label" for="customSwitch3<?= $veriler[$i]["lang_id"] ?>"></label>
                          </div>
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
