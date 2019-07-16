<?php

$dbc = mysqli_connect('localhost','root','');
mysqli_select_db($dbc,'college');

$query='SELECT *FROM college_info ORDER BY college_id';
?>
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
		border-style: double;
		height: 50px;
		background: #1569C7;
		color: white;
		margin: 10px;
		padding-top: 10px;
	}
	h4, h3 {
		text-align: center;
	}
	h1 {
		font-family: "Brush Script MT", cursive;
		font-size: 55px;
		text-shadow: 10px 10px 5px grey;
	}
	</style>
</html>
<?php
print "	
	<h1>College Maintenance</h1>
	<a href=\"homepage.php\">
	<i class=\"fa fa-fw fa-home\"></i></a>
	<a href=\"AdminControlPage.php\">Exit</a>
	<a href=\"addCollege.php?\">Add college here</a>";
	
if ($r = @mysqli_query($dbc,$query)){
	
	while ($row = mysqli_fetch_array($r)){
		print "
		<hr>
		<br><p><h3> {$row['college_name']}</h3>
		<h4>College Institution: {$row['college_institution']}<h4>
		<h4>College Ranking: {$row['college_ranking']}<h4>
		<h4>Total Course: {$row['college_totalCourse']}<h4>
		<h4>Majority: {$row['college_major']}<h4>
		<h4>Graduate Rate: {$row['college_graduateRate']}<h4>
		<br/>
		<a href=\"editCollege.php?id={$row['college_id']}\">Edit</a>
		<a href=\"deleteCollege.php?id={$row['college_id']}\">Delete</a>
		</p><hr/>\n";		
	}
}else {
		
	print'<p style="color:red;">Could not retrieve the college because:<br />'.mysqli_connect_errno().'.</p><p>The ques was:'.$query.'</p>
';	
	}

mysqli_close($dbc);	
?>