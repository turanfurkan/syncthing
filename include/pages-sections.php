<?php

$homePage = $VT->VeriGetir("pages", "WHERE lang_id=? and main_page=?", array($lang_id,"home"), "");
if ($homePage != false) {
	$page_id = $homePage[0]["page_id"];

	$promotionSection = $VT->VeriGetir("pages_sections", "WHERE page_id=? and section_order=?", array($page_id, 1), "ORDER BY section_order ASC");
	if ($promotionSection != false) {
		$promotionSectionTitle = stripslashes($promotionSection[0]["section_title"]);
		$promotionSectionDescription = stripslashes($promotionSection[0]["section_description"]);
		$promotionSectionImage = stripslashes($promotionSection[0]["section_image"]);
		$promotionSectionImageMobile = stripslashes($promotionSection[0]["section_image_mobile"]);

		$slide_text_one = stripslashes($promotionSection[0]["slide_text_one"]);
		$slide_text_two = stripslashes($promotionSection[0]["slide_text_two"]);
		$slide_text_three = stripslashes($promotionSection[0]["slide_text_three"]);
		$promotionSectionButton = stripslashes($promotionSection[0]["section_button"]);
	} else {
		$promotionSectionTitle = "";
		$promotionSectionDescription = "";
	}

	$productsSection = $VT->VeriGetir("pages_sections", "WHERE page_id=? and section_order=?", array($page_id, 2), "ORDER BY section_order ASC");
	if ($productsSection != false) {
		$productsSectionTitle = stripslashes($productsSection[0]["section_title"]);
		$productsSectionDescription = stripslashes($productsSection[0]["section_description"]);
		$productsSectionImage = stripslashes($productsSection[0]["section_image"]);
		$productsSectionImageMobile = stripslashes($productsSection[0]["section_image_mobile"]);

		$slide_text_one = stripslashes($productsSection[0]["slide_text_one"]);
		$slide_text_two = stripslashes($productsSection[0]["slide_text_two"]);
		$slide_text_three = stripslashes($productsSection[0]["slide_text_three"]);
		$productsSectionButton = stripslashes($productsSection[0]["section_button"]);
	} else {
		$productsSectionTitle = "";
		$productsSectionDescription = "";
	}

	$workingProcessSection = $VT->VeriGetir("pages_sections", "WHERE page_id=? and section_order=?", array($page_id, 3), "ORDER BY section_order ASC");
	if ($workingProcessSection != false) {
		$workingProcessSectionTitle = stripslashes($workingProcessSection[0]["section_title"]);
		$workingProcessSectionDescription = stripslashes($workingProcessSection[0]["section_description"]);
		$workingProcessSectionImage = stripslashes($workingProcessSection[0]["section_image"]);
		$workingProcessSectionImageMobile = stripslashes($workingProcessSection[0]["section_image_mobile"]);

		$slide_text_one = stripslashes($workingProcessSection[0]["slide_text_one"]);
		$slide_text_two = stripslashes($workingProcessSection[0]["slide_text_two"]);
		$slide_text_three = stripslashes($workingProcessSection[0]["slide_text_three"]);
		$workingProcessSectionButton = stripslashes($workingProcessSection[0]["section_button"]);
	} else {
		$workingProcessSectionTitle = "";
		$workingProcessSectionDescription = "";
	}

	$blogsSection = $VT->VeriGetir("pages_sections", "WHERE page_id=? and section_order=?", array($page_id, 4), "ORDER BY section_order ASC");
	if ($blogsSection != false) {
		$blogsSectionTitle = stripslashes($blogsSection[0]["section_title"]);
		$blogsSectionDescription = stripslashes($blogsSection[0]["section_description"]);
		$blogsSectionImage = stripslashes($blogsSection[0]["section_image"]);
		$blogsSectionImageMobile = stripslashes($blogsSection[0]["section_image_mobile"]);

		$slide_text_one = stripslashes($blogsSection[0]["slide_text_one"]);
		$slide_text_two = stripslashes($blogsSection[0]["slide_text_two"]);
		$slide_text_three = stripslashes($blogsSection[0]["slide_text_three"]);
		$blogsSectionButton = stripslashes($blogsSection[0]["section_button"]);
	} else {
		$blogsSectionTitle = "";
		$blogsSectionDescription = "";
	}

	$callToActionSection = $VT->VeriGetir("pages_sections", "WHERE page_id=? and section_order=?", array($page_id, 5), "ORDER BY section_order ASC");
	if ($callToActionSection != false) {
		$callToActionSectionTitle = stripslashes($callToActionSection[0]["section_title"]);
		$callToActionSectionDescription = stripslashes($callToActionSection[0]["section_description"]);
		$callToActionSectionImage = stripslashes($callToActionSection[0]["section_image"]);
		$callToActionSectionImageMobile = stripslashes($callToActionSection[0]["section_image_mobile"]);

		$slide_text_one = stripslashes($callToActionSection[0]["slide_text_one"]);
		$slide_text_two = stripslashes($callToActionSection[0]["slide_text_two"]);
		$slide_text_three = stripslashes($callToActionSection[0]["slide_text_three"]);
		$callToActionSectionButton = stripslashes($callToActionSection[0]["section_button"]);
	} else {
		$callToActionSectionTitle = "";
		$callToActionSectionDescription = "";
	}

}
