<!DOCTYPE html>
<html>
	<head>
		<title>View</title>
		<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.css">
		<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.min.css">
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/bootbox.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(document).on( 'click', '.deletebutton', function(){
					var id = $(this).attr("data-id");
					console.log(id);
					bootbox.confirm({ 
					  size: "small",
					  message: "Are you sure?", 
					  callback: function(result){
					  	if (result == true)
					  	{
							$.ajax({
								url: "/index.php/crud/delete",
						        type: "POST",
						        data: { id:id },
						        dataType: "json",
						        success: function(data)
						        {
						        	bootbox.alert("Deleted");
						        	$(".row_"+id).fadeOut();
						        }
						    });
					  	}
					  }
					})
				});
				$("#update").click(function(){
					var laman = $("#editss").serialize();
					var id = $("#ids").val();
					var newfname = $("#fname").val();
					var newmname = $("#mname").val();
					var newlname = $("#lname").val();
					$.ajax({
						url: "/index.php/crud/edit",
				        type: "POST",
				        data:  laman ,
				        dataType: "json",
				        success: function(data)
				        {
				        	console.log(data);
				        	if (data.success)
				        	{
				        		bootbox.alert("Successfully updated!");
				        		$(".fname_"+id).html(newfname);
				        		$(".mname_"+id).html(newmname);
				        		$(".lname_"+id).html(newlname);
				        	}
				        	else
				        	{
				        		bootbox.alert("Error occured!");
				        	}
				        }
				    });
				});
				$(document).on( 'click', '.editbutton', function(){
					var id = $(this).attr("data-id");
					$('#myModal').modal('toggle');
					$.ajax({
						url: "/index.php/crud/returnsEdit",
				        type: "POST",
				        data: { id:id },
				        dataType: "json",
				        success: function(data)
				        {
				        	$("#ids").val(data[0]["id"]);
				        	$("#fname").val(data[0]["fname"]);
				        	$("#mname").val(data[0]["mname"]);
				        	$("#lname").val(data[0]["lname"]);
				        }
				    });
				});
				$.ajax({
					url: "/index.php/crud/show",
			        type: "POST",
			        data: {},
			        dataType: "json",
			        success: function(data)
			        {
			        	console.log(data);
			        	$("tbody").children("tr").remove();
			        	for (var i = 0; i < data.length; i++) {
			        		var laman = "<tr class='row_"+data[i]["id"]+"'> <td>"+data[i]["id"]+"</td> <td class='fname_"+data[i]["id"]+"'>"+data[i]["fname"]+"</td> <td class='mname_"+data[i]["id"]+"'>"+data[i]["mname"]+"</td> <td class='lname_"+data[i]["id"]+"'>"+data[i]["lname"]+"</td> <td> <button data-id='"+data[i]["id"]+"' class='editbutton btn btn-default'>Edit</button> <button data-id='"+data[i]["id"]+"' class='deletebutton btn btn-danger'>Delete</button> </td> </tr> ";
			        		$("tbody").append(laman);
			        	}
			        }
			    });
			});
		</script>
	</head>
	<body>
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<button type="button" class="close" data-dismiss="modal">&times;</button>
		        		<h4 class="modal-title">Edit Record</h4>
		      		</div>
		      		<div class="modal-body">
		      			<form id="editss">
							<input style="display:none;" class="form-control" id="ids" name="ids" /><br/>
							<input class="form-control" id="fname" name="fname" placeholder="First name"/><br/>
							<input class="form-control" id="mname" name="mname" placeholder="Middle name"/><br/>
							<input class="form-control" id="lname" name="lname" placeholder="Last name"/><br/>
							<button id="update" type="button" class="btn btn-primary" style="float:right;">Update Changes</button><br/>
						</form>
		      		</div>
		      		<div class="modal-footer">
		      		</div>
		    	</div>
		  	</div>
		</div>
		<div class="container"><br/>
			<a href = "<?php echo base_url(); ?>index.php/crud/add_view">
				<button id="yey" class="btn btn-default">Add New</button>
			</a>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Last Name</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</body>
</html>