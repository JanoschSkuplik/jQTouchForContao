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



class jQTouchFormLookupLocation extends Widget
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'jqtouch_form_lookup_location';


	/**
	 * Add specific attributes
	 * @param string
	 * @param mixed
	 */
	public function __set($strKey, $varValue)
	{
		switch ($strKey)
		{
			case 'required':
			case 'mandatory':
				// Ignore
				break;

			case 'name':
				$this->arrAttributes['name'] = $varValue;
				break;

			default:
				parent::__set($strKey, $varValue);
				break;
		}
	}


	/**
	 * Validate input and set value
	 */
	public function validate()
	{
		return;
	}


	/**
	 * Generate the widget and return it as string
	 * @return string
	 */
	public function generate()
	{
		$this->Import('Database');
		
		if ($this->jqt_locationInput)
		{
			$objLocationInput = $this->Database->prepare("SELECT name FROM tl_form_field WHERE id=?")
												->limit(1)
												->execute($this->jqt_locationInput);
			$strLocationInputName = $objLocationInput->name;
		}
		if ($this->jqt_locationInputLat)
		{
			$objLocationInputLat = $this->Database->prepare("SELECT name FROM tl_form_field WHERE id=?")
												->limit(1)
												->execute($this->jqt_locationInputLat);
			$strLocationInputLatName = $objLocationInputLat->name;
		}
		if ($this->jqt_locationInputLng)
		{
			$objLocationInputLng = $this->Database->prepare("SELECT name FROM tl_form_field WHERE id=?")
												->limit(1)
												->execute($this->jqt_locationInputLng);
			$strLocationInputLngName = $objLocationInputLng->name;
		}

		return sprintf('<a onclick="javascript:currentLookup(%s,%s,%s);return false;" id="ctrl_%s" class="%s"%s>%s</a>',
						$strLocationInputName ? "'" . $strLocationInputName . "'" : "''",
						$strLocationInputLatName ? "'" . $strLocationInputLatName . "'" : "''",
						$strLocationInputLngName ? "'" . $strLocationInputLngName . "'" : "''",
						$this->strId,
						(strlen($this->strClass) ? '' . $this->strClass : ''),
						$this->getAttributes(),
						specialchars($this->slabel));
	}
}

?>