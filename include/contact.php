<?php
$seflink = "iletisim";
$corporatePage = $VT->VeriGetir("pages", "WHERE page_seflink=?", array($seflink), "ORDER BY page_id ASC");
if ($corporatePage != false) {
    $pageTitle = stripslashes($corporatePage[0]["page_title"]);
    $pageDescription = stripslashes($corporatePage[0]["page_description"]);
    $pageLink = SITE  . stripslashes($corporatePage[0]["page_seflink"]);
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
                        <li><a href="<?=SITE?>" class="text-decoration-none"><?= $homeTextTitle ?></a></li>
                        <li class="active"><?= $pageTitle ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

<?php
include(SAYFA."contact-component.php");
?>


</div>


<?php
include(DATA . "footer.php");

?>