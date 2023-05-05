<?php
class VT
{

	// var $sunucu = "localhost";
	// var $user = "fileyurd_user";
	// var $password = "SKb18N?wy(JZ";
	// var $dbname = "fileyurd_db";
	// var $baglanti;

	var $sunucu = "localhost";
	var $user = "root";
	var $password = "";
	var $dbname = "fileyurdu.com";
	var $baglanti;


	function __construct()
	{
		try {

			$this->baglanti = new PDO("mysql:host=" . $this->sunucu . ";dbname=" . $this->dbname . ";charset=utf8;", $this->user, $this->password);
		} catch (PDOException $error) {

			echo $error->getMessage();
			exit();
		}
	}

	public function VeriGetir($tablo, $wherealanlar = "", $wherearraydeger = "", $ordeby = "ORDER BY ID ASC", $limit = "")
	{
		$this->baglanti->query("SET CHARACTER SET utf8");
		$sql = "SELECT * FROM " . $tablo; /*SELECT * FROM ayarlar*/
		if (!empty($wherealanlar) && !empty($wherearraydeger)) {
			$sql .= " " . $wherealanlar; /*SELECT * FROM ayarlarWHERE */
			if (!empty($ordeby)) {
				$sql .= " " . $ordeby;
			}
			if (!empty($limit)) {
				$sql .= " LIMIT " . $limit;
			}
			$calistir = $this->baglanti->prepare($sql);
			$sonuc = $calistir->execute($wherearraydeger);
			$veri = $calistir->fetchAll(PDO::FETCH_ASSOC);
		} else {
			if (!empty($ordeby)) {
				$sql .= " " . $ordeby;
			}
			if (!empty($limit)) {
				$sql .= " LIMIT " . $limit;
			}
			$veri = $this->baglanti->query($sql, PDO::FETCH_ASSOC);
		}

		if ($veri != false && !empty($veri)) {
			$datalar = array();
			foreach ($veri as $bilgiler) {
				$datalar[] = $bilgiler;
			}
			return $datalar;
		} else {
			return false;
		}
	}

	public function SorguCalistir($tablo, $alanlar = "", $degerlerarray = "", $limit = "")
	{
		$this->baglanti->query("SET CHARACTER SET utf8");
		if (!empty($alanlar) && !empty($degerlerarray)) {
			$sql = $tablo . " " . $alanlar;
			if (!empty($limit)) {
				$sql .= " LIMIT " . $limit;
			}
			$calistir = $this->baglanti->prepare($sql);
			$sonuc = $calistir->execute($degerlerarray);
		} else {
			$sql = $tablo;
			if (!empty($limit)) {
				$sql .= " LIMIT " . $limit;
			}
			$sonuc = $this->baglanti->exec($sql);
		}

		if ($sonuc != false) {
			return true;
		} else {
			return false;
		}
		$this->baglanti->query("SET CHARACTER SET utf8");
	}

	public function seflink($val)
	{
		$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#', '?', '*', '!', '.', '(', ')');
		$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp', '', '', '', '', '', '');
		$string = strtolower(str_replace($find, $replace, $val));
		$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
		$string = trim(preg_replace('/\s+/', ' ', $string));
		$string = str_replace(' ', '-', $string);
		return $string;
	}

	public function RemainingTime($registerDate)
	{
		$today = date("Y-m-d H:i:s");

		$start_date = strtotime($today);
		$end_date = strtotime($registerDate);

		$remainingDay = intval(($start_date - $end_date) / 60 / 60 / 24);

		if ($remainingDay < 7) {
			return "Yeni Üye";
		} elseif ($remainingDay > 7 && $remainingDay < 30) {
			$convertToWeek = intval($remainingDay / 7);
			return $convertToWeek . " Haftalık Üye";
		} elseif ($remainingDay > 30 && $remainingDay < 365) {
			$convertToMonth = intval($remainingDay / 30);
			return $convertToMonth . " Aylık Üye";
		} else {

			$convertToYear = intval($remainingDay / 365);
			return $convertToYear . " Yıllık Üye";
		}
	}

