<script type="text/javascript">

	var hushurl 	= "<?=$config['phpscript']['hushurl']?>";
	var hiturl 		= "<?=$config['phpscript']['hiturl']?>";
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
					success: function(response) { 
						message += response;
						results.html(message);

						// count hit if success given
						var hitcol	 	= $(".divhit");

						hitcol.each(function() {

							var m = $(this).parent().find(".menu").html();
							var d = $(this).parent().parent().find(".datetime").html();
							var element = $(this);

							$.ajax({ 
								type: 'GET', 
								url: hiturl, 
								context: hitcol,
								data: {
									'm': m
									, 'd': d
								},
								success: function(response) { 
									element.html(response);
								},
								error: function() { 
									element.html("Error: " + arguments);
								} 
							});
						});

					},
					error: function() { 
						results.html("Error: " + arguments); 
					} 
				});
			}
		}
	});

	$(".generatelink").bind('click keyup change', function() {

		var tempurls 	  	= [];

		$(".typecode").each(function() {
			var reporttype 	= $(this);
			var startdate 	= $(this).parent().parent().find(".datetimefrom");
			var enddate 	= $(this).parent().parent().find(".datetimeto");
			var shelltype 	= $(this).parent().parent().find("input[type=hidden]");
			var label 		= $(this).parent().parent().find("label");

			if(reporttype.is(":checked")) {
				tempurls.push(hushurl + "?s=" + startdate.val() 
					+ "&e=" + enddate.val() 
					+ "&t=" + encodeURI(reporttype.val()) 
					+ "&h=" + encodeURI(shelltype.val()) 
					+ "&l=" + encodeURI(label.html())
					);
			} 
		});
		urls = tempurls;
		results.html(urls.join("<br />"));
	});

	$(document).ready(function() {
		$(".datepicker").datepicker( { dateFormat: 'yymmdd' });
	});

</script>