<html>
<head>
<link rel="stylesheet" 
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, html {
	height: 100%;
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
a {
			text-decoration: none;
			border: solid;
			padding: 10px;
			border-radius: 20px;
			background: #1569C7;
			color: white;
		}

</style>
</head>
<body>
<?php 

$dbc = mysqli_connect('localhost','root','');
mysqli_select_db($dbc,'college');

//$query='SELECT *FROM user_info ORDER BY user_id';


?>	

<form action="userEdit.php" method="post">	
	<div id="contain">
		<img src="image/admin.jpg" alt="admin" width="100%" height="100%"/>
	<div id="adminbox">
		<h4><i class="fa fa-fw fa-user"></i>Edit</h4>		
		<div class="formbox">
	
	<form>
	<?php
	if (isset($_GET['age']) && is_numeric($_GET['age'])){	
	print '
	<h2>Please edit your age here </h2>
	<input type="text" name="name">
	<input class="btn login" type="submit" value="Submit"/><br><br>
	<input type="hidden" name="age" value="'.$_GET['age'].'" />
	';	
	
	}	
	
if (!empty($_POST['name']) && is_numeric($_POST['name'])){
	

$query = "UPDATE user_info SET userAge= {$_POST['name']} WHERE userAge = {$_POST['age']}";	
  
$r=@mysqli_query($dbc,$query);

if ($r){
	
  header ('Location:Setting.php');

}
}  

?>

<?php

if (isset($_GET['email'])){
	print '
	<h2>Please edit your email here </h2>
	<input type="text" name="name"><?php echo $userEmp;?>
	<input class="btn login" type="submit" value="Submit"/><br><br>
	<input type="hidden" name="email" value="'.$_GET['email'].'" />
	';	
	
}	
	
if (!empty($_POST['name']) ){
	

$query = "UPDATE user_info SET userEmail= '{$_POST['name']}' WHERE userEmail = '{$_POST['email']}'";	
  
$r=@mysqli_query($dbc,$query);

if ($r){
	
  header ('Location:Setting.php');

  }
 
}

?>

<?php
	if (isset($_GET['number'])){	
	print '
	<h2>Please edit your Phone number here </h2>
	<input type="text" name="name">
	<input class="btn login" type="submit" value="Submit"/><br><br>
	<input type="hidden" name="number" value="'.$_GET['number'].'" />
	';	
	
	}	
	
if (!empty($_POST['name'])){
	

$query = "UPDATE user_info SET userPhoneNumber= '{$_POST['name']}' WHERE userPhoneNumber = '{$_POST['number']}'";	
  
$r=@mysqli_query($dbc,$query);

if ($r){
	
  header ('Location:Setting.php');

}
}  

?>
				
				<input type="hidden" name="submitted" value="true"/>
			</form>		
		</div>
		    <br><a href="Setting.php">Back</a><br><br>
			<br><br><div class="home_text">		
				<a href="homepage.php">
				<i class="fa fa-fw fa-home"></i></a>
			</div>
	</div>
	</div>
</form>
</body>
</html>
</body>
</html>