<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005-2009 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  DMA - Dialog und Medien Agentur 2012
 * @author     Janosch Skuplik <skuplik@dma.do>
 * @package    jQTouch
 * @license    LGPL
 * @filesource
 */

 
class jQTouchWidget extends Frontend {

	
	public function jQTouchLoadWidget($objWidget, $strForm, $arrForm)
	{
		global $objPage;
		$objLayout = $this->getPageLayout($objPage->layout);
		
		if ($objLayout->jqt_useJQTouch)
		{
			$strTemplateName = $objWidget->__get('template'); 		
			switch ($strTemplateName)
			{
				case 'form_widget':
					$objWidget->__set('template','jqtouch_form_widget');
					break;
				case 'form_checkbox':
					$objWidget->__set('template','jqtouch_form_checkbox');
					break;
				case 'form_explanation':
					$objWidget->__set('template','jqtouch_form_explanation');
					break;
				case 'form_submit':
					$objWidget->__set('template','jqtouch_form_submit');
					break;
			}
		}
    	return $objWidget;
	}
	
	
	
	
	/**
	 * Get a page layout and return it as database result object
	 * @param integer
	 * @return Database_Result
	 */
	protected function getPageLayout($intId)
	{
		$this->Import('Database');
		$objLayout = $this->Database->prepare("SELECT l.*, t.templates FROM tl_layout l LEFT JOIN tl_theme t ON l.pid=t.id WHERE l.id=? OR l.fallback=1 ORDER BY l.id=? DESC")
									->limit(1)
									->execute($intId, $intId);
		
		// Die if there is no layout at all
		if ($objLayout->numRows < 1)
		{
			header('HTTP/1.1 501 Not Implemented');
			$this->log('Could not find layout ID "' . $intId . '"', 'jQTouchTemplates getPageLayout()', TL_ERROR);
			die('No layout specified');
		}

		return $objLayout;
	}
}
?>