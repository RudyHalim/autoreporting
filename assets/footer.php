<script type="text/javascript">

	$(document).ready(function() {
		$(".datepicker").datepicker( { dateFormat: 'yymmdd' });

		// $("#rEG_meme_22_chk").click();
		// $("#ReG_MemE_XLV0_chk").click();
		// $("#ReG_MemE_ALV0_chk").click();
		// $("#rEG_meme_44_chk").click();
		// $("#btnSubmit").click();
	});

	var hushurl 	= "<?=$config['phpscript']['hushurl']?>";
	var hiturl 		= "<?=$config['phpscript']['hiturl']?>";
	var form 		= $("#reportform");
	var urls 		= [];

	$("#btnSubmit").click(function() {

		var btnSubmit = $(this);
		btnSubmit.val("Processing") // or: this.value = "processing";  
		btnSubmit.prop('disabled', true); // no double submit ;)

		if(Object.keys(urls).length > 0) {

			for(var k in urls) {

				(function(key) {
					$.ajax({ 
						type: 'GET', 
						url: urls[key], 
						crossDomain: true, 
						beforeSend: function() {
							$("#" + key).html("Loading " + key + "...");
						},
						success: function(response) { 

							$("#" + key).html(response);

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
										btnSubmit.val("Submit Again");
										btnSubmit.prop('disabled', false);
									},
									error: function() { 
										console.log(arguments);
									} 
								});
							});

						},
						error: function() { 
							console.log(arguments);
							$("#" + key).html("Error: " + arguments); 
						} 
					});
				})(k);

			};
		} else {
			console.log("else");
		}
	});

	$(".generatelink").bind('click keyup change', function() {

		$(".typecode").each(function() {
			var reporttype 	= $(this);
			var startdate 	= $(this).parent().parent().find(".datetimefrom");
			var enddate 	= $(this).parent().parent().find(".datetimeto");
			var shelltype 	= $(this).parent().parent().find("input[type=hidden]");
			var label 		= $(this).parent().parent().find("label");

			if(reporttype.is(":checked")) {
				
				urls[jqid(shelltype.val())] = hushurl + "?s=" + startdate.val() 
									+ "&e=" + enddate.val() 
									+ "&t=" + encodeURI(reporttype.val()) 
									+ "&h=" + encodeURI(shelltype.val()) 
									+ "&l=" + encodeURI(label.html())
									;
				$("#" + jqid(shelltype.val())).html(urls[jqid(shelltype.val())]);
			} else {
				$("#" + jqid(shelltype.val())).html("");
			}
		});
	});

	function jqid (id) {
		// return (!id) ? null : id.replace(/(:|\.|\[|\]|,)/g, '\\$1');
		return (!id) ? null : id.replace(".", "");
	}

</script>