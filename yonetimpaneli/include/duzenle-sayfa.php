<?php
if (!empty($_GET["section_id"])) {
    $section_id = $VT->filter($_GET["section_id"]);

    $lang_id = $VT->filter($_GET["lang_id"]);
    $veri = $VT->VeriGetir("pages_sections ", "WHERE section_id=?", array($section_id), "ORDER BY section_id ASC", 1);
    if ($veri != false) {
        $section_order = $veri[0]["section_order"];
        $languages = $VT->VeriGetir("languages", "WHERE lang_id=?", array($lang_id), "");
        if ($lang_id == 1) {
            $page_id = $veri[0]["page_id"];
            $c_section_title = stripslashes($veri[0]["section_title"]);
            $c_section_description = stripslashes($veri[0]["section_description"]);
            $c_section_image = stripslashes($veri[0]["section_image"]);
                        $c_section_image_mobile = stripslashes($veri[0]["section_image_mobile"]);

            $section = $veri;
            if ($veri[0]["section_order"] == 1) {
                $text_one=stripslashes($veri[0]["slide_text_one"]);
                $text_two=stripslashes($veri[0]["slide_text_two"]);
                $text_three=stripslashes($veri[0]["slide_text_three"]);
                $section_button=stripslashes($veri[0]["section_button"]);

            }
            if ($veri[0]["section_order"] == 2) {
                $text_one=stripslashes($veri[0]["slide_text_one"]);
                $text_two=stripslashes($veri[0]["slide_text_two"]);

            }
                 if ($section[0]["section_order"] == 5) {
                    $work_text_one=stripslashes($section[0]["slide_text_one"]);
                    $work_text_two=stripslashes($section[0]["slide_text_two"]);
                    $work_text_three=stripslashes($section[0]["slide_text_three"]);

    
                }
        } else {
            $findPage = $VT->VeriGetir("pages", "WHERE parent_page_id=? and lang_id=?", array($veri[0]["page_id"], $lang_id), "");
            if ($findPage != false) {
                $page_id = $findPage[0]["page_id"];
                $section = $VT->VeriGetir("pages_sections", "WHERE parent_section=?", array($section_id), "");
                if ($section != false) {
                    $c_section_title = stripslashes($section[0]["section_title"]);
                    $c_section_description = stripslashes($section[0]["section_description"]);
                    $c_section_image = stripslashes($section[0]["section_image"]);
                                            $c_section_image_mobile = stripslashes($section[0]["section_image_mobile"]);

                } else {
                    $c_section_title = "";
                    $c_section_description = "";
                    $c_section_image = "";
                                        $c_section_image_mobile = "";

                }
                if ($section[0]["section_order"] == 1) {
                    $text_one=stripslashes($section[0]["slide_text_one"]);
                    $text_two=stripslashes($section[0]["slide_text_two"]);
                    $text_three=stripslashes($section[0]["slide_text_three"]);
                    $section_button=stripslashes($section[0]["section_button"]);

    
                }
                
                if ($section[0]["section_order"] == 5) {
                    $work_text_one=stripslashes($section[0]["slide_text_one"]);
                    $work_text_two=stripslashes($section[0]["slide_text_two"]);
                    $work_text_three=stripslashes($section[0]["slide_text_three"]);

    
                }

                if ($section[0]["section_order"] == 2) {
                    $text_one=stripslashes($section[0]["slide_text_one"]);
                    $text_two=stripslashes($section[0]["slide_text_two"]);

    
                }
            }
        }



?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?= stripslashes($languages[0]["lang_title"]) ?> Anasayfa Alanı</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Anasayfa</li>
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

                            <a href="<?= SITE ?>sayfa/anasayfa" class="btn btn-info" style="float:left; margin-bottom:10px; margin-left:10px;"><i class="fas fa-arrow-left"></i> GERİ</a>

                        </div>
                    </div>
                    <?php
                    if ($_POST) {

                        if (!empty($_POST["section_title"])) {

                            $section_title = $VT->filter($_POST["section_title"]);
                            $section_description = $VT->filter($_POST["section_description"], true);

                            if (!empty($_POST["slide_text_one"])) {
                                $slide_text_one=$_POST["slide_text_one"];
                            }
                            else
                            {
                                $slide_text_one="";
                            }

                            if (!empty($_POST["slide_text_two"])) {
                                $slide_text_two=$_POST["slide_text_two"];
                            }
                            else
                            {
                                $slide_text_two="";
                            }

                            if (!empty($_POST["slide_text_three"])) {
                                $slide_text_three=$_POST["slide_text_three"];
                            }
                            else
                            {
                                $slide_text_three="";
                            }
                            if (!empty($_POST["section_button"])) {
                                $section_button=$_POST["section_button"];
                            }
                            else
                            {
                                $section_button="";
                            }

                            if (!empty($_FILES["section_image"]["name"])) {
                                function dosyaYukleBack($takeFile, $newfilenameback)
                                {
                                    move_uploaded_file($takeFile["tmp_name"], "uploads/home/" . $newfilenameback);
                                    return $newfilenameback;
                                }
                                $tempback = explode(".", $_FILES["section_image"]["name"]);
                                $randback = uniqid(true);
                                $newfilenameback = $randback . '.' . end($tempback);


                                $section_image = dosyaYukleBack($_FILES["section_image"], $newfilenameback);
                            } else {
                                $section_image = $c_section_image;
                            }
                            
                            if (!empty($_FILES["section_image_mobile"]["name"])) {
                                function dosyaYukleBackMobil($takeFile, $newfilenameback)
                                {
                                    move_uploaded_file($takeFile["tmp_name"], "uploads/home/" . $newfilenameback);
                                    return $newfilenameback;
                                }
                                $tempback = explode(".", $_FILES["section_image_mobile"]["name"]);
                                $randback = uniqid(true);
                                $newfilenameback = $randback . '.' . end($tempback);


                                $section_image_mobile = dosyaYukleBackMobil($_FILES["section_image_mobile"], $newfilenameback);
                            } else {
                                $section_image_mobile = $c_section_image_mobile;
                            }


                            if ($section != false) {
                                $ekle = $VT->SorguCalistir("UPDATE " .  "pages_sections", "SET section_title=?, section_description=?, section_button=?, slide_text_one=?, slide_text_two=?, slide_text_three=? , section_image=?, section_image_mobile=? WHERE section_id=?", array($section_title, $section_description, $section_button, $slide_text_one, $slide_text_two, $slide_text_three, $section_image, $section_image_mobile, $section[0]["section_id"]), 1);
                            } else {
                                $ekle = $VT->SorguCalistir("INSERT INTO " .  "pages_sections", "SET page_id=?, parent_section=?, section_order=?, section_title=?, section_description=?, section_button=?, slide_text_one=?, slide_text_two=?, slide_text_three=?, section_image=?, section_image_mobile=?", array($page_id, $section_id, $section_order, $section_title, $section_description, $section_button, $slide_text_one, $slide_text_two, $slide_text_three, $section_image,$section_image_mobile));
                            }

                            if ($ekle != false) {
                    ?>
                                <div class="alert alert-success">İşleminiz başarılı bir şekilde gerçekleşti. Menü sayfasına yönlendiriliyorsunuz.</div>
                                <meta http-equiv="refresh" content="1.3; url=<?= SITE ?>sayfa/anasayfa">
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
                                            <input type="text" class="form-control" value="<?= $veri[0]["section_title"] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?= stripslashes($languages[0]["lang_title"]) ?> Alan Başlığı</label>
                                            <input type="text" class="form-control" value="<?= $c_section_title ?>" name="section_title">
                                        </div>
                                    </div>
                                    <?php
                                    if ($veri[0]["section_order"] == 1) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><?= stripslashes($languages[0]["lang_title"]) ?> Kayan Yazı 1</label>
                                                <input type="text" class="form-control" value="<?=$text_one?>" name="slide_text_one">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><?= stripslashes($languages[0]["lang_title"]) ?> Kayan Yazı 2</label>
                                                <input type="text" class="form-control" value="<?=$text_two?>" name="slide_text_two">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><?= stripslashes($languages[0]["lang_title"]) ?> Kayan Yazı 3</label>
                                                <input type="text" class="form-control" value="<?=$text_three?>" name="slide_text_three">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><?= stripslashes($languages[0]["lang_title"]) ?> Buton Yazısı</label>
                                                <input type="text" class="form-control" value="<?=$section_button?>" name="section_button">
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    
                                    if ($veri[0]["section_order"] == 5) {
                                    ?>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><?= stripslashes($languages[0]["lang_title"]) ?> Çalışma Saati 1</label>
                                                <input type="text" class="form-control" value="<?=$work_text_one?>" name="slide_text_one">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><?= stripslashes($languages[0]["lang_title"]) ?> Çalışma Saati 2</label>
                                                <input type="text" class="form-control" value="<?=$work_text_two?>" name="slide_text_two">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><?= stripslashes($languages[0]["lang_title"]) ?> Çalışma Saati 3</label>
                                                <input type="text" class="form-control" value="<?=$work_text_three?>" name="slide_text_three">
                                            </div>
                                        </div>
                                    <?php
                                    }

                                    if ($veri[0]["section_order"] == 2) {
                                        ?>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><?= stripslashes($languages[0]["lang_title"]) ?> Başlık 2</label>
                                                    <input type="text" class="form-control" value="<?=$text_one?>" name="slide_text_one">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><?= stripslashes($languages[0]["lang_title"]) ?> Alt Başlık</label>
                                                    <input type="text" class="form-control" value="<?=$text_two?>" name="slide_text_two">
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    ?>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?= stripslashes($languages[0]["lang_title"]) ?> Alan Açıklaması</label>
                                            <textarea class="textarea" name="section_description" id="" cols="30" rows="10">
                      <?= $c_section_description ?>
                      </textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <img class="img-fluid" width="200" src="<?=SITE?>uploads/home/<?= $c_section_image ?>">
                                        <div class="form-group">
                                            <label><?= stripslashes($languages[0]["lang_title"]) ?> Alan Görseli <?php if ($veri[0]["section_order"] == 1) {echo "(1920 x 1041)";}?></label>
                                            <input type="file" class="form-control" value="<?= $c_section_image ?>" name="section_image">
                                        </div>
                                    </div>
                                    <?php if ($veri[0]["section_order"] == 1) {
                                    
                                    ?>
                                     <div class="col-md-12">
                                                                                 <img class="img-fluid" width="200" src="<?=SITE?>uploads/home/<?= $c_section_image_mobile ?>">

                                        <div class="form-group">
                                            <label><?= stripslashes($languages[0]["lang_title"]) ?> Alan Mobil Görseli <?php if ($veri[0]["section_order"] == 1) {echo "(1080 x 1350)";}?></label>
                                            <input type="file" class="form-control" value="<?= $c_section_image_mobile ?>" name="section_image_mobile">
                                        </div>
                                    </div>
                                    <?php
                                    
                                    }?>
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
        <meta http-equiv="refresh" content="0;url=<?= SITE ?>anasayfa">
    <?php
    }
} else {
    ?>
    <meta http-equiv="refresh" content="0;url=<?= SITE ?>">
<?php
}
?>