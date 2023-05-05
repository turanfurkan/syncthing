<?php
if (!empty($_GET["seflink"])) {
    $seflink = $VT->filter($_GET["seflink"]);
    $product = $VT->VeriGetir("products", "WHERE seflink=?", array($seflink), "ORDER BY id ASC");
    if ($product != false) {
        $pageTitle = stripslashes($product[0]["name"]);
        $pageDescription = stripslashes($product[0]["description"]);
        $productUsage=stripslashes($product[0]["product_usage"]);
        $productColors=stripslashes($product[0]["product_colors"]);
        $productWidth=stripslashes($product[0]["product_width"]);
        $productHeight=stripslashes($product[0]["product_height"]);
        $productImage=$product[0]["product_image"];
        $productID=$product[0]["id"];
        

        $pageLink = SITE . "urun/" . stripslashes($product[0]["seflink"]);
    } else {
    }
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
                        <li><a href="<?= SITE ?>urunler" class="text-decoration-none"><?= $productsTextTitle ?></a></li>
                        <li class="active"><?= $pageTitle ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="section section-with-shape-divider border-0 pb-2 pb-lg-5 m-0">
        <div class="shape-divider shape-divider-bottom" style="height: 120px;">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2000 120" preserveAspectRatio="xMinYMin">
                <polygon fill="#FFF" points="-11,2 693,112 2019,6 2019,135 -11,135 " />
            </svg>
        </div>
        <div class="container pt-3 pb-5 mb-5">
            <div class="row mb-lg-4">
                <div class="col">
                    <h2 class="text-color-white font-weight-medium positive-ls-3 text-4 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200"><?=$productionFeaturesTextTitle?></h2>
                    <h3 class="font-weight-bold text-transform-none text-9 line-height-2 mb-3 text-white appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400"><?= $pageTitle ?></h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-5 col-xl-6">
                    <div class="pb-2 mb-4 text-white appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
                        <?=$pageDescription?>
                    </div>
                    <div class="row">
                        <div class="col-md-6 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="300">
                            <div class="row">
                                <div class="col-3 ">
                                    <i class="fa-solid fa-chart-pie text-white text-12"></i>

                                </div>
                                <div class="col-9">
                                    <h4 class="info-box-title font-weight-bold title wd-font-weight- box-title-style-default wd-fontsize-s text-white"><?=$typesOfUseTextTitle?></h4>
                                    <p class="text-white"><?=$productUsage?></p>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="500">
                            <div class="row">
                                <div class="col-3">
                                    <i class="fa-solid fa-swatchbook text-white text-12"></i>
                                </div>
                                <div class="col-9">
                                    <h4 class="info-box-title font-weight-bold title wd-font-weight- box-title-style-default wd-fontsize-s text-white"><?=$colorsTextTitle?></h4>
                                    <p class="text-white"><?=$productColors?></p>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="700">
                            <div class="row">
                                <div class="col-3">
                                    <i class="fa-solid fa-text-width  text-white text-12"></i>
                                </div>
                                <div class="col-9 text-white">
                                    <h4 class="info-box-title font-weight-bold title wd-font-weight- box-title-style-default wd-fontsize-s text-white"><?=$widthTextTitle?></h4>
                                    <p class="text-white"><?=$productWidth?></p>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="900">
                            <div class="row">
                                <div class="col-3">
                                    <i class="fa-solid fa-text-height text-white text-12"></i>

                                </div>
                                <div class="col-9">
                                    <h4 class="info-box-title font-weight-bold title wd-font-weight- box-title-style-default wd-fontsize-s text-white"><?=$heightTextTitle?></h4>
                                    <p class="text-white"><?=$productHeight?></p>

                                </div>
                            </div>

                        </div>
                    </div>
                                                            <a class="btn btn-primary align-self-center border-0 btn-rounded appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200" target="_blank" style="background:#43D854;" href="<?= $siteWhatsapp ?><?=$pageTitle?> <?=$productWhatsappText?>"><i class="fab fa-whatsapp"></i> <?= $siteWhatsappDetailTextTitle ?></a>


                </div>
                <div class="col-lg-7 col-xl-6 pe-lg-4 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRight" data-appear-animation-delay="1100">
                    <img src="<?= SITE ?>images/products/<?= $productImage ?>" class="img-fluid" alt="" />

                </div>
            </div>
        </div>

    </section>
    <div class="container">
        <div class="row">

            <?php
            $subProducts = $VT->VeriGetir("sub_products", "WHERE lang_id=? and product_id=?", array($lang_id,$productID), "");
            if ($subProducts != false) {
                $delay = 0;
                $order = 0;
                foreach ($subProducts as $subProduct) {
                    $delay += 250;
                    $order++;
                    if ($order % 2 == 0) {
                        $dataAnimation = "fadeInRight";
                    } else {
                        $dataAnimation = "fadeInLeft";
                    }

                    if ($order % 4 == 0) {
                        $delay = 0;
                    }

            ?>
                    <div class="col-md-4 appear-animation my-2" data-appear-animation="<?= $dataAnimation ?>" data-appear-animation-delay="<?= $delay ?>">
                        <div class="card border-radius-0 bg-color-light border-0 box-shadow-1 mb-3 h-100">
                            <div class="card-body m-0 p-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img class="img-fluid" src="<?= SITE ?>images/products/<?= $subProduct["product_image"] ?>" alt="">
                                    </div>
                                    <div class="col-md-12">
                                        <h4 class="mt-2 px-2"><?= stripslashes($subProduct["product_title"]) ?></h4>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <div id="specifications" class="container py-4 my-5">
        <div class="row">
            <div class="col">
                <h3 class="font-weight-bold text-transform-none text-9 line-height-2 pb-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200"><?= $productionTableTextTitle?></h3>
                <p class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400"> <?= $productionTableDescriptionTextTitle?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                    <table class="table custom-table-style-1">
                        <thead>
                            <tr style="background: #dc143c;">
                                <th><?=$productTitleTextTitle?></th>
                                <th><?=$productWidthTextTitle?></th>
                                <th><?=$productHeightTextTitle?></th>
                                <th><?=$productDiameterTextTitle?></th>
                                <th><?=$productColorTextTitle?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $productionTablesRows=$VT->VeriGetir("production_table","WHERE lang_id=? and product_id=?",array($lang_id,$productID),"");
                                if ($productionTablesRows!=false) {
                                    $delayTable=0;
                                    foreach ($productionTablesRows as $row) {
                                        $delayTable+=200;
                                        ?>
<tr class="appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="<?=$delayTable?>">
                                <td><?=stripslashes($row["product_title"])?></td>
                                <td><?=stripslashes($row["width"])?></td>
                                <td><?=stripslashes($row["height"])?></td>
                                <td><?=stripslashes($row["diameter"])?></td>
                                <td><?=stripslashes($row["colors"])?></td>
                            </tr>
                                        <?php
                                    }
                                }
                            ?>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>


<?php
include(DATA . "footer.php");

?>