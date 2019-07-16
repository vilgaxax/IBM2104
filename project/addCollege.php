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
	</style>
	<div id="head"><h1>Add College</h1></div>
		<a href="homepage.php">
		<i class="fa fa-fw fa-home"></i></a>
		<a href="CollegeMaintenance.php">Exit</a><br>
<?php

if(isset($_POST['submitted'])) {
	$dbc=mysqli_connect('localhost','root','');
	mysqli_select_db($dbc,'college');
	$problem=FALSE;

	if(!empty($_POST['name']) && !empty($_POST['institution'])&& !empty($_POST['ranking'])
	&& !empty($_POST['total'])&& !empty($_POST['major'])&& !empty($_POST['rate'])) {

		$name		=trim($_POST['name']);
		$institution=trim($_POST['institution']);
		$ranking	=trim($_POST['ranking']);
		$total		=trim($_POST['total']);
		$major		=trim($_POST['major']);
		$rate		=trim($_POST['rate']);
		$intro		=trim($_POST['intro']);
		$f1			=trim($_POST['f1']);
		$f1_title	=trim($_POST['f1_title']);
		$f2			=trim($_POST['f2']);
		$f2_title	=trim($_POST['f2_title']);
		$f3			=trim($_POST['f3']);
		$f3_title	=trim($_POST['f3_title']);
		$f1_pic		=trim($_POST['f1_pic']);
		$f2_pic		=trim($_POST['f2_pic']);
		$f3_pic		=trim($_POST['f3_pic']);
		$gal1		=trim($_POST['gal1']);
		$gal2		=trim($_POST['gal2']);
		$gal3		=trim($_POST['gal3']);
		$gal4		=trim($_POST['gal4']);
		$gal5		=trim($_POST['gal5']);
		$info		=trim($_POST['info']);
		$back		=trim($_POST['back']);
		$address	=trim($_POST['address']);
	}
	else {
	print '<p style="color:red;">Please submit all data.</p>';
	  $problem=TRUE;
	}
	  
	if (!$problem) {
		$query="INSERT INTO college_info
		(college_name,college_institution,college_ranking,college_totalCourse,college_major,college_graduateRate,
		college_intro, college_feature1, college_feature1_title, college_feature2, college_feature2_title,
		college_feature3, college_feature3_title, college_feature1_pic, college_feature2_pic, college_feature3_pic,
		college_gallery_pic1, college_gallery_pic2, college_gallery_pic3, college_gallery_pic4, college_gallery_pic5,
		college_infographic, college_background, college_address) 
		VALUES('$name','$institution','$ranking','$total','$major','$rate','$intro','$f1','$f1_title','$f2',
		'$f2_title','$f3','$f3_title','$f1_pic','$f2_pic','$f3_pic','$gal1','$gal2','$gal3','$gal4','$gal5',
		'$info','$back','$address')";

	if(@mysqli_query($dbc,$query))
		header ('Location:CollegeMaintenance.php');
	}
	else {
		echo '<p style="color:red;">Could not add the college because:<br />'.mysqli_connect_errno().'.</p><p>The ques was:'.$query.'</p>';
	}
	mysqli_close($dbc);
}
else 
{
    print '<form action="addCollege.php" method="post">
	<div id = "text"><h1>Please add college details here</h1></div>
		<div id="details">
	       <p>College name: 		<input type="text" name="name" 			size="40" maxsize="100"/></p>
		   <p>College institution: 	<input type="text" name="institution" 	size="40" maxsize="100"/></p>
		   <p>College Ranking: 		<input type="text" name="ranking" 		size="40" maxsize="100"/></p>
		   <p>Total Course: 		<input type="text" name="total" 		size="40" maxsize="100"/></p>		   
		   <p>Majority: 			<input type="text" name="major" 		size="40" maxsize="100"/></p>
		   <p>Graduate Rate: 		<input type="text" name="rate" 			size="40" maxsize="100"/></p>
		   <br><br><br><br>
		</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<div id = "text"><h1>Please add college template data here</h1></div>
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
		   <input type="submit" name="submit" value="Add College" />
		   <input type="hidden" name="submitted" value="true" />
		</div>
		   </form>';
}
?>
</html>