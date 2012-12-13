<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2012 Leo Feyer
 * 
 * @package Jqtouch
 * @link    http://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'jQTouchAjax'               => 'system/modules/jqtouch/classes/jQTouchAjax.php',
	'jQTouchArticle'            => 'system/modules/jqtouch/classes/jQTouchArticle.php',
	'jQTouchFormLookupLocation' => 'system/modules/jqtouch/classes/jQTouchFormLookupLocation.php',
	'jQTouchPage'               => 'system/modules/jqtouch/classes/jQTouchPage.php',
	'jQTouchTemplates'          => 'system/modules/jqtouch/classes/jQTouchTemplates.php',
	'jQTouchWidget'             => 'system/modules/jqtouch/classes/jQTouchWidget.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'fe_jqtouch_request'           => 'system/modules/jqtouch/templates',
	'fe_jqtouch_start'             => 'system/modules/jqtouch/templates',
	'jqtouch_form'                 => 'system/modules/jqtouch/templates',
	'jqtouch_form_checkbox'        => 'system/modules/jqtouch/templates',
	'jqtouch_form_explanation'     => 'system/modules/jqtouch/templates',
	'jqtouch_form_listelement'     => 'system/modules/jqtouch/templates',
	'jqtouch_form_lookup_location' => 'system/modules/jqtouch/templates',
	'jqtouch_form_submit'          => 'system/modules/jqtouch/templates',
	'jqtouch_form_widget'          => 'system/modules/jqtouch/templates',
	'jqtouch_mod_article'          => 'system/modules/jqtouch/templates',
	'jqtouch_toolbar'              => 'system/modules/jqtouch/templates',
	'nav_forward'                  => 'system/modules/jqtouch/templates',
	'nav_arrow'                    => 'system/modules/jqtouch/templates',
));
