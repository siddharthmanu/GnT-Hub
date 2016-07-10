<?php
	include 'header.php';
	$query = "SELECT count(*) as contacts, count(DISTINCT city) as locations, count(DISTINCT organisation) as companies FROM members";
	$result = mysql_query($query);
	$values = mysql_fetch_object($result);
?>

<div class="container bootcards-container" id="main">
	<div class="row">
		<div class="bootcards-cards">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2">
				<div class="panel panel-default bootcards-summary">
					<div class="panel-heading">
						<h3 class="panel-title">Dashboard</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-6 col-sm-3">
								<a class="bootcards-summary-item" href="profile" style="padding-top:35px;">
									<i class="fa fa-3x fa-user"></i>
									<h4>Profile</h4>
								</a>
							</div>
							<div class="col-xs-6 col-sm-3">
								<a class="bootcards-summary-item" href="contacts" style="padding-top:35px;">
									<i class="fa fa-3x fa-users"></i>
									<h4>
										Contacts
										<span class="label label-info"><?php echo $values->contacts ?></span>
									</h4>
								</a>
							</div>
							<div class="col-xs-6 col-sm-3">
								<a class="bootcards-summary-item" onclick="notready()" style="padding-top:35px;cursor: pointer;">
									<i class="fa fa-3x fa-map-marker"></i>
									<h4>
										Locations
										<span class="label label-info"><?php echo $values->locations ?></span>
									</h4>
								</a>
							</div>
							<div class="col-xs-6 col-sm-3">
								<a class="bootcards-summary-item" onclick="notready()" style="padding-top:35px;cursor: pointer;">
									<i class="fa fa-3x fa-building-o"></i>
									<h4>
										Companies
										<span class="label label-info"><?php echo $values->companies ?></span> 
									</h4>
								</a>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<small class="pull-left">Dashboard</small>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>