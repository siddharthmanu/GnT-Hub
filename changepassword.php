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
  $oldpassword = $_POST['oldpassword'];
  $newpassword = $_POST['newpassword'];
  $query = "UPDATE members SET password = '$newpassword' WHERE roll = '$roll'";
  $log = "log.txt";
  $current = file_get_contents($log);
  $current .= $first_name." ".($middle_name?$middle_name." ":"").$last_name." (".$roll.") made the following changes:\n";
  if($profile->password != $newpassword) $current .= "Password : ".$profile->password." -> ".$newpassword."\n";
  $current .= "\n";
  if($profile->password == $oldpassword)
  {
    file_put_contents($log, $current);
    mysql_query($query);
    echo '
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1 col-xs-12">
        <div id="passwordChanged" class="alert alert-success">
          <a class="close" aria-label="close" onclick="this.parentNode.style.display = \'none\';">×</a>
          <strong>Thank You!</strong> Your password has been changed successfully.
        </div>
      </div>
    </div>';
  }
  else
  {
    echo '
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1 col-xs-12">
        <div id="passwordChanged" class="alert alert-danger">
          <a class="close" aria-label="close" onclick="this.parentNode.style.display = \'none\';">×</a>
          <strong>Error!</strong> The old password you entered does not match with the current password.
        </div>
      </div>
    </div>';
  }  
  $query = "SELECT * FROM members WHERE roll = '$roll'";
  $result = mysql_query($query);
  $profile = mysql_fetch_object($result);
  echo '
  <div class="row">
    <div class="col-sm-4 col-sm-offset-1 col-xs-12">
      <div class="panel panel-default bootcards-media">
        <div class="panel-heading clearfix">
          <h3 class="panel-title pull-left">Profile Pic</h3>
          <a class="btn btn-primary pull-right visible-xs" data-toggle="modal" data-target="#profileModal">
            <i class="fa fa-pencil"></i><span>Edit Profile</span>
          </a>
          <a class="btn btn-warning pull-right visible-xs" style="margin-right:15px" data-toggle="modal"  data-target="#passwordModal">
            <i class="fa fa-key"></i><span>Change Password</span>
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
          <a class="btn btn-warning pull-right hidden-xs" style="margin-right:15px" data-toggle="modal"  data-target="#passwordModal">
            <i class="fa fa-key"></i><span>Change Password</span>
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