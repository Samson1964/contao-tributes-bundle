<?php

/**
 * Paletten
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['tributeslist'] = '{type_legend},type,headline;{tributes_legend},tributeslist;{protected_legend:hide},protected;{expert_legend:hide},guest,cssID,space;{invisible_legend:hide},invisible,start,stop';

/**
 * Felder
 */

// championslistsliste anzeigen

$GLOBALS['TL_DCA']['tl_content']['fields']['tributeslist'] = array
(
	'label'                => &$GLOBALS['TL_LANG']['tl_content']['tributeslist'],
	'exclude'              => true,
	'options_callback'     => array('tl_content_tributeslist', 'getTributeslists'),
	'inputType'            => 'select',
	'eval'                 => array
	(
		'mandatory'      => false, 
		'multiple'       => false, 
		'chosen'         => true,
		'submitOnChange' => true,
		'tl_class'       => 'long wizard'
	),
	'wizard'               => array
	(
		array('tl_content_championslist', 'editListe')
	),
	'sql'                  => "int(10) unsigned NOT NULL default '0'" 
);

/*****************************************
 * Klasse tl_content_tributeslist
 *****************************************/
 
class tl_content_tributeslist extends \Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	/**
	 * Funktion editAdresse
	 * @param \DataContainer
	 * @return string
	 */
	public function editListe(DataContainer $dc)
	{
		return ($dc->value < 1) ? '' : ' <a href="contao/main.php?do=tributes&amp;table=tl_tributes_items&amp;id=' . $dc->value . '&amp;popup=1&amp;rt=' . REQUEST_TOKEN . '" title="' . sprintf(specialchars($GLOBALS['TL_LANG']['tl_content']['editalias'][1]), $dc->value) . '" style="padding-left:3px" onclick="Backend.openModalIframe({\'width\':765,\'title\':\'' . specialchars(str_replace("'", "\\'", sprintf($GLOBALS['TL_LANG']['tl_content']['editalias'][1], $dc->value))) . '\',\'url\':this.href});return false">' . Image::getHtml('alias.gif', $GLOBALS['TL_LANG']['tl_content']['editalias'][0], 'style="vertical-align:top"') . '</a>';
	} 
	
	public function getTributeslists(DataContainer $dc)
	{
		$array = array();
		$objAdresse = $this->Database->prepare("SELECT * FROM tl_tributes ORDER BY title ASC")->execute();
		while($objAdresse->next())
		{
			$array[$objAdresse->id] = $objAdresse->title;
		}
		return $array;

	}

}

?>
