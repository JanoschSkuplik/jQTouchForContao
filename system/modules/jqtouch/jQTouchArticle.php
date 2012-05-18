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

 
class jQTouchArticle extends Frontend {

	public function initializeJQTouch($objArticle) {

		if ($objArticle->jqt_toolbar) 
		{
			$objArticle->addToolbar = true;
			$objToolbar = new FrontendTemplate('jqtouch_toolbar');
			if ($this->Input->get('page'))
			{
				$objArticle->alias = $objArticle->alias . '_page-' . $this->Input->get('page');
			}
			if ($this->Input->get('items'))
			{
				$objArticle->alias = $objArticle->alias . '_items-' . $this->Input->get('items');
			}
			if ($objArticle->jqt_toolbarTitle)
			{
				$objToolbar->addTitle = true;
				$objToolbar->title = $objArticle->jqt_toolbarTitleText ? $objArticle->jqt_toolbarTitleText : $objArticle->title;
			}
			
			if ($objArticle->jqt_toolbarBackBtn)
			{
				$objToolbar->addBackBtn = true;
				//$objArticle->jqt_toolbarBackBtnTarget
				//$objArticle->jqt_toolbarBackBtnText
				//$objArticle->jqt_toolbarRightBtnHtml
			}
			
			if ($objArticle->jqt_toolbarRightBtn)
			{
				$objToolbar->addRightBtn = true;
				$objToolbar->rightBtnHtml = $objArticle->jqt_toolbarRightBtnHtml;
			}
			
			$objArticle->jQTouchToolbar = $objToolbar->parse();
		}
  	}  
	
}
?>