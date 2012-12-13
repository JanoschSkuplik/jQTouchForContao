/*

            _/    _/_/    _/_/_/_/_/                              _/
               _/    _/      _/      _/_/    _/    _/    _/_/_/  _/_/_/
          _/  _/  _/_/      _/    _/    _/  _/    _/  _/        _/    _/
         _/  _/    _/      _/    _/    _/  _/    _/  _/        _/    _/
        _/    _/_/  _/    _/      _/_/      _/_/_/    _/_/_/  _/    _/
       _/
    _/

    Created by David Kaneda <http://www.davidkaneda.com>
    Maintained by Thomas Yip <http://beedesk.com/>
    Sponsored by Sencha Labs <http://www.sencha.com/>
    Special thanks to Jonathan Stark <http://www.jonathanstark.com/>

    Documentation and issue tracking on GitHub <http://github.com/senchalabs/jQTouch/>

    (c) 2009-2011 Sencha Labs
    jQTouch may be freely distributed under the MIT license.

*/


(function($) {
	if ($.jQTouch)
	{
		$.jQTouch.addExtension(function AlertBox(jQT){
			
			var width=200, disapper=true, disappearTime=3, alertTimeOut, closeText='OK', alertBox;
			
			function alert(content){
				
				if ($('#alert').length == 0) {
					$('body').append('<div id="alert"><div class="alertcontent">' + content + '</div></div>');
					$('#alert').css({
						'z-index':'20',
						'-webkit-border-radius':'10px',
						'background-color':'rgba(0,0,0,.7)',
						'color':'white',
						'font-size':'18px',
						'font-weight':'bold',
						'font-family':'"Helvetica Neue",Helvetica',
						'min-height':'80px',
						'line-height': '22px',
						'margin-left':'-100px',
						'left':'50%',
						'position': 'absolute',
						'text-align': 'center',
						'top': '120px',
						'width': '200px',
						'display':'none'
					});
					$('#alert .alertcontent').css({
						'padding': '20px'
					});
				} else {
					$('#alert .alertcontent').html(content);
				}
				openAlert();

			}
			
			function openAlert() {
				$('#alert').css('display','block');
				console.log(disappearTime);
				alertTimeOut = window.setTimeout(function(){
					jQT.closeAlert();
				},disappearTime*1000);
			}
			
			function closeAlert() {
				$('#alert').css('display','none');
				cleanAlert();
			}
			
			function cleanAlert() {
				$('#alert .alertcontent').empty();
			}
			
			return {
                alert: alert,
                closeAlert: closeAlert
            }
		});
	}
})($);

//console.log(typeof(jQuery));
if (typeof jQuery == "function") {

	$(document).ready(function(){
		$('body').append('<div id="progress" style="-webkit-border-radius:10px;background-color:rgba(0,0,0,.7);color:white;font-size:18px;font-weight:bold;font-family:\'Helvetica Neue\',Helvetica;height:80px;line-height: 80px; margin-left:-100px; left:50%; position: absolute;text-align: center; top: 120px; width: 200px;display:none;">Loading...</div>');
	});
	
	$(document).ajaxStart(function(){
		$('#progress').css('display','block');
	}).ajaxStop(function(){
		$('#progress').css('display','none');
	});

}










