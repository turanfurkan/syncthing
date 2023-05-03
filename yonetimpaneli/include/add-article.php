        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Makale Ekle</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Makale Ekle</li>
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
                            <a href="<?= SITE ?>makaleler" class="btn btn-info" style="float:left; margin-bottom:10px; margin-left:10px;"><i class="fas fa-arrow-left"></i> GERİ</a>

                            <a href="<?= SITE ?>makale-ekle" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> YENİ EKLE</a>
                        </div>
                    </div>
                    <?php
                    if ($_POST) {
                        if (!empty($_POST["title"])) {
                            $title = $VT->filter($_POST["title"]);

                            $description = $VT->filter($_POST["description"],true);

                            $lang_id = $VT->filter($_POST["lang_id"]);
                            $status=1;
                            $seflink=$VT->seflink($title);

                            if (!empty($_FILES["image"]["name"])) {
                                function dosyaYukleBack($takeFile, $newfilenameback)
                                {
                                    move_uploaded_file($takeFile["tmp_name"], "uploads/articles/" . $newfilenameback);
                                    return $newfilenameback;
                                }
                                $tempback = explode(".", $_FILES["image"]["name"]);
                                $randback = uniqid(true);
                                $newfilenameback = $randback . '.' . end($tempback);


                                $image = dosyaYukleBack($_FILES["image"], $newfilenameback);
                            } else {
                                $image = NULL;
                            }


                            $ekle = $VT->SorguCalistir("INSERT INTO " . "articles", "SET lang_id=?, title=?, seflink=?, description=?, image=?, status=?, created_date=?", array($lang_id, $title, $seflink, $description, $image, $status, date("Y-m-d H:i:s")));



                            if ($ekle != false) {
                    ?>
                                <div class="alert alert-success">İşleminiz başarıyla kaydedildi.</div>
                                <meta http-equiv="refresh" content="0; url=<?= SITE ?>makaleler">
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
                    <form class="row justify-content-center" action="#" method="post" enctype="multipart/form-data">
                        <div class="col-md-8">
                            <div class="card-body card card-primary">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Dil Seç</label>
                                            <select class="form-control select2" style="width: 100%;" name="lang_id">
                                                <?php
                                                $languages = $VT->VeriGetir("languages", "WHERE 1", "", "");
                                                if ($languages != false) {
                                                    foreach ($languages as $language) {
                                                ?>
                                                        <option value="<?= $language["lang_id"] ?>"><?= $language["lang_title"] ?></option>
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
                                            <label>Başlık</label>
                                            <input type="text" class="form-control" placeholder="Başlık ..." name="title">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Açıklama</label>
                                            <textarea class="textarea" name="description" id="" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>image (1920 x 1080)</label>
                                            <input type="file" class="form-control" placeholder="image Seçiniz ..." name="image">
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