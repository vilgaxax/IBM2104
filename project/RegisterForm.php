<html>
<head>
<link rel="stylesheet" 
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	body, html {
		height: 115%;
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
		height: 800px;
		width: 600px;
		margin: 30px;
		background-color: #ffffff;
		border: 1px solid black;
		opacity: 0.8;
		filter: alpha(opacity=60);
		top: 6%;
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
		height: 6%;
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
	.dropbtn {
	  background-color: #c1c4c7;
	  color: white;
	  padding: 16px;
	  font-size: 16px;
	  border: none;
	  cursor: pointer;
	  border-radius: 25px;
	}
	.dropdown {
	  position: relative;
	  display: inline-block;
	}
	.dropdown-content {
	  display: none;
	  position: absolute;
	  background-color: #d3dae0;
	  min-width: 160px;
	  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	  z-index: 1;
	}
	.dropdown-content select{
	  color: black;
	  padding: 12px 16px;
	  text-decoration: none;
	  display: block;
	}
	.dropdown-content select:hover {
		background-color: #f1f1f1
	}
	.dropdown:hover .dropdown-content {
	  display: block;
	}
	.dropdown:hover .dropbtn {
	  background-color: #b8c1cc;
	}
</style>
</head>
<body>
<?php
	/*
	if(!empty($_POST['name']) && !empty($_POST['password'])&& !empty($_POST['age'])
	&& isset($_POST['gender'])&& !empty($_POST['email'])&& !empty($_POST['number'])) {

	$name=trim($_POST['name']);
	$password=trim($_POST['password']);
	$age=trim($_POST['age']);
	$gender=trim($_POST['gender']);
	$email=trim($_POST['email']);
	$number=trim($_POST['number']);
	}
	else {
	print '<p style="color:red;">Please submit all data.</p>';
	  $problem=TRUE;
	}
	  
	if (!$problem) {
	$query="INSERT INTO user(userName,userPassword,userAge,userGender,
	userEmail,userPhoneNumber) VALUES('$name','$password',$age,'$gender','$email','$number')";

	if(@mysqli_query($dbc,$query))
	{

	header ('Location:homepage.php');
	}
	else 
	{
	echo '<p style="color:red;">Could not add the user because:<br />'.mysqli_connect_errno().'.</p><p>The ques was:'.$query.'</p>';
	}
	}
	mysqli_close($dbc);
	*/
	$userEmp = $passEmp = $ageEmp = $emailEmp = $numEmp = "";
	if(isset($_POST['submitted'])) {
		$dbc=mysqli_connect('localhost','root','');
		mysqli_select_db($dbc,'college');
		$problem=FALSE;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		   if ((empty($_POST['username'])) || (empty($_POST['password']))|| (empty($_POST['age'])) 
			   || (empty($_POST['gender'])) || (empty($_POST['email']))|| (empty($_POST['number']))) {
				$userEmp = "* Username is required!";
				$passEmp = "* Password is required!";
				$ageEmp= "* Age is required!";
				$emailEmp= "* Email is required!";
				$numEmp="* Phone number is required!";
				$problem=TRUE;
			}				
		}	
		else{
			$name		=trim($_POST['name']);
			$password	=trim($_POST['password']);
			$age		=trim($_POST['age']);
			$gender		=trim($_POST['gender']);
			$email		=trim($_POST['email']);
			$number		=trim($_POST['number']);				
					
			if (!$problem) {
					 $query="INSERT INTO user(userName,userPassword,userAge,userGender,userEmail,userPhoneNumber) 
					 VALUES('$name','$password',$age,'$gender','$email','$number')";

				if(@mysqli_query($dbc,$query)) {
					header ('Location:homepage.php');
				}
			}
		}
		mysqli_close($dbc);
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
<form action="RegisterForm.php" method="post">
	<div id="contain">
	  <img src="image/admin.jpg" alt="admin" width="100%" height="100%"/>
	  <div id="adminbox">
	  <h4><i class="fa fa-fw fa-user"></i>User Sign Up</h4>		
	  <div class="formbox">
	   <input type="text" name="name" class="username form-control" placeholder="Username"/>
		   <br><span class="error"><?php echo $userEmp;?></span>
		<br><input type="password" name="password" class="password form-control" placeholder="Password"/>
		   <br><span class="error"><?php echo $passEmp;?></span>
		<br><input type="text" name="age"  class="username form-control" placeholder="Age"/>
		   <br><span class="error"><?php echo $ageEmp;?></span>
		<br><input type="text" name="email" class="username form-control" placeholder="Email"/>
		   <br><span class="error"><?php echo $emailEmp;?></span>
		<br><input type="text" name="number" class="username form-control" placeholder="Phone number"/>
		   <br><span class="error"><?php echo $numEmp;?></span>
		   <br><br>
		   <div class="dropdown">
			   <select class="dropbtn" name="gender" >
			   <div class="dropdown-content">
				   <option value="Male">Male</option>
				   <option value="Female">Female</option>	   
			   </div>
			   </select>
		   </div>
		   <br>
		   <input type="submit" name="submit" value="Submit" />
		   <input type="hidden" name="submitted" value="true" />
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
		   