<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @package   bdf
 * @author    Frank Hoppe
 * @license   GNU/LGPL
 * @copyright Frank Hoppe 2014
 */

/**
 * Backend-Module
 */
$GLOBALS['BE_MOD']['dsb']['tributes'] = array
(
	'tables'         => array('tl_tributes', 'tl_tributes_items'),
	'icon'           => 'bundles/contaotributes/images/icon.gif',
);

/**
 * -------------------------------------------------------------------------
 * CONTENT ELEMENTS
 * -------------------------------------------------------------------------
 */
$GLOBALS['TL_CTE']['dsb']['tributeslist'] = 'Schachbulle\ContaoTributesBundle\Classes\Liste';