	public function ModulEkle()
	{
		if (!empty($_POST["baslik"])) {
			$baslik = $_POST["baslik"];
			if (!empty($_POST["durum"])) {
				$durum = 1;
			} else {
				$durum = 2;
			}
			$tablo = str_replace("-", "", $this->seflink($baslik));
			$tabloOlustur = $this->SorguCalistir('CREATE TABLE IF NOT EXISTS `' . $tablo . '` ( `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `seflink` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8_turkish_ci,
  `image` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `seo_keyword` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;');
		} else {
			return false;
		}
	}

	public function filter($val, $tf = false)
	{
		if ($tf == false) {
			$val = strip_tags($val);
		}
		$val = addslashes(trim($val));
		return $val;
	}

	public function uzanti($dosyaadi)
	{
		$parca = explode(".", $dosyaadi);
		$uzanti = end($parca);
		$donustur = strtolower($uzanti);
		return $donustur;
	}

	public function upload($nesnename, $yuklenecekyer = 'images/', $tur = 'img', $w = '', $h = '', $resimyazisi = '')
	{
		if ($tur == "img") {
			if (!empty($_FILES[$nesnename]["name"])) {
				$dosyanizinadi = $_FILES[$nesnename]["name"];
				$tmp_name = $_FILES[$nesnename]["tmp_name"];
				$uzanti = $this->uzanti($dosyanizinadi);
				if ($uzanti == "png" || $uzanti == "jpg" || $uzanti == "jpeg" || $uzanti == "gif") {
					$classIMG = new upload($_FILES[$nesnename]);
					if ($classIMG->uploaded) {
						if (!empty($w)) {
							if (!empty($h)) {
								$classIMG->image_resize = true;
								$classIMG->image_x = $w;
								$classIMG->image_y = $h;
							} else {
								if ($classIMG->image_src_x > $w) {
									$classIMG->image_resize = true;
									$classIMG->image_ratio_y = true;
									$classIMG->image_x = $w;
								}
							}
						} else if (!empty($h)) {
							if ($classIMG->image_src_h > $h) {
								$classIMG->image_resize = true;
								$classIMG->image_ratio_x = true;
								$classIMG->image_y = $h;
							}
						}

						if (!empty($resimyazisi)) {
							$classIMG->image_text = $resimyazisi;

							$classIMG->image_text_direction = 'v';

							$classIMG->image_text_color = '#FFFFFF';

							$classIMG->image_text_position = 'BL';
						}
						$rand = uniqid(true);
						$classIMG->file_new_name_body = $rand;
						$classIMG->Process($yuklenecekyer);
						if ($classIMG->processed) {
							$resimadi = $rand . "." . $classIMG->image_src_type;
							return $resimadi;
						} else {
							return false;
						}
					} else {
						return false;
					}
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else if ($tur == "ds") {

			if (!empty($_FILES[$nesnename]["name"])) {

				$dosyanizinadi = $_FILES[$nesnename]["name"];
				$tmp_name = $_FILES[$nesnename]["tmp_name"];
				$uzanti = $this->uzanti($dosyanizinadi);
				if ($uzanti == "doc" || $uzanti == "docx" || $uzanti == "pdf" || $uzanti == "xlsx" || $uzanti == "xls" || $uzanti == "ppt" || $uzanti == "xml" || $uzanti == "mp4" || $uzanti == "avi" || $uzanti == "mov") {

					$classIMG = new upload($_FILES[$nesnename]);
					if ($classIMG->uploaded) {
						$rand = uniqid(true);
						$classIMG->file_new_name_body = $rand;
						$classIMG->Process($yuklenecekyer);
						if ($classIMG->processed) {
							$dokuman = $rand . "." . $uzanti;
							return $dokuman;
						} else {
							return false;
						}
					}
				}
			}
		} else {
			return false;
		}
	}

	public function kategoriGetir($tablo, $secID = "", $uz = -1)
	{
		$uz++;
		$kategori = $this->VeriGetir("kategoriler", "WHERE tablo=?", array($tablo), "ORDER BY ID ASC");
		if ($kategori != false) {
			for ($q = 0; $q < count($kategori); $q++) {
				$kategoriseflink = $kategori[$q]["seflink"];
				$kategoriID = $kategori[$q]["ID"];
				if ($secID == $kategoriID) {
					echo '<option value="' . $kategoriID . '" selected="selected">' . str_repeat("&nbsp;&nbsp;&nbsp;", $uz) . stripslashes($kategori[$q]["baslik"]) . '</option>';
				} else {
					echo '<option value="' . $kategoriID . '">' . str_repeat("&nbsp;&nbsp;&nbsp;", $uz) . stripslashes($kategori[$q]["baslik"]) . '</option>';
				}
				if ($kategoriseflink == $tablo) {
					break;
				}
				$this->kategoriGetir($kategoriseflink, $secID, $uz);
			}
		} else {
			return false;
		}
	}

	public function tekKategori($tablo, $secID = "", $uz = -1)
	{
		$uz++;
		$kategori = $this->VeriGetir("kategoriler", "WHERE seflink=? AND tablo=?", array($tablo, "modul"), "ORDER BY ID ASC");
		if ($kategori != false) {
			for ($q = 0; $q < count($kategori); $q++) {
				$kategoriseflink = $kategori[$q]["seflink"];
				$kategoriID = $kategori[$q]["ID"];
				if ($secID == $kategoriID) {
					echo '<option value="' . $kategoriID . '" selected="selected">' . str_repeat("&nbsp;&nbsp;&nbsp;", $uz) . stripslashes($kategori[$q]["baslik"]) . '</option>';
				} else {
					echo '<option value="' . $kategoriID . '">' . str_repeat("&nbsp;&nbsp;&nbsp;", $uz) . stripslashes($kategori[$q]["baslik"]) . '</option>';
				}
			}
		} else {
			return false;
		}
	}

	/*Ektra Bonus Fonksiyonlar*/
	/*
	* Sitenize gelen ziyaretçilerin rapoarlarını kaydedebilir ve hangi tarayıcıdan kaç ziyaretçinin sitenizi ziyaret ettiğini görebilirsiniz.
	* Buradaki fonksiyonlar eğitim serimizin 2. Etebında kurumsal firma ve e-ticaret siteleri oluşturulurken kullanılacaktır.
	*/
	public function TekilCogul()
	{
		date_default_timezone_set('Europe/Istanbul');
		$tarih = date("Y-m-d");
		$IP = $this->ipGetir();
		$TARAYICI = $this->tarayiciGetir();
		$tarayicistatistic = $this->VeriGetir("ziyarettarayici", "", "", "ORDER BY ID ASC");

		$konts = $this->VeriGetir("ziyaretciler", "WHERE tarih=? AND IP=?", array($tarih, $IP), "ORDER BY ID ASC", 1);
		if (count($konts) > 0 && $konts != false) {
			$c = ($konts[0]["cogul"] + 1);
			$ID = $konts[0]["ID"];
			$gunc = $this->SorguCalistir("UPDATE ziyaretciler", "SET cogul=? WHERE ID=?", array($c, $ID), 1);
		} else {
			if (!empty($_COOKIE["siteSettingsUse"])) {
			} else {
				$eks = $this->SorguCalistir("INSERT INTO ziyaretciler", "SET IP=?, tarayici=?, tekil=?, cogul=?, xr=?, tarih=?", array($IP, $TARAYICI, 1, 1, 1, $tarih));
				@setcookie("siteSettingsUse", md5(rand(1, 99999)), time() + (60 * 60 * 8));
				if ($TARAYICI == "Google Chrome") {
					$tbl = ($tarayicistatistic[0]["ziyaret"] + 1);
					$tiid = $tarayicistatistic[0]["ID"];
					$ersa = $this->SorguCalistir("UPDATE ziyarettarayici", "SET ziyaret=? WHERE ID=?", array($tbl, $tiid), 1);
				} else if ($TARAYICI == "İnternet Explorer") {
					$tbl = ($tarayicistatistic[1]["ziyaret"] + 1);
					$tiid = $tarayicistatistic[1]["ID"];
					$ersa = $this->SorguCalistir("UPDATE ziyarettarayici", "SET ziyaret=? WHERE ID=?", array($tbl, $tiid), 1);
				} else if ($TARAYICI == "Firefox") {
					$tbl = ($tarayicistatistic[2]["ziyaret"] + 1);
					$tiid = $tarayicistatistic[2]["ID"];
					$ersa = $this->SorguCalistir("UPDATE ziyarettarayici", "SET ziyaret=? WHERE ID=?", array($tbl, $tiid), 1);
				} else {
					$tbl = ($tarayicistatistic[3]["ziyaret"] + 1);
					$tiid = $tarayicistatistic[3]["ID"];
					$ersa = $this->SorguCalistir("UPDATE ziyarettarayici", "SET ziyaret=? WHERE ID=?", array($tbl, $tiid), 1);
				}
			}
		}

		/*sayfa hızı hesaplama*/
		$start = microtime(true);
		$end = microtime(true);
		$time = mb_substr(($end - $start), 0, 4);
		$tarah = $this->SorguCalistir("UPDATE ziyarettarayici", "SET hiz=? WHERE ID=?", array($time, 5), 1);
	}

	public function tarayiciGetir()
	{
		$tarayiciBul = $_SERVER["HTTP_USER_AGENT"];
		$msie = strpos($tarayiciBul, 'MSIE') ? true : false;
		$firefox = strpos($tarayiciBul, 'Firefox') ? true : false;
		$chrome = strpos($tarayiciBul, 'Chrome') ? true : false;
		if (!empty($msie) && $msie != false) {
			$tarayici = "İnternet Explorer";
		} else if (!empty($firefox) && $firefox != false) {
			$tarayici = "Firefox";
		} else if (!empty($chrome) && $chrome != false) {
			$tarayici = "Google Chrome";
		} else {
			$tarayici = "Diğer";
		}
		return $tarayici;
	}


	public function ipGetir()
	{
		if (getenv("HTTP_CLIENT_IP")) {
			$ip = getenv("HTTP_CLIENT_IP");
		} elseif (getenv("HTTP_X_FORWARDED_FOR")) {
			$ip = getenv("HTTP_X_FORWARDED_FOR");
			if (strstr($ip, ',')) {
				$tmp = explode(',', $ip);
				$ip = trim($tmp[0]);
			}
		} else {
			$ip = getenv("REMOTE_ADDR");
		}
		return $ip;
	}


	public function MailGonder($mail,$konu , $body, $bodyType)
	{
		

		$posta = new PHPMailer();
		$posta->CharSet = "UTF-8";
		$posta->SMTPDebug=false;
		$posta->IsSMTP();                                   // send via SMTP
		$posta->Host     = "srvc51.turhost.com"; // SMTP servers
		$posta->SMTPAuth = true;     // turn on SMTP authentication
		$posta->Username = "info@fileyurdu.com";  // SMTP username
		$posta->Password = "RL_K!fSs0&j("; // SMTP password
		$posta->SMTPSecure ="ssl";
		$posta->Port     = 465;
		$posta->From     = "info@fileyurdu.com"; // smtp kullanýcý adýnýz ile ayný olmalý
		$posta->Fromname = "info@fileyurdu.com";
		$posta->AddAddress($mail, "info@fileyurdu.com");
		$posta->IsHTML(true); 
		$posta->Subject  =  $konu;
		$posta->Body = $body;
		if($bodyType == 'html') {
			$posta->isHTML(true);
		}
		$posta->AltBody = strip_tags($body);
		if (!$posta->Send()) {
			echo '<!--' . $posta->ErrorInfo . '-->';
			return false;
		} else {
			return true;
		}
	}

	public function KonuMailGonder($fullName, $phoneNumber, $mail, $city, $message)
	{
		$contactSettings = $this->VeriGetir("contact_settings", "WHERE ID=?", array(1), "");
		if ($contactSettings != false) {
			$sendedEmail = $contactSettings[0]["contact_email"];
		} else {
			$sendedEmail = "";
		}
		$posta = new PHPMailer();
		$posta->CharSet = "UTF-8";
		$posta->SMTPDebug = false;
		$posta->IsSMTP();                                   // send via SMTP
		$posta->Host     = "srvc81.turhost.com"; // SMTP servers
		$posta->SMTPAuth = true;     // turn on SMTP authentication
		$posta->Username = "info@bmqofficial.com";  // SMTP username
		$posta->Password = "Doktorzafer45!"; // SMTP password
		$posta->Port     = 587;
		$posta->SMTPSecure = "tls";
		$posta->From     = "info@bmqofficial.com"; // smtp kullanýcý adýnýz ile ayný olmalý
		$posta->Fromname = "Adnan Soğukçeşme";
		$posta->AddAddress($sendedEmail, $fullName);
		$posta->IsHTML(true);
		$posta->Subject  =  "İletişim Formu | " . $fullName;
		$posta->Body     =  "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office' style='width:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0'>
 <head>
  <meta charset='UTF-8'>
  <meta content='width=device-width, initial-scale=1' name='viewport'>
  <meta name='x-apple-disable-message-reformatting'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta content='telephone=no' name='format-detection'>
  <title>New email template 2022-10-07</title><!--[if (mso 16)]>
    <style type='text/css'>
    a {text-decoration: none;}
    </style>
    <![endif]--><!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--><!--[if gte mso 9]>
<xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG></o:AllowPNG>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
</xml>
<![endif]--><!--[if !mso]><!-- -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i' rel='stylesheet'><!--<![endif]-->
  <style type='text/css'>
#outlook a {
	padding:0;
}
.ExternalClass {
	width:100%;
}
.ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
	line-height:100%;
}
.es-button {
	mso-style-priority:100!important;
	text-decoration:none!important;
}
a[x-apple-data-detectors] {
	color:inherit!important;
	text-decoration:none!important;
	font-size:inherit!important;
	font-family:inherit!important;
	font-weight:inherit!important;
	line-height:inherit!important;
}
.es-desk-hidden {
	display:none;
	float:left;
	overflow:hidden;
	width:0;
	max-height:0;
	line-height:0;
	mso-hide:all;
}
[data-ogsb] .es-button {
	border-width:0!important;
	padding:15px 30px 15px 30px!important;
}
@media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150%!important } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120%!important } h1 { font-size:32px!important; text-align:center } h2 { font-size:26px!important; text-align:center } h3 { font-size:20px!important; text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:32px!important } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important } .es-menu td a { font-size:16px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:16px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class='gmail-fix'] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:inline-block!important } a.es-button, button.es-button { font-size:16px!important; display:inline-block!important; border-width:15px 30px 15px 30px!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; max-height:inherit!important } }
</style>
 </head>
 <body bis_status='ok' style='width:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;font-family:'open sans', 'helvetica neue', helvetica, arial, sans-serif;padding:0;Margin:0'>
  <div class='es-wrapper-color' style='background-color:#EEEEEE'><!--[if gte mso 9]>
			<v:background xmlns:v='urn:schemas-microsoft-com:vml' fill='t'>
				<v:fill type='tile' color='#eeeeee'></v:fill>
			</v:background>
		<![endif]-->
   <table class='es-wrapper' width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top'>
     <tr style='border-collapse:collapse'>
      <td valign='top' style='padding:0;Margin:0'>
       
       <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'>
         <tr style='border-collapse:collapse'></tr>
         <tr style='border-collapse:collapse'>
          <td align='center' style='padding:0;Margin:0'>
           <table class='es-header-body' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#044767;width:600px' cellspacing='0' cellpadding='0' bgcolor='#044767' align='center'>
             <tr style='border-collapse:collapse'>
              <td align='left' style='Margin:0;padding-top:35px;padding-bottom:35px;padding-left:35px;padding-right:35px'>
               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                 <tr style='border-collapse:collapse'>
                  <td class='es-m-p0r' valign='top' align='center' style='padding:0;Margin:0;width:530px'>
                   <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                     <tr style='border-collapse:collapse'>
                      <td class='es-m-txt-c' align='left' style='padding:0;Margin:0'><h1 style='Margin:0;line-height:36px;color:#fff;mso-line-height-rule:exactly;font-family:'open sans', 'helvetica neue', helvetica, arial, sans-serif;font-size:36px;font-style:normal;font-weight:bold;color:#ffffff'>adnansogukcesme.com</h1></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
           </table></td>
         </tr>
       </table>
       <table class='es-content' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%'>
         <tr style='border-collapse:collapse'>
          <td align='center' style='padding:0;Margin:0'>
           <table class='es-content-body' cellspacing='0' cellpadding='0' bgcolor='#ffffff' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px'>
             <tr style='border-collapse:collapse'>
              <td align='left' style='padding:0;Margin:0;padding-left:35px;padding-right:35px;padding-top:40px'>
               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                 <tr style='border-collapse:collapse'>
                  <td valign='top' align='center' style='padding:0;Margin:0;width:530px'>
                   <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                     <tr style='border-collapse:collapse'>
                      <td style='Margin:0;padding-top:25px;padding-bottom:25px;padding-left:35px;padding-right:35px;font-size:0px' align='center'><a target='_blank' href='https://viewstripo.email/' style='-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;color:#ED8E20;font-size:16px'><img src='https://ycheuf.stripocdn.email/content/guids/332ba771-681c-4e6e-8541-55730be641df/images/001__envelope256.png' alt style='display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic' width='120'></a></td>
                     </tr>
                    
                     <tr style='border-collapse:collapse'>
                      <td align='left' style='padding:0;Margin:0;padding-top:15px;padding-bottom:20px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:'open sans', 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#777777;font-size:16px'>İsim Soyisim: " . $fullName . "</p></td>
                     </tr>
                     <tr style='border-collapse:collapse'>
                      <td align='left' style='padding:0;Margin:0;padding-top:15px;padding-bottom:20px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:'open sans', 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#777777;font-size:16px'>Telefon: " . $phoneNumber . "</p></td>
                     </tr>
                     <tr style='border-collapse:collapse'>
                      <td align='left' style='padding:0;Margin:0;padding-top:15px;padding-bottom:20px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:'open sans', 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#777777;font-size:16px'>E-Mail: " . $mail . "</p></td>
                     </tr>
                     <tr style='border-collapse:collapse'>
                      <td align='left' style='padding:0;Margin:0;padding-top:15px;padding-bottom:20px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:'open sans', 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#777777;font-size:16px'>Şehir: " . $city . "</p></td>
                     </tr>
                     <tr style='border-collapse:collapse'>
                      <td align='left' style='padding:0;Margin:0;padding-top:15px;padding-bottom:20px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:'open sans', 'helvetica neue', helvetica, arial, sans-serif;line-height:24px;color:#777777;font-size:16px'>Mesaj: " . $message . "</p></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
           </table></td>
         </tr>
       </table>
       <table class='es-footer' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top'>
         <tr style='border-collapse:collapse'>
          <td align='center' style='padding:0;Margin:0'>
           <table class='es-footer-body' cellspacing='0' cellpadding='0' align='center' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px'>
             <tr style='border-collapse:collapse'>
              <td align='left' style='Margin:0;padding-top:35px;padding-left:35px;padding-right:35px;padding-bottom:40px'>
               <table width='100%' cellspacing='0' cellpadding='0' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                 <tr style='border-collapse:collapse'>
                  <td valign='top' align='center' style='padding:0;Margin:0;width:530px'>
                   <table width='100%' cellspacing='0' cellpadding='0' role='presentation' style='mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px'>
                     <tr style='border-collapse:collapse'>
                      <td esdev-links-color='#777777' class='es-m-txt-c' align='left' style='padding:0;Margin:0;padding-bottom:5px'><p style='Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:'open sans', 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#777777;font-size:14px'>Tüm hakları saklıdır. adnansogukcesme.com<br></p></td>
                     </tr>
                   </table></td>
                 </tr>
               </table></td>
             </tr>
           </table></td>
         </tr>
       </table></td>
     </tr>
   </table>
  </div>
 </body>
