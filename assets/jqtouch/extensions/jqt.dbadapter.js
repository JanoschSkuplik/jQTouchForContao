/*

	dbAdapter-Extension for jQTouch
    Created by Janosch Skuplik; DMA - Dialog- und Medienagentur Dortmund

*/


(function($) {
	if ($.jQTouch)
	{
		$.jQTouch.addExtension(function dbAdapter(jQT){
			
			var shortname = 'favorites', version='1.0', displayName='Favoriten',expectedSize=5*1024*1024;
			
			var dbAdapter = {};
			dbAdapter.webdb = {};
			dbAdapter.webdb.db = null;
			
			dbAdapter.webdb.open = function() {
  				try {
  				 	if (!window.openDatabase) {
                        alert('Kein HTML5 Database Storage möglich!');
                    } else { 
                    	dbAdapter.webdb.db = openDatabase(shortname, version, displayName, expectedSize);
                        dbAdapter.webdb.createTable();
                    }
                } 
                catch (e) {
                    alert("Unbekannter Fehler " + e + ".");
                    return false;
                }
			}
			
			dbAdapter.webdb.createTable = function() {
  				var db = dbAdapter.webdb.db;
  				db.transaction(function(tx) {
    				tx.executeSql("CREATE TABLE IF NOT EXISTS favoriten (ID INTEGER PRIMARY KEY ASC, title TEXT, href TEXT, premium INTEGER, added_on DATETIME)", []);
  				});
			}
			
			dbAdapter.webdb.addEntry = function(data, options) {
  				var db = dbAdapter.webdb.db;
  				db.transaction(function(tx){
    				var addedOn = new Date();
    				tx.executeSql("INSERT INTO favoriten (title, href, premium, added_on) VALUES (?,?,?,?)",
        				[data.title, data.href, data.premium, addedOn],
        				dbAdapter.webdb.onSuccess,
        				dbAdapter.webdb.onError);
   				});
			}
			
			dbAdapter.webdb.getEntry = function(where,options) {
				var db = dbAdapter.webdb.db;
				db.transaction(function(tx) {
					tx.executeSql("SELECT * FROM favoriten WHERE " + where, [], 
						options.callback ? options.callback : dbAdapter.webdb.onSuccess,
						dbAdapter.webdb.onError);
				});
			}
			
			dbAdapter.webdb.getEntries = function(options) {
  				var db = dbAdapter.webdb.db;
  				db.transaction(function(tx) {
    			tx.executeSql("SELECT * FROM favoriten", [], 
    				options.callback ? options.callback : dbAdapter.webdb.onSuccess,
        			dbAdapter.webdb.onError);
  				});
			}

			dbAdapter.webdb.deleteEntry = function(id,options) {
  				var db = dbAdapter.webdb.db;
  				db.transaction(function(tx){
    				tx.executeSql("DELETE FROM favoriten WHERE href=?", [id],
        				options.callback ? options.callback : dbAdapter.webdb.onSuccess,
        				dbAdapter.webdb.onError);
    			});
			}
			
			dbAdapter.webdb.onError = function(tx, e) {
  				alert("There has been an error: " + e.message);
			}

			dbAdapter.webdb.onSuccess = function(tx, r) {
				console.log(tx);
			}

			initDb = function(dbSettings,dbStructure) {
				if (dbSettings && dbStructure) {
					dbAdapter.webdb.open(dbSettings,dbStructure);
				}
			}
			addDbEntry = function(data,options) {
				dbAdapter.webdb.addEntry(data,options);
			}
			deleteDbEntry = function(id,options) {
				dbAdapter.webdb.deleteEntry(id,options);
			}
			getDbEntry = function(where,options) {
				dbAdapter.webdb.getEntry(where,options);
			}
			getDbEntries = function(options) {
				dbAdapter.webdb.getEntries(options);
			}
			
			
			return {
				initDb: initDb,
				addDbEntry: addDbEntry,
				deleteDbEntry: deleteDbEntry,
				getDbEntry: getDbEntry,
				getDbEntries: getDbEntries
            }
		});
	}
})($);


