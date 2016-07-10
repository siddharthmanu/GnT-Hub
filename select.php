<?php
	include 'dbconnect.php';
	$search = $_POST['search'];
	$keywords = $_POST['keywords'];
	if(isset($_POST['parameter']))
		$parameter = $_POST['parameter'];
	if ($search == 'name')
	{
		switch($parameter)
		{
			case 'c': $query = 'SELECT * FROM members WHERE organisation LIKE "'.$keywords.'%" ORDER BY first_name'; break;
			case 'l': $query = 'SELECT * FROM members WHERE city LIKE "'.$keywords.'%" OR state LIKE "'.$keywords.'%" OR country LIKE "'.$keywords.'%" ORDER BY first_name'; break;
			case 'n':	
			default: $query = 'SELECT * FROM members WHERE first_name LIKE "'.$keywords.'%" OR middle_name LIKE "'.$keywords.'%" OR last_name LIKE "'.$keywords.'%" OR CONCAT(first_name, " ", middle_name) LIKE "'.$keywords.'%" OR CONCAT(middle_name, " ", last_name) LIKE "'.$keywords.'%" OR CONCAT(first_name, " ", last_name) LIKE "'.$keywords.'%" OR CONCAT(first_name, " ", middle_name, " ", last_name) LIKE "'.$keywords.'%" ORDER BY first_name';
		}
		$result = mysql_query($query);
		while ($row = mysql_fetch_object($result)) {
		    echo '
			<div class="row contactsrow">
				<div class="contactlistleft '.$row->roll.'">
					<a data-title="'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'" data-lightbox="profilepics" href="images/'.$row->roll.'.jpg">
						<img src="images/thumbnails/'.$row->roll.'.jpg" class="img-rounded pull-left">
					</a>
				</div>
				<div class="contactlistright">
					<a id="'.$row->roll.'" class="list-group-item pjax '.$row->roll.'" href="javascript:search_details(\''.$row->roll.'\');">
						<h4 class="list-group-item-heading">'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</h4>
						<p class="list-group-item-text">'.($row->organisation?$row->organisation:'Home').($row->city?' - '.$row->city:'').'</p>
					</a>
				</div>
			</div>';
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
					<a href="images/'.$row->roll.'.jpg" data-lightbox="profilepic" data-title="'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'">
	                  <img src="images/thumbnails/'.$row->roll.'.jpg" class="img-rounded pull-left"/>
	                </a>
					<label>Name</label>
					<h4 class="list-group-item-heading">'.$row->first_name.' '.$row->middle_name.' '.$row->last_name.'</h4>
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