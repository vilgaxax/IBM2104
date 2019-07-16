
<html>
<title>Add College</title>
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
			margin-right: 30%;
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
	<div id="head"><h1>Delete College</h1></div>
		<a href="homepage.php">
		<i class="fa fa-fw fa-home"></i></a>
		<a href="CollegeMaintenance.php">Exit</a><br>


<?php

$dbc=mysqli_connect('localhost','root','');
mysqli_select_db($dbc,'college');


if (isset($_GET['id']) && is_numeric($_GET['id'])){

$query="SELECT college_name FROM college_info WHERE college_id={$_GET['id']}"; 
// Attempt delete query execution

if($r=@mysqli_query($dbc, $query)){
  $row=@mysqli_fetch_array($r);
  
  print '<form action="deleteCollege.php" method="post">
         <br><div id = "text"><h1>Are you want to delete this college?</p></div>
		 <div id="details">
         <div id="head"><h4>'.$row['college_name'].'</h4></div><br>
         <input type="hidden" name="id" value="'.$_GET['id'].'" />		        
         <input type="Submit" name="submit" value="Delete college" />
		 </div>
		 </form>';
}else{
	
	print'<p style="color:red;">Could not retrieve the college because:<br />'.mysqli_connect_errno().'</p>';
}
}

else if (isset($_POST['id']) && is_numeric($_POST['id'])){

$query = "DELETE FROM college_info WHERE college_id ={$_POST['id']} LIMIT 1";	
  
$r=@mysqli_query($dbc,$query);

if ($r){
	
 print '<p>Records were deleted successfully.</p>';
 header ('Location:CollegeMaintenance.php');
}  
else{
   print' <p style="color:red;">Could not delete the college because:<br />'.mysqli_connect_errno().'</p>';
}
}
else {
	
print'<p style="color:red;">This page has been accessed in error.</p>';	
}
mysqli_close($dbc);

?>
</html>