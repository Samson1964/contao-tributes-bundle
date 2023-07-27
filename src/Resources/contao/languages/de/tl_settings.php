<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @package   fen
 * @author    Frank Hoppe
 * @license   GNU/LGPL
 * @copyright Frank Hoppe 2013
 */

/**
 * legends
 */
$GLOBALS['TL_LANG']['tl_settings']['tributes_legend'] = 'Ehrungen';

/**
 * fields
 */
$GLOBALS['TL_LANG']['tl_settings']['tributes_fromName'] = array('E-Mail-Absendername', 'E-Mail-Absendername für die Infomail für die Geburtstage aus den Ehrungen');
$GLOBALS['TL_LANG']['tl_settings']['tributes_fromMail'] = array('E-Mail-Absenderadresse', 'E-Mail-Absenderadresse für die Infomail für die Geburtstage aus den Ehrungen');
$GLOBALS['TL_LANG']['tl_settings']['tributes_subject'] = array('E-Mail-Betreff', 'Betrefftext für Infomail für die Geburtstage aus den Ehrungen');

$GLOBALS['TL_LANG']['tl_settings']['tributes_empfaenger'] = array('E-Mail-Empfänger', 'Empfänger der Infomails für die Geburtstage aus den Ehrungslisten. Der 1. Eintrag ist der Hauptempfänger, alle anderen sind in CC.');
$GLOBALS['TL_LANG']['tl_settings']['tributes_empfaenger_name'] = array('Name', '');
$GLOBALS['TL_LANG']['tl_settings']['tributes_empfaenger_email'] = array('E-Mail', '');
$GLOBALS['TL_LANG']['tl_settings']['tributes_empfaenger_aktiv'] = array('Aktiv', '');

$GLOBALS['TL_LANG']['tl_settings']['tributes_sms77_fromName'] = array('E-Mail-Absendername SMS77', 'E-Mail-Absendername für den Dienst SMS77. Nur wenige Buchstaben verwenden!');
$GLOBALS['TL_LANG']['tl_settings']['tributes_sms77_fromMail'] = array('E-Mail-Absenderadresse SMS77', 'E-Mail-Absenderadresse für den Dienst SMS77');
$GLOBALS['TL_LANG']['tl_settings']['tributes_sms77_to'] = array('E-Mail-Empfänger SMS77', 'E-Mail-Empfänger für den Dienst SMS77');
$GLOBALS['TL_LANG']['tl_settings']['tributes_sms77_to_email'] = array('E-Mail-Adresse', '');
$GLOBALS['TL_LANG']['tl_settings']['tributes_sms77_to_key'] = array('Passwort für diese Adresse', '');

$GLOBALS['TL_LANG']['tl_settings']['tributes_anleitungKopf'] = array('Geburtstagserinnerungen', 'Geburtstagserinnerungen für geehrte Personen einstellen.');

$GLOBALS['TL_LANG']['tl_settings']['tributes_anleitungText'] = '
Was muß vorliegen um Geburtstagserinnerungen für geehrte Personen zu versenden?
<ol>
<li style="list-style-type:decimal; margin-left:20px;">Die Person muß im Spielerregister eingetragen sein.</li>
<li style="list-style-type:decimal; margin-left:20px;">Die Person muß in einer Ehrungsliste eingetragen sein.</li>
<li style="list-style-type:decimal; margin-left:20px;">Die Person in einer Ehrungsliste muß der Person im Spielerregister zugeordnet sein.</li>
</ol>
';
