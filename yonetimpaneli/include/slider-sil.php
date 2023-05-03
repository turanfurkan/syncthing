<?php
if(!empty($_GET["slide_id"]))
{
    $tablo="slider";
	$ID=$VT->filter($_GET["slide_id"]);
		$veri=$VT->VeriGetir($tablo,"WHERE slide_id=?",array($ID),"ORDER BY slide_id ASC",1);
		if($veri!=false)
		{
			$sil=$VT->SorguCalistir("DELETE FROM ".$tablo,"WHERE slide_id=?",array($ID),1);
			?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>slider-liste">
        <?php
		}
		else
		{
			?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>slider-liste">
        <?php
		}
 
	}
	else
	{
		?>
        <meta http-equiv="refresh" content="0;url=<?=SITE?>">
        <?php
	}
 ?>