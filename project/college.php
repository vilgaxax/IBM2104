<?php
    $dbc = mysqli_connect("localhost", "root", "") or die("Error connecting to database: ".mysqli_error());
    
    mysqli_select_db($dbc,"college") or die(mysqli_error());
    /* tutorial_search is the name of database we've created */
	$query = $_GET['search']; 
	
	$min_length = 3;
	
	if(strlen($query) >= $min_length){
	$raw_results = mysqli_query($dbc,"SELECT * FROM college_info
		WHERE (`college_name` LIKE '%".$query."%')") or die(mysqli_error());
	
	 if(mysqli_num_rows($raw_results) > 0){
	$results = mysqli_fetch_array($raw_results);
echo' <!DOCTYPE html>
	<html>
  <head>  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/min.css" />
    <link rel="stylesheet" href="css/college_style.css" />
    <title>'.$results['college_name'].'</title>    
  </head>
	<style>
	
	 #boxgal {
		 width:700px;
		 height:550px;
		 margin:0 auto;
		 position:relative;
		 font-family:verdana, arial, sans-serif;
	} 

	 #boxgal #gallery {
		 position:absolute;
		 left:0;
		 top:0;
		 height:550px;
		 width:700px;
		 overflow:hidden;
		 text-align:center;
	} 

	 #boxgal #gallery div {
		 width:700px; 
		 height:900px; 
		 padding-top:10px; 
		 position:relative;
	} 

	 #boxgal #gallery div img {
		 clear:both; 
		 display:block; 
		 margin:0 auto; 
		 border:0;
	} 

	 #boxgal #gallery div h3 {
		 padding:10px 0 0 0; 
		 margin:0; 
		 font-size:18px;
	} 

	 #boxgal #gallery div p {
		 padding:5px 0; 
		 margin:0; 
		 font-size:12px; 
		 line-height:18px;
	} 

	 #gallery .previous{ 
		 display:inline;
		 float:left;
		 margin-left:80px;
		 text-decoration:none;
	} 

	#gallery .next{ 
		 display:inline;
		 float:right;
		 margin-right:80px;
		 text-decoration:none;
	}
	.transbox {
		height: 480px;
		margin: 30px;
		background-color: #ffffff;
		border: 1px solid black;
		opacity: 0.8;
		filter: alpha(opacity=60);
	}
	.transbox h1 {
		font-size: 100px;
		color: red;
	}
	.transbox h2 {
		font-size: 50px;		
	}
	.content {
		float: left;
		font-size: 20px;					
		width: 280px;
		margin-top: 40px;
		margin-left: 80px;
		padding-right: 50px;
		border-right: 3px solid grey;
		height: 320px;
		text-align: center;
	}
	.content1 {
		float: left;
		font-size: 20px;
		width: 280px;
		margin-top: 40px;
		margin-left: 80px;
		padding-right: 120px;
		border-right: 3px solid grey;
		height: 320px;
		text-align: center;
		padding-right: 50px;
	}
	.content2 {
		float: left;
		font-size: 20px;
		width: 280px;
		margin-top: 40px;
		margin-left: 60px;
		padding-right: 30px;
		height: 320px;
		text-align: center;
	}
	#map{
		left: 30%;
	}
* {
  box-sizing: border-box;
}

.heading {
  font-size: 25px;
  margin-right: 25px;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top: 10px;
}

