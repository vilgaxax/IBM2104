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

$query='SELECT * FROM user ORDER BY user_id';


?>	
<form action="userLogin.php" method="post">	
	<div id="contain">
		<img src="image/admin.jpg" alt="admin" width="100%" height="100%"/>
	<div id="adminbox">
		<h4><i class="fa fa-fw fa-user"></i>Setting</h4>		
		<div class="formbox">
	
	<form method="post">
	<?php
	if ($r=@mysqli_query($dbc,$query)){
	
	session_start();
	
	while ($row= mysqli_fetch_array($r)){
		
	if ($_SESSION['Username']==$row['userName']){	
	print "
	<div id='container'>
	<p><h5>Username:{$row['userName']} </h5>
	<h5>Password:{$row['userPassword']}</h5>
	<h5>Age:{$row['userAge']} <a href='userEdit.php?age={$row['userAge']}'> Edit</a><h5>
	<h5>Gender:{$row['userGender']} <h5>
	<h5>Email:{$row['userEmail']} <a href='userEdit.php?email={$row['userEmail']}'> Edit</a><h5>
	<h5>Phone Number:{$row['userPhoneNumber']} <a href='userEdit.php?number={$row['userPhoneNumber']}'> Edit</a><h5>
	<br/>
	</p>\n
	</div>	
	";
	}	
	}
}else {
		
	print'<p style="color:red;">Could not retrieve the college because:<br />'.mysqli_connect_errno().'.</p><p>The ques was:'.$query.'</p>
';	
	}
	?>
				
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