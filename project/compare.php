<?php
if (isset($_POST['submitted'])){
$dbc = mysqli_connect("localhost", "root", "") or die("Error connecting to database: ".mysqli_error());
    
    mysqli_select_db($dbc,"college") or die(mysqli_error());
			$query = $_POST["search1"];
			$query2 = $_POST["search2"];
			$raw_results = mysqli_query($dbc,"SELECT * FROM college_info
				WHERE (`college_name` LIKE '%".$query."%')") or die(mysqli_error());
			$raw_results2 = mysqli_query($dbc,"SELECT * FROM college_info
				WHERE (`college_name` LIKE '%".$query2."%')") or die(mysqli_error());
			$results = mysqli_fetch_array($raw_results);
			$results2 = mysqli_fetch_array($raw_results2);
echo '	
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>F-plus Portfolio Template</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="style2.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css1/responsive/responsive.css" rel="stylesheet">

</head>
<body>
    
    <!-- ****** Welcome Area Start ****** -->
    <section class="fplus-hero-area" style="background-image: url(img/bg-img/video.jpg);" id="home">
    </section>
    <!-- ****** Welcome Area End ****** -->

    <!-- ****** College Compare Area Start ****** -->
    <section class="fplus-about-us-area bg-gray section-padding-120" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
						<center><h4 style="font-size:60px">College Compare</h4>
						<form action ="compare.php" method="POST">
							College Name :
							<select name="search1">
								<option value="INTI">INTI</option>
								<option value="KDU">KDU</option>
								<option value="malaya">UM</option>
								<option value="SEGI">SEGI</option>
								<option value="TARC">TARC</option>
							</select>
							Compare
							<select name="search2">
								<option value="INTI">INTI</option>
								<option value="KDU">KDU</option>
								<option value="malaya">UM</option>
								<option value="SEGI">SEGI</option>
								<option value="TARC">TARC</option>
							</select>
							<input type = "submit" name="submit" />
							<input type="hidden" name="submitted" value="true"/>
							</form></center>
							</br>
                        <div class="section-heading-line"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="about-us-content wow fadeInLeftBig" data-wow-delay="0.5">
                <div class="row no-gutters align-items-center">
                    <div class="col-12 col-md-6">
                        <div class="about-us-thumb wow fadeIn" data-wow-delay="1s">
                            <img src='.$results['college_background'].' alt="" width="640" height="427">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="about-us-text wow fadeIn" data-wow-delay="1.5s">
						
							';
							echo '
							<h3>'.$results['college_name'].'</h3>
							<p>College Institution: '.$results['college_institution'].'</p>
                            <p>College Ranking: '.$results['college_ranking'].'</p>
							<p>College Total Course : '.$results['college_totalCourse'].'</p>
							<p>College Major : '.$results['college_major'].'</p>
							<p>College Graduation rate: '.$results['college_graduateRate'].'</p>
							<p>College Introduction : '.$results['college_intro'].'</p>
							<p>
						</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <!-- Single Feature -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="fplus-single-feature wow fadeInUp" data-wow-delay="1s">
                        <div class="feature-title d-flex align-items-center">
                            <img src="img/icons/switching-user.svg" alt="">
                            <h5>'.$results['college_feature1_title'].'</h5>
                        </div>
                        <p>'.$results['college_feature1'].'</p>
                    </div>
                </div>
                <!-- Single Feature -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="fplus-single-feature wow fadeInUp" data-wow-delay="1.5s">
                        <div class="feature-title d-flex align-items-center">
                            <img src="img/icons/switching-user.svg" alt="">
                            <h5>'.$results['college_feature2_title'].'</h5>
                        </div>
                        <p>'.$results['college_feature2'].'</p>
                    </div>
                </div>
                <!-- Single Feature -->
                <div class="col-12 col-lg-4">
                    <div class="fplus-single-feature wow fadeInUp" data-wow-delay="2s">
                        <div class="feature-title d-flex align-items-center">
                            <img src="img/icons/switching-user.svg" alt="">
                            <h5>'.$results['college_feature3_title'].'</h5>
                        </div>
                        <p>'.$results['college_feature3'].'</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** About Us Area End ****** -->
<!-- ****** College Compare Area Start ****** -->
    <section class="fplus-about-us-area bg-gray section-padding-120" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
							</br>
                        <div class="section-heading-line"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="about-us-content wow fadeInLeftBig" data-wow-delay="0.5">
                <div class="row no-gutters align-items-center">
                    <div class="col-12 col-md-6">
                        <div class="about-us-thumb wow fadeIn" data-wow-delay="1s">
                            <img src='.$results2['college_background'].' alt="" width="640" height="427">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="about-us-text wow fadeIn" data-wow-delay="1.5s">
						
							';
							echo '
							<h3>'.$results2['college_name'].'</h3>
							<p>College Institution: '.$results2['college_institution'].'</p>
                            <p>College Ranking: '.$results2['college_ranking'].'</p>
							<p>College Total Course : '.$results2['college_totalCourse'].'</p>
							<p>College Major : '.$results2['college_major'].'</p>
							<p>College Graduation rate: '.$results2['college_graduateRate'].'</p>
							<p>College Introduction : '.$results2['college_intro'].'</p>
							<p>
						</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <!-- Single Feature -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="fplus-single-feature wow fadeInUp" data-wow-delay="1s">
                        <div class="feature-title d-flex align-items-center">
                            <img src="img/icons/switching-user.svg" alt="">
                            <h5>'.$results2['college_feature1_title'].'</h5>
                        </div>
                        <p>'.$results2['college_feature1'].'</p>
                    </div>
                </div>
                <!-- Single Feature -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="fplus-single-feature wow fadeInUp" data-wow-delay="1.5s">
                        <div class="feature-title d-flex align-items-center">
                            <img src="img/icons/switching-user.svg" alt="">
                            <h5>'.$results2['college_feature2_title'].'</h5>
                        </div>
                        <p>'.$results2['college_feature2'].'</p>
                    </div>
                </div>
                <!-- Single Feature -->
                <div class="col-12 col-lg-4">
                    <div class="fplus-single-feature wow fadeInUp" data-wow-delay="2s">
                        <div class="feature-title d-flex align-items-center">
                            <img src="img/icons/switching-user.svg" alt="">
                            <h5>'.$results2['college_feature3_title'].'</h5>
                        </div>
                        <p>'.$results2['college_feature3'].'</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** About Us Area End ****** -->
</body>';
}
else{
		echo '	
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>F-plus Portfolio Template</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link href="style2.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css1/responsive/responsive.css" rel="stylesheet">

</head>
<body>
    
    <!-- ****** Welcome Area Start ****** -->
    <section class="fplus-hero-area" style="background-image: url(img/bg-img/video.jpg);" id="home">
    </section>
    <!-- ****** Welcome Area End ****** -->

    <!-- ****** College Compare Area Start ****** -->
    <section class="fplus-about-us-area bg-gray section-padding-120" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
						<center><h4 style="font-size:60px">College Compare</h4>
						<form action ="compare.php" method="POST">
							College Name :
							<select name="search1">
								<option value="INTI">INTI</option>
								<option value="KDU">KDU</option>
								<option value="malaya">UM</option>
								<option value="SEGI">SEGI</option>
								<option value="TARC">TARC</option>
							</select>
							Compare
							<select name="search2">
								<option value="KDU">KDU</option>
								<option value="INTI">INTI</option>
								<option value="malaya">UM</option>
								<option value="SEGI">SEGI</option>
								<option value="TARC">TARC</option>
							</select>
							<input type = "submit" name="submit" />
							<input type="hidden" name="submitted" value="true"/>
							</form></center>
							</br>
                        <div class="section-heading-line"></div>
                    </div>
                </div>
            </div>
        </div>
	</section>
</body>';
}
?>