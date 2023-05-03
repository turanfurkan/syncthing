<?php

$mainlanguage = $VT->VeriGetir("languages", "WHERE is_main_language=?", array(1), "ORDER BY lang_id ASC");
if ($mainlanguage!=false) {
    $lang_id = $mainlanguage[0]["lang_id"];
}
else
{
    $lang_id = 1;

}


$languages = $VT->VeriGetir("languages", "WHERE 1", "", "");



if (isset($_POST["lang_form"])) {
    setcookie('lang', null, -1, '/');

    $value = $_POST["lang_id"];
    setcookie("lang", $value, time() + 3600);
    $lang_id = $_COOKIE["lang"];
?>
    <meta http-equiv="refresh" content="0; url=<?= SITE ?>">

<?php
}



if (!isset($_COOKIE["lang"])) {
    $lang_id = 1;
} else {
    $lang_id = $_COOKIE["lang"];
}