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
 * Table tl_form_field
 */
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['jqt_lookupLocation'] = '{type_legend},type,slabel;{fconfig_legend},jqt_locationInput,jqt_locationInputLat,jqt_locationInputLng;{expert_legend:hide},class';

foreach ($GLOBALS['TL_DCA']['tl_form_field']['palettes'] as $key=>$palette)
{
	$GLOBALS['TL_DCA']['tl_form_field']['palettes'][$key] = str_replace(',type',',type,jqt_listitem',$GLOBALS['TL_DCA']['tl_form_field']['palettes'][$key]);
}




$GLOBALS['TL_DCA']['tl_form_field']['fields']['jqt_locationInput'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['jqt_locationInput'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_form_field_jqtouch', 'getInputFields'),
	'eval'                    => array('tl_class'=>'w50', 'includeBlankOption'=>true)
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['jqt_locationInputLat'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['jqt_locationInputLat'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_form_field_jqtouch', 'getInputFields'),
	'eval'                    => array('tl_class'=>'w50', 'includeBlankOption'=>true)
);
$GLOBALS['TL_DCA']['tl_form_field']['fields']['jqt_locationInputLng'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['jqt_locationInputLng'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_form_field_jqtouch', 'getInputFields'),
	'eval'                    => array('tl_class'=>'w50', 'includeBlankOption'=>true)
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['type']['eval']['tl_class'] = 'w50';
$GLOBALS['TL_DCA']['tl_form_field']['fields']['jqt_listitem'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['jqt_listitem'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12')
);


class tl_form_field_jqtouch extends Backend
{
	public function getInputFields(DataContainer $dc)
	{
		
		$arrFields = array();
		$intPid = $dc->activeRecord->pid;
		
		$objFields = $this->Database->prepare("SELECT * FROM tl_form_field WHERE pid=? AND (type=? OR type=?)")
									->execute($intPid,'text','hidden');
		
		while ($objFields->next())
		{
			$arrFields[$objFields->id] = $objFields->name;
		}

		return $arrFields;
	}
}

?>