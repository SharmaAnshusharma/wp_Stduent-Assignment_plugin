<?php
	global $wp_roles;
    $all_roles = $wp_roles->roles;

    foreach ($all_roles as $key => $value)
    {
    	$roles[] = $value['name'];
    }
	$length = count($roles);


?>
<!DOCTYPE html>
<html>
<head>
	<title>View Assignment</title>
</head>
<body>
	<div class="container">
		<h1 class="text-center">Get Assignment</h1>
		<hr>
		<form method="post" id="form-data">
		<select name="user" class="form-control">
			<option>Select One</option>
			<?php
				for ($i=0; $i < $length; $i++)
				{ 
					?>
						<option value="<?php echo $roles[$i];?>"><?php echo $roles[$i];?></option>
					<?php	
				}
			?>	
			
		</select>
		<input type="hidden" name="action" value="getData">
	</form>
	</div>

	<table class="table table-striped table-hovered" id="records_table">
		<thead>
			<tr>
				<th>Task</th>
				<th>Date</th>
				<th>Due Date</th>
				<th>Assign To</th>
			</tr>
		</thead>

	</table>



	<div id="response">


	</div>
	<script>
		jQuery("#form-data").change(display);
		function display()
		{
			var formData = jQuery(this).serialize();
				
			jQuery.ajax({
				url:'../wp-admin/admin-ajax.php',
				type:'post',
				data:formData,
				dataType: 'json',
				success: function (response)
				{
			        var trHTML = '';
			        console.log(response);
			        jQuery.each(response, function (i, item) {
			            trHTML += '<tr><td>' + item.Task + '</td><td>' + item.Date + '</td><td>' + item.Due + '</td><td>'+ item.AssignTo + '<td></tr>';
			        });
			        jQuery('#records_table').append(trHTML);
			    }
			});			
			return false;
		}
	</script>

</body>
</html>