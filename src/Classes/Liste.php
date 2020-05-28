<?php

namespace Schachbulle\ContaoTributesBundle\Classes;

class Liste extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_tributes_liste';

	/**
	 * Generate the content element
	 */ 
	protected function compile()
	{

		// Ehrungen aus Datenbank laden, wenn ID der Ehrungsliste übergeben wurde
		if($this->tributeslist)
		{
			// Listentitel laden
			$objEhrungen = $this->Database->prepare("SELECT * FROM tl_tributes_items WHERE pid=? ORDER BY year DESC")
			                              ->execute($this->tributeslist);
			// Liste gefunden
			if($objEhrungen)
			{
				$item = array();
				$view_info = false;
				$view_year = false;
				while($objEhrungen->next())
				{
					// Bild extrahieren
					$image = '';
					$thumbnail = '';
					if($objEhrungen->singleSRC)
					{
						$objFile = \FilesModel::findByPk($objEhrungen->singleSRC);
						$image = $objFile->path;
						$thumbnail = \Image::get($objFile->path, 70, 70, 'crop');
					}

					// Eintrag aus Spielerregister laden, wenn vorhanden
					if($objEhrungen->spielerregister_id)
					{
						$objRegister = $this->Database->prepare("SELECT * FROM tl_spielerregister WHERE id=?")
						                              ->execute($objEhrungen->spielerregister_id);
						$ehrungsname = '<a href="person/player/'.$objEhrungen->spielerregister_id.'.html">'.$objEhrungen->name.'</a>';
						if($objRegister->death) $ehrungsname .= ' &dagger;';
					}
					else $ehrungsname = $objEhrungen->name;

					// Anzeigeoption prüfen
					if($objEhrungen->year) $view_year = true;
					if($objEhrungen->info) $view_info = true;

					// Datensatz zuweisen
					$item[] = array
					(
						'year'      => $objEhrungen->year,
						'url'       => $objEhrungen->url,
						'target'    => $objEhrungen->target,
						'name'      => $ehrungsname,
						'info'      => $objEhrungen->info,
						'image'     => $image,
						'thumbnail' => $thumbnail
					);
				}
				$this->Template->item = $item;
				$this->Template->view_year = $view_year;
				$this->Template->view_info = $view_info;
			}
		}
		return;

	}
}
