<?php

$getAQuoteText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 1), "ORDER BY text_id ASC");
if ($getAQuoteText != false) {
    $getAQuoteTextTitle = stripslashes($getAQuoteText[0]["text_title"]);
} else {
    $getAQuoteTextTitle = "";
}
$copyRightText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 2), "ORDER BY text_id ASC");
if ($copyRightText != false) {
    $copyRightTextTitle = stripslashes($copyRightText[0]["text_title"]);
} else {
    $copyRightTextTitle = "";
}
$reviewText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 3), "ORDER BY text_id ASC");
if ($reviewText != false) {
    $reviewTextTitle = stripslashes($reviewText[0]["text_title"]);
} else {
    $reviewTextTitle = "";
}

$readMoreText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 4), "ORDER BY text_id ASC");
if ($readMoreText != false) {
    $readMoreTextTitle = stripslashes($readMoreText[0]["text_title"]);
} else {
    $readMoreTextTitle = "";
}

$productsText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 5), "ORDER BY text_id ASC");
if ($productsText != false) {
    $productsTextTitle = stripslashes($productsText[0]["text_title"]);
} else {
    $productsTextTitle = "";
}

$contactUsText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 6), "ORDER BY text_id ASC");
if ($contactUsText != false) {
    $contactUsTextTitle = stripslashes($contactUsText[0]["text_title"]);
} else {
    $contactUsTextTitle = "";
}

$addressText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 7), "ORDER BY text_id ASC");
if ($addressText != false) {
    $addressTextTitle = stripslashes($addressText[0]["text_title"]);
} else {
    $addressTextTitle = "";
}

$phoneText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 8), "ORDER BY text_id ASC");
if ($phoneText != false) {
    $phoneTextTitle = stripslashes($phoneText[0]["text_title"]);
} else {
    $phoneTextTitle = "";
}

$contactFormText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 9), "ORDER BY text_id ASC");
if ($contactFormText != false) {
    $contactFormTextTitle = stripslashes($contactFormText[0]["text_title"]);
} else {
    $contactFormTextTitle = "";
}


$contactFormNameText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 10), "ORDER BY text_id ASC");
if ($contactFormNameText != false) {
    $contactFormNameTextTitle = stripslashes($contactFormNameText[0]["text_title"]);
} else {
    $contactFormNameTextTitle = "";
}


$contactFormMailText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 11), "ORDER BY text_id ASC");
if ($contactFormMailText != false) {
    $contactFormMailTextTitle = stripslashes($contactFormMailText[0]["text_title"]);
} else {
    $contactFormMailTextTitle = "";
}


$contactFormMessageText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 12), "ORDER BY text_id ASC");
if ($contactFormMessageText != false) {
    $contactFormMessageTextTitle = stripslashes($contactFormMessageText[0]["text_title"]);
} else {
    $contactFormMessageTextTitle = "";
}


$contactFormSendMessageText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 13), "ORDER BY text_id ASC");
if ($contactFormSendMessageText != false) {
    $contactFormSendMessageTextTitle = stripslashes($contactFormSendMessageText[0]["text_title"]);
} else {
    $contactFormSendMessageTextTitle = "";
}

$allRightReservedText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 14), "ORDER BY text_id ASC");
if ($allRightReservedText != false) {
    $allRightReservedTextTitle = stripslashes($allRightReservedText[0]["text_title"]);
} else {
    $allRightReservedTextTitle = "";
}

$allProductsText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 15), "ORDER BY text_id ASC");
if ($allProductsText != false) {
    $allProductsTextTitle = stripslashes($allProductsText[0]["text_title"]);
} else {
    $allProductsTextTitle = "";
}


$homeText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 16), "ORDER BY text_id ASC");
if ($homeText != false) {
    $homeTextTitle = stripslashes($homeText[0]["text_title"]);
} else {
    $homeTextTitle = "";
}

$productsText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 17), "ORDER BY text_id ASC");
if ($productsText != false) {
    $productsTextTitle = stripslashes($productsText[0]["text_title"]);
} else {
    $productsTextTitle = "";
}

$typesOfUseText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 18), "ORDER BY text_id ASC");
if ($typesOfUseText != false) {
    $typesOfUseTextTitle = stripslashes($typesOfUseText[0]["text_title"]);
} else {
    $typesOfUseTextTitle = "";
}

$colorsText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 19), "ORDER BY text_id ASC");
if ($colorsText != false) {
    $colorsTextTitle = stripslashes($colorsText[0]["text_title"]);
} else {
    $colorsTextTitle = "";
}

$widthText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 20), "ORDER BY text_id ASC");
if ($widthText != false) {
    $widthTextTitle = stripslashes($widthText[0]["text_title"]);
} else {
    $widthTextTitle = "";
}

