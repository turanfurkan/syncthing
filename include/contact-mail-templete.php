<?php
include(SAYFA . "mail-header.php");
?>




<table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
    <tr>
        <td align="center" style="padding:0;Margin:0">
            <table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                <tr>
                    <td align="left" style="padding:0;Margin:0;padding-top:20px;padding-left:20px;padding-right:20px">
                        <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr>
                                <td align="left" style="padding:0;Margin:0;width:560px">
                                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                        <tr>
                                            <td class="es-m-txt-c" align="left" style="padding:0;Margin:0;padding-bottom:10px;padding-top:20px">
                                                <h1 style="Margin:0;line-height:48px;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:48px;font-style:normal;font-weight:bold;color:#dc143c"><em><strong>Yeni bir mesajınız var!</strong></em></h1>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="esd-structure es-p10t es-p20r es-p20l" align="left">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td class="esd-container-frame" width="560" valign="top" align="center">
                                        <table width="100%" cellspacing="0" cellpadding="25">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-block-text es-p30t es-p30b" align="left">
                                                        <p>Merhabalar,</p>
                                                        <p><br></p>
                                                        <p>Bir kişi iletişim formu aracılığıyla siteden mesaj gönderdi. Mesaj detayları aşağıdaki gibidir:</p>
                                                        <p><strong>Adı</strong>: <?= $fullName ?> <br>
                                                        <strong> E-posta Adresi</strong>: <?= $email ?> <br>
                                                        <strong>Konu</strong>: <?=$subject?> <br>
                                                        <strong>Mesajı</strong>: <?= $message ?><br>
                                                    </p>
                                                        <p>En kısa sürede geri dönüş yapmanızı rica ederiz.</p>
                                                        <p>Saygılarımızla, <?=$siteTitle?><br></p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="left" style="padding:0;Margin:0;padding-bottom:20px;padding-left:20px;padding-right:20px">
                        <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr>
                                <td align="left" style="padding:0px;Margin:0;width:560px">
                                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="padding:25px; mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                        <tr>
                                            <td align="center" style="padding:40px;Margin:0"><!--[if mso]><a href="https://viewstripo.email" target="_blank" hidden> <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" esdevVmlButton href="https://viewstripo.email" style="height:41px; v-text-anchor:middle; width:271px" arcsize="12%" strokecolor="#dc143c" strokeweight="2px" fillcolor="#dc143c"> <w:anchorlock></w:anchorlock> <center style='color:#ffffff; font-family:arial, "helvetica neue", helvetica, sans-serif; font-size:15px; font-weight:400; line-height:15px; mso-text-raise:1px'>Teklif İsteklerini Görüntüle</center> </v:roundrect></a><![endif]--><!--[if !mso]><!-- -->
                                                <span class="msohide es-button-border" style="border-style:solid;border-color:#dc143c;background:#dc143c;border-width:2px;display:inline-block;border-radius:5px;width:auto;mso-border-alt:10px;mso-hide:all">
                                                    <a href="<?= SITE ?>yonetimpaneli/mesajlar" class="es-button es-button-1" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#FFFFFF;font-size:18px;padding:10px 30px;display:inline-block;background:#dc143c;border-radius:5px;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-weight:normal;font-style:normal;line-height:22px;width:auto;text-align:center;border-color:#dc143c">
                                                        Tüm Mesajlar</a>
                                                </span><!--<![endif]-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:20px;Margin:0;font-size:0" align="center">
                                                <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="padding:25px;mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                    <tr>
                                                        <td style="padding:0;Margin:0;border-bottom:1px solid #cccccc;background:unset;height:1px;width:100%;margin:0px">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>

<?php
include(SAYFA . "mail-footer.php");
?>