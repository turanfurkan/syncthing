    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Menü Yönetimi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Menü Yönetimi</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">

                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:50px;">Sıra</th>
                                    <th>Başlık</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $veriler = $VT->VeriGetir("texts_lang", "WHERE lang_id=?", array(1), "ORDER BY text_id ASC");
                                if ($veriler != false) {
                                    $sira = 0;
                                    for ($i = 0; $i < count($veriler); $i++) {
                                        $sira++;
                                       
                                        $ID = $veriler[$i]["text_id"];
                                        $lang_id_en = 2;
                                        $kontrol_en = $VT->VeriGetir("texts_lang", "WHERE parent_id=? and lang_id=?", array($ID, $lang_id_en), "");

                                        $lang_id_ru = 3;
                                        $kontrol_ru = $VT->VeriGetir("texts_lang", "WHERE parent_id=? and lang_id=?", array($ID, $lang_id_ru), "");

                                ?>
                                        <tr>
                                            <td><?= $sira ?></td>
                                            <td><?php
                                                echo stripslashes($veriler[$i]["text_title"]);
                                                ?>
                                            </td>
                                            
                                            <td>
                                                <?php
                                                if ($kontrol_en != false) {
                                                ?>
                                                    <a href="<?= SITE ?>kelime-dil-duzenle/<?= $veriler[$i]["text_id"] ?>/2" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> İngilizce</a>

                                                <?php
                                                } else {
                                                ?>
                                                    <a href="<?= SITE ?>kelime-dil-duzenle/<?= $veriler[$i]["text_id"] ?>/2" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> İngilizce</a>

                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if ($kontrol_ru != false) {
                                                ?>
                                                    <a href="<?= SITE ?>kelime-dil-duzenle/<?= $veriler[$i]["text_id"] ?>/3" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Fransızca</a>

                                                <?php
                                                } else {
                                                ?>
                                                    <a href="<?= SITE ?>kelime-dil-duzenle/<?= $veriler[$i]["text_id"] ?>/3" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Fransızca</a>

                                                <?php
                                                }
                                                ?>

                                                <a href="<?= SITE ?>kelime-dil-duzenle/<?= $veriler[$i]["text_id"] ?>/1" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Türkçe</a>
                                                
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