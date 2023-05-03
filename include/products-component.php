<div class="row">

                <?php
                $products = $VT->VeriGetir("products", "WHERE lang_id=?", array($lang_id), "");
                if ($products != false) {
                    $delay = 0;
                    $order = 0;
                    foreach ($products as $product) {
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
                        <div class="col-md-6 appear-animation my-2" data-appear-animation="<?= $dataAnimation ?>" data-appear-animation-delay="<?= $delay ?>">
                            <div class="card border-radius-0 bg-color-light border-0 box-shadow-1 mb-3 h-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img class="img-fluid" src="<?= SITE ?>images/products/<?= $product["product_image"] ?>" alt="">
                                        </div>
                                        <div class="col-md-6">
                                            <span class="text-5"><?= $siteTitle ?></span>
                                            <h4 class="card-title mb-1 text-4 font-weight-bold text-8 py-3"><?= stripslashes($product["name"]) ?></h4>
                                            <p><?= $product["product_usage"] ?></p>
                                            <a class="btn btn-primary btn-rounded" href="<?= SITE ?>urun/<?= $product["seflink"] ?>"><?= $reviewTextTitle ?></a>
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