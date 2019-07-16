<html>
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
	.control a {
		text-decoration: none;
		border: solid;
		padding: 10px;
		border-radius: 20px;
		background: #1569C7;
		color: white;
	}
	.control a:hover {
		background-color: #000;
		text-shadow: yellow 1px 1px 1px;
	}
	#contain {
		position: relative;
		
	}
	#adminbox {
		position: absolute;
		height: 500px;
		width: 650px;
		margin: 30px;
		background-color: #ffffff;
		border: 1px solid black;
		opacity: 0.8;
		filter: alpha(opacity=60);
		top: 5%;
		left: 28%;
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
	.home_text a {
	font-size: 60px;
	}
</style>
<body>
<div id="contain">
		<img src="image/admin.jpg" alt="admin" width="100%" height="100%"/>
	<div id="adminbox">
		<h4><i class="fa fa-fw fa-user"></i>Admin Control Page</h4>		
		<div class="formbox">
			<form>
				<?php
					print "	
					<div class=\"control\">
						<a href=\"CollegeMaintenance.php?\">College Maintenance</a><br><br>
						<br><a href=\"UserMaintenance.php?\">User Maintenance</a><br><br>
					</div>";
					?>
			</form>		
		</div>
			<div class="home_text">		
				<a href="homepage.php">
				<i class="fa fa-fw fa-home"></i></a>
			</div>
	</div>
	</div>
</body>
</html>