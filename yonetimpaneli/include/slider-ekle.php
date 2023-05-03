<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Slider Ekle</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Slider Ekle</li>
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
                    <a href="<?= SITE ?>slider-liste" class="btn btn-info" style="float:right; margin-bottom:10px; margin-left:10px;"><i class="fas fa-bars"></i> LİSTE</a>
                    <a href="<?= SITE ?>slider-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> YENİ EKLE</a>
                </div>
            </div>
            <?php
            if ($_POST) {
                if (!empty($_POST["slide_title"])) {
                    $slide_title = $VT->filter($_POST["slide_title"]);
                    $slide_description = $VT->filter($_POST["slide_description"]);
                    $lang_id = $VT->filter($_POST["lang_id"]);
                    $slide_button = $VT->filter($_POST["slide_button"]);

                    function dosyaYukle($takeFile, $newfilename)
                    {
                        move_uploaded_file($takeFile["tmp_name"], "../images/slider/" . $newfilename);
                        return $newfilename;
                    }
                    if (!empty($_FILES["slide_image"]["name"])) {
                        $temp = explode(".", $_FILES["slide_image"]["name"]);
                        $rand = uniqid(true);
                        $newfilename = $rand . '.' . end($temp);

                        $yukle = dosyaYukle($_FILES["slide_image"], $newfilename);
                    } else {
                        $yukle = NULL;
                    }

                    $ekle = $VT->SorguCalistir("INSERT INTO " . "slider", "SET lang_id=?, slide_title=?, slide_description=?, slide_image=?, slide_button=?, created_date=?", array($lang_id, $slide_title, $slide_description, $yukle, $slide_button, date("Y-m-d H:i:s")));



                    if ($ekle != false) {
            ?>
                        <div class="alert alert-success">İşleminiz başarıyla kaydedildi.</div>
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
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="card-body card card-primary">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Dil Seç</label>
                                    <select class="form-control select2" style="width: 100%;" name="lang_id" required>

                                        <?php
                                        $languages = $VT->VeriGetir("languages", "WHERE 1", "", "ORDER BY lang_id ASC");
                                        if ($languages != false) {
                                            foreach ($languages as $language) {
                                        ?>
                                                <option value="<?= $language["lang_id"] ?>"><?= stripslashes($language["lang_title"]) ?></option>
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
                                    <label>Başlık*</label>
                                    <input type="text" class="form-control" placeholder="Başlık ..." name="slide_title" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Açıklama</label>
                                    <input type="text" class="form-control" placeholder="Başlık ..." name="slide_description">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Resim(1920 x 700)</label>
                                    <input type="file" class="form-control" placeholder="Resim Seçiniz ..." name="slide_image" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Slide Linki</label>
                                    <input type="text" class="form-control" placeholder="Slide Link ..." name="slide_button">
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