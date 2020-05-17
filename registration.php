<?php
require_once('config.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Registration </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
</head>
<body>

	<div >

		<?php
		if (isset($_POST['create'])) {
			$firstname    = $_POST['firstname'];
			$lastname     = $_POST['lastname'];
			$email        = $_POST['email'];
			$phonenumber  = $_POST['phonenumber'];
			$password     = $_POST['password'];

			$sql = "INSERT INTO users(firstname, lastname, email,phonenumber, password ) VALUES(?,?,?,?,?)";
			$stmtinsert = $db->prepare($sql);

			$result = $stmtinsert->execute([$firstname, $lastname, $email,$phonenumber,$password]);

			if ($result) {
				echo "Successfully saved.";
			}
			else{
				echo"some errors while saving the data";
			}
		}

		?>
		<form action="registration.php" method="post" class="container" >

			<div class="container" align="center">
				<div class="row">
					<div class="col-sm-3">
				<h1>REGISTRATION</h1>
				<p>Fill up the form</p>
				<hr class="mb-3">
				<label for="firstname"><b>First Name</b></label>
				<input class="form-control" id="firstname" type="text" name="firstname" required="" placeholder="Enter firstname name">

				<label for="lastname"><b>Last Name</b></label>
				<input class="form-control" id="lastname" type="text" name="lastname" required="" placeholder="Enter lastname name">

				<label for="email"><b>Email</b></label>
				<input class="form-control" id="email" type="text" name="email" required="" placeholder="Enter email">

				<label for="phonenumber"><b>Phone Number</b></label>
				<input class="form-control"  id="phonenumber" type="phonenumber" name="phonenumber" required="" placeholder="Enter number">

				<label for="password"><b>Password</b></label>
				<input class="form-control" id="password" type="password" name="password" required="" placeholder="Enter password">
				<hr class="mb-3">


				<input  class="btn btn-primary" id="register" type="submit" name="create" value="Sign up">
				</div>
				</div>
			</div>
		</form>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){
			var valid = this.form.checkValidity();
			if (valid) {
				e.preventDeafault();
				alert('true');
			}
			else{
				alert('false')
			}



			var firstname  = $('#firstname').val();
			var lastname   = $('#lastname').val();
			var email      = $('#email').val();
			var phonenumber= $('#phonenumber').val();
			var password   = $('#password').val();








		});
	// alert('hello.');
	Swal.fire({
		'title' :'Hey! Welcome',
		'text'  :'This is from shizeb',
		'type'  :'success'
	})	
	});
</script>

</body>
</html>