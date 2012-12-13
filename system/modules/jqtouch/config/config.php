<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  DMA - Dialog und Medien Agentur 2012
 * @author     Janosch Skuplik <skuplik@dma.do>
 * @package    jQTouch
 * @license    LGPL
 * @filesource
 */


/**
 * Add back end modules
 */



/**
 * Front end modules
 */



/**
 * Register hooks
 */
$GLOBALS['TL_HOOKS']['generatePage'][] = array('jQTouchPage', 'initializeJQTouch');
$GLOBALS['TL_HOOKS']['getArticle'][] = array('jQTouchArticle', 'initializeJQTouch');
$GLOBALS['TL_HOOKS']['parseFrontendTemplate'][] = array('jQTouchTemplates', 'jQTouchParseFrontendTemplate');
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('jQTouchTemplates', 'jQTouchParseTemplate');

$GLOBALS['TL_HOOKS']['loadFormField'][] = array('jQTouchWidget', 'jQTouchLoadWidget');
$GLOBALS['TL_HOOKS']['dispatchAjax'][] = array('jQTouchAjax', 'jQTouchExtendAjax');
$GLOBALS['TL_HOOKS']['processFormData'][] = array('jQTouchWidget','jQTouchProcessFormData');

/**
 * Add permissions
 */

 /**
 * Form fields
 */
$GLOBALS['TL_FFL']['jqt_lookupLocation'] = 'jQTouchFormLookupLocation';
 

/**
 * Global Vars
 */
$GLOBALS['JQT']['THEMEFOLDER'] = 'assets/jqtouch/themes/';
$GLOBALS['JQT']['EXTENSIONFOLDER'] = 'assets/jqtouch/extensions/';

?>