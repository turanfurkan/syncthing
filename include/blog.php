<?php
if (!empty($_GET["seflink"])) {
    $seflink = $VT->filter($_GET["seflink"]);
    $blog = $VT->VeriGetir("blogs", "WHERE blog_seflink=?", array($seflink), "ORDER BY ID ASC");
    if ($blog != false) {
        $pageTitle = stripslashes($blog[0]["blog_title"]);
        $pageDescription = stripslashes($blog[0]["blog_description"]);
        $blogImage = $blog[0]["blog_image"];
        $blogID = $blog[0]["ID"];

        $pageLink = SITE . "blog/" . stripslashes($blog[0]["blog_seflink"]);
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
                        <li><a href="<?= SITE ?>bloglar" class="text-decoration-none"><?= $blogsTextTitle ?></a></li>
                        <li class="active"><?= $pageTitle ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <style>
        .blog-text p{
            color: #000 !important;
        }
    </style>

    <section class="section bg-color-light border-0 m-0">

        <div class="container pt-3">
            <div class="row">
                <div class="col">
                    <h2 class="text-color-dark font-weight-medium positive-ls-3 text-4 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">Üretim Özellikleri</h2>
                    <h3 class="font-weight-bold text-transform-none text-9 line-height-2 mb-3 text-dark appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400"><?= $pageTitle ?></h3>
                </div>
            </div>
            <div class="row justify-content-center">
            <div class="col-lg-12 pe-lg-4 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">
                    <img src="<?= SITE ?>images/blogs/<?= $blogImage ?>" class="img-fluid" width="300" alt="" />

                </div>
                <div class="col-lg-12">
                    <div class="pb-2 text-dark blog-text appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
                        <?= $pageDescription ?>
                    </div>


                </div>
                
            </div>
        </div>

    </section>

    <section class="section  position-relative border-0 m-0">
        <div class="container py-4">

            <div class="row">
                <?php
                $blogs = $VT->VeriGetir("blogs", "WHERE lang_id=? and status=?", array($lang_id, 1), "ORDER BY RAND()", 4);
                if ($blogs != false) {
                    $delay = 0;
                    foreach ($blogs as $blog) {
                        $delay += 300;
                ?>
                        <div class="col-lg-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="<?= $delay ?>">

                            <article class="mb-5">
                                <div class="card border-0 border-radius-0 box-shadow-1">
                                    <div class="card-body p-4 z-index-1">
                                        <a href="<?= SITE ?>blog/<?= $blog["blog_seflink"] ?>">
                                            <img class="card-img-top border-radius-0" src="<?= SITE ?>images/blogs/<?= $blog["blog_image"] ?>" alt="<?= stripslashes($blog["blog_title"]) ?>">
                                        </a>
                                        <p class="text-uppercase text-1 mb-3 pt-1 text-color-default">
                                            <time pubdate datetime="2022-01-10"><?= date("d.m.Y", strtotime($blog["created_date"])) ?></time>
                                            <span class="opacity-3 d-inline-block px-2">|</span>
                                            <?= $siteTitle ?>
                                        </p>
                                        <div class="card-body p-0">
                                            <h4 class="card-title mb-3 text-5 font-weight-semibold"><a class="text-color-dark text-color-hover-primary text-decoration-none" href="<?= SITE ?>blog/<?= $blog["blog_seflink"] ?>"><?= stripslashes($blog["blog_title"]) ?></a></h4>
                                            <a href="<?= SITE ?>blog/<?= $blog["blog_seflink"] ?>" class="btn btn-primary font-weight-semibold ">
                                                <?= $reviewTextTitle ?>
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
   
</div>


<?php
include(DATA . "footer.php");

?>