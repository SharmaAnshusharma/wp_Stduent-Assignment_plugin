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
	<title>Upload Assignment</title>
</head>
<body>
	<div class="container">
		<h1 class="text-center">Upload Assignment</h1>
		<hr>
		<p id="msg"></p>
		<form method="post" id="form-data">
			<label>Task</label>
			<input type="text" class="form-control" name="task" placeholder="Task"><br>
			<label>Assignment Date</label>
			<input type="date" class="form-control" name="date" placeholder="Assignment Date"><br>
			<label>Due Date</label>
			<input type="date" class="form-control" name="duedate" placeholder="Due Date"><br>
		  	<label>Assign To</label>
		  	<select name="assignto" class="form-control">
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
		  	<br>
		  	<input type="submit" name="submit" value="Upload Assignment" class="btn btn-outline-primary col-sm-12">
		  	<input type="hidden" name="action" value="uploadAssignment">

		</form>
	</div>
	<script>
		jQuery("#form-data").submit(insert);
		function insert()
		{
			var formData = jQuery(this).serialize();

			jQuery.ajax({
				type:'post',
				url:'../wp-admin/admin-ajax.php',
				data:formData,
				success:function(html)
				{
					jQuery("#msg").html(html);
					setTimeout(function(){ window.reload();},3000);
				}
			});
		return false;
		}

	</script>
</body>
</html>
