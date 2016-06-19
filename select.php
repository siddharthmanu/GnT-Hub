<?php
	include 'dbconnect.php';
	$search = $_POST['search'];
	$keywords = $_POST['keywords'];
	if ($search == 'name')
	{
		$query = 'SELECT * FROM members WHERE name LIKE "'.$keywords.'%" OR organisation LIKE "'.$keywords.'%" OR city LIKE "'.$keywords.'%" OR state LIKE "'.$keywords.'%" OR country LIKE "'.$keywords.'%" ORDER BY name';
		$result = mysql_query($query);
		while ($row = mysql_fetch_object($result)) {
		    echo "<a id='".$row->roll."' class=\"list-group-item pjax\" href=\"javascript:search_details('".$row->roll."');\">";
			echo '<img src="images/'.$row->roll.'.jpg" class="img-rounded pull-left"/>';
			echo '<h4 class="list-group-item-heading">'.$row->name.'</h4>';
			echo '<p class="list-group-item-text">'.($row->organisation?$row->organisation:'Home').($row->city?' - '.$row->city:'').'</p></a>';
		}
	}
	else if ($search == 'details')
	{
		$query = 'SELECT * FROM members WHERE roll = "'.$keywords.'"';
		$result = mysql_query($query);
		$row = mysql_fetch_object($result);
		echo '
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title pull-left">Contact Details</h3>
			</div>
			<div class="list-group">
				<div class="list-group-item">
					<img src="images/'.$row->roll.'.jpg" class="img-rounded pull-left"/>
					<label>Name</label>
					<h4 class="list-group-item-heading">'.$row->name.'</h4>
				</div>
				<div class="list-group-item">
					<label>Location</label>
					<h4 class="list-group-item-heading">'.($row->city?$row->city.($row->state?', '.$row->state:'').($row->country&&$row->country!="India"?', '.$row->country:''):'-').'</h4>
				</div>
				<div class="list-group-item">
					<label>'.(($row->type=="student")?'Institute':'Company').'</label>
					<h4 class="list-group-item-heading">'.($row->organisation?$row->organisation:'-').'</h4>
				</div>
				<div class="list-group-item">
					<label>'.(($row->type=="student")?'Course':'Job Title').'</label>
					<h4 class="list-group-item-heading">'.($row->jobtitle?$row->jobtitle:'-').'</h4>
				</div>';
			if ($row->email_work) echo '
				<a class="list-group-item" href="mailto:'.$row->email_work.'">
					<label>Email (Work)</label>
					<h4 class="list-group-item-heading">'.$row->email_work.'</h4>
				</a>';
			echo '
				<a class="list-group-item" href="mailto:'.$row->email_personal.'">
					<label>Email'.($row->email_work?' (Personal)':'').'</label>
					<h4 class="list-group-item-heading">'.$row->email_personal.'</h4>
				</a>
				<a class="list-group-item" href="tel:'.$row->mobile_1.'">
					<label>Mobile'.($row->mobile_2?' (Primary)':'').'</label>
					<h4 class="list-group-item-heading">'.$row->mobile_1.'</h4>
				</a>';
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
			echo '
				<div class="list-group-item">
					<label>Date of Birth</label>
					<h4 class="list-group-item-heading">'.date("F j, Y",strtotime($row->dob)).'</h4>
				</div>
			</div>
			<div class="panel-footer">
				<small class="pull-left">Contact Details</small>
			</div>		
		</div>';
	}
?>