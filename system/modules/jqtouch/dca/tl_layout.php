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
 * Table tl_layout
 */

/**
 * palettes
 */
 
$GLOBALS['TL_DCA']['tl_layout']['palettes']['__selector__'][] =  'jqt_useJQTouch';
$GLOBALS['TL_DCA']['tl_layout']['palettes']['__selector__'][] =  'jqt_layoutType';
$GLOBALS['TL_DCA']['tl_layout']['palettes']['__selector__'][] =  'jqt_showPreview';


$GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] = str_replace(';{expert_legend',';{jqt_legend},jqt_useJQTouch;{expert_legend',$GLOBALS['TL_DCA']['tl_layout']['palettes']['default']);

$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['jqt_useJQTouch'] = 'jqt_layoutType';
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['jqt_layoutType_loadFramework'] = 'jqt_showPreview,jqt_homeIcon,jqt_moreVariables,jqt_theme,jqt_framework,jqt_extensions';
$GLOBALS['TL_DCA']['tl_layout']['subpalettes']['jqt_showPreview'] = 'jqt_previewImage,jqt_previewSize';


/**
 * fields
 */
 
$GLOBALS['TL_DCA']['tl_layout']['fields']['jqt_useJQTouch'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['jqt_useJQTouch'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true)
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['jqt_layoutType'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['jqt_layoutType'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'				  => array('loadFramework','request'),
	'eval'                    => array('submitOnChange'=>true)
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['jqt_homeIcon'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['jqt_homeIcon'],
	'exclude'                 => true,
	'inputType'               => 'fileTree',
	'eval'                    => array('fieldType'=>'radio', 'filesOnly'=>true, 'extensions'=>'jpg,jpeg,png', 'files'=>true, 'tl_class'=>'clr')
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['jqt_showPreview'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['jqt_showPreview'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr')
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['jqt_previewImage'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['jqt_previewImage'],
	'exclude'                 => true,
	'inputType'               => 'fileTree',
	'eval'                    => array('fieldType'=>'radio', 'filesOnly'=>true, 'extensions'=>'jpg,jpeg,png', 'files'=>true, 'mandatory'=>true, 'tl_class'=>'clr')
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['jqt_previewSize'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['jqt_previewSize'],
	'exclude'                 => true,
	'inputType'               => 'imageSize',
	'options'                 => $GLOBALS['TL_CROP'],
	'reference'               => &$GLOBALS['TL_LANG']['MSC'],
	'eval'                    => array('rgxp'=>'digit', 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['jqt_moreVariables'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['jqt_moreVariables'],
	'exclude'                 => true,
	'inputType'               => 'textarea',
	'eval'                    => array('style'=>'height:60px;', 'tl_class'=>'clr')
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['jqt_framework'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['jqt_framework'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('zepto','jQuery'),
	'eval'                    => array('tl_class'=>'w50', 'mandatory'=>true)
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['jqt_extensions'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['jqt_extensions'],
	'exclude'                 => true,
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('tl_layout_jqtouch', 'getJQTExtensions'),
	'eval'                    => array('tl_class'=>'m12 clr', 'multiple'=>true)
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['jqt_theme'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['jqt_theme'],
	'exclude'                 => true,
	'flag'                    => 11,
	'inputType'               => 'select',
	'options_callback'        => array('tl_layout_jqtouch', 'getJQTThemes'),
	'eval'                    => array('tl_class'=>'w50', 'mandatory'=>true)
);



class tl_layout_jqtouch extends Backend
{
	public function getJQTThemes()
	{
		$themeFolder = TL_ROOT . '/' . $GLOBALS['JQT']['THEMEFOLDER'];
		
		$themeFolder = $themeFolder . 'css/';
		
		$arrThemes = array();
		
		$arrFiles = scan($themeFolder);

		
		foreach ($arrFiles as $themeFile) 
		{
			$arrThemes[$themeFile] = str_replace('.css','',$themeFile);
		}
		

		return $arrThemes;
	}
	
	public function getJQTExtensions()
	{
		$extensionsFolder = TL_ROOT . '/' . $GLOBALS['JQT']['EXTENSIONFOLDER'];
		$arrExtensions = array();

		$arrExtensionFiles = scan($extensionsFolder);

		foreach ($arrExtensionFiles as $extensionFile)
		{
			$arrExtensions[$extensionFile] = $extensionFile;
		}
		return $arrExtensions;
		
	}
	
}

?>