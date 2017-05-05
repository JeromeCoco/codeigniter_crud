<!DOCTYPE html>
<html>
	<head>
		<title>Add</title>
		<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.css">
		<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.min.css">
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/bootbox.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function()
			{
				$("#save").click(function(){
					var fname = $("#fname").val();
					var mname = $("#mname").val();
					var lname = $("#lname").val();
					$.ajax({
						url: "/index.php/crud/add",
			        	type: "POST",
			        	data: {
			        		fname:fname, mname:mname, lname:lname
			        	},
			        	dataType: "json",
			        	success: function(data)
			        	{
			        		bootbox.alert("New Item Successfully Added!");
			        		window.location.assign("/index.php/crud/");
			        	},
						error: function (XMLHttpRequest, textStatus, errorThrown)
           				{ 
           					bootbox.alert("Error Occured!");
           				}
			   		});
				});
			});
		</script>
	</head>
	<body>
		<div class="container"><br/>
			<div class="row">
				<div class="col-sm-4">
					<input class="form-control" id="fname" placeholder="First name"/>
				</div>
				<div class="col-sm-4">
					<input class="form-control" id="mname" placeholder="Middle name"/>
				</div>
				<div class="col-sm-4">
					<input class="form-control" id="lname" placeholder="Last name"/>
				</div>
				<div class="col-sm-4"><br/>
					<button id="save" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</body>
</html>