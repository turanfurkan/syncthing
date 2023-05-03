   <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Mail SMTP Ayarları</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= SITE ?>">Anasayfa</a></li>
                            <li class="breadcrumb-item active">Mail SMTP Ayarları</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-12">
                        <?php
                        if (isset($_POST["updatesmtp"])) {
                            $smtp_host = $VT->filter($_POST["smtp_host"]);
                            $smtp_mail = $VT->filter($_POST["smtp_mail"]);
                            $smtp_password = $VT->filter($_POST["smtp_password"]);
                            $smtp_port_number = $VT->filter($_POST["smtp_port_number"]);

                            $guncelle = $VT->SorguCalistir("UPDATE smtp", "SET smtp_host=?, smtp_mail=?, smtp_password=?, smtp_port_number=?  WHERE id=?", array($smtp_host, $smtp_mail, $smtp_password, $smtp_port_number, 1), 1);

                            if ($guncelle != false) {
                        ?>
                                <div class="alert alert-success">İşleminiz başarıyla kaydedildi.</div>
                                <meta http-equiv="refresh" content="0.5;url=<?= SITE ?>smtp-ayarlari" />
                            <?php
                            } else {
                            ?>
                                <div class="alert alert-danger">İşleminiz sırasında bir sorunla karşılaşıldı. Lütfen daha sonra tekrar deneyiniz.</div>
                        <?php
                            }
                        }
                        $veri = $VT->VeriGetir("smtp", "WHERE id=?", array(1), "", 1);
                        if ($veri != false) {
                            $smtp_host = $veri[0]["smtp_host"];
                            $smtp_mail = $veri[0]["smtp_mail"];
                            $smtp_password = $veri[0]["smtp_password"];
                            $smtp_port_number = $veri[0]["smtp_port_number"];
                        } else {
                            $smtp_host = "";
                            $smtp_mail = "";
                            $smtp_password = "";
                            $smtp_port_number = "";
                        }
                        ?>
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card-body card card-primary">
                                        <div class="row justify-content-end">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Smtp Host</label>
                                                    <input type="text" class="form-control" placeholder="Smtp Host ..." name="smtp_host" value="<?= $smtp_host ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Smtp Email</label>
                                                    <input type="text" class="form-control" placeholder="Smtp Email ..." name="smtp_mail" value="<?= $smtp_mail ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Smtp Şifre</label>
                                                    <input type="text" class="form-control" placeholder="Smtp Şifre ..." name="smtp_password" value="<?= $smtp_password ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Smtp Port Numarası</label>
                                                    <input type="text" class="form-control" placeholder="Smtp Port Numarası ..." name="smtp_port_number" value="<?= $smtp_port_number ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <button name="updatesmtp" type="submit" class="btn btn-block btn-primary">GÜNCELLE</button>
                                                </div>
                                            </div>

                                            <!-- /.row -->
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->

        </section>
        <!-- /.content -->
    </div>
