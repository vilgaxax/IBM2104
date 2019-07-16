<html>
	<head>
		<title>College Finder</title>
		<link rel="stylesheet" 
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			body, html {
			  height: 100%;
			  margin: 0;
			  font-family: Arial;
			  background-image:url('image/woodBackground.jfif'); <?php //FFE4C4?>
			  background-size:100%;
			  background-repeat: repeat-y;
			  background-attachment: fixed;
			  height:100%;
			  width:100%;
			  scroll-behavior: smooth;
			}
			A {
				text-decoration:none;
			}
			#main {
				overflow-x: hidden;
			}
			#menu {
				position: fixed;
				background-color: #3D3736;
				width: 100%;
				opacity: 0.8;
			}
			#menu a {
				float: left;
				padding: 10px;
				color: white;
				text-decoration: none;
				font-size: 20px;
				width: 12%;
				text-align: center;
			}
			#menu a:hover {
				background-color: #000;
				text-shadow: white 0.1em 0.1em 0.2em;
			}
			#menu a.active {
				font-size: 30px;
				width: 24%;
				background-color: #008B8B;
			}
			#menu input[type=text] {
				margin-top: 6px;
				padding: 8px;
				font-size: 18px;
				border: 1px solid grey;
				float: right;
				width: 15%;
				background: #f1f1f1;
			}
			button {
				float: right;
				margin-top: 6px;
				width: 3%;
				padding: 10px;
				background: #2196F3;
				color: white;
				font-size: 17px;
				border: 1px solid grey;
				border-left: none;
				cursor: pointer;
			}			
			#box{
				position: static;
			}
			.img {
				width: 100%;
			}
			.text{
				position: absolute;
				z-index: 999; 
				margin: 0 auto;
				left: 0;
				right: 0;
				top: 13%; 
				text-align: center;
				width: 60%;
			}
			.text h1 {
				font-family: "Brush Script MT", cursive;
				font-size: 110px;
				color: darkgreen;
			}
			.btn a {
				text-decoration: none;
				position: absolute;
				top: 50%;
				left: 80%;
				transform: translate(-50%, -50%);
				-ms-transform: translate(-50%, -50%);
				background-color: blue;
				color: white;
				font-size: 25px;
				padding: 12px 24px;
				border-radius: 20px; 
				border-style: outset;
				opacity: 0.7;
			}
			.btn a:hover {
				background-color: #000;
			}
			#content {
				float: left;
				font-size: 20px;					
				width: 700px;
				margin-top: 40px;
				margin-left: 80px;
				margin-right: 20px;
				padding-right: 15px;
				border-right: 3px solid grey;
				height: 220px;
			}
			#content2 { 
				float: right;
				font-size: 20px;		
				width: 610px;
				margin-top: 40px;
				margin-right: 80px;
				height: 220px;
			}
			p {
				font-family: Arial;
			}
			@keyframes slideshow {
				10% {left: 0;}
				20% {left: 0;}
				30% {left: -100%;}
				40% {left: -100%;}
				50% {left: -200%;}
				60% {left: -200%;}
				70% {left: -300%;}
				80% {left: -300%;}
				90% {left: -400%;}
				100% {left: -400%}
			}
			ul { 
				list-style-type:none;
			}
			
			#divClass {
				width:1000px;
				margin: 50px 0px 10px 200px;
				padding:0px;
				box-shadow: 5px 5px 5px grey;
				border:solid 0.5px;
				background-color: #ECF4F4;
				overflow:hidden;
			}
			
			#divClass img{
				margin-left: -30px;
				margin-right: 10px;
				margin-bottom: 10px;
				width:50%;
				height:40%;
				float:left;
			}
			
			#divClass p{
				
			}
			h2 {
				font-family:Trocchi;
				text-align:center;
			}
			
			a:hover{
				text-decoration:bold;
				color: darkblue;
				font-size:110%;
			}
			
			#searchBar {
				background-color: #3D3736;
				width: 100%;
				float:right;
			}

#slider{overflow:hidden;width:75%; height:600px; margin:5px auto; border: 5px solid transparent;border-radius: 10px;}
#slider figure img{width:20%;float:left;}
#slider figure{position:relative;width:500%;margin:0;left:0;text-align:left;animation:20s slideshow infinite;}

@media screen and (max-width: 767px) {#slider {overflow: hidden; width: 100%; margin: 0 auto;}}
		</style>
	</head>
		<body>	
				<div id="main">
					<div id="menu">		
						<a href="#.html" class="active current">
							<i class="fa fa-fw fa-home"></i>College Finder</a>
						<a href="compare.php">College Compare</a>
						<a href="userLogin.php"><i class="fa fa-fw fa-user"></i>User Login</a>
						<a href="admin.php"><i class="fa fa-fw fa-user"></i>Admin Login</a>
						<a href="Setting.php"><i class="fa fa-fw fa-user"></i>Setting</a>
							<form action="college.php" method="GET">
								<button type="submit"><i class="fa fa-fw fa-search"></i></button>
								<input type="text" placeholder="Search.." name="search">
								<input type="hidden" name="submitted" value="true"/>
							</form>
					</div>
				</div>	
				
				<div id="box">
					<img src="image/headerBackground.jpg" width = 1520px height = 500px alt="background">
					<div class="text">				
						<h1>College Finder</h1>			
					</div>	
				</div>
								<?php
									$dbc = mysqli_connect("localhost", "root", "") or die("Error connecting to database: ".mysqli_error());
									mysqli_select_db($dbc,"college") or die(mysqli_error());
									$raw_results = mysqli_query($dbc,"SELECT * FROM college_info") or die(mysqli_error());
									while($results = mysqli_fetch_array($raw_results)){
										echo'<div id="divClass">
												<form action = "college.php" method="post">
													<ul>
														<li> <img src='.$results['college_background'].'>
															<a href="college.php?search='.$results['college_name'].'"><h2>'.$results['college_name'].'</h2></a>
															<p>'.$results['college_intro'].'</p>
														</li>
													</ul>
												</form>
											</div>';
									}
								?>
				
				<?php include("footer.php"); ?>
			</div>
		</body>
</html>