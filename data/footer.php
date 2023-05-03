<div class="whatsapp-center dc-none">
    <a href="<?=$siteWhatsapp?>" target="_blank" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>

    </a>
</div>

<!-- Call To Action Area -->
<section class="section section-height-3 bg-dark border-0 m-0">
        <div class="container py-3">
            <div class="row align-items-center justify-content-center text-center text-lg-start">
                <div class="col-md-8 col-lg-9 mb-4 mb-lg-0">
                    <h2 class="text-color-light font-weight-bold custom-positive-ls-5px mb-0"><?=$callToActionSectionTitle?></h2>
                    <p class="text-white mt-3"><?=$callToActionSectionDescription?></p>
                </div>
                <div class="col-lg-3 text-lg-end">
                    <a href="<?=SITE?>teklif-al" class="btn custom-svg-btn-style-1 custom-svg-btn-style-1-light text-color-light text-color-hover-dark">
                        <svg class="custom-svg-btn-background" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 210 70" preserveAspectRatio="none">
                            <polygon fill="transparent" stroke="#FFF" stroke-width="2" stroke-miterlimit="10" points="7,5 185,5 205,34 186,63 7,63 " />
                        </svg>
                        <?=$getAQuoteTextTitle?>
                    </a>
                </div>
            </div>
        </div>
    </section>

<footer id="footer" class="section border-0 pt-5 pb-0 m-0">

    <div class="container pt-lg-5 mt-5">
        <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <a href="<?= SITE ?>">
                    <img src="<?= SITE ?>images/brand/<?= $siteLogoWhite ?>" class="img-fluid mb-4" width="250" alt="Logo White" />

                </a>
                <p class="mb-0 text-white"><?= $siteDescription ?></p>
                <ul class="social-icons social-icons-medium mt-3 bg-light btn-rounded py-3 text-center">
                    <?php
                    $siteSocialMedias = $VT->VeriGetir("social_media", "WHERE social_media_link IS NOT NULL and status=?", array(1), "ORDER BY social_media_id ASC");
                    if ($siteSocialMedias != false) {
                        foreach ($siteSocialMedias as $socialMedia) {
                    ?>
                            <li class="social-icons-<?= strtolower(stripslashes($socialMedia["social_media_title"])) ?>"><a href="<?= stripslashes($socialMedia["social_media_link"]) ?>" target="_blank" title="<?= stripslashes($socialMedia["social_media_title"]) ?>" style="background: <?= stripslashes($socialMedia["color_code"]) ?>;"><span class="text-white"><?= stripslashes($socialMedia["social_media_icon"]) ?></span></a></li>

                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-color-light font-weght-bold positive-ls-2 custom-font-size-2">MENU</h4>

                        <ul class="list list-unstyled mb-0 row">
                            <?php

                            if ($siteNavMenu != false) {
                                foreach ($siteNavMenu as $menu) {
                            ?>
                                    <li class="dropdown">
                                        <a class="dropdown-item text-white" href="<?= SITE ?><?= $menu["seflink"] ?>">
                                            <?= stripslashes($menu["name"]) ?>
                                        </a>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-color-light font-weght-bold positive-ls-2 custom-font-size-2"><?=$productsTextTitle?></h4>

                        <ul class="list list-unstyled mb-0 row">

                            <?php
                            $products = $VT->VeriGetir("products", "WHERE status=?", array(1), "", 4);

                            if ($products != false) {
                                foreach ($products as $product) {
                            ?>
                                    <li><a href="<?= SITE ?>urun/<?= $product["seflink"] ?>" class="dropdown-item text-white"><?= $product["name"] ?></a></li>
                            <?php
                                }
                            }
                            ?>
                            <li><a href="<?= SITE ?>urunler" class="dropdown-item text-white"><?=$allProductsTextTitle?></a></li>

                        </ul>
                    
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h4 class="text-color-light font-weght-bold positive-ls-2 custom-font-size-2"><?=$workingHoursTextTitle?></h4>
                <ul class="list list-unstyled list-inline custom-list-style-1 mb-0">
                    <li><a class="text-white"><i class="fa fa-phone"></i> <?=$sitePhone?></a></li>
                    <li><a class="text-white"><i class="fa fa-envelope"></i> <?=$siteMail?></a></li>
                    <li><a class="text-white"><i class="fa fa-map-marker"></i> <?=$siteAdress?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright mt-5 pb-5 bg-primary">
        <div class="container custom-footer-top-light-border pt-4">
            <div class="row">
                <div class="col">
                    <p class="text-center text-3 mb-0 text-white"><?= $siteTitle ?> © 2023. <?=$allRightReservedTextTitle?>.</p>
                </div>
            </div>
        </div>
    </div>
</footer>



</div>

<!-- Vendor -->
<script src="<?= SITE ?>vendor/plugins/js/plugins.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?= SITE ?>js/theme.js"></script>

<!-- Current Page Vendor and Views -->
<script src="<?= SITE ?>js/views/view.contact.js"></script>

<!-- Demo -->
<script src="<?= SITE ?>js/main.js"></script>

<!-- Theme Custom -->
<script src="<?= SITE ?>js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?= SITE ?>js/theme.init.js"></script>



</body>

</html>