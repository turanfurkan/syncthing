<?php
include_once(SINIF."class.phpmailer.php");
include_once(SINIF."class.upload.php");
include_once(SINIF."VT.php");
$VT=new VT();
$ayarlar=$VT->VeriGetir("settings","WHERE ID=?",array(1),"ORDER BY ID ASC",1);
if($ayarlar!=false)
{
	$siteTitle=$ayarlar[0]["site_title"];
	$siteDescription=$ayarlar[0]["site_description"];
	$siteKeywords=$ayarlar[0]["site_keywords"];
	$siteURL="http://localhost/fileyurdu.com/";
	$siteMaintenence=$ayarlar[0]["site_maintenence"];
	


}

$contact=$VT->VeriGetir("contact_settings","WHERE ID=?",array(1),"ORDER BY ID ASC",1);
if($contact!=false)
{
	$sitePhone=$contact[0]["contact_phone"];
	$siteMail=$contact[0]["contact_email"];
	$siteAdress=$contact[0]["contact_adress"];
	$siteAdressLink=$contact[0]["contact_adress_link"];

}


$socialFace=$VT->VeriGetir("social_media","WHERE social_media_id=?",array(1),"ORDER BY social_media_id ASC",1);
if($socialFace!=false)
{
	$siteFacebook=$socialFace[0]["social_media_link"];

}


$socialTw=$VT->VeriGetir("social_media","WHERE social_media_id=?",array(2),"ORDER BY social_media_id ASC",1);
if($socialTw!=false)
{
	$siteTwitter=$socialTw[0]["social_media_link"];

}


$socialIns=$VT->VeriGetir("social_media","WHERE social_media_id=?",array(3),"ORDER BY social_media_id ASC",1);
if($socialIns!=false)
{
	$siteInstagram=$socialIns[0]["social_media_link"];

}

$socialLink=$VT->VeriGetir("social_media","WHERE social_media_id=?",array(4),"ORDER BY social_media_id ASC",1);
if($socialLink!=false)
{
	$siteLinkedin=$socialLink[0]["social_media_link"];

}

$socialpin=$VT->VeriGetir("social_media","WHERE social_media_id=?",array(5),"ORDER BY social_media_id ASC",1);
if($socialpin!=false)
{
	$sitePinterest=$socialpin[0]["social_media_link"];

}

?>