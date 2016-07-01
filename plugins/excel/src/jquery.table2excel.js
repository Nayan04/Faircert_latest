//table2excel.js
;(function ( $, window, document, undefined ) {
	var pluginName = "table2excel",

	defaults = {
		exclude: ".noExl",
    	name: "Table2Excel"
	};

	// The actual plugin constructor
	function Plugin ( element, options ) {
			this.element = element;
			// jQuery has an extend method which merges the contents of two or
			// more objects, storing the result in the first object. The first object
			// is generally empty as we don't want to alter the default options for
			// future instances of the plugin
			// 
			this.settings = $.extend( {}, defaults, options );
			this._defaults = defaults;
			this._name = pluginName;
			this.init();
	}

	Plugin.prototype = {
		init: function () {
			var e = this;
			
			e.template = {
				head: "<html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets>",
				sheet: {
					head: "<x:ExcelWorksheet><x:Name>",
					tail: "</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet>"
				},
				mid: "</x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body>",
				table: {
					head: "<table style=border:1px solid black>",
					tail: "</table>"
				},
				foot: "</body></html>"
			};

			e.tableRows = [];

			// get contents of table except for exclude
                        var colCount = 0;
                        var colCount1 = 0;
                        
            $('tr:nth-child(1) td').each(function () {
                if ($(this).attr('colspan')) {
                    colCount += +$(this).attr('colspan');
                } else {
                    colCount++;
                }
            });
            alert(colCount);
			$(e.element).each( function(i,o) {
				var tempRows = "";
                                colCount=colCount-1;
                                var co=0;
                                tempRows +='<tr><td colspan="8" style="background: #0480be;color: white;font-size: 14pt;text-align: center">FairCert Certification Services Pvt. Ltd.</tr>';
                                tempRows +='<tr><td colspan="8" style="background: #0480be;color: white;font-size: 14pt;text-align: center">List OF Client</tr>';
                                $(o).find("tr").each(function (i,o) {
                                    var tempcol='';
                                    
                                 
				$(o).find("th,td").each(function (i,o) {
                                           //alert($(o).html());
                                         if($(this).attr('class')=='no-print' || $(o).html()=='Action'){
                                            // alert($(this).text())
                                         }else{
                                             
                                             tempcol+='<td>'+$(o).html()+"</td>";
                                         
                                         }
                                     });
                                     if(co==0)
                                             {
                                                 tempRows += "<tr style=color:red;text-align:center><b>" + tempcol + "</b></tr>";
                                             
                                             co++;
                                         }else{
					tempRows += "<tr style=text-align:center>" + tempcol + "</tr>";
                                         }
					//alert(tempRows);
				});
				e.tableRows.push(tempRows);
			});


			e.tableToExcel(e.tableRows, e.settings.name);
		},

		tableToExcel: function (table, name) {
			var e = this, fullTemplate="", i, link, a;

			e.uri = "data:application/vnd.ms-excel;base64,";
			e.base64 = function (s) {
				return window.btoa(unescape(encodeURIComponent(s)));
			};
			e.format = function (s, c) {
				return s.replace(/{(\w+)}/g, function (m, p) {
					return c[p];
				});
			};
			e.ctx = {
				worksheet: name || "Worksheet",
				table: table
			};
			
			fullTemplate= e.template.head;
			
			if ( $.isArray(table) ) {
				for (i in table) {
					//fullTemplate += e.template.sheet.head + "{worksheet" + i + "}" + e.template.sheet.tail;
					fullTemplate += e.template.sheet.head + "Table" + i + "" + e.template.sheet.tail;
				}
			}

			fullTemplate += e.template.mid;

			if ( $.isArray(table) ) {
				for (i in table) {
					fullTemplate += e.template.table.head + "{table" + i + "}" + e.template.table.tail;
				}
			}

			fullTemplate += e.template.foot;

			for (i in table) {
				e.ctx["table" + i] = table[i];
			}
			delete e.ctx.table;


	        if (typeof msie != "undefined" && msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
	        {
	            if (typeof Blob !== "undefined") {
	                //use blobs if we can
	                fullTemplate = [fullTemplate];
	                //convert to array
	                var blob1 = new Blob(fullTemplate, { type: "text/html" });
	                window.navigator.msSaveBlob(blob1, getFileName(e.settings) );
	            } else {
	                //otherwise use the iframe and save
	                //requires a blank iframe on page called txtArea1
	                txtArea1.document.open("text/html", "replace");
	                txtArea1.document.write(fullTemplate);
	                txtArea1.document.close();
	                txtArea1.focus();
	                sa = txtArea1.document.execCommand("SaveAs", true, getFileName(e.settings) );
	            }

	        } else {
	            link = e.uri + e.base64(e.format(fullTemplate, e.ctx));
				a = document.createElement("a");
				a.download = getFileName(e.settings);
				a.href = link;
				a.click();
	        }
			
			return true;

		}
	};

	function getFileName(settings) {
		return ( settings.filename ? settings.filename : "table2excel") + ".xls";
	}

	$.fn[ pluginName ] = function ( options ) {
		var e = this;
			e.each(function() {
					if ( !$.data( e, "plugin_" + pluginName ) ) {
							$.data( e, "plugin_" + pluginName, new Plugin( this, options ) );
					}
			});

			// chain jQuery functions
			return e;
	};

})( jQuery, window, document );