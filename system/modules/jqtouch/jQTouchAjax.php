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

 
class jQTouchAjax extends Controller {

	private $urlReverseGeocoding = 'http://nominatim.openstreetmap.org/reverse';//?format=json&lat=52.12715756&lon=8.43507027&zoom=1&addressdetails=1
	

	public function jQTouchExtendAjax() {
    	
		if ($this->Input->get('action') == 'dma' && $this->Input->get('type') == 'getAddress')
		{
			$arrResult = array();
		
			
			//$requestURL = $this->urlReverseGeocoding . '?format=json&lat=' . $this->Input->get('lat') . '&lon=' . $this->Input->get('lng') . '&zoom=1&addressdetails=1';
			$requestURL = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . $this->Input->get('lat') . ',' . $this->Input->get('lng') . '&sensor=false';

      		$response = @file_get_contents($requestURL);
			
			$arrResult = json_decode($response,true);
			
			return $arrResult;
		}
      	
  	}  
}
?>