<?php

/**
 * Contao Open Source CMS, Copyright (C) 2005-2013 Leo Feyer
 *
 *
 * Supported GET parameters:
 * - bid:   Banner ID
 *
 * Usage example:
 * <a href="system/modules/banner/public/conban_clicks.php?bid=7">
 *
 * @copyright	Glen Langer 2007..2013 <http://www.contao.glen-langer.de>
 * @author      Glen Langer (BugBuster)
 * @package     Banner
 * @license     LGPL
 * @filesource
 */

/**
 * Run in a custom namespace, so the class can be replaced
 */
use Contao\Controller;

/**
 * Initialize the system
 */
define('TL_MODE', 'FE');
define('TL_SCRIPT', 'system/modules/tributes/public/ehrungen.php'); 
// ER2 / ER3 (dev over symlink)
if(file_exists('../../../initialize.php')) require('../../../initialize.php');
else require('../../../../../system/initialize.php');


/**
 * Class BannerClicks
 *
 * Banner ReDirect class
 * @copyright  Glen Langer 2007..2013
 * @author     Glen Langer
 * @package    Banner
 */
class Ehrungsliste 
{
	public function run()
	{
		// Zeitlichen Rahmen festlegen
		$zieltext[0] = 'Heute';
		$zieltext[1] = 'Morgen';
		$zieltext[2] = 'In 1 Woche';
		$zieltext[3] = 'In 2 Wochen';
		$zielzeit[0] = date("md"); // Tag heute
		$zielzeit[1] = date("md",strtotime("+1 day")); // Tag morgen
		$zielzeit[2] = date("md",strtotime("+1 week")); // Tag in 1 Woche
		$zielzeit[3] = date("md",strtotime("+2 week")); // Tag in 2 Wochen
		$zieljahr[0] = date("Y"); // Jahr heute
		$zieljahr[1] = date("Y",strtotime("+1 day")); // Jahr morgen
		$zieljahr[2] = date("Y",strtotime("+1 week")); // Jahr in 1 Woche
		$zieljahr[3] = date("Y",strtotime("+2 week")); // Jahr in 2 Wochen
		// Ausgabearray initialisieren
		$ausgabe = array('', '', '', '');
		$debugausgabe = '';

		// Ehrungslisten laden
		$listenArr = array();
		$objEhrungslisten = \Database::getInstance()->prepare("SELECT * FROM tl_tributes WHERE published = ?")
		                                            ->execute(1);
		if($objEhrungslisten->numRows) 
		{
			while($objEhrungslisten->next())
			{
				$listenArr[$objEhrungslisten->id] = $objEhrungslisten->title;
			}
		}

		// Liste aller Ehrungen laden, bei denen eine Spielerregister-ID vorhanden ist
		$objEhrungen = \Database::getInstance()->prepare("SELECT * FROM tl_tributes_items WHERE published = ? AND spielerregister_id > ?")
		                                       ->execute(1, 0);

		$birthdayArr = array(); // Array für die Personen mit Geburtstagen

		if($objEhrungen->numRows) 
		{
			while($objEhrungen->next())
			{
				// Eintrag aus Spielerregister laden
				$objPlayer = \Database::getInstance()->prepare("SELECT * FROM tl_spielerregister WHERE id = ? AND death != ?")
				                                     ->execute($objEhrungen->spielerregister_id, 1);
				
				$debugausgabe .= "<br>" . $objPlayer->surname1;
				$geburtstag = substr($objPlayer->birthday,4,4);
				$debugausgabe .= "<br>* " . $geburtstag;
				for($x=0;$x<count($zielzeit);$x++)
				{
					$debugausgabe .= "<br>- " . $zielzeit[$x];
					// Bei Treffer, Spieler in Ausgabe schreiben
					if($geburtstag == $zielzeit[$x])
					{
						// Wievielter Geburtstag?
						$alter = $zieljahr[$x] - substr($objPlayer->birthday,0,4);
						// Anderer Name im (aktuelleren) Spielerregister?
						if($objPlayer)
						{
							$sname = $objPlayer->firstname1.' '.$objPlayer->surname1;
						}
						else
						{
							$sname = $objEhrungen->name;
						}
						// Array anlegen
						$birthdayArr[$x][$objPlayer->id][] = array
						(
							'name'       => $sname,
							'alter'      => $alter,
							'ehrung'     => $listenArr[$objEhrungen->pid],
							'jahr'       => $objEhrungen->year,
						);
					}
				}
			}
		}
		echo '<pre>';
		print_r($birthdayArr);
		echo '</pre>';
		//echo $debugausgabe;
		for($x=0;$x<=3;$x++)
		{
			$content[$x] = '';
			if($birthdayArr[$x])
			{
				// Tag und Überschrift zusammenstellen
				$tag = substr($zielzeit[$x],2,2) . '.' . substr($zielzeit[$x],0,2) . '.' . $zieljahr[$x];
				$headline = '<h2>' . $zieltext[$x] . ' (' . $tag .')</h2>';
				$content[$x] = $headline;
				// Personen ausgeben
				foreach($birthdayArr[$x] as $key => $value)
				{
					echo $key;
					for($y=0;$y<count($birthdayArr[$x][$key]);$y++)
					{
						if($y==0) $content[$x] .= '<p><b>'.$birthdayArr[$x][$key][$y]['alter'].'. Geburtstag von '.$birthdayArr[$x][$key][$y]['name'].'</b><br>';
						$content[$x] .= '- <i>'.$birthdayArr[$x][$key][$y]['jahr'].' '.$birthdayArr[$x][$key][$y]['ehrung'].'</i><br>';
					}
					$content[$x] .= '</p>';
				}
			}
		}
		
		echo '<pre>';
		print_r($content);
		echo '</pre>';
		if($content && $birthdayArr)
		{
			$data = '<p>Folgende Geburtstage von geehrten Personen stehen an:</p>' . $content[0].$content[1].$content[2].$content[3];
			$data .= '<p><i>DIESE E-MAIL WURDE AUTOMATISCH GENERIERT!</i></p>';
			// Email versenden, wenn Ehrungen anstehen
			$objEmail = new \Email();
			$objEmail->from = 'webmaster@schachbund.de';
			$objEmail->fromName = 'DSB-Geburtstage';
			$objEmail->subject = '[DSB-Webinfo] Geburtstage aus Ehrungslisten';
			$objEmail->html = $data;
			$objEmail->sendCc(array
			(
				'Ullrich Krause <praesident@schachbund.de>',
				'Uwe Bönsch <sportdirektor@schachbund.de>',
				'DSB-Presse <presse@schachbund.de>'
			)); 
			$objEmail->sendTo(array('Frank Hoppe <webmaster@schachbund.de>')); 
		}
	}
}

/**
 * Instantiate controller
 */
$objEhrungsliste = new Ehrungsliste();
$objEhrungsliste->run();

