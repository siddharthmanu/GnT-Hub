<?php
	include 'dbconnect.php';
	$query = "SELECT * FROM members ORDER BY name";
	$result = mysql_query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <link rel="shortcut icon" href="favicon.ico">

    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">

  <title>GnT Hub</title>
  <!-- 1.1.2 -->
  
  <!-- Load the required CSS libraries -->

  <!-- bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

   <!-- Bootcards CSS file (different for desktop, iOS and Android, included Bootstrap CSS) -->
  <link href="css/bootcards-desktop.min.css" rel="stylesheet" type="text/css" />

  <link href="css/morris.css" rel="stylesheet" />

  <link href="css/font-awesome.min.css" rel="stylesheet" />
 
  <script>var isDesktop = true;</script>
  <!-- Custom CSS for the demo app -->
  <link href="css/bootcards-demo-app.css" rel="stylesheet" />
  <link href="css/custom.css" rel="stylesheet" />
  
  <script src="js/jquery.min.js"></script>
  <script src="js/custom.js"></script>

</head>
<body id="bootcards">

  <!-- fixed top navbar -->
  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <button type="button" class="btn btn-default btn-back navbar-left pull-left hidden" onclick="history.back()">
        <i class="fa fa-lg fa-chevron-left"></i><span>Back</span>
      </button>
      <!-- menu button to show/ hide the off canvas slider -->
      <button type="button" class="btn btn-default btn-menu navbar-left pull-left offCanvasToggle" data-toggle="offcanvas">
        <i class="fa fa-lg fa-bars"></i><span>Menu</span>
      </button>  

      <a class="navbar-brand no-break-out" title="GnT Hub" href="dashboard">
      <img src="icon.png" height="20px" style="float:left; margin-right:10px">Geeks & Technocrats</a>  
      
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li>
            <a href="dashboard" data-pjax="#main" data-title="Dashboard"
              <i class="fa fa-dashboard"></i>
              Dashboard
            </a>          
          </li>
          <li class="active">
            <a href="contacts" data-pjax="#main" data-title="Contacts"
              <i class="fa fa-users"></i>
              Contacts
            </a>          
          </li>
          <li>
            <a href="locations" data-pjax="#main" data-title="Locations"
              <i class="fa fa-map-marker"></i>
              Locations
            </a>          
          </li>
          
          <li>
            <a href="companies" data-pjax="#main" data-title="Companies"
              <i class="fa fa-building-o"></i>
              Companies
            </a>          
          </li>
          <li>
            <a href="settings" data-pjax="#main" data-title="Settings"
              <i class="fa fa-gears"></i>
              Settings
            </a>          
          </li>
        </ul>
      </div>          
    </div>
  </div>   

  <!-- slide in menu (mobile only) -->
  <nav id="offCanvasMenu" class="navmenu offcanvas offcanvas-left">
    <ul class="nav">
      <li>
        <a href="dashboard" data-pjax="#main" data-title="Dashboard">
          <i class="fa fa-lg fa-dashboard"></i>
          Dashboard
        </a>          
      </li>
      <li class="active">
        <a href="contacts" data-pjax="#main" data-title="Contacts">
          <i class="fa fa-lg fa-users"></i>
          Contacts
        </a>          
      </li>
      <li>
        <a href="locations" data-pjax="#main" data-title="Locations">
          <i class="fa fa-lg fa-map-marker"></i>
          Locations
        </a>          
      </li>
      <li>
        <a href="companies" data-pjax="#main" data-title="Companies">
          <i class="fa fa-lg fa-building-o"></i>
          Companies
        </a>          
      </li>
      <li>
        <a href="settings" data-pjax="#main" data-title="Settings">
          <i class="fa fa-lg fa-gears"></i>
          Settings
        </a>          
      </li>
    </ul>

    <div style="margin-top:20px; padding-left: 20px; font-size: 12px; color: #777">v1.1.2</div>
  </nav>

  <div class="container bootcards-container" id="main">
    
   
		<div class="row">
			
			<div class="col-sm-5 bootcards-list" id="list" data-title="Contacts">
				<div class="panel panel-default">				
					<div class="panel-body">
						<div class="search-form">
							<div class="row">
							    <div class="col-sm-9 col-xs-8">
							      <div class="form-group">
								      <input id="namekeywords" type="text" class="form-control" placeholder="Search Contacts...">
								      <i class="fa fa-search"></i>
							      </div>
							    </div>
							    <div class="col-sm-3 col-xs-4">
									<a id="namesearch" class="btn btn-primary btn-block">
										<span>Search</span>
									</a>
							    </div>
							</div>						    
						</div>					
					</div>
					<div id="contactlist" class="list-group">
						<?php
							while ($row = mysql_fetch_object($result)) {
                  echo "<a id='".$row->roll."' class=\"list-group-item pjax\" href=\"javascript:search_details('".$row->roll."');\">";
							    echo '<img src="images/'.$row->roll.'.jpg" class="img-rounded pull-left"/>';
							    echo '<h4 class="list-group-item-heading">'.$row->name.'</h4>';
							    echo '<p class="list-group-item-text">'.($row->organisation?$row->organisation:'Home').($row->city?' - '.$row->city:'').'</p></a>';
							}
						?>
					</div>
					<div class="panel-footer">
						<small class="pull-left">Contacts List</small>
					</div>
				</div>
			</div>
		
			<div class="col-sm-7 bootcards-cards hidden-xs" id="listDetails">

				<!--contact details & notes-->
				
				<div id="contactCard">
					<?php
            $result = mysql_query($query);
            $row = mysql_fetch_object($result);
          ?>
					<div class="panel panel-default">
						<div class="panel-heading clearfix">
							<h3 class="panel-title pull-left">Contact Details</h3>
						</div>
						<div class="list-group">
							<div class="list-group-item">
								<img src="images/<?php echo $row->roll ?>.jpg" class="img-rounded pull-left"/>
								<label>Name</label>
								<h4 class="list-group-item-heading"><?php echo $row->name ?></h4>
							</div>
              <div class="list-group-item">
                <label>Location</label>
                <h4 class="list-group-item-heading"><?php echo $row->city?$row->city.($row->state?', '.$row->state:'').($row->country&&$row->country!="India"?', '.$row->country:''):'-' ?></h4>
              </div>
							<div class="list-group-item">
								<label><?php echo ($row->type=="student")?'Institute':'Company'; ?></label>
								<h4 class="list-group-item-heading"><?php echo $row->organisation?$row->organisation:'-' ?></h4>
							</div>
							<div class="list-group-item">
								<label><?php echo ($row->type=="student")?'Course':'Job Title'; ?></label>
								<h4 class="list-group-item-heading"><?php echo $row->jobtitle?$row->jobtitle:'-' ?></h4>
							</div>
              <?php
              if ($row->email_work) echo '
              <a class="list-group-item" href="mailto:'.$row->email_work.'">
                <label>Email (Work)</label>
                <h4 class="list-group-item-heading">'.$row->email_work.'</h4>
              </a>'; 
              ?>
							<a class="list-group-item" href="mailto:<?php echo $row->email_personal ?>">
								<label>Email<?php echo $row->email_work?' (Personal)':''; ?></label>
								<h4 class="list-group-item-heading"><?php echo $row->email_personal ?></h4>
							</a>
              <a class="list-group-item" href="tel:<?php echo $row->mobile_1 ?>">
                <label>Mobile<?php echo $row->mobile_2?' (Primary)':''; ?></label>
                <h4 class="list-group-item-heading"><?php echo $row->mobile_1 ?></h4>
              </a>
              <?php
              if ($row->mobile_2) echo '
              <a class="list-group-item" href="tel:'.$row->mobile_2.'">
                <label>Mobile (Secondary)</label>
                <h4 class="list-group-item-heading">'.$row->mobile_2.'</h4>
              </a>';
              if ($row->office_phone) echo '
              <a class="list-group-item" href="tel:'.$row->office_phone.'">
                <label>Office Phone</label>
                <h4 class="list-group-item-heading">'.$row->office_phone.'</h4>
              </a>';
              ?>
              <div class="list-group-item">
                <label>Date of Birth</label>
                <h4 class="list-group-item-heading"><?php echo date("F j, Y",strtotime($row->dob)) ?></h4>
              </div>
						</div>
						<div class="panel-footer">
							<small class="pull-left">Contact Details</small>
						</div>		
					</div>
				
				</div>
				
			</div>
		</div>


  </div>

	<!-- fixed tabbed footer -->
	<div class="navbar navbar-default navbar-fixed-bottom">
		<div class="container">
			<div class="bootcards-desktop-footer clearfix">
				<p class="pull-left">Copyright © 2016 | Designed by <a href="https://in.linkedin.com/in/siddharthmanu" target="_blank">Siddharth Manu</a></p>
			</div>
			<div class="btn-group">
				<a href="dashboard" class="btn btn-default" data-pjax="#main" data-title="Dashboard">
					<i class="fa fa-2x fa-dashboard"></i>
					Dashboard
				</a>
        <a href="contacts" class="btn btn-default active" data-pjax="#main" data-title="Contacts">
          <i class="fa fa-2x fa-users"></i>
          Contacts
        </a>
        <a href="locations" class="btn btn-default" data-pjax="#main" data-title="Locations">
          <i class="fa fa-2x fa-map-marker"></i>
          Locations
        </a>
				<a href="companies" class="btn btn-default" data-pjax="#main" data-title="Companies">
					<i class="fa fa-2x fa-building-o"></i>
					Companies
				</a>
				<a href="settings" class="btn btn-default" data-pjax="#main" data-title="Settings">
					<i class="fa fa-2x fa-gears"></i>
					Settings
				</a>          
			</div>
		</div>
	</div> 

  <!-- Load the required JavaScript libraries -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.pjax.min.js"></script>
  <script src="js/fastclick.min.js"></script>
  <script src="js/raphael-min.js"></script>
  <script src="js/morris.min.js"></script>

  <!-- Bootcards JS file -->
  <script src="js/bootcards.min.js"></script> 
  
  <script src="js/bootcards-demo-app.js"></script>

	<!--modals-->
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content"></div>
		</div>
	</div>
  <div class="modal fade" id="docsModal" tabindex="-1" role="dialog" aria-labelledby="docsModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content"></div>
    </div>
  </div>
  
  <script type="text/javascript">
    //highlight first list group option (if non active yet)
    if ( $('.list-group a.active').length === 0 ) {
      $('.list-group a').first().addClass('active');
    }

    bootcards.init( {
        offCanvasHideOnMainClick : true,
        offCanvasBackdrop : true,
        enableTabletPortraitMode : true,
        disableRubberBanding : true,
        disableBreakoutSelector : 'a.no-break-out'
      });

  </script>

</body>
</html>