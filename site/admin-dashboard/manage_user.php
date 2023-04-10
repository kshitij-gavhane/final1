<?php
		include('db_connect.php');
		session_start();
		if (isset($_GET['id'])) {
			$user = $conn->query("SELECT * FROM users where id =" . $_GET['id']);
			foreach ($user->fetch_array() as $k => $v) {
				$meta[$k] = $v;
			}
			
		}

if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$query = $conn->query("SELECT * FROM users where username ='$username'");
	if ($query->num_rows > 0) {
		echo 2; //2 means username already exist
		exit;
	}
	echo "username really exist";
}

if (isset($_POST['name']) && isset($_POST['username'])) {
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'] != '' ? sha1($_POST['password']) : '';
	$type = isset($_POST['type']) ? $_POST['type'] : 2;
	if (empty($_POST['id'])) {
		$save = $conn->query("INSERT INTO users (name,username,password,type) values ('$name','$username','$password',$type)");
	} else {
		$save = $conn->query("UPDATE users set name = '$name', username='$username', " . ($password != '' ? "password = '$password'," : '') . " type = $type where id=" . $_POST['id']);
	}
	if ($save) {
		echo 1; //1 means successful
	}
}
?>

<div class="container-fluid">
	<div id="msg"></div>

	<form action="" id="manage-user">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id'] : '' ?>">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($meta['name']) ? $meta['name'] : '' ?>" required>
		</div>
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username'] : '' ?>" required autocomplete="off">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">
			<?php if (isset($meta['id'])) : ?>
				<small><i>Leave this blank if you dont want to change the password.</i></small>
			<?php endif; ?>
		</div>
		<?php if (isset($meta['type']) && $meta['type'] == 3) : ?>
			<input type="hidden" name="type" value="3">
		<?php else : ?>
			<?php if (!isset($_GET['mtype'])) : ?>
				<div class="form-group">
					<label for="type">User Type</label>
					<select name="type" id="type" class="custom-select">
						<option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected' : '' ?>>Staff</option>
						<option value="1" <?php echo isset($meta['type']) && $meta['type'] == 1 ? 'selected' : '' ?>>Admin</option>
					</select>
				</div>
			<?php endif; ?>
		<?php endif; ?>


	</form>
</div>
<script>
	$('#manage-user').submit(function(e) {
		e.preventDefault();
		start_load()
		$.ajax({
			url: 'ajax.php?action=save_user',
			method: 'POST',
			data: $(this).serialize(),
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Data successfully saved", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)
				} else {
					$('#msg').html('<div class="alert alert-danger">Username already exist</div>')
					end_load()
				}
			}
		})
	})
</script>