.middle {
  float: left;
  width: 70%;
  margin-top: 10px;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

/* Individual bars */
.bar-5 {width: 60%; height: 18px; background-color: #4CAF50;}
.bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 15%; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  /* Hide the right column on small screens */
  .right {
    display: none;
  }
}
  </style>
	<body>
		<section id="tmWelcome" class="parallax-window" data-parallax="scroll" data-image-src='.$results['college_background'].'>
		  <div class="container-fluid tm-brand-container-outer">
			<div class="row">
			  <div class="col-12">         
				<div class="ml-auto mr-0 tm-bg-black-transparent text-white tm-brand-container-inner">
				  <div class="tm-brand-container text-center">
					<h1 class="tm-brand-name">'.$results['college_name'].'</h1>
				  </div>
				</div>
			  </div>
			</div>
		  </div>

		  <div class="tm-bg-white-transparent tm-welcome-container">
			<div class="container-fluid">
			  <div class="row h-100">          
				<div class="col-md-7 tm-welcome-left-col">
				  <div class="tm-welcome-left">
					<h2 class="tm-welcome-title">Welcome to '.$results['college_name'].'</h2>
					<p class="pb-0">
					  '.$results['college_intro'].'</p>
				  </div>
				</div>

				<div class="col-md-5">
				  <div class="welcome-right-1">
					<i class="fas fa-4x fa-address-card p-3 tm-welcome-icon"></i>
					<p class="mb-0">
					  Come and Discover '.$results['college_name'].'’s range of programmes 
					  which are accredited by the Malaysian Qualifications 
					  Agency and are internationally affiliated with top 
					  universities around the globe such as University of 
					  Lincoln and Northumbria University.
					</p>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</section>

		<section id="tmPortfolio">
		  <div class="container-fluid">
			<div class="row">
			  <div class="col-12">
				<div class="tm-portfolio-item">
				  <div class=" text-white tm-bg-blue">
					<img src='.$results['college_feature1_pic'].' alt="bb"; width="330px"; height="220px"; >
				  </div>
				  <div class="tm-portfolio-description">
					<h3 class="tm-text-blue">
					  '.$results['college_feature1_title'].'
					</h3>
					<p class="mb-0">
					  '.$results['college_feature1'].'
					</p>
				  </div>
				</div>

				<div class="tm-portfolio-item">
				  <div class="text-white tm-bg-orange">
					<img src='.$results['college_feature2_pic'].' alt="ibm"; width="330px"; height="220px"; >
				  </div>
				  <div class="tm-portfolio-description">
					<h3 class="tm-text-orange">
					  '.$results['college_feature2_title'].'
					</h3>
					<p class="mb-0">
					  '.$results['college_feature2'].'
					</p>
				  </div>
				</div>
				
				<div class="tm-portfolio-item">
				  <div class="portfolio-name text-white tm-bg-green">
					<img src='.$results['college_feature3_pic'].' alt="bb"; width="330px"; height="220px"; >
				  </div>
				  <div class="tm-portfolio-description">
					<h3 class="tm-text-green">
					  '.$results['college_feature3_title'].'
					</h3>
					<p class="mb-0">
						'.$results['college_feature3'].'
					</p>
				  </div>
				</div>

			  </div>
			</div>
		  </div>
		</section>
		
		<div id="boxgal">
			<div id="gallery">
				<div id="pic1">
					<img src='.$results['college_gallery_pic1'].' height="400" width="700" alt="Image 1">
					<a class="previous" href="#pic5">&lt;</a>
					<a class="next" href="#pic2">&gt;</a>
					<h3>Image 1</h3>
					<p>Text of image 1.</p>
				</div>
				<div id="pic2">
					<img src='.$results['college_gallery_pic2'].' height="400" width="700" alt="Image 2">
					<a class="previous" href="#pic1">&lt;</a>
					<a class="next" href="#pic3">&gt;</a>
					<h3>Image 2</h3>
					<p>Text of image 2.</p>
				</div>
				<div id="pic3">
					<img src='.$results['college_gallery_pic3'].' height="400" width="700" alt="Image 3">
					<a class="previous" href="#pic2">&lt;</a>
					<a class="next" href="#pic4">&gt;</a>
					<h3>Image 3</h3>
					<p>Text of image 3.</p>
				</div>
				<div id="pic4">
					<img src='.$results['college_gallery_pic4'].' height="400" width="700" alt="Image 4">
					<a class="previous" href="#pic3">&lt;</a>
					<a class="next" href="#pic5">&gt;</a>
					<h3>Image 4</h3>
					<p>Text of image 4.</p>
				</div>
				<div id="pic5">
					<img src='.$results['college_gallery_pic5'].' height="400" width="700" alt="Image 5">
					<a class="previous" href="#pic4">&lt;</a>
					<a class="next" href="#pic1">&gt;</a>
					<h3>Image 5</h3>
					<p>Text of image 5.</p>
				</div>
			</div>
		</div>

		<div id="tmContact" class="parallax-window" data-parallax="scroll" data-image-src="image/img3.jpg">
		  <div class="container-fluid">
			<div class="row">
			  <div class="col-12">
				<div class="tm-contact-items-container">
					<div id="boxgal">
						<div id="gallery">
							<iframe src='.$results['college_address'].' width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			  </div>
			</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<span class="heading">User Rating</span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<p>4.1 average based on 254 reviews.</p>
<hr style="border:3px solid #f1f1f1">

<div class="row">
  <div class="side">
    <div>5 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-5"></div>
    </div>
  </div>
  <div class="side right">
    <div>150</div>
  </div>
  <div class="side">
    <div>4 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-4"></div>
    </div>
  </div>
  <div class="side right">
    <div>63</div>
  </div>
  <div class="side">
    <div>3 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-3"></div>
    </div>
  </div>
  <div class="side right">
    <div>15</div>
  </div>
  <div class="side">
    <div>2 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-2"></div>
    </div>
  </div>
  <div class="side right">
    <div>6</div>
  </div>
  <div class="side">
    <div>1 star</div>
  </div>
  <div class="middle">
    <div class="bar-container">
      <div class="bar-1"></div>
    </div>
  </div>
  <div class="side right">
    <div>20</div>
  </div>
</div> 
			<div class="row">
			  <footer class="col-12">
				<p class="text-center tm-copyright-text">
				Copyright College Finder 
				
				- Connect with us</p>
			  </footer>
			</div>
		  </div>
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/parallax.min.js"></script>
		<script>
		  function detectMsBrowser() {
			using_ms_browser =
			  navigator.appName == "Microsoft Internet Explorer" ||
			  (navigator.appName == "Netscape" &&
				navigator.appVersion.indexOf("Edge") > -1) ||
			  (navigator.appName == "Netscape" &&
				navigator.appVersion.indexOf("Trident") > -1);

			if (using_ms_browser == true) {
			  alert(
				"Please use Chrome or Firefox for the best browsing experience!"
			  );
			}
		  }
		  function setBrandMarginTop() {
			var bottomContainerHeight = $(".tm-welcome-container").height();

			$(".tm-brand-container-outer").css({
			  "margin-top": -bottomContainerHeight + "px"
			});
		  }

		  $(function() {
			setBrandMarginTop();
			detectMsBrowser();

			// Handle window resize event
			$(window).resize(function() {
			  setBrandMarginTop();
			});
		  });
		  
		</script>';
	 }else{
		 echo"No results";
	 }
	}else{
		echo "Minimum length is ".$min.length;
	}
		?>
		<?php include("footer.php"); ?>
  </body>
</html>