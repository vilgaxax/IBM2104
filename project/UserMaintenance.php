
<html>
<link rel="stylesheet" 
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">		
<style>
	a {
		text-decoration: none;
		border: solid;
		padding: 10px;
		border-radius: 20px;
		background: #1569C7;
		color: white;
	}
	a:hover {
		background-color: #000;
		text-shadow: yellow 1px 1px 1px;
	}
	h3 {
		text-align: center;
		border-style: double;
		font-family: "Brush Script MT", cursive;
		font-size: 40px;
		text-shadow: 8px 8px 5px grey;
		height: 50px;
		background: #1569C7;
		color: white;
		margin: 10px;
		padding-top: 10px;
	}
	h4{
		text-align: center;
		font-size: 20px;
		color:#f2b43f;
	}
	h1 {
		font-family: "Brush Script MT", cursive;
		font-size: 55px;
		text-shadow: 10px 10px 5px grey;
		background-color: #e3e6e8;
	}
	h2{
		font-family: "Brush Script MT", cursive;
		font-size: 40px;
		text-shadow: 10px 10px 5px grey;	
        text-align: center;		
	}
	</style>
</html>




<?php

$dbc=mysqli_connect('localhost','root','');
mysqli_select_db($dbc,'college');

$query='SELECT *FROM user ORDER BY user_id';

print "	
    <h1>User Maintenance</h1>
	<a href=\"homepage.php\">
	<i class=\"fa fa-fw fa-home\"></i></a>
	<a href=\"AdminControlPage.php\">Exit</a>

	<br><br><h2>User details</h2>";
	

if ($r=@mysqli_query($dbc,$query)){
	
	while ($row= mysqli_fetch_array($r)){
		
	print "
	<hr>
	<p><h3>{$row['userName']}</h3>
	<h4>Password:{$row['userPassword']}<h4>
	<h4>Age:{$row['userAge']}<h4>
	<h4>Gender:{$row['userGender']}<h4>
	<h4>Email:{$row['userEmail']}<h4>
	<h4>Phone Number:{$row['userPhoneNumber']}<h4>
	<br/>
	<a href=\"deleteUser.php?id={$row['user_id']}\">Delete</a>
	</p><hr/>\n";	
		
	}
}else {
		
	print'<p style="color:red;">Could not retrieve the college because:<br />'.mysqli_connect_errno().'.</p><p>The ques was:'.$query.'</p>
';	
	}

mysqli_close($dbc);	
?>
</html>