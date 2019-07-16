<html>
<title>Edit College</title>
<link rel="stylesheet" 
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<style>
		#details p {
			font-weight: bold;
			float: left;
			margin-left: 35%;
		}
		#text h1 {
			text-align: center;
			border-style: double;
			height: 50px;
			background: #1569C7;
			color: white;
			margin: 10px;
			padding-top: 10px;
		}
		#details input {
			float: right;
			margin-right: 25%;
			padding: 10px;
			font-size: 18px;
			border: 1px solid grey;
			border-radius: 40px;
			height: 8%;
			width: 40%;
			background: #f1f1f1;
		}
		#details input[type=submit] {
			font-weight: bold;
			color: white;
			background: #1569C7;
		}
		#details input[type=submit]:hover {
			background-color: #000;
			text-shadow: yellow 1px 1px 1px;
		}
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
		#head h1 {
			font-family: "Brush Script MT", cursive;
			font-size: 55px;
			text-shadow: 10px 10px 5px grey;
		}
		#head h4 {
			text-align: center;
			font-family: "Brush Script MT", cursive;
			font-size: 40px;
			text-shadow: 8px 8px 5px grey;
		}
	</style>
	<div id="head"><h1>Edit College</h1></div>
		<a href="homepage.php">
		<i class="fa fa-fw fa-home"></i></a>
		<a href="CollegeMaintenance.php">Exit</a><br>
<?php

$dbc=mysqli_connect('localhost','root','');
mysqli_select_db($dbc,'college');

if (isset($_GET['id']) && is_numeric($_GET['id'])){

$query="SELECT college_name FROM college_info WHERE college_id={$_GET['id']}"; 

if($r=@mysqli_query($dbc, $query)){
  $row=@mysqli_fetch_array($r);
  
  print '<form action="editCollege.php" method="post">
         <br><div id = "text"><h1>Edit you college details here!</h1></div>
		<div id="details">
        <div id="head"><h4>'.$row['college_name'].'</h4></div>
		   <p>College institution: 	<input type="text" name="institution" size="40" maxsize="100"/></p>
		   <p>College Ranking: 		<input type="text" name="ranking" size="40" maxsize="100"/></p>
		   <p>Total Course: 		<input type="text" name="total" size="40" maxsize="100"/></p>		   
		   <p>Majority: 			<input type="text" name="major" size="40" maxsize="100"/></p>
		   <p>Graduate Rate: 		<input type="text" name="rate" size="40" maxsize="100"/></p>
		   
		</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<div id = "text"><h1>Please edit college template data here</h1></div>
		<div id="details">
	       <p>College introduction: <input type="text" name="intro" 	size="40" maxsize="100"/></p>
		   <p>Feature 1: 			<input type="text" name="f1" 		size="40" maxsize="100"/></p>
		   <p>Feature 1 (title): 	<input type="text" name="f1_title" 	size="40" maxsize="100"/></p>
		   <p>Feature 2: 			<input type="text" name="f2" 		size="40" maxsize="100"/></p>		   
		   <p>Feature 2 (title): 	<input type="text" name="f2_title" 	size="40" maxsize="100"/></p>
		   <p>Feature 3: 			<input type="text" name="f3" 		size="40" maxsize="100"/></p>
		   <p>Feature 3 (title):	<input type="text" name="f3_title"	size="40" maxsize="100"/></p>
		   <p>Feature 1 (picture):	<input type="text" name="f1_pic"	size="40" maxsize="100"/></p>
		   <p>Feature 2 (picture):	<input type="text" name="f2_pic"	size="40" maxsize="100"/></p>
		   <p>Feature 3 (picture):	<input type="text" name="f3_pic"	size="40" maxsize="100"/></p>
		   <p>Gallery 1:			<input type="text" name="gal1"		size="40" maxsize="100"/></p>
		   <p>Gallery 2:			<input type="text" name="gal2"		size="40" maxsize="100"/></p>
		   <p>Gallery 3:			<input type="text" name="gal3"		size="40" maxsize="100"/></p>
		   <p>Gallery 4:			<input type="text" name="gal4"		size="40" maxsize="100"/></p>
		   <p>Gallery 5:			<input type="text" name="gal5"		size="40" maxsize="100"/></p>
		   <p>Infographic:			<input type="text" name="info"		size="40" maxsize="100"/></p>
		   <p>Background:			<input type="text" name="back"		size="40" maxsize="100"/></p>
		   <p>Address:				<input type="text" name="address"	size="40" maxsize="100"/></p>
         <input type="hidden" name="id" value="'.$_GET['id'].'" />		        
         <input type="Submit" name="submit" value="Edit college" />
		 </div>
		 </form>';
}else{
	
	print'<p style="color:red;">Could not retrieve the college because:<br />'.mysqli_connect_errno().'</p>';
}
}

else if (isset($_POST['id']) && is_numeric($_POST['id'])){
	

$query = "UPDATE college_info SET college_institution = '{$_POST['institution']}', 
		college_ranking = {$_POST['ranking']}, college_totalCourse = {$_POST['total']}, 
		college_major = '{$_POST['major']}', college_graduateRate = {$_POST['rate']}, 
		college_intro = '{$_POST['intro']}' WHERE college_id = {$_POST['id']}";	
  
$r=@mysqli_query($dbc,$query);

if ($r){
	
  header ('Location:CollegeMaintenance.php');

}  
else{
   print' <p style="color:red;">Could not edit the college because:<br />'.mysqli_connect_errno().'</p>';
   
}
}
else {
	
print'<p style="color:red;">This page has been accessed in error.</p>';	
}
mysqli_close($dbc);
?>
</html>