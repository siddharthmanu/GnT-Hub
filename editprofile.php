<?php
  include 'dbconnect.php';
  session_start();
  if(isset($_SESSION['roll']))
  {
    $roll = $_SESSION['roll'];
  }
  else
  {
    header('Location: index');
  }
  $query = "SELECT * FROM members WHERE roll = '$roll'";
  $result = mysql_query($query);
  $profile = mysql_fetch_object($result);
  $first_name = $_POST['first_name'];
  $middle_name = $_POST['middle_name'];
  $last_name = $_POST['last_name'];
  $type = $_POST['type'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $country = $_POST['country'];
  $organisation = $_POST['organisation'];
  $jobtitle = $_POST['jobtitle'];
  $email_work = $_POST['email_work'];
  $email_personal = $_POST['email_personal'];
  $mobile_1 = $_POST['mobile_1'];
  $mobile_2 = $_POST['mobile_2'];
  $office_phone = $_POST['office_phone'];
  $dob = $_POST['dob'];
  $query = "UPDATE members SET
        first_name = '$first_name',
        middle_name = '$middle_name',
        last_name = '$last_name',
        type = '$type',
        city = '$city',
        state = '$state',
        country = '$country',
        organisation = '$organisation',
        jobtitle = '$jobtitle',
        email_work = '$email_work',
        email_personal = '$email_personal',
        mobile_1 = '$mobile_1',
        mobile_2 = '$mobile_2',
        office_phone = '$office_phone',
        dob = '$dob'
        WHERE roll = '$roll'";
  $log = "log.txt";
  $current = file_get_contents($log);
  $current .= $first_name." ".($middle_name?$middle_name." ":"").$last_name." (".$roll.") made the following changes:\n";
  if($profile->first_name != $first_name) $current .= "First Name : ".$profile->first_name." -> ".$first_name."\n";
  if($profile->middle_name != $middle_name) $current .= "Middle Name : ".$profile->middle_name." -> ".$middle_name."\n";
  if($profile->last_name != $last_name) $current .= "Last Name : ".$profile->last_name." -> ".$last_name."\n";
  if($profile->type != $type) $current .= "Current Status : ".$profile->type." -> ".$type."\n";
  if($profile->city != $city) $current .= "City : ".$profile->city." -> ".$city."\n";
  if($profile->state != $state) $current .= "State : ".$profile->state." -> ".$state."\n";
  if($profile->country != $country) $current .= "Country : ".$profile->country." -> ".$country."\n";
  if($profile->organisation != $organisation) $current .= "Organisation : ".$profile->organisation." -> ".$organisation."\n";
  if($profile->jobtitle != $jobtitle) $current .= "Job Title : ".$profile->jobtitle." -> ".$jobtitle."\n";
  if($profile->email_work != $email_work) $current .= "Email (Work) : ".$profile->email_work." -> ".$email_work."\n";
  if($profile->email_personal != $email_personal) $current .= "Email (Personal) : ".$profile->email_personal." -> ".$email_personal."\n";
  if($profile->mobile_1 != $mobile_1) $current .= "Mobile (Primary) : ".$profile->mobile_1." -> ".$mobile_1."\n";
  if($profile->mobile_2 != $mobile_2) $current .= "Mobile (Secondary) : ".$profile->mobile_2." -> ".$mobile_2."\n";
  if($profile->office_phone != $office_phone) $current .= "Office Phone : ".$profile->office_phone." -> ".$office_phone."\n";
  if($profile->dob != $dob) $current .= "Date of Birth : ".$profile->dob." -> ".$dob."\n";
  $current .= "\n";
  file_put_contents($log, $current);
  mysql_query($query);
  $query = "SELECT * FROM members WHERE roll = '$roll'";
  $result = mysql_query($query);
  $profile = mysql_fetch_object($result);
  echo '
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1 col-xs-12">
      <div id="profileUpdated" class="alert alert-success">
        <a class="close" aria-label="close" onclick="this.parentNode.style.display = \'none\';">×</a>
        <strong>Thank You!</strong> Your profile has been updated successfully.
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 col-sm-offset-1 col-xs-12">
      <div class="panel panel-default bootcards-media">
        <div class="panel-heading clearfix">
          <h3 class="panel-title pull-left">Profile Pic</h3>
          <a class="btn btn-primary pull-right visible-xs" data-toggle="modal" data-target="#profileModal">
            <i class="fa fa-pencil"></i><span>Edit Profile</span>
          </a>
        </div>
        <div class="panel-body">
          <img src="images/'.$profile->roll.'.jpg" class="img-rounded" width="100%">
        </div>
        <div class="panel-footer">
          <small class="pull-left">Profile Pic</small>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xs-12">
      <div class="panel panel-default bootcards-media">       
        <div class="panel-heading clearfix">
          <h3 class="panel-title pull-left">Profile Details</h3>
          <a class="btn btn-primary pull-right hidden-xs" data-toggle="modal" data-target="#profileModal">
            <i class="fa fa-pencil"></i><span>Edit Profile</span>
          </a>
        </div>
        <div class="panel-body list-group">
          <div class="list-group-item">
            <label>Roll No.</label>
            <h4 class="list-group-item-heading">'.$profile->roll.'</h4>
          </div>
          <div class="list-group-item">
            <label>First Name</label>
            <h4 class="list-group-item-heading">'.($profile->first_name?$profile->first_name:'-').'</h4>
          </div>
          <div class="list-group-item">
            <label>Middle Name</label>
            <h4 class="list-group-item-heading">'.($profile->middle_name?$profile->middle_name:'-').'</h4>
          </div>
          <div class="list-group-item">
            <label>Last Name</label>
            <h4 class="list-group-item-heading">'.($profile->last_name?$profile->last_name:'-').'</h4>
          </div>
          <div class="list-group-item">
            <label>Current Status</label>
            <h4 class="list-group-item-heading">'.($profile->type?$profile->type:'-').'</h4>
          </div>
          <div class="list-group-item">
            <label>City</label>
            <h4 class="list-group-item-heading">'.($profile->city?$profile->city:'-').'</h4>
          </div>
          <div class="list-group-item">
            <label>State</label>
            <h4 class="list-group-item-heading">'.($profile->state?$profile->state:'-').'</h4>
          </div>
          <div class="list-group-item">
            <label>Country</label>
            <h4 class="list-group-item-heading">'.($profile->country?$profile->country:'-').'</h4>
          </div>
          <div class="list-group-item">
            <label>Organisation</label>
            <h4 class="list-group-item-heading">'.($profile->organisation?$profile->organisation:'-').'</h4>
          </div>
          <div class="list-group-item">
            <label>Job Title</label>
            <h4 class="list-group-item-heading">'.($profile->jobtitle?$profile->jobtitle:'-').'</h4>
          </div>
          <div class="list-group-item">
            <label>Email (Work)</label>
            <h4 class="list-group-item-heading">'.($profile->email_work?$profile->email_work:'-').'</h4>
          </div>
          <div class="list-group-item">
            <label>Email (Personal)</label>
            <h4 class="list-group-item-heading">'.($profile->email_personal?$profile->email_personal:'-').'</h4>
          </div>
          <div class="list-group-item">
            <label>Mobile (Primary)</label>
            <h4 class="list-group-item-heading">'.($profile->mobile_1?$profile->mobile_1:'-').'</h4>
          </div>
          <div class="list-group-item">
            <label>Mobile (Secondary)</label>
            <h4 class="list-group-item-heading">'.($profile->mobile_2?$profile->mobile_2:'-').'</h4>
          </div>
          <div class="list-group-item">
            <label>Office Phone</label>
            <h4 class="list-group-item-heading">'.($profile->office_phone?$profile->office_phone:'-').'</h4>
          </div>
          <div class="list-group-item">
            <label>Date of Birth</label>
            <h4 class="list-group-item-heading">'.($profile->dob?$profile->dob:'-').'</h4>
          </div>
        </div>
        <div class="panel-footer">
          <small class="pull-left">Profile Details</small>
        </div>
      </div>
    </div>
  </div>';
?>