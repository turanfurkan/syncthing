<?php
if (!empty($_GET["page_seflink"])) {
    $page_seflink = $VT->filter($_GET["page_seflink"]);
    $page = $VT->VeriGetir("pages", "WHERE page_seflink=?", array($page_seflink), "");
    if ($page != false) {
        $page_id = $page[0]["page_id"];
?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?= stripslashes($page[0]["page_title"]) ?> Yönetimi</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active"><?= stripslashes($page[0]["page_title"]) ?> Yönetimi</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">

                                        <thead>
                                            <tr>
                                                <th style="width:50px;">Sıra</th>
                                                <th>Alan Adı</th>
                                                <th>Başlık</th>
                                                <th>Açıklama</th>
                                                <th style="width: 250px;">İşlem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $veriler = $VT->VeriGetir("pages_sections", "WHERE page_id=?", array($page_id), "ORDER BY section_id ASC");
                                            if ($veriler != false) {
                                                $sira = 0;
                                                for ($i = 0; $i < count($veriler); $i++) {
                                                    $sira++;


                                                    $section_id = $veriler[$i]["section_id"];

                                            ?>
                                                    <tr>
                                                        <td><?= $sira ?></td>
                                                        <td><?php
                                                            echo stripslashes($veriler[$i]["section_name"]);
                                                            ?>
                                                        </td>
                                                        <td><?php
                                                            echo stripslashes($veriler[$i]["section_title"]);
                                                            ?>
                                                        </td>

                                                        <td><?php
                                                            echo mb_substr(strip_tags(stripslashes($veriler[$i]["section_description"])), 0, 130, "UTF-8") . "...";
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                            $languages = $VT->VeriGetir("languages", "WHERE 1", "", "");
                                                            if ($languages != false) {
                                                                foreach ($languages as $lang) {
                                                                    $kontrol_lang_page = $VT->VeriGetir("pages", "WHERE parent_page_id=? and lang_id=?", array($page_id, $lang["lang_id"]), "");
                                                                    if ($kontrol_lang_page!=false) {
                                                                        $kontrol_page_section=$VT->VeriGetir("pages_sections", "WHERE page_id=? and parent_section=?", array($kontrol_lang_page[0]["page_id"],$section_id), "");

                                                                    }
                                                                    else
                                                                    {
                                                                        $kontrol_page_section=false;
                                                                    }
                                                                   

                                                                    $lang_id = $lang["lang_id"];
                                                                    $lang_name = stripslashes($lang["lang_title"]);
                                                                    if ($kontrol_page_section != false) {
                                                            ?>
                                                                        <a href="<?= SITE ?>duzenle-sayfa/<?= $section_id ?>/<?= $lang_id ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> <?= $lang_name ?></a>

                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <a href="<?= SITE ?>duzenle-sayfa/<?= $section_id ?>/<?= $lang_id ?>"" class=" btn btn-primary btn-sm"><i class="fa fa-plus"></i> <?= $lang_name ?></a>

                                                                    <?php
                                                                    }

                                                                    
                                                                    ?>
                                                            <?php
                                                                }
                                                            }

                                                            if ($section_id==3) {
                                                                ?>
                                                                    <a href="<?= SITE ?>services/<?=$section_id?>" class=" btn btn-primary btn-sm"><i class="fa fa-bars"></i> Hizmetler</a>

                                                                <?php
                                                            }

                                                            if ($section_id==4) {
                                                                ?>
                                                                    <a href="<?= SITE ?>services/<?=$section_id?>" class=" btn btn-primary btn-sm"><i class="fa fa-bars"></i> Referanslar</a>

                                                                <?php
                                                            }
                                                            ?>


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