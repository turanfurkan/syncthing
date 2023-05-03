<?php

$ayarlar=$VT->VeriGetir("settings","WHERE lang_id=?",array($lang_id),"ORDER BY ID ASC",1);
if($ayarlar!=false)
{
	$siteTitle=$ayarlar[0]["site_title"];
	$siteDescription=$ayarlar[0]["site_description"];
	$siteLogo=$ayarlar[0]["site_logo"];
	$siteLogoWhite=$ayarlar[0]["site_logo_white"];

	$siteKeywords=$ayarlar[0]["site_keywords"];
	$siteURL=$ayarlar[0]["site_url"];
	$siteMaintenence=$ayarlar[0]["site_maintenence"];
	


}

$contact=$VT->VeriGetir("contact_settings","WHERE ID=?",array(1),"ORDER BY ID ASC",1);
if($contact!=false)
{
	$sitePhone=$contact[0]["contact_phone"];
	$siteWhatsapp=$contact[0]["whatsapp_link"];

	$siteMail=$contact[0]["contact_email"];
	$siteAdress=$contact[0]["contact_adress"];
	$siteAdressLink=$contact[0]["contact_adress_link"];
	$siteWorkingHours=$contact[0]["working_hours"];
	$productWhatsappText=$contact[0]["product_whatsapp_text"];


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

$socialyoutube=$VT->VeriGetir("social_media","WHERE social_media_id=?",array(6),"ORDER BY social_media_id ASC",1);
if($socialyoutube!=false)
{
	$siteYoutube=$socialyoutube[0]["social_media_link"];

}

?>