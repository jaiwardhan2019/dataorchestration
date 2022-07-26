					$('#pdct').autocomplete({
			      	source: function( request, response ) {
			      		$.ajax({
			      			url : 'ui/ajax/autocomplete_product_suggest.php',
			      			dataType: "json",
							data: {
							   name_startsWith: request.term,
							   type: 'country_table',
							   row_num : 1
							},
							 success: function( data ) {
								 response( $.map( data, function( item ) {
								 	var code = item.split("|");
									return {
										label: code[0],
										value: code[0],
										data : item
									}
								}));
							}
			      		});
			      	},
			      	autoFocus: true,	      	
			      	minLength: 0,
			      	select: function( event, ui ) {
						var names = ui.item.data.split("|");
						console.log(names[1], names[2],  names[3],  names[4], );						
						$('#mfg').val(names[1]);					
						$('#type').val(names[2]);					
						$('#hsn').val(names[3]);					
						$('#gst').val(names[4]);					
					}		      	
			      });