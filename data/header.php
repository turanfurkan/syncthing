<!DOCTYPE html>
<html lang="tr">

<head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LDBLMV9ZTK"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-LDBLMV9ZTK');
</script>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?= $siteTitle ?> | <?= $pageTitle ?></title>

    <meta name="keywords" content="WebSite Template" />
    <meta name="description" content="<?= $siteTitle ?> - <?= $pageTitle ?>">
    <meta name="author" content="<?= SITE ?>">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= SITE ?>images/brand/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= SITE ?>images/brand/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= SITE ?>images/brand/favicon-16x16.png">
    <link rel="manifest" href="<?= SITE ?>images/brand/site.webmanifest">

    <!-- Primary Meta Tags -->
    <meta name="title" content="<?= $siteTitle ?> | <?= $pageTitle ?>">
    <meta name="description" content="<?= $pageDescription ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $pageLink ?>">
    <meta property="og:title" content="<?= $siteTitle ?> | <?= $pageTitle ?>">
    <meta property="og:description" content="<?= $pageDescription ?>">
    <meta property="og:image" content="<?= SITE ?>images/brand/logo-link.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= $pageLink ?>">
    <meta property="twitter:title" content="<?= $siteTitle ?> | <?= $pageTitle ?>">
    <meta property="twitter:description" content="<?= $pageDescription ?>">
    <meta property="twitter:image" content="<?= SITE ?>images/brand/logo-link.png">


    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CPlayfair+Display:400,700,900&display=swap" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?= SITE ?>vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= SITE ?>vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= SITE ?>vendor/animate/animate.compat.css">
    <link rel="stylesheet" href="<?= SITE ?>vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="<?= SITE ?>vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= SITE ?>vendor/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= SITE ?>vendor/magnific-popup/magnific-popup.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?= SITE ?>css/theme.css">
    <link rel="stylesheet" href="<?= SITE ?>css/theme-elements.css">
    <link rel="stylesheet" href="<?= SITE ?>css/theme-blog.css">
    <link rel="stylesheet" href="<?= SITE ?>css/theme-shop.css">

    <!-- Demo CSS -->
    <link rel="stylesheet" href="<?= SITE ?>css/main.css">

    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="<?= SITE ?>css/skins/skin.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?= SITE ?>css/custom.css">

    <!-- Head Libs -->
    <script src="<?= SITE ?>vendor/modernizr/modernizr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        section.section {
            background: #dc143c;
            border-top: 5px solid #f1f1f1;
            margin: 30px 0;
            padding: 50px 0;
            padding-bottom: 50px;
        }

        .custom-section-shape-background .custom-shape-divider::before {
            content: '';
            position: absolute;
            top: -150px;
            left: 0;
            width: 100%;
            height: 150%;
            background: #fff;
            transform: skewY(-4deg);
            z-index: 0;
        }

        #footer {
            background: #dc143c;
            border-top: 4px solid #212529;
            font-size: 0.9em;
            margin-top: 50px;
            padding: 0;
            padding-top: 0px;
            padding-bottom: 0px;
            position: relative;
            clear: both;
        }

        .custom-list-style-1>li+li {
            border-top: 1px solid #fff;
        }
    </style>
</head>

