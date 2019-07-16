<?php 	

	echo"<html>
		<style>
		.line {
			border: 1px solid white;		
		}
		#foot {
			border-style: solid;
			border-color: black;
			width: 100%;
			heigth: 100px;
			background-color: black;
			opacity: 0.8;
		}
		h2 span {
			background: black;
			padding: 0 20px;
			color: white;
			font-family: verdana;

		}
		h2+* {
			border-top: solid 2px white;
			padding-top: 28px;
			margin-top: -38px;
		}
		#foot h3 {
			color: white;
			font-family: Garamond;
		}		
		</style>
			<body>
				<div id=\"foot\">					
					<h2>
						<span>&nbsp&nbspConnect with US&nbsp&nbsp</span>
					</h2>
					<div class=\"section\">&nbsp &nbsp
						<img src=\"social/line.png\" alt=\"line\">&nbsp &nbsp
						<img src=\"social/fb.png\" alt=\"fb\">&nbsp &nbsp
						<img src=\"social/snap.png\" alt=\"snap\">&nbsp &nbsp
						<img src=\"social/whats.png\" alt=\"whats\">
						<h3><center>Copyright @ 2019 All right reserved | Powered by College Finder</center></h3>
					</div>
				</div>
			</body>		
	</html>";
?>
