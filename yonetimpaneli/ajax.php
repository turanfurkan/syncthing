<?php
@session_start();
@ob_start();
define("DATA","data/");
define("SAYFA","include/");
define("SINIF","class/");
include_once(DATA."baglanti.php");
define("SITE",$siteURL);


if(!empty($_POST["tablo"]) && !empty($_POST["ID"]) && $_FILES && !empty($_FILES["file"]["tmp_name"]))
	{
			 $tablo=$VT->filter($_POST["tablo"]);
 			 $ID=$VT->filter($_POST["ID"]);
 			 $resim=$VT->uploadMulti("file",$tablo,$ID,"../images/resimler/");

			 $ekle=$VT->SorguCalistir("INSERT INTO ".$tablo,"SET tablo=?, KID=?",array($tablo,$ID));
			  if($resim!=false)
			  {
				  echo "TAMAM";
			  }
			  else
			  {
				  echo "HATA";
			  }
	}


if($_POST)
{
	if(!empty($_POST["tablo"]) && !empty($_POST["lang_id"]) && !empty($_POST["lang_status"]))
	{
		$tablo=$VT->filter($_POST["tablo"]);
		$ID=$VT->filter($_POST["lang_id"]);
		$lang_status=$VT->filter($_POST["lang_status"]);
		$guncelle=$VT->SorguCalistir("UPDATE ".$tablo,"SET lang_status=? WHERE lang_id=?",array($lang_status,$ID),1);
		if($guncelle!=false)
		{
			echo "TAMAM";
		}
		else
		{
			echo "HATA";
		}
	}
	else
	{
		echo "BOS";
	}
}
?>