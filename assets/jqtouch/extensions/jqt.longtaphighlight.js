/*

	longTapHighlight-Extension for jQTouch
    Created by Janosch Skuplik; DMA - Dialog- und Medienagentur Dortmund

*/


(function($) {
	if ($.jQTouch)
	{
		$.jQTouch.addExtension(function longTapHighlight(jQT){
			
			var tapHighlight, tapTimeout, tapPosition = {};
			init();
			
			function init(){
				$('body').append('<div id="highlight" style="-webkit-border-radius:15px;height:30px;width:30px;position:absolute;margin-top:-15px;margin-left:-15px;opacity:0;z-index:9999;background:red;"></div>');
				tapHighlight = $('#highlight');
			}
			
			function highlightDissapper() {
				tapHighlight.css('opacity',0);
			}
			
			$(function(){
				$('#jqt').bind('longTap', function(e,data) {
					if (tapPosition && tapPosition.x && tapPosition.y) {
						tapHighlight.css({'left':tapPosition.x,'top':tapPosition.y,'opacity':0.7});
					} 
					tapTimeout = window.setTimeout(function(){
						highlightDissapper();
					},2000);
				});
				
				// save the current position in local position-object
				$('#jqt').bind('touchstart', function(e, data){
					if (typeof Zepto == "function") {
						tapPosition.x = e.pageX;
						tapPosition.y = e.pageY;
					} else {
						tapPosition.x = event.changedTouches[0].pageX;
						tapPosition.y = event.changedTouches[0].pageY;
					}
				});
				
				$('#jqt').bind('pageAnimationEnd', function(e,data){
					highlightDissapper();
				});
            });
			
			return {
				initLongTapHighlight: init
            }
		});
	}
})($);


