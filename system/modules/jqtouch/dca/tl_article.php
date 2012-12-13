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
 * Table tl_article
 */

/**
 * palettes
 */
 
$GLOBALS['TL_DCA']['tl_article']['palettes']['__selector__'][] =  'jqt_toolbar';
$GLOBALS['TL_DCA']['tl_article']['palettes']['__selector__'][] =  'jqt_toolbarBackBtn';
$GLOBALS['TL_DCA']['tl_article']['palettes']['__selector__'][] =  'jqt_toolbarTitle';
$GLOBALS['TL_DCA']['tl_article']['palettes']['__selector__'][] =  'jqt_toolbarRightBtn';


$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = str_replace(';{expert_legend',';{jqt_legend},jqt_toolbar,jqt_nocache;{expert_legend',$GLOBALS['TL_DCA']['tl_article']['palettes']['default']);


$GLOBALS['TL_DCA']['tl_article']['subpalettes']['jqt_toolbar'] = 'jqt_toolbarBackBtn,jqt_toolbarTitle,jqt_toolbarRightBtn';
$GLOBALS['TL_DCA']['tl_article']['subpalettes']['jqt_toolbarBackBtn'] = 'jqt_toolbarBackBtnTarget,jqt_toolbarBackBtnText';
$GLOBALS['TL_DCA']['tl_article']['subpalettes']['jqt_toolbarTitle'] = 'jqt_toolbarTitleText';
$GLOBALS['TL_DCA']['tl_article']['subpalettes']['jqt_toolbarRightBtn'] = 'jqt_toolbarRightBtnHtml';

/**
 * fields
 */

$GLOBALS['TL_DCA']['tl_article']['fields']['jqt_nocache'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['jqt_nocache'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr w50 m12')
);
$GLOBALS['TL_DCA']['tl_article']['fields']['jqt_toolbar'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['jqt_toolbar'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true)
);
$GLOBALS['TL_DCA']['tl_article']['fields']['jqt_toolbarBackBtn'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['jqt_toolbarBackBtn'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr w50 m12')
);
$GLOBALS['TL_DCA']['tl_article']['fields']['jqt_toolbarTitle'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['jqt_toolbarTitle'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr w50 m12')
);
$GLOBALS['TL_DCA']['tl_article']['fields']['jqt_toolbarRightBtn'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['jqt_toolbarRightBtn'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr w50 m12')
);

$GLOBALS['TL_DCA']['tl_article']['fields']['jqt_toolbarRightBtnHtml'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['jqt_toolbarRightBtnHtml'],
	'exclude'                 => true,
	'inputType'               => 'textarea',
	'eval'                    => array('allowHtml'=>true, 'style'=>'height:60px;', 'tl_class'=>'clr')
);
$GLOBALS['TL_DCA']['tl_article']['fields']['jqt_toolbarBackBtnText'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['jqt_toolbarBackBtnText'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'w50')
);
$GLOBALS['TL_DCA']['tl_article']['fields']['jqt_toolbarTitleText'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['jqt_toolbarTitleText'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'w50')
);



class tl_article_jqtouch extends Backend
{

}

?>