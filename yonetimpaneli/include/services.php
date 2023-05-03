        <?php

        if (!empty($_GET["section_id"])) {
            $section_id = $VT->filter($_GET["section_id"]);
            $kontrol = $VT->VeriGetir("pages_sections", "WHERE section_id=?", array($section_id), "");
            if ($kontrol != false) {
        ?>
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0 text-dark"><?= stripslashes($kontrol[0]["section_title"]) ?></h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                                        <li class="breadcrumb-item active"><?= stripslashes($kontrol[0]["section_title"]) ?></li>
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

                                    <a href="<?= SITE ?>add-service/<?=$section_id?>" class="btn btn-success" style="float:right; margin-bottom:10px;"><i class="fa fa-plus"></i> YENİ EKLE</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">

                                                <thead>
                                                    <tr>
                                                        <th style="width:50px;">Sıra</th>
                                                        <th>Dil</th>
                                                        <th>Başlık</th>
                                                        <th>Açıklama</th>
                                                        <th style="width: 250px;">İşlem</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $veriler = $VT->VeriGetir("services", "WHERE service_table=?", array($kontrol[0]["section_seflink"]), "");

                                                    if ($veriler != false) {
                                                        $sira = 0;
                                                        for ($i = 0; $i < count($veriler); $i++) {
                                                            $sira++;


                                                            $service_id = $veriler[$i]["service_id"];

                                                    ?>
                                                            <tr>
                                                                <td><?= $sira ?></td>
                                                                <td>
                                                                    <?php
                                                                    $languages = $VT->VeriGetir("languages", "WHERE lang_id=?", array($veriler[$i]["lang_id"]), "");
                                                                    if ($languages!=false) {
                                                                        echo $languages[0]["lang_title"];
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?php
                                                                    echo stripslashes($veriler[$i]["service_title"]);
                                                                    ?>
                                                                </td>
                                                                <td><?php
                                                                    echo stripslashes($veriler[$i]["service_description"]);
                                                                    ?>
                                                                </td>

                                                                <td>

                                                                <a href="<?= SITE ?>edit-service/<?= $service_id ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Düzenle</a>

                                                                    

                                                                    <a href="<?= SITE ?>delete-service/<?= $service_id ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Kaldır</a>


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
                                </div>

                            </div>



                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->
                </div>
        <?php

            }
        }

        ?>