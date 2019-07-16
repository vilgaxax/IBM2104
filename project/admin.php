<html>
<head>
<link rel="stylesheet" 
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, html {
	height: 120%;
	margin: 0;
	font-family: Arial;
	scroll-behavior: smooth;	
	background-repeat: no-repeat;
}
.error {color: #FF0000;}
#contain {
	position: relative;
}
#adminbox {
	position: absolute;
	height: 580px;
	width: 600px;
	margin: 30px;
	background-color: #ffffff;
	border: 1px solid black;
	opacity: 0.8;
	filter: alpha(opacity=60);
	top: 5%;
	left: 30%;
	text-align: center;
}
#adminbox h4 {
	font-size: 60px;
	font-family: Garamond;
}
.formbox p {
	color: red;
	font-size: 15px;
}
.formbox input {
	margin-top: 6px;
	padding: 8px;
	font-size: 18px;
	border: 1px solid grey;
	border-radius: 40px;
	height: 8%;
	width: 40%;
	background: #f1f1f1;
}
.formbox input[type=submit] {
	font-weight: bold;
	color: white;
	background: #1569C7;
}
.home_text a {
	font-size: 60px;
}

</style>
</head>
<body>
<?php 
	$userEmp = $passEmp = $userInv = $passInv = "";
	if (isset($_POST['submitted'])) {						
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if ((empty($_POST["username"])) || (empty($_POST["password"]))) {
				$userEmp = "* Username is required!";
				$passEmp = "* Password is required!";
			} 
			else if (((strtolower($_POST['username'])) != "chern2019") || 
				((strtolower($_POST['password'])) != "phpisez")) {
					$userInv = "* Invalid username!";
					$passInv = "* Invalid password!";
			}
			else {
				if (((strtolower($_POST['username'])) == "chern2019") || 
				((strtolower($_POST['password'])) == "phpisez")) {
					header('location: AdminControlPage.php');
				}
				else {
					$user = test_input($_POST["username"]);
					$pass = test_input($_POST["password"]);
				}
			}
		}
	}
	function test_input($data) {
	  $data = trim($data);
	  //Remove the backslash
	  $data = stripslashes($data);
	  //convert special HTML entities back to characters
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>	
<form action="admin.php" method="post">	
	<div id="contain">
		<img src="image/admin.jpg" alt="admin" width="100%" height="100%"/>
	<div id="adminbox">
		<h4><i class="fa fa-fw fa-user"></i>Admin Login</h4>		
		<div class="formbox">
			<form>
				<input type="text" name="username" class="username form-control" placeholder="Username"/><br>
					<span class="error"><?php echo $userEmp;?></span><br><br>
				<input type="password" name="password" class="password form-control" placeholder="Password"/><br>
					<span class="error"><?php echo $passEmp;?></span><br><br>
				<input class="btn login" type="submit" value="Login"/><br><br>
				<input type="hidden" name="submitted" value="true"/>
			</form>		
		</div>
			<div class="home_text">		
				<a href="homepage.php">
				<i class="fa fa-fw fa-home"></i></a>
			</div>
	</div>
	</div>
</form>
</body>
</html>
