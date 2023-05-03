<?php
$pageTitle = "Anasayfa";
$pageDescription = "";
$pageLink = SITE;
include(DATA . "header.php");

?>
<div role="main" class="main">
    <div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover dots-light nav-style-1 nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0" data-plugin-options="{'autoplayTimeout': 7000}" style="height: calc(100vh - 155px);">
        <div class="owl-stage-outer">
            <div class="owl-stage">
                <?php
                $sliders = $VT->VeriGetir("slider", "WHERE lang_id=? and status=?", array($lang_id, 1), "ORDER BY ID ASC");
                if ($sliders != false) {
                    foreach ($sliders as $slide) {
                ?>
                        <!-- Carousel Slide -->
                        <div class="owl-item position-relative overlay overlay-show overlay-op-4" style="background-image: url(<?= SITE ?>images/slider/<?= $slide["slide_image"] ?>); background-size: cover; background-position: center;">
                            <div class="container position-relative z-index-3 h-100">
                                <div class="row justify-content-center align-items-center h-100">
                                    <div class="col-lg-7 text-center">
                                        <div class="d-flex flex-column align-items-center justify-content-center h-100">
                                            <h3 class="position-relative text-color-light text-5 line-height-5 font-weight-medium ls-0 px-4 mb-2 appear-animation" data-appear-animation="fadeInDownShorterPlus" data-plugin-options="{'minWindowWidth': 0}">
                                                <span class="position-absolute right-100pct top-50pct transform3dy-n50 opacity-7">
                                                    <img src="<?= SITE ?>img/slides/slide-title-border-light.png" class="w-auto appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}" alt="" />
                                                </span>
                                                <?= $siteTitle ?>
                                                <span class="position-absolute left-100pct top-50pct transform3dy-n50 opacity-7">
                                                    <img src="<?= SITE ?>img/slides/slide-title-border-light.png" class="w-auto appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}" alt="" />
                                                </span>
                                            </h3>
                                            <img src="<?= SITE ?>images/slider/<?= $slide["slide_second_image"] ?>" width="50" class="img-fluid box-shadow-4 rounded-circle appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="500" style="width: 200px !important;" alt="" />

                                            <h1 class="text-color-light font-weight-extra-bold text-12-5 line-height-3 mb-2 appear-animation" data-appear-animation="blurIn" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}"><?= stripslashes($slide["slide_title"]) ?></h1>
                                            <a href="<?= $slide["slide_link"] ?>" class="btn btn-light btn-rounded text-color-dark font-weight-bold text-3 btn-px-5 py-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100" data-plugin-options="{'minWindowWidth': 0}"><?= $reviewTextTitle ?></a>
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
        <div class="owl-dots mb-5">
            <?php
            if ($sliders != false) {
                for ($i = 0; $i < count($sliders); $i++) {
            ?>
                    <button role="button" class="owl-dot <?php if ($i == 1) {
                                                                echo "active";
                                                            } ?>"><span></span></button>

            <?php
                }
            }
            ?>
        </div>
    </div>
    <style>
        .polygon {
            stroke: #fff;
            fill: #fff;
        }
    </style>
    <!--About Section-->
    <div class="container py-4 my-5">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="overflow-hidden mb-2">
                    <h2 class="font-weight-bold text-11 line-height-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200"><?= $promotionSectionTitle ?></h2>
                </div>
                <p class="custom-font-secondary custom-font-size-1 line-height-7 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600"><?= $promotionSectionDescription ?></p>
                <a class="btn btn-primary btn-rounded mt-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800" href="<?= SITE ?>kurumsal/hakkimizda"><?= $readMoreTextTitle ?>
                    <svg class="ms-2" version="1.1" viewBox="0 0 15.698 8.706" width="17" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <polygon class="polygon" stroke-width="0.1" points="11.354,0 10.646,0.706 13.786,3.853 0,3.853 0,4.853 13.786,4.853 10.646,8 11.354,8.706 15.698,4.353 " />
                    </svg>

                </a>
            </div>
            <div class="col-lg-6">

                <?php
                $features = $VT->VeriGetir("features", "WHERE lang_id=?", array($lang_id), "");
                if ($features != false) {
                    $featureDelay = 0;
                    foreach ($features as $feature) {
                        $featureDelay += 200;
                ?>
                        <div class="card border-radius-0 bg-color-light border-0 box-shadow-1 mb-3 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="<?= $featureDelay ?>">
                            <div class="card-body">
                                <div class="text-6">
                                    <?= $feature["feature_icon"] ?>
                                </div>
                                <h4 class="card-title mb-1 text-4 font-weight-bold"><?= stripslashes($feature["feature_title"]) ?></h4>
                                <p class="card-text"><?= stripslashes($feature["feature_description"]) ?></p>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <section class="section section-with-shape-divider border-0 z-index-2 pb-0 m-0">
        <div class="shape-divider shape-divider-reverse-xy" style="height: 120px;">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2000 120" preserveAspectRatio="xMinYMin">
                <polygon fill="#FFF" points="-11,2 693,112 2019,6 2019,135 -11,135 " />
            </svg>
        </div>
        <div class="container pt-3 mt-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-9 col-xl-8 text-center">
                    <div class="overflow-hidden">
                        <h2 class="text-color-white font-weight-medium positive-ls-3 text-4 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200"><?= $productsTextTitle ?></h2>
                    </div>
                    <div class="overflow-hidden mb-3">
                        <h3 class="text-color-white font-weight-bold text-transform-none text-9 line-height-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400"><?= $productsSectionTitle ?></h3>
                    </div>
                    <p class="custom-font-secondary custom-font-size-1 line-height-7 mb-0 text-color-white appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600"><?= $productsSectionDescription ?></p>
                </div>
            </div>
            <?php
                include(SAYFA."products-component.php");
            ?>
        </div>
    </section>


    <!-- Feature Product Area -->
    <?php
    $featuredProduct = $VT->VeriGetir("products", "WHERE is_featured=? and lang_id=?", array(1, $lang_id), "ORDER BY id ASC");
    if ($featuredProduct != false) {
        $productUsage=stripslashes($featuredProduct[0]["product_usage"]);
        $productColors=stripslashes($featuredProduct[0]["product_colors"]);
        $productWidth=stripslashes($featuredProduct[0]["product_width"]);
        $productHeight=stripslashes($featuredProduct[0]["product_height"]);


    ?>
        <section class="section custom-section-shape-background border-0 m-0">
            <div class="custom-shape-divider z-index-1" style="height: 129px;"></div>
            <div class="container position-relative z-index-3 mt-3 mb-5">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 pe-lg-5 mb-4 mb-lg-0">
                        <img src="<?= SITE ?>images/products/<?= $featuredProduct[0]["product_image"] ?>" class="img-fluid appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200" alt="" />
                    </div>
                    <div class="col-lg-6 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="500">
                        <h2 class="text-color-primary font-weight-medium positive-ls-3 text-4 mb-0"><?= $siteTitle ?></h2>
                        <h3 class="font-weight-bold text-transform-none text-9 line-height-2 mb-3"><?= stripslashes($featuredProduct[0]["name"]) ?></h3>
                        <p class="custom-font-secondary custom-font-size-1 line-height-7 pb-2 mb-4"><?= stripslashes($featuredProduct[0]["description"]) ?></p>
                        <div class="row">
                            <?php
                    if (!empty($productUsage)) {
                        ?>
                        <div class="col-md-6 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="300">
                            <div class="row">
                                <div class="col-3 ">
                                    <i class="fa-solid fa-chart-pie text-primary text-12"></i>

                                </div>
                                <div class="col-9">
                                    <h4 class="info-box-title font-weight-bold title wd-font-weight- box-title-style-default wd-fontsize-s text-dark"><?=$typesOfUseTextTitle?></h4>
                                    <p class="text-dark"><?=$productUsage?></p>

                                </div>
                            </div>

                        </div>
                        <?php
                    }

                            ?>
                            <?php
                    if (!empty($productColors)) {
                        ?>
                        
                        <div class="col-md-6 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="500">
                            <div class="row">
                                <div class="col-3">
                                    <i class="fa-solid fa-swatchbook text-primary text-12"></i>
                                </div>
                                <div class="col-9">
                                    <h4 class="info-box-title font-weight-bold title wd-font-weight- box-title-style-default wd-fontsize-s text-dark"><?=$colorsTextTitle?></h4>
                                    <p class="text-dark"><?=$productColors?></p>

                                </div>
                            </div>

                        </div>
                        <?php
                    }
                    
                            ?>
                            <?php
                    if (!empty($productWidth)) {
                        ?>
                        
                        <div class="col-md-6 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="700">
                            <div class="row">
                                <div class="col-3">
                                    <i class="fa-solid fa-text-width  text-primary text-12"></i>
                                </div>
                                <div class="col-9 text-dark">
                                    <h4 class="info-box-title font-weight-bold title wd-font-weight- box-title-style-default wd-fontsize-s text-dark"><?=$widthTextTitle?></h4>
                                    <p class="text-dark"><?=$productWidth?></p>

                                </div>
                            </div>

                        </div>
                        <?php
                    }
                    
                            ?>

<?php
                    if (!empty($productHeight)) {
                        ?>
                        
                        <div class="col-md-6 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="900">
                            <div class="row">
                                <div class="col-3">
                                    <i class="fa-solid fa-text-height text-primary text-12"></i>

                                </div>
                                <div class="col-9">
                                    <h4 class="info-box-title font-weight-bold title wd-font-weight- box-title-style-default wd-fontsize-s text-dark"><?=$heightTextTitle?></h4>
                                    <p class="text-dark"><?=$productHeight?></p>

                                </div>
                            </div>

                        </div>
                        <?php
                    }
                    
                            ?>
                        
                    </div>

                        <a class="btn btn-primary btn-rounded mt-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800" href="<?= SITE ?>urun/<?= $featuredProduct[0]["seflink"] ?>"><?= $reviewTextTitle ?>
                            <svg class="ms-2" version="1.1" viewBox="0 0 15.698 8.706" width="17" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <polygon class="polygon" stroke-width="0.1" points="11.354,0 10.646,0.706 13.786,3.853 0,3.853 0,4.853 13.786,4.853 10.646,8 11.354,8.706 15.698,4.353 " />
                            </svg>

                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }
    ?>



    <!-- Working Process Area -->
    <div class="container ">
        <div class="row justify-content-center pt-4 mt-5">
            <div class="col-lg-9 text-center">
                <div class="overflow-hidden mb-3">
                    <h3 class="font-weight-bold text-transform-none text-9 line-height-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400"><?= $workingProcessSectionTitle ?></h3>
                </div>
                <p class="custom-font-secondary custom-font-size-1 line-height-7 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600"><?= $workingProcessSectionDescription ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row justify-content-center process custom-process-style-1 my-5">
                    <?php
                    $workingProcess = $VT->VeriGetir("working_process", "WHERE lang_id=?", array($lang_id), "ORDER BY ID ASC");
                    if ($workingProcess != false) {
                        $orderProcess = 0;
                        foreach ($workingProcess as $process) {
                            $orderProcess++;
                    ?>
                            <div class="process-step col-sm-9 col-md-7 col-lg-4 mb-5 mb-lg-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                                <div class="process-step-circle">
                                    <strong class="process-step-circle-content text-color-primary"><?= $orderProcess ?></strong>
                                </div>
                                <div class="process-step-content px-lg-4">
                                    <h4 class="font-weight-bold custom-font-size-2 pb-1 mb-2"><?= stripslashes($process["process_title"]) ?></h4>
                                    <p class="mb-0"><?= stripslashes($process["process_description"]) ?></p>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>


                </div>

            </div>
        </div>
    </div>



    <!-- News Area -->
    <section class="section section-with-shape-divider border-0 m-0">
        <div class="shape-divider shape-divider-reverse-x" style="height: 120px;">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2000 120" preserveAspectRatio="xMinYMin">
                <polygon fill="#FFF" points="-11,2 693,112 2019,6 2019,135 -11,135 " />
            </svg>
        </div>
        <div class="shape-divider shape-divider-bottom shape-divider-reverse-y" style="height: 120px;">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2000 120" preserveAspectRatio="xMinYMin">
                <polygon fill="#FFF" points="-11,2 693,112 2019,6 2019,135 -11,135 " />
            </svg>
        </div>
        <div class="container py-5 my-5">
            <div class="row">
                <div class="col">

                    <div class="overflow-hidden pb-3 mb-3">
                        <h3 class="font-weight-bold text-transform-none text-9 pb-2 mb-0 text-white appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400"><?= $blogsSectionTitle ?></h3>
                    </div>
                </div>
            </div>
            <div class="row mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
                <?php
                $blogs = $VT->VeriGetir("blogs", "WHERE lang_id=? and status=?", array($lang_id, 1), "ORDER BY ID DESC", 2);
                if ($blogs != false) {
                    foreach ($blogs as $blog) {
                ?>
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <article>
                                <div class="card border-0 border-radius-0 box-shadow-1">
                                    <div class="card-body p-4 z-index-1">
                                        <a href="<?=SITE?>blog/<?=$blog["blog_seflink"]?>">
                                            <img class="card-img-top border-radius-0" src="<?= SITE ?>images/blogs/<?=$blog["blog_image"]?>" alt="<?=stripslashes($blog["blog_title"])?>">
                                        </a>
                                        <p class="text-uppercase text-1 mb-3 pt-1 text-color-default">
                                            <time pubdate datetime="2022-01-10"><?=date("d.m.Y",strtotime($blog["created_date"]))?></time>
                                            <span class="opacity-3 d-inline-block px-2">|</span>
                                            <?=$siteTitle?>
                                        </p>
                                        <div class="card-body p-0">
                                            <h4 class="card-title mb-3 text-5 font-weight-semibold"><a class="text-color-dark text-color-hover-primary text-decoration-none" href="<?=SITE?>blog/<?=$blog["blog_seflink"]?>"><?=stripslashes($blog["blog_title"])?></a></h4>
                                            <p class="card-text mb-0"><?=substr(stripslashes($blog["blog_description"]),0,250)?>...</p>
                                            <a href="<?=SITE?>blog/<?=$blog["blog_seflink"]?>" class="btn btn-primary font-weight-semibold ">
                                                <?=$reviewTextTitle?>
                                                <svg class="ms-2" version="1.1" viewBox="0 0 15.698 8.706" width="17" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <polygon stroke="#FFF" stroke-width="0.1" fill="#FFF" points="11.354,0 10.646,0.706 13.786,3.853 0,3.853 0,4.853 13.786,4.853 10.646,8 11.354,8.706 15.698,4.353 " />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Contact Area -->
    <?php
include(SAYFA."contact-component.php");
?>

    

</div>

<?php
include(DATA . "footer.php");

?>