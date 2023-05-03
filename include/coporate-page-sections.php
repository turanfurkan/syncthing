<?php

$corporatePage = $VT->VeriGetir("pages", "WHERE lang_id=? and main_page=?", array($lang_id,"kurumsal"), "");
if ($corporatePage != false) {
	$page_id = $corporatePage[0]["page_id"];

	$corporateAboutSection = $VT->VeriGetir("pages_sections", "WHERE page_id=? and section_order=?", array($page_id, 1), "ORDER BY section_order ASC");
	if ($corporateAboutSection != false) {
		$corporateAboutSectionTitle = stripslashes($corporateAboutSection[0]["section_title"]);
		$corporateAboutSectionDescription = stripslashes($corporateAboutSection[0]["section_description"]);
		$corporateAboutSectionImage = stripslashes($corporateAboutSection[0]["section_image"]);
		$corporateAboutSectionImageMobile = stripslashes($corporateAboutSection[0]["section_image_mobile"]);

	} else {
		$corporateAboutSectionTitle = "";
		$corporateAboutSectionDescription = "";
        $corporateAboutSectionImage;
		$corporateAboutSectionImageMobile;
	}

    $corporateVisionSection = $VT->VeriGetir("pages_sections", "WHERE page_id=? and section_order=?", array($page_id, 2), "ORDER BY section_order ASC");
	if ($corporateVisionSection != false) {
		$corporateVisionSectionTitle = stripslashes($corporateVisionSection[0]["section_title"]);
		$corporateVisionSectionDescription = stripslashes($corporateVisionSection[0]["section_description"]);
		$corporateVisionSectionImage = stripslashes($corporateVisionSection[0]["section_image"]);
		$corporateVisionSectionImageMobile = stripslashes($corporateVisionSection[0]["section_image_mobile"]);

	} else {
		$corporateVisionSectionTitle = "";
		$corporateVisionSectionDescription = "";
        $corporateVisionSectionImage;
		$corporateVisionSectionImageMobile;
	}


	
}
