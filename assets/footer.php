<script type="text/javascript">
	
	var url 		= "<?=$config['phpscript']['url']?>";
	var form 		= $("#reportform");
	var results 	= $("#results");
	var urls 		= [];

	$("#btnSubmit").click(function() {

		results.html("Loading ...");

		var message="";
		if(urls.length > 0) {
			
			for(i=0;i<urls.length;i++) {

				$.ajax({ 
					type: 'GET', 
					url: urls[i], 
					crossDomain: true, 
					// data: form.serialize(), 
					success: function(response) { 
						message += response;
						results.html(message);
					},
					error: function() { 
						results.html("Error: " + arguments); 
					} 
				})

			}
			
		}


	});

	$(".generatelink").bind('click keyup', function() {

		var tempurls 	  	= [];

		$(".typecode").each(function() {
			var reporttype 	= $(this);
			var startdate 	= $(this).parent().parent().find(".datetimefrom");
			var enddate 	= $(this).parent().parent().find(".datetimeto");
			var label 		= $(this).parent().parent().find("label");

			if(reporttype.is(":checked")) {
				tempurls.push(url + "?s=" + startdate.val() + "&e=" + enddate.val() + "&t=" + encodeURI(reporttype.val()) + "&l=" + encodeURI(label.html()));
			} 
		});
		urls = tempurls;
		results.html(urls.join("<br />"));
	})

</script>