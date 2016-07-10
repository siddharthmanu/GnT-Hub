<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="mobile-web-app-capable" content="yes" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
		<meta property="og:title" content="Geeks & Technocrats" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="http://www.gnthub.com/" />
		<meta property="og:image" content="http://www.gnthub.com/fb.jpg" />
		<meta property="og:description" content="To stay connected forever..." />
		<meta property="fb:app_id" content="295193570822726" />
		<title>GnT Hub</title>
		<link rel="shortcut icon" href="favicon.ico">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet" />
		<link href="css/custom.css" rel="stylesheet" />
	</head>
	<body class="homebody">
		<p class="welcome visible-xs">GnT Hub</p>
		<img src="gnthubsmall.jpg" class="welcome visible-xs">
		<img src="gnthubbig.jpg" class="welcome hidden-xs">
		<a class="btn btn-signin btn-danger" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i> Sign In</a>
		<div class="modal fade" id="loginModal" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-sm">
		    <div class="modal-content">
		      <form class="form-horizontal" id="loginForm">
		        <div class="modal-header">
		          <h3 class="modal-title">Sign In</h3>
		        </div>
		        <div class="modal-body">
		        	<div id="loginError" class="alert alert-danger" hidden>
						<a href="#" class="close" aria-label="close" onclick="this.parentNode.style.display = 'none';">&times;</a>
						<strong>Error!</strong> Incorrect Credentials.
					</div>
		        	<div class="row marginbot15">
			      	  <div class="col-xs-10 col-xs-offset-1">
		          		<input type="text" name="roll" class="form-control" placeholder="Roll No." required>
		          	  </div>
		          	</div>
		            <div class="row">
			      	  <div class="col-xs-10 col-xs-offset-1">
		          		<input type="password" name="pass" class="form-control" placeholder="Password" required>
		          	  </div>
		          	</div>
		        </div>
		        <div class="modal-footer">
		        	<div class="row">
			      	  <div class="col-xs-10 col-xs-offset-1">
			      	  	<button type="submit" class="btn btn-success btn-block">
			              <i class="fa fa-key"></i> Sign In
			            </button>
			      	  </div>
			      	</div>
		        </div>
		      </form>
		    </div>
		  </div>
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/custom.js"></script>
	</body>
</html>