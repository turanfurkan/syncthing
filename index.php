<?php
@session_start();
@ob_start();

define("DATA", "data/");
define("SAYFA", "include/");
define("SINIF", "yonetimpaneli/class/");
include_once(SINIF."class.phpmailer.php");
include_once(SINIF."class.upload.php");
include_once(SINIF."VT.php");
$VT=new VT();

include(DATA . "lang-settings.php");


include_once(DATA . "baglanti.php");

define("SITE", $siteURL);
define("SITEYONETIM", $siteURL . "yonetimpaneli/");



include(SAYFA . "lang-translated.php");
include(SAYFA . "pages-sections.php");



            if ($_GET && !empty($_GET["sayfa"])) {
                $sayfa = $_GET["sayfa"] . ".php";
                if (file_exists(SAYFA . $sayfa)) {
                    include_once(SAYFA . $sayfa);
                } else {
                    include_once(SAYFA . "home.php");
                }
            } else {
                include_once(SAYFA . "home.php");
            }
