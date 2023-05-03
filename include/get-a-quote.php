<?php
$seflink = "teklif-al";
$getAQuotePage = $VT->VeriGetir("pages", "WHERE page_seflink=?", array($seflink), "ORDER BY page_id ASC");
if ($getAQuotePage != false) {
    $pageTitle = stripslashes($getAQuotePage[0]["page_title"]);
    $pageDescription = stripslashes($getAQuotePage[0]["page_description"]);
    $pageLink = SITE  . stripslashes($getAQuotePage[0]["page_seflink"]);
} else {
}

?>
<?php

include(DATA . "header.php");

?>
<div role="main" class="main">

    <section class="page-header page-header-modern page-header-background page-header-background-sm m-0">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 class="font-weight-bold text-8 mb-0"><?= $pageTitle ?></h1>
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb breadcrumb-light d-block text-md-end text-4 mb-0">
                        <li><a href="<?= SITE ?>" class="text-decoration-none"><?= $homeTextTitle ?></a></li>
                        <li class="active"><?= $pageTitle ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Area -->
    <div class="container py-5 my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="alert alert-info text-white" style="background: #dc143c;">
                    <p class="text-white"><strong><i class="fa-solid fa-circle-info text-10"></i></strong> <?= $pageDescription ?></p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img class="img-fluid dm-none h-100" src="<?= SITE ?>images/sections/quote.png" alt="">
            </div>
            <div class="col-lg-6 align-self-center">
                <?php
                    if (isset($_POST["sendQuote"])) {
                        $firstName=$VT->filter($_POST["firstName"]);
                        $lastName=$VT->filter($_POST["lastName"]);
                        $phone=$VT->filter($_POST["phone"]);
                        $email=$VT->filter($_POST["email"]);
                        $companyName=$VT->filter($_POST["companyName"]);
                        $productName=$VT->filter($_POST["productName"]);
                        $additionalInfo=$VT->filter($_POST["additionalInfo"]);
                        ob_start();
$body= include SAYFA . 'quote-mail-templete.php';
$body = ob_get_clean();

                        
                        $sendMail=$VT->MailGonder("Teklif Formu",$body,"html");
                        if ($sendMail!=false) {
                            $addDb=$VT->SorguCalistir("INSERT INTO quote_requests","SET first_name=?, last_name=?, phone=?, email=?, company_name=?, product_name=?, additional_info=?, created_date=?",array($firstName,$lastName,$phone,$email,$companyName,$productName,$additionalInfo,date("Y-m-d H:i:s")));
                            if ($addDb!=false) {
                                ?>
                                <div class="alert alert-success">
                                    <p>
                                       <i class="fa fa-check"></i> Teklif isteğiniz başarılı bir şekilde oluşturuldu. Temsilcimiz en kısa sürede sizinle iletişime geçecektir. İyi günler dileriz.
                                    </p>
                                </div>
                                <?php
                            }
                            else
                            {
                                ?>
                                <div class="alert alert-danger">
                                    <p>
                                   <i class="fa fa-times"></i> Teklif isteği gönderilemedi. Lütfen tekrar deneyin.
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
                               <i class="fa fa-times"></i> Teklif isteği gönderilemedi. Lütfen tekrar deneyin.
                                </p>
                            </div>
                            <?php
                        }

                    }
                ?>
                <form role="form" class="needs-validation" method="post" action="#">
                    <h2 class="text-color-dark font-weight-bold text-5-5 mb-3"><?=$quoteTextTitle?></h2>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label"><?=$nameTextTitle?> <span class="text-color-danger">*</span></label>
                            <input type="text" class="form-control h-auto py-2" name="firstName" value="" required />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label"><?=$surnameTextTitle?><span class="text-color-danger">*</span></label>
                            <input type="text" class="form-control h-auto py-2" name="lastName" value="" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label"><?= $phoneTextTitle ?></label>
                            <input type="text" class="form-control h-auto py-2" name="phone" value="" />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label"><?= $contactFormMailTextTitle ?></label>
                            <input type="text" class="form-control h-auto py-2" name="email" value="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label"><?=$companyTextTitle?></label>
                            <input type="text" class="form-control h-auto py-2" name="companyName" value="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label"><?=$infoProductTextTitle?> <span class="text-color-danger">*</span></label>
                            <div class="custom-select-1">
                                <select class="form-select form-control h-auto py-2" name="productName" required>
                                    <option selected><?=$selectProductTextTitle?></option>
                                    <?php
                              $products = $VT->VeriGetir("products", "WHERE lang_id=?", array($lang_id), "");
                              if ($products != false) {
                                  foreach ($products as $product) {
                                    ?>
                                    <option value="<?=stripslashes($product["name"])?>"><?=stripslashes($product["name"])?></option>
                                    <?php
                                  }
                              }
                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label"><?=$additionalInfoTextTitle?></label>
                            <textarea class="form-control h-auto py-2" name="additionalInfo" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <button type="submit" name="sendQuote" class="btn custom-svg-btn-style-1 custom-svg-btn-style-1-solid text-color-light text-uppercase" data-loading-text="Loading...">
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



</div>


<?php
include(DATA . "footer.php");

?>