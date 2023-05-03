<?php
if (!empty($_GET["ID"])) {
    $ID = $VT->filter($_GET["ID"]);
    $lang_id = $VT->filter($_GET["lang_id"]);
    $veri = $VT->VeriGetir("kurumsal", "WHERE ID=?", array($ID), "ORDER BY ID ASC", 1);
    if ($veri != false) {
        $languages = $VT->VeriGetir("languages", "WHERE lang_id=?", array($lang_id), "ORDER BY lang_id ASC", 1);


        if ($lang_id != 1) {
            $kontrol = $VT->VeriGetir("kurumsal", "WHERE parent_id=? and lang_id=?", array($ID, $lang_id), "");

            if ($kontrol != false) {
                $c_baslik = stripslashes($kontrol[0]["baslik"]);
                $c_metin = stripslashes($kontrol[0]["metin"]);
            } else {
                $c_baslik = "";
                $c_metin = "";
            }
        } else {
            $c_baslik = $veri[0]["baslik"];
            $c_metin = $veri[0]["metin"];
        }

?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?= stripslashes($languages[0]["lang_title"]) ?> Menü Dili Sayfası</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Menü Dili</li>
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
                            <a href="<?= SITE ?>kurumsal/<?= $veri[0]["ID"] ?>" class="btn btn-info" style="float:left; margin-bottom:10px; margin-left:10px;"><i class="fas fa-arrow-left"></i> GERİ</a>

                        </div>
                    </div>
                    <?php
                    if ($_POST) {

                        if ($ID == 1) {
                            $page_id = 0;
                        } else {
                            $page_id = 1;
                        }

                        if (!empty($_POST["baslik"])) {
                            $lang_id = $languages[0]["lang_id"];
                            $parent_id = $ID;
                            $baslik = $VT->filter($_POST["baslik"]);
                            $metin = $VT->filter($_POST["metin"], true);

                            $durum = 1;

                            if (!empty($_FILES["resim"]["name"])) {
                                function dosyaYukleBack($takeFile, $newfilenameback)
                                {
                                    move_uploaded_file($takeFile["tmp_name"], "uploads/kurumsal/" . $newfilenameback);
                                    return $newfilenameback;
                                }
                                $tempback = explode(".", $_FILES["resim"]["name"]);
                                $randback = uniqid(true);
                                $newfilenameback = $randback . '.' . end($tempback);


                                $resim = dosyaYukleBack($_FILES["resim"], $newfilenameback);
                            } else {
                                $resim = $veri[0]["resim"];
                            }

                            if ($lang_id!=1) {
                                if ($kontrol != false) {
                                    $ekle = $VT->SorguCalistir("UPDATE " .  "kurumsal", "SET baslik=?, metin=?, resim=? WHERE ID=?", array($baslik, $metin, $resim, $kontrol[0]["ID"]), 1);
                                } else {
                                    $ekle = $VT->SorguCalistir("INSERT INTO " .  "kurumsal", "SET lang_id=?, page_id=?, parent_id=?, durum=?, baslik=?, metin=?, resim=?", array($lang_id, $page_id, $parent_id, $durum, $baslik, $metin, $resim));
                                }
                            }
                            else
                            {
                                $ekle = $VT->SorguCalistir("UPDATE " .  "kurumsal", "SET baslik=?, metin=?, resim=? WHERE ID=?", array($baslik, $metin, $resim, $ID), 1);

                            }
                           

                            if ($ekle != false) {
                    ?>
                                <div class="alert alert-success">İşleminiz başarılı bir şekilde gerçekleşti. Menü sayfasına yönlendiriliyorsunuz.</div>
                                <meta http-equiv="refresh" content="1.3; url=<?= SITE ?>kurumsal/<?= $veri[0]["ID"] ?>">
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
                                            <label>Türkçe Menü Başlığı</label>
                                            <input type="text" class="form-control" value="<?= $veri[0]["baslik"] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?= stripslashes($languages[0]["lang_title"]) ?> Başlık</label>
                                            <input type="text" class="form-control" value="<?= $c_baslik ?>" name="baslik">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?= stripslashes($languages[0]["lang_title"]) ?> Metin</label>

                                            <textarea class="textarea" name="metin" id="" cols="30" rows="10">
                                                <?= $c_metin ?>
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?= stripslashes($languages[0]["lang_title"]) ?> Resim</label>
                                            <input type="file" class="form-control" name="resim">
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
        <meta http-equiv="refresh" content="0;url=<?= SITE ?>menu">
    <?php
    }
} else {
    ?>
    <meta http-equiv="refresh" content="0;url=<?= SITE ?>">
<?php
}
?>