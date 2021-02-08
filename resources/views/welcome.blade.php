<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Wind turbine inspector</title>
		<style>
			body { margin: 0; }
		</style>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>
	<body>
		<div class='container' id='reportContainer'>
			<div class='row mt-5'>
				<span>Loading...</span>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script>
			$.ajax({
				url: "/api/v2/inspection-report"
			}).done(function(data) {
				let reportContainer = $('#reportContainer');
				reportContainer.empty();
				$.each(data, function(i, item){
					alertStyle = 'alert alert-success';
					if(item.value == 'Coating Damage' || item.value == 'Lightning Strike' ) {
						alertStyle = 'alert alert-warning';
					} else if (item.value == 'Coating Damage and Lightning Strike') {
						alertStyle = 'alert alert-danger';
					}
					itemValue = (item.value == item.id) ? 'OK' : item.value;
					$('#reportContainer').append("<div class='row mt-5 " + alertStyle + "'><div class='col-md-1 col-sm-6'>" + item.id + "</div><div class='col-md-11 col-sm-6'>" + itemValue + "</div></div>");
				});
			})
		</script>
	</body>
</html>