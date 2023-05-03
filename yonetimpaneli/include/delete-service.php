<?php

if (!empty($_GET["service_id"])) {
    $service_id = $VT->filter($_GET["service_id"]);
    $kontrol = $VT->VeriGetir("services", "WHERE service_id=?", array($service_id), "");
    if ($kontrol != false) {
        $section = $VT->VeriGetir("pages_sections", "WHERE section_seflink=?", array($kontrol[0]["service_table"]), "");

        $sil = $VT->SorguCalistir("DELETE FROM " . "services", "WHERE service_id=?", array($service_id), 1);
?>
        <meta http-equiv="refresh" content="0;url=<?= SITE ?>services/<?= $section[0]["section_id"] ?>">
    <?php
    } else {
    ?>

        <meta http-equiv="refresh" content="0;url=<?= SITE ?>services/<?= $section[0]["section_id"] ?>">
        <?php
    }
}
else {
    ?>

        <meta http-equiv="refresh" content="0;url=<?= SITE ?>services/<?= $section[0]["section_id"] ?>">
        <?php
    }

?>