/*

	contaoFavorites-Extension for jQTouch
    Created by Janosch Skuplik; DMA - Dialog- und Medienagentur Dortmund

*/


(function($) {
	if ($.jQTouch)
	{
		$.jQTouch.addExtension(function contaoFavorites(jQT){
			
			var cPage;
			
			var dbSettings = {
				shortname: 'favorites',
				version: '1.0',
				displayName: 'Favoriten',
				expectedSize: 5*1024*1024
			};
			
			var dbStructure = {
				id: 'INTEGER PRIMARY KEY ASC',
				title: 'TEXT',
				href: 'TEXT',
				premium: 'INTEGER',
				added_on: 'DATETIME'
			};
			
			
			function init(fn){
				
				jQT.initDb(dbSettings,dbStructure);

			}
			
			function addEntry(title,href,premium) {
				var insertData = {
					title: title,
					href: href,
					premium: false
				};
				jQT.addDbEntry(insertData,'');
			}
			
			function deleteEntry(id) {
				jQT.deleteDbEntry(id,'')
			}
			
			function getEntries(callback) {
				jQT.getDbEntries({callback:callback});
			}
			
			function getEntry(where,callback) {
				jQT.getDbEntry(where,{callback:callback});
			}
			
			function renderFavorites(tx, r) {
				var rowOutput = "";
  				var favoritesList = $("#favoriten .scroll");
  				for (var i=0; i < r.rows.length; i++) {
    				rowOutput += renderListItem(r.rows.item(i));
  				}
  				favoritesList.html('<ul class="edgetoedge">' + rowOutput + '</ul>');
			}
			
			function renderListItem(row) {
  				return '<li class="forward"><a href="partner/items/' + row.href + '.html"><span class="title">' + row.title + '</span></a></li>';
			}
			
			function reRenderButton(tx, r) {
				var currentButton = $('.mod_article.current a.addToFavoritesBtn');
				if (r.rows.length > 0) {
					currentButton.text('Favoriten -');
					addDeleteAction(currentButton);
				} else {
					addAddAction(currentButton);
				}
			}
			
			function addAddAction(btn) {
				btn.click(function() {
					var title = $('.layout_full h2',cPage).text();
					var href = getPartnerId(cPage.attr('id'));
					var premium = false;
					addEntry(title,href,premium);
					btn.text('Favoriten -');
					addDeleteAction(btn);
				});
			}
			
			function addDeleteAction(btn) {
				btn.click(function(){
					deleteEntry(getPartnerId(cPage.attr('id')));
					btn.text('Favoriten +');
					addAddAction(btn);
				});
			}
			
			function getPartnerId(articleId) {
				var id = '';
				id = articleId.replace("partner_items-", '');
				return id;
			}
			
			$(function(){
				$('#jqt').bind('pageAnimationStart', function(e, data){

					if (data.direction === 'in') {
						// check and rename the add-to-favorite button
						if ($('a.addToFavoritesBtn',$(e.target)).length > 0) {
							cPage = $(e.target);
							var href = getPartnerId(cPage.attr('id'));
							var checkData = jQT.getFavorite('href="' + href + '"',jQT.reRenderButton);

						}
						// render the favorites
						if ($(e.target).attr('id') == 'favoriten') {
							jQT.getFavorites(jQT.renderFavorites);
						}
					}
				});
            });
			
			return {
				initFavorites: init,
                addFavorite: addEntry,
                deleteFavorite: deleteEntry,
                getFavorites: getEntries,
                getFavorite:getEntry,
                reRenderButton:reRenderButton,
                renderFavorites:renderFavorites
            }
		});
	}
})($);


$(document).ready(function(){
	jQT.initFavorites();
});

