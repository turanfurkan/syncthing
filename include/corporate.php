<?php
include(SAYFA."coporate-page-sections.php");
    if (!empty($_GET["seflink"])) {
        $seflink=$VT->filter($_GET["seflink"]);
        $corporatePage=$VT->VeriGetir("pages","WHERE page_seflink=?",array($seflink),"ORDER BY page_id ASC");
        if ($corporatePage!=false) {
            $pageTitle=stripslashes($corporatePage[0]["page_title"]);
            $pageDescription=stripslashes($corporatePage[0]["page_description"]);
            $pageLink=SITE."kurumsal/".stripslashes($corporatePage[0]["page_seflink"]);
            
        }
        else
        {

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
								<h1 class="font-weight-bold text-8 mb-0"><?=$pageTitle?></h1>
							</div>
							<div class="col-md-4 order-1 order-md-2 align-self-center">
								<ul class="breadcrumb breadcrumb-light d-block text-md-end text-4 mb-0">
									<li><a href="<?=SITE?>" class="text-decoration-none"><?=$homeTextTitle?></a></li>
									<li class="active"><?=$pageTitle?></li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<section class="section custom-section-shape-background border-0 m-0">
					<div class="container position-relative z-index-3 my-5">
						<div class="row align-items-center justify-content-center">
							<div class="col-lg-6 pe-lg-5 mb-4 mb-lg-0 align-self-center">
                                <?php
                                if (!empty($corporateAboutSectionImage)) {
                                    ?>
                                    	<img src="<?=SITE?>images/sections/<?=$corporateAboutSectionImage?>" class="img-fluid box-shadow-3 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200" alt="" />

                                    <?php
                                }
                                ?>
							</div>
							<div class="col-lg-6 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="500">
								<h2 class="text-color-primary font-weight-medium positive-ls-3 text-4 mb-0"><?=$siteTitle?></h2>
								<h3 class="font-weight-bold text-transform-none text-9 line-height-2 mb-3"><?=$corporateAboutSectionTitle?></h3>
                                <?php
                                    echo $corporateAboutSectionDescription;
                                ?>
                            </div>
						</div>
					</div>
				</section>

				<section class="section custom-section-shape-background custom-section-shape-background-reverse border-0 m-0">
					<div class="container position-relative z-index-3 my-5">
						<div class="row align-items-center justify-content-center">
							<div class="col-lg-6 order-2 order-lg-1 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
								<h3 class="font-weight-bold text-transform-none text-9 line-height-2 mb-3"><?=$corporateVisionSectionTitle?></h3>
                                <?php
                                    echo $corporateVisionSectionDescription;
                                ?>

                            </div>
							<div class="col-lg-6 order-1 order-lg-2 ps-lg-5 mb-4 mb-lg-0">
                            <?php
                                if (!empty($corporateVisionSectionImage)) {
                                    ?>
                                    	<img src="<?=SITE?>images/sections/<?=$corporateVisionSectionImage?>" class="img-fluid box-shadow-3 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200" alt="" />

                                    <?php
                                }
                                ?>							</div>
						</div>
					</div>
				</section>

				
			</div> 

            
<?php
include(DATA . "footer.php");

?>