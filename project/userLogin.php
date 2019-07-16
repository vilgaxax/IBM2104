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
	top: 10%;
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
	width: 50%;
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

$dbc = mysqli_connect('localhost','root','');
mysqli_select_db($dbc,'college');

$query='SELECT *FROM user ORDER BY user_id';

	$userEmp = $passEmp = $userInv = $passInv = "";
	if (isset($_POST['submitted'])) {						
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			
			if ((empty($_POST["username"])) && (empty($_POST["password"]))) {
				$userEmp = "* Username is required!";
				$passEmp = "* Password is required!";
			}else if ($r = @mysqli_query($dbc,$query)){
	
	           while ($row = mysqli_fetch_array($r)){ 			        
					if($_POST["username"]==$row['userName'] && $_POST["password"] == $row['userPassword']){
					session_start();
					$_SESSION['Username']=$_POST["username"];
					$_SESSION['Password']=$_POST["password"];
					
					header ('Location:homepage.php');
											
					}
					else{
				      $userEmp = "* Username is invalid!";
				      $passEmp = "* Password is invalid!";
						
					}
			   }
			}
			else {
				
					$user = test_input($_POST["username"]);
					$pass = test_input($_POST["password"]);
					
				
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
<form action="userLogin.php" method="post">	
	<div id="contain">
		<img src="image/admin.jpg" alt="admin" width="100%" height="100%"/>
	<div id="adminbox">
		<h4><i class="fa fa-fw fa-user"></i>User Login</h4>		
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