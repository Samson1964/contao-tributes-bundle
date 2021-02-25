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
 * palettes
 */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{tributes_legend:hide},tributes_fromName,tributes_fromMail,tributes_subject,tributes_empfaenger,tributes_sms77_fromName,tributes_sms77_fromMail,tributes_sms77_to,tributes_sms77_key';

/**
 * fields
 */

$GLOBALS['TL_DCA']['tl_settings']['fields']['tributes_fromName'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['tributes_fromName'],
	'inputType'               => 'text',
	'eval'                    => array
	(
		'tl_class'            => 'w50',
	),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['tributes_fromMail'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['tributes_fromMail'],
	'inputType'               => 'text',
	'eval'                    => array
	(
		'tl_class'            => 'w50',
	),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['tributes_subject'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['tributes_subject'],
	'inputType'               => 'text',
	'eval'                    => array
	(
		'tl_class'            => 'w50'
	),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['tributes_empfaenger'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['tributes_empfaenger'],
	'exclude'                 => true,
	'inputType'               => 'multiColumnWizard',
	'eval'                    => array
	(
		'tl_class'            => 'clr long',
		'buttonPos'           => 'top',
		'columnFields'        => array
		(
			'name' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_settings']['tributes_empfaenger_name'],
				'exclude'               => true,
				'inputType'             => 'text',
				'eval'                  => array
				(
					'style'             => 'width:90%',
					'valign'            => 'middle'
				)
			),
			'email' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_settings']['tributes_empfaenger_email'],
				'exclude'               => true,
				'inputType'             => 'text',
				'eval'                  => array
				(
					'style'             => 'width:90%',
					'valign'            => 'middle'
				),
			),
		)
	),
	'sql'                   => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['tributes_sms77_fromName'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['tributes_sms77_fromName'],
	'inputType'               => 'text',
	'eval'                    => array
	(
		'tl_class'            => 'w50',
	),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['tributes_sms77_fromMail'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['tributes_sms77_fromMail'],
	'inputType'               => 'text',
	'eval'                    => array
	(
		'tl_class'            => 'w50',
	),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['tributes_sms77_to'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['tributes_sms77_to'],
	'exclude'                 => true,
	'inputType'               => 'multiColumnWizard',
	'eval'                    => array
	(
		'tl_class'            => 'clr long',
		'buttonPos'           => 'top',
		'columnFields'        => array
		(
			'email' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_settings']['tributes_sms77_to_email'],
				'exclude'               => true,
				'inputType'             => 'text',
				'eval'                  => array
				(
					'style'             => 'width:90%',
					'valign'            => 'middle'
				)
			),
			'key' => array
			(
				'label'                 => &$GLOBALS['TL_LANG']['tl_settings']['tributes_sms77_to_key'],
				'exclude'               => true,
				'inputType'             => 'text',
				'eval'                  => array
				(
					'style'             => 'width:90%',
					'valign'            => 'middle'
				),
			),
		)
	),
	'sql'                   => "blob NULL"
);
