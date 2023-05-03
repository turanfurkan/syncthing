<?php
if (!empty($_GET["silinecekID"])  && !empty($_GET["lang_id"])) {
	$ID = $VT->filter($_GET["silinecekID"]);
	$project_id = $_GET["ID"];
	$lang_id = $VT->filter($_GET["lang_id"]);


	$veri = $VT->VeriGetir("resimler", "WHERE ID=?", array($ID), "ORDER BY ID ASC", 1);
	if ($veri != false) {
		$resim = $veri[0]["resim"];
		if (file_exists("../images/resimler/" . $resim)) {
			unlink("../images/resimler/" . $resim);
		}
		$sil = $VT->SorguCalistir("DELETE FROM resimler", "WHERE ID=?", array($ID), 1);
?>
		<meta http-equiv="refresh" content="0;url=<?= SITE ?>duzenle/<?=stripslashes($veri[0]["tablo"])?>/<?= $project_id ?>/<?= $lang_id ?>">
	<?php
	} else {
	?>
		<meta http-equiv="refresh" content="0;url=<?= SITE ?>duzenle/<?=stripslashes($veri[0]["tablo"])?>/<?= $project_id ?>/<?= $lang_id ?>">
	<?php
	}
} else {
	?>
	<meta http-equiv="refresh" content="0;url=<?= SITE ?>">
<?php
}
?>