<body>
    <div class="body">

        <header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
            <div class="header-body header-body-bottom-border border-top-0">
                <div class="header-top">
                    <div class="container">
                        <div class="header-row">
                            <div class="header-column justify-content-start dm-none">
                                <div class="header-row">
                                    <div class="btn-group">
                                        <a href="tel:<?= str_replace(' ', '', $sitePhone); ?>" class="btn btn-primary btn-rounded text-color-white text-decoration-none"><i class="fa fa-phone"></i> <?= $sitePhone ?></a>
                                        <a href="mailto:<?= $siteMail ?>" class="btn btn-primary btn-rounded text-color-white text-decoration-none"><i class="fa fa-envelope"></i> <?= $siteMail ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="header-column justify-content-md-end">
                                <div class="header-row">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary bg-transparent btn-rounded border-0 btn-sm text-dark" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php
                                            $activeLang = $VT->VeriGetir("languages", "WHERE lang_id=?", array($lang_id), "ORDER BY lang_id ASC");
                                            if ($activeLang != false) {
                                            ?>
                                                <img src="<?= SITE ?>img/blank.gif" class="flag flag-<?= $activeLang[0]["lang_seflink"] ?>" alt="<?= stripslashes($activeLang[0]["lang_title"]) ?>" /> <?= stripslashes($activeLang[0]["lang_title"]) ?>
                                            <?php
                                            }
                                            ?>
                                            <i class="fas fa-chevron-down"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <?php
                                            $languages = $VT->VeriGetir("languages", "WHERE lang_status=?", array(1), "ORDER BY lang_id ASC");
                                            if ($languages != false) {
                                                foreach ($languages as $lang) {
                                            ?>
                                                    <form class="lang-form " action="" method="POST">
                                                        <input type="hidden" name="lang_id" value="<?= $lang["lang_id"] ?>">
                                                        <button class="bg-transparent dropdown-item border-0 " type="sumbit" name="lang_form"><img src="<?= SITE ?>img/blank.gif" class="flag flag-<?= $lang["lang_seflink"] ?>" alt="<?= stripslashes($lang["lang_title"]) ?>" /> <span class="text-dark"><?= stripslashes($lang["lang_title"]) ?></span></button>
                                                    </form>
                                            <?php
                                                }
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <ul class="header-social-icons social-icons social-icons-clean d-none d-md-block">
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
                                    <a href="<?= SITE ?>teklif-al" class="btn custom-svg-btn-style-1 custom-svg-btn-style-1-solid custom-svg-btn-style-1-small text-color-light ms-4">
                                        <svg class="custom-svg-btn-background" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 210 70" preserveAspectRatio="none">
                                            <polygon fill="none" stroke="#D4D4D4" stroke-width="2" stroke-miterlimit="10" points="7,5 185,5 205,34 186,63 7,63 " />
                                        </svg>
                                        <?= $getAQuoteTextTitle ?>
                                        <svg class="custom-svg-btn-arrow" version="1.1" viewBox="0 0 15.698 8.706" width="17" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <polygon stroke="#FFF" stroke-width="0.4" fill="#FFF" points="11.354,0 10.646,0.706 13.786,3.853 0,3.853 0,4.853 13.786,4.853 10.646,8 11.354,8.706 15.698,4.353 " />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-container container">
                    <div class="header-row">
                        <div class="header-column">
                            <div class="header-row">
                                <div class="header-logo w-100">
                                    <a href="<?= SITE ?>">
                                        <?php
                                        if (!empty($siteLogo)) {
                                        ?>

                                            <img src="<?= SITE ?>images/brand/<?= $siteLogo ?>" width="200" class="img-fluid" alt="Logo" />
                                        <?php
                                        }
                                        ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="header-column justify-content-end">
                            <div class="header-row">
                                <div class="header-nav header-nav-links">
                                    <div class="header-nav-main header-nav-main-text-capitalize header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                        <nav class="collapse">
                                            <ul class="nav nav-pills" id="mainNav">
                                                <?php
                                                $siteNavMenu = $VT->VeriGetir("navmenu", "WHERE status=? and lang_id=?", array(1, $lang_id), "ORDER BY ID ASC");
                                                $products = $VT->VeriGetir("products", "WHERE status=? and lang_id=?", array(1,$lang_id), "");

                                                if ($siteNavMenu != false) {
                                                    foreach ($siteNavMenu as $menu) {
                                                ?>
                                                        <li class="dropdown">
                                                            <a class="dropdown-item" <?php if ($menu["seflink"] == "urunler") { ?>href="#" <?php } else { ?>href="<?= SITE ?><?= $menu["seflink"] ?>" <?php  } ?>>
                                                                <?= stripslashes($menu["name"]) ?>
                                                            </a>
                                                            <?php
                                                            if ($menu["seflink"] == "urunler") {

                                                            ?>
                                                                <ul class="dropdown-menu">


                                                                    <?php
                                                                    if ($products != false) {
                                                                        foreach ($products as $product) {
                                                                    ?>
                                                                            <li><a href="<?= SITE ?>urun/<?= $product["seflink"] ?>" class="dropdown-item"><?= $product["name"] ?></a></li>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <li><a href="<?= SITE ?>urunler" class="dropdown-item">TÜM ÜRÜNLER</a></li>




                                                                </ul>
                                                            <?php
                                                            }
                                                            ?>


                                                        </li>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </nav>
                                        <a class="btn btn-primary align-self-center border-0 btn-rounded dm-none" target="_blank" style="background:#43D854;" href="<?= $siteWhatsapp ?>"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                                    </div>
                                </div>
                                <div class="header-nav-features">
                                    <div class="header-nav-feature header-nav-features-search d-inline-flex">
                                        <a href="#" class="header-nav-features-toggle text-decoration-none" data-focus="headerSearch">
                                            <i class="icons icon-magnifier header-nav-top-icon font-weight-bold text-4 top-2 text-color-hover-primary"></i>
                                        </a>
                                        <div class="header-nav-features-dropdown header-nav-features-dropdown-mobile-fixed" id="headerTopSearchDropdown">
                                            <form role="search" action="page-search-results.html" method="get">
                                                <div class="simple-search input-group">
                                                    <input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
                                                    <button class="btn" type="submit">
                                                        <i class="icons icon-magnifier header-nav-top-icon font-weight-bold text-color-dark text-4 text-color-hover-primary top-2"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <button class="hamburguer-btn hamburguer-btn-dark hamburguer-btn-sticky-dark" data-set-active="false">
                                    <span class="hamburguer">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="side-header-hamburguer-sidebar side-header-hamburguer-sidebar-right side-header-above side-header-right-no-reverse">
            <header id="header" class="side-header side-header-lg side-header-hide d-flex">
                <div class="header-body">
                    <div class="header-container container d-flex h-100">
                        <div class="header-column flex-lg-column justify-content-center h-100">
                            <div class="header-row header-row-side-header flex-row h-100 pb-5 mt-5 pt-5">
                                <button class="hamburguer-btn hamburguer-btn-side-header active" data-set-active="false">
                                    <span class="close">
                                        <span></span>
                                        <span></span>
                                    </span>
                                </button>
                                <div class="side-header-scrollable scrollable colored-slider" data-plugin-scrollable>
                                    <div class="scrollable-content">
                                        <div class="header-nav header-nav-links header-nav-links-side-header header-nav-links-vertical header-nav-links-vertical-expand header-nav-click-to-open align-self-start">
                                            <div class="header-logo w-100">
                                                <a href="<?= SITE ?>">
                                                    <?php
                                                    if (!empty($siteLogo)) {
                                                    ?>
                                                        <img src="<?= SITE ?>images/brand/<?= $siteLogo ?>" class="img-fluid" alt="Logo" />
                                                    <?php
                                                    }
                                                    ?>
                                                </a>
                                            </div>
                                            <div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-4 header-nav-main-sub-effect-1">
                                                <nav>
                                                    <ul class="nav nav-pills" id="mainNav">
                                                        <?php
                                                        if ($siteNavMenu != false) {
                                                            foreach ($siteNavMenu as $menu) {
                                                        ?>

                                                                <li class="dropdown" id="myDiv<?= stripslashes($menu["seflink"]) ?>">
                                                                    <a class="dropdown-item dropdown-toggle " <?php
                                                                                                                if ($menu["depth"] == 2) {
                                                                                                                ?> id="myButton<?= stripslashes($menu["seflink"]) ?>" href="#" <?php
                                                                                                                                                                            } else {
                                                                                                                                                                                ?> href="<?= SITE ?><?= stripslashes($menu["seflink"]) ?>" <?php
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                            ?>>
                                                                        <?= stripslashes($menu["name"]) ?> <i class="fas fa-chevron-down fa-chevron-right"></i>
                                                                    </a>
                                                                    <?php
                                                                    if ($menu["depth"] == 2) {
                                                                    ?>

                                                                        <ul class="dropdown-menu ">
                                                                            <?php
                                                                            if ($products != false) {
                                                                                foreach ($products as $product) {
                                                                            ?>
                                                                                    <li><a href="<?= SITE ?>urun/<?= $product["seflink"] ?>" class="dropdown-item"><?= $product["name"] ?></a></li>
                                                                            <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                            <li><a href="<?= SITE ?>urunler" class="dropdown-item">TÜM ÜRÜNLER</a></li>


                                                                        </ul>
                                                                    <?php
                                                                    }

                                                                    ?>

                                                                </li>
                                                                <?php
                                                                if ($menu["depth"] == 2) {
                                                                ?>

                                                                    <script>
                                                                        const button = $('#myButton<?= stripslashes($menu["seflink"]) ?>');
                                                                        const div = $('#myDiv<?= stripslashes($menu["seflink"]) ?>');

                                                                        let counter = 0;

                                                                        button.click(function() {
                                                                            counter++;
                                                                            if (counter % 2 === 1) {
                                                                                div.addClass('open');
                                                                            } else {
                                                                                div.removeClass('open');
                                                                            }
                                                                        });
                                                                    </script>

                                                                <?php
                                                                }

                                                                ?>

                                                        <?php
                                                            }
                                                        }
                                                        ?>

                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-row justify-content-end pb-lg-3">
                                <ul class="header-social-icons social-icons social-icons-clean">
                                    <?php
                                    if ($siteSocialMedias != false) {
                                        foreach ($siteSocialMedias as $socialMedia) {
                                    ?>
                                            <li class="social-icons-<?= strtolower(stripslashes($socialMedia["social_media_title"])) ?>"><a href="<?= stripslashes($socialMedia["social_media_link"]) ?>" target="_blank" title="<?= stripslashes($socialMedia["social_media_title"]) ?>"><?= stripslashes($socialMedia["social_media_icon"]) ?></a></li>

                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                                <p class="text-1 pt-3">© 2023 <?= $siteTitle ?>. <?= $copyRightTextTitle ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>