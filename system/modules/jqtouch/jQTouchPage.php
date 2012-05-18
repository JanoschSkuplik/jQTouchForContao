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

 
class jQTouchPage extends PageRegular {

	public function initializeJQTouch($objPage, $objLayout, $objPageRegular) {
    	
		
		if ($objLayout->jqt_useJQTouch && $objLayout->jqt_layoutType == 'loadFramework') {
		
    		// remove the mootools-scripts
	    	$objPageRegular->Template->mooScripts = '';
		
    		// add the theme-style-sheet
    		$GLOBALS['TL_CSS'][] = $GLOBALS['JQT']['THEMEFOLDER'] . 'css/' . $objLayout->jqt_theme;
      	
      		// add the js-framework
	      	if ($objLayout->jqt_framework=='jQuery')
    	  	{
      			// load jQTouch with jQuery
      			$objPageRegular->Template->mooScripts = '
        			<script src="plugins/jqtouch/src/lib/jquery-1.7.min.js" type="text/javascript" charset="utf-8"></script>
	        		<script src="plugins/jqtouch/src/jqtouch.min.js" type="text/javascript" charset="utf-8"></script>
    	    		<script src="plugins/jqtouch/src/jqtouch-jquery.min.js" type="text/javascript" charset="utf-8"></script>' . "\n";
      		}
	      	else
    	  	{
      			// load jQTouch with Zepto
      			$objPageRegular->Template->mooScripts = '
					<script src="plugins/jqtouch/src/lib/zepto.min.js" type="text/javascript" charset="utf-8"></script>
	        		<script src="plugins/jqtouch/src/jqtouch.js" type="text/javascript" charset="utf-8"></script>' . "\n";
    	  	}
		
			// add launcher-icon
			$strIcon = '';
			if ($objLayout->jqt_homeIcon)
			{
				if (is_file(TL_ROOT . '/' . $objLayout->jqt_homeIcon))
				{
					$strIcon = $objLayout->jqt_homeIcon;
				}
				if (is_file(TL_ROOT . '/' . $objLayout->jqt_homeIcon))
				{
					$strIcon = $objLayout->jqt_homeIcon;
				}	
			}
		
			// add startup-screen
			$strStartupScreen = '';
			if ($objLayout->jqt_showPreview && $objLayout->jqt_previewImage)
			{
				if (is_file(TL_ROOT . '/' . $objLayout->jqt_previewImage))
				{
					$strStartupScreen = $objLayout->jqt_previewImage;
				}
			}
		
			// add more variables
			$strMoreVariables = '';
			if ($objLayout->jqt_moreVariables) {
				$strMoreVariables = ',' . "\n" . $objLayout->jqt_moreVariables;
			}
		
			// generate jqtouch-initializer
	      	$objPageRegular->Template->mooScripts .= '
    	  	<script type="text/javascript" charset="utf-8">
        	    var jQT = new $.jQTouch({
            		icon: \'' . $strIcon . '\',
	            	startupScreen: \'' . $strStartupScreen . '\'' . $strMoreVariables . '
        	    });
				
 	        </script>' . "\n";
			
			// add extensions
			if ($objLayout->jqt_extensions) {
				$arrExtensions = deserialize($objLayout->jqt_extensions);
				foreach ($arrExtensions as $extension)
				{
					$objPageRegular->Template->mooScripts .= '<script src="' . $GLOBALS['JQT']['EXTENSIONFOLDER'] . $extension . '" type="text/javascript" charset="utf-8"></script>' . "\n";
				}
			}
			
         }
  	}  
}
?>