</html>";

		if (!$posta->Send()) {
			echo '<!--' . $posta->ErrorInfo . '-->';
			return false;
		} else {
			return true;
		}
	}
	public function turkcetarih_formati($format, $datetime = 'now')
	{
		$z = date("$format", strtotime($datetime));
		$gun_dizi = array(
			'Monday'    => 'Pazartesi',
			'Tuesday'   => 'Salı',
			'Wednesday' => 'Çarşamba',
			'Thursday'  => 'Perşembe',
			'Friday'    => 'Cuma',
			'Saturday'  => 'Cumartesi',
			'Sunday'    => 'Pazar',
			'January'   => 'Ocak',
			'February'  => 'Şubat',
			'March'     => 'Mart',
			'April'     => 'Nisan',
			'May'       => 'Mayıs',
			'June'      => 'Haziran',
			'July'      => 'Temmuz',
			'August'    => 'Ağustos',
			'September' => 'Eylül',
			'October'   => 'Ekim',
			'November'  => 'Kasım',
			'December'  => 'Aralık',
			'Mon'       => 'Pts',
			'Tue'       => 'Sal',
			'Wed'       => 'Çar',
			'Thu'       => 'Per',
			'Fri'       => 'Cum',
			'Sat'       => 'Cts',
			'Sun'       => 'Paz',
			'Jan'       => 'Oca',
			'Feb'       => 'Şub',
			'Mar'       => 'Mar',
			'Apr'       => 'Nis',
			'Jun'       => 'Haz',
			'Jul'       => 'Tem',
			'Aug'       => 'Ağu',
			'Sep'       => 'Eyl',
			'Oct'       => 'Eki',
			'Nov'       => 'Kas',
			'Dec'       => 'Ara',
		);
		foreach ($gun_dizi as $en => $tr) {
			$z = str_replace($en, $tr, $z);
		}
		if (strpos($z, 'Mayıs') !== false && strpos($format, 'F') === false) $z = str_replace('Mayıs', 'May', $z);
		return $z;
	}

	public function IDGetir($tablo = "")
	{
		$sql = $this->baglanti->query("SHOW TABLE STATUS FROM `" . $this->dbname . "` LIKE '" . $tablo . "'");
		if ($sql != false) {
			foreach ($sql as $sonuc) {
				$IDbilgisi = $sonuc["Auto_increment"];
				return $IDbilgisi;
				break;
			}
		} else {
			return false;
		}
	}
	public function uploadMulti($nesnename = "", $tablo = 'nan', $KID = 1, $yuklenecekyer = 'images/', $tur = 'img', $w = '', $h = '', $resimyazisi = '')
	{
		if ($tur == "img") {
			if (!empty($_FILES[$nesnename]["name"][0])) {
				$dosyanizinadi = $_FILES[$nesnename]["name"][0];
				$tmp_name = $_FILES[$nesnename]["tmp_name"][0];
				$uzanti = $this->uzanti($dosyanizinadi);
				if ($uzanti == "png" || $uzanti == "jpg" || $uzanti == "jpeg" || $uzanti == "gif") {
					$resimler = array();
					foreach ($_FILES[$nesnename] as $k => $l) {
						foreach ($l as $i => $v) {
							if (!array_key_exists($i, $resimler))
								$resimler[$i] = array();
							$resimler[$i][$k] = $v;
						}
					}

					foreach ($resimler as $resim) {
						$uzanti = $this->uzanti($resim["name"]);
						if ($uzanti == "png" || $uzanti == "jpg" || $uzanti == "jpeg" || $uzanti == "gif") {
							$handle = new upload($resim);
							if ($handle->uploaded) {

								/* Resmi Yeniden Adlandır */
								$rand = uniqid(true);
								$handle->file_new_name_body = $rand;

								/* Resmi Yeniden Boyutlandır */
								if (!empty($w)) {
									if (!empty($h)) {

										$handle->image_resize = true;
										$handle->image_x = $w;
										$handle->image_y = $h;
									} else {
										if ($handle->image_src_x > $w) {
											$handle->image_resize = true;
											$handle->image_x = $w;
											$handle->image_ratio_y = true;
										}
									}
								} else if (!empty($h)) {
									if ($handle->image_src_h > $h) {
										$handle->image_resize = true;
										$handle->image_y = $h;
										$handle->image_ratio_x = true;
									}
								}

								//üzerine yazı yazdırma
								if (!empty($resimyazisi)) {
									$handle->image_text   = $resimyazisi;
									$handle->image_text_color      = '#FFFFFF';
									$handle->image_text_opacity    = 80;
									//$handle->image_text_background = '#FFFFFF';
									$handle->image_text_background_opacity = 70;
									$handle->image_text_font       = 5;
									$handle->image_text_padding    = 1;
								}


								/* Resim Yükleme İzni */
								$handle->allowed = array('image/*');

								/* Resmi İşle */
								//$handle->Process(realpath("../")."/upload/resim/");
								$handle->process($yuklenecekyer);
								if ($handle->processed) {
									$yukleme = $rand . "." . $handle->image_src_type;
									if (!empty($yukleme)) {
										//$yuklemekontrol=$fnk->DKontrol("../images/resimler/".$yukleme);
										$sira = $this->IDGetir("resimler");

										$sql = $this->SorguCalistir("INSERT INTO resimler", "SET tablo=?, KID=?, resim=?, tarih=?", array($tablo, $KID, $yukleme, date("Y-m-d")));
									} else {
										return false;
									}
								} else {
									return false;
								}

								$handle->Clean();
							} else {
								return false;
							}
						}
					}
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}
