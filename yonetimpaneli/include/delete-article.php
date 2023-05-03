<?php

if (!empty($_GET["ID"])) {
    $ID = $VT->filter($_GET["ID"]);
    $kontrol = $VT->VeriGetir("articles", "WHERE ID=?", array($ID), "");
    if ($kontrol != false) {

        $sil = $VT->SorguCalistir("DELETE FROM " . "articles", "WHERE ID=?", array($ID), 1);
?>
        <meta http-equiv="refresh" content="0;url=<?= SITE ?>makaleler">
    <?php
    } else {
    ?>

        <meta http-equiv="refresh" content="0;url=<?= SITE ?>makaleler">
        <?php
    }
}
else {
    ?>

        <meta http-equiv="refresh" content="0;url=<?= SITE ?>makaleler">
        <?php
    }

?>