$heightText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 21), "ORDER BY text_id ASC");
if ($heightText != false) {
    $heightTextTitle = stripslashes($heightText[0]["text_title"]);
} else {
    $heightTextTitle = "";
}

$productionTableText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 22), "ORDER BY text_id ASC");
if ($productionTableText != false) {
    $productionTableTextTitle = stripslashes($productionTableText[0]["text_title"]);
} else {
    $productionTableTextTitle = "";
}

$productionTableDescriptionText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 23), "ORDER BY text_id ASC");
if ($productionTableDescriptionText != false) {
    $productionTableDescriptionTextTitle = stripslashes($productionTableDescriptionText[0]["text_title"]);
} else {
    $productionTableDescriptionTextTitle = "";
}

$productTitleText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 24), "ORDER BY text_id ASC");
if ($productTitleText != false) {
    $productTitleTextTitle = stripslashes($productTitleText[0]["text_title"]);
} else {
    $productTitleTextTitle = "";
}

$productWidthText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 25), "ORDER BY text_id ASC");
if ($productWidthText != false) {
    $productWidthTextTitle = stripslashes($productWidthText[0]["text_title"]);
} else {
    $productWidthTextTitle = "";
}

$productHeightText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 26), "ORDER BY text_id ASC");
if ($productHeightText != false) {
    $productHeightTextTitle = stripslashes($productHeightText[0]["text_title"]);
} else {
    $productHeightTextTitle = "";
}

$productDiameterText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 27), "ORDER BY text_id ASC");
if ($productDiameterText != false) {
    $productDiameterTextTitle = stripslashes($productDiameterText[0]["text_title"]);
} else {
    $productDiameterTextTitle = "";
}

$productColorText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 28), "ORDER BY text_id ASC");
if ($productColorText != false) {
    $productColorTextTitle = stripslashes($productColorText[0]["text_title"]);
} else {
    $productColorTextTitle = "";
}

$blogsText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 29), "ORDER BY text_id ASC");
if ($blogsText != false) {
    $blogsTextTitle = stripslashes($blogsText[0]["text_title"]);
} else {
    $blogsTextTitle = "";
}

$nameText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 30), "ORDER BY text_id ASC");
if ($nameText != false) {
    $nameTextTitle = stripslashes($nameText[0]["text_title"]);
} else {
    $nameTextTitle = "";
}
$surnameText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 31), "ORDER BY text_id ASC");
if ($surnameText != false) {
    $surnameTextTitle = stripslashes($surnameText[0]["text_title"]);
} else {
    $surnameTextTitle = "";
}
$quoteText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 32), "ORDER BY text_id ASC");
if ($quoteText != false) {
    $quoteTextTitle = stripslashes($quoteText[0]["text_title"]);
} else {
    $quoteTextTitle = "";
}

$companyText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 33), "ORDER BY text_id ASC");
if ($companyText != false) {
    $companyTextTitle = stripslashes($companyText[0]["text_title"]);
} else {
    $companyTextTitle = "";
}

$infoProductText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 34), "ORDER BY text_id ASC");
if ($infoProductText != false) {
    $infoProductTextTitle = stripslashes($infoProductText[0]["text_title"]);
} else {
    $infoProductTextTitle = "";
}

$selectProductText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 35), "ORDER BY text_id ASC");
if ($selectProductText != false) {
    $selectProductTextTitle = stripslashes($selectProductText[0]["text_title"]);
} else {
    $selectProductTextTitle = "";
}

$additionalInfoText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 36), "ORDER BY text_id ASC");
if ($additionalInfoText != false) {
    $additionalInfoTextTitle = stripslashes($additionalInfoText[0]["text_title"]);
} else {
    $additionalInfoTextTitle = "";
}

$contactFormSubjectText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 37), "ORDER BY text_id ASC");
if ($contactFormSubjectText != false) {
    $contactFormSubjectTextTitle = stripslashes($contactFormSubjectText[0]["text_title"]);
} else {
    $contactFormSubjectTextTitle = "";
}


$productionFeaturesText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 38), "ORDER BY text_id ASC");
if ($productionFeaturesText != false) {
    $productionFeaturesTextTitle = stripslashes($productionFeaturesText[0]["text_title"]);
} else {
    $productionFeaturesTextTitle = "";
}

$workingHoursText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 39), "ORDER BY text_id ASC");
if ($workingHoursText != false) {
    $workingHoursTextTitle = stripslashes($workingHoursText[0]["text_title"]);
} else {
    $workingHoursTextTitle = "";
}

$siteWhatsappDetailText = $VT->VeriGetir("texts_lang", "WHERE lang_id=? and order_st=?", array($lang_id, 40), "ORDER BY text_id ASC");
if ($siteWhatsappDetailText != false) {
    $siteWhatsappDetailTextTitle = stripslashes($siteWhatsappDetailText[0]["text_title"]);
} else {
    $siteWhatsappDetailTextTitle = "";
}
