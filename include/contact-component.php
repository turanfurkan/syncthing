    <!-- Contact Area -->
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h2 class="font-weight-bold text-transform-none text-8 pb-2 mb-4"><?= $contactUsTextTitle ?></h2>
                <div class="row">
                    <div class="col">
                        <div class="feature-box feature-box-style-5">
                            <div class="feature-box-icon">
                                <img class="icon-animated" width="42" src="<?= SITE ?>img/demos/industry-factory/icons/icon-location.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                            </div>
                            <div class="feature-box-info">
                                <h3 class="text-transform-none font-weight-bold custom-font-size-1 mb-3"><?= $addressTextTitle ?></h3>
                                <div class="d-flex flex-column flex-md-row">
                                    <ul class="list list-unstyled pe-5 mb-md-0">
                                        <li class="mb-0"><?= $siteAdress ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-3 my-4">
                    <div class="col">
                        <div class="feature-box feature-box-style-5">
                            <div class="feature-box-icon">
                                <img class="icon-animated" src="<?= SITE ?>img/demos/industry-factory/icons/icon-mail.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary position-relative bottom-5'}" />
                            </div>
                            <div class="feature-box-info">
                                <h3 class="text-transform-none font-weight-bold custom-font-size-1 pb-1 mb-2">E-mail</h3>
                                <ul class="list list-unstyled pe-5 mb-0">
                                    <li class="mb-0"><a href="mailto:<?= $siteMail ?>" class="text-color-default text-color-hover-primary text-decoration-none"><?= $siteMail ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="feature-box feature-box-style-5">
                            <div class="feature-box-icon">
                                <img class="icon-animated" width="42" src="<?= SITE ?>img/demos/industry-factory/icons/icon-phone.svg" alt="" data-icon data-plugin-options="{'onlySVG': true, 'extraClass': 'svg-fill-color-primary'}" />
                            </div>
                            <div class="feature-box-info">
                                <h3 class="text-transform-none font-weight-bold custom-font-size-1 pb-1 mb-2"><?= $phoneTextTitle ?></h3>
                                <ul class="list list-unstyled pe-5 mb-0">
                                    <li class="mb-0"><a href="tel:<?= $sitePhone ?>" class="text-color-default text-color-hover-primary text-decoration-none"><?= $sitePhone ?></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="font-weight-bold text-transform-none text-8 pb-2 mb-4"><?= $contactFormTextTitle ?></h2>
                <?php
                    if (isset($_POST["sendMessage"])) {
                        $fullName=$VT->filter($_POST["fullName"]);
                        $email=$VT->filter($_POST["email"]);
                        $message=$VT->filter($_POST["message"]);
                        $subject=$VT->filter($_POST["subject"]);

                        ob_start();
$body= include SAYFA . 'contact-mail-templete.php';
$body = ob_get_clean();
   

                        $sendMail=$VT->MailGonder($siteMail,"İletişim Formu",$body,"html");

                        if ($sendMail!=false) {
                                   ob_start();

                            $bodyReply= include SAYFA . 'contact-reply-mail-templete.php';
$bodyReply = ob_get_clean();
                        $sendMailReply=$VT->MailGonder($email,"İletişim Formu",$bodyReply,"html");

                            $addDb=$VT->SorguCalistir("INSERT INTO contact_messages","SET fullName=?, email=?, subject=?, message=?, created_date=?",array($fullName,$email,$subject,$message,date("Y-m-d H:i:s")));
                            if ($addDb!=false) {
                                ?>
                                <div class="alert alert-success">
                                    <p>
                                       <i class="fa fa-check"></i> Mesajınız başarılı bir şekilde oluşturuldu. Temsilcimiz en kısa sürede sizinle iletişime geçecektir. İyi günler dileriz.
                                    </p>
                                </div>
                                <?php
                            }
                            else
                            {
                                ?>
                                <div class="alert alert-danger">
                                    <p>
                                   <i class="fa fa-times"></i> Mesajınız gönderilemedi. Lütfen tekrar deneyin.
                                    </p>
                                </div>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <div class="alert alert-danger">
                                <p>
                               <i class="fa fa-times"></i> Mesajınız gönderilemedi. Lütfen tekrar deneyin.
                                </p>
                            </div>
                            <?php
                        }

                    }
                ?>
                <form class=" custom-form-style-1" action="#" method="POST">
                    

                    <div class="row">
                        <div class="form-group col">
                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="fullName" placeholder="<?= $contactFormNameTextTitle ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" placeholder="<?= $contactFormMailTextTitle ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" placeholder="<?= $contactFormSubjectTextTitle ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="6" class="form-control" name="message" placeholder="<?= $contactFormMessageTextTitle ?>" required></textarea>
                        </div>
                    </div>
                  
                    <div class="row">
                        <div class="form-group col">
                            <button type="submit" class="btn custom-svg-btn-style-1 custom-svg-btn-style-1-solid text-color-light text-uppercase" name="sendMessage" data-loading-text="Loading...">
                                <svg class="custom-svg-btn-background" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 210 70" preserveAspectRatio="none">
                                    <polygon fill="none" stroke="#D4D4D4" stroke-width="2" stroke-miterlimit="10" points="7,5 185,5 205,34 186,63 7,63 " />
                                </svg>
                                <?= $contactFormSendMessageTextTitle ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>