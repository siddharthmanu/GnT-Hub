<?php
  include 'header.php';
  $query = "SELECT * FROM members WHERE roll = '$roll'";
  $result = mysql_query($query);
  $profile = mysql_fetch_object($result);
?>

<div class="container bootcards-container" id="main">
  <div class="row">
    <div class="col-sm-4 col-sm-offset-1 col-xs-12">
      <div class="panel panel-default bootcards-media">
        <div class="panel-heading clearfix">
          <h3 class="panel-title pull-left">Profile Pic</h3>
          <a class="btn btn-primary pull-right visible-xs" data-toggle="modal" data-target="#profileModal">
            <i class="fa fa-pencil"></i><span>Profile</span>
          </a>
          <a class="btn btn-warning pull-right visible-xs" style="margin-right:15px" data-toggle="modal"  data-target="#passwordModal">
            <i class="fa fa-key"></i><span>Password</span>
          </a>
        </div>
        <div class="panel-body">
          <img src="images/<?php echo $profile->roll ?>.jpg" class="img-rounded" width="100%">
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
            <h4 class="list-group-item-heading"><?php echo $profile->roll;?></h4>
          </div>
          <div class="list-group-item">
            <label>First Name</label>
            <h4 class="list-group-item-heading"><?php echo $profile->first_name?$profile->first_name:'-';?></h4>
          </div>
          <div class="list-group-item">
            <label>Middle Name</label>
            <h4 class="list-group-item-heading"><?php echo $profile->middle_name?$profile->middle_name:'-';?></h4>
          </div>
          <div class="list-group-item">
            <label>Last Name</label>
            <h4 class="list-group-item-heading"><?php echo $profile->last_name?$profile->last_name:'-';?></h4>
          </div>
          <div class="list-group-item">
            <label>Current Status</label>
            <h4 class="list-group-item-heading"><?php echo $profile->type?$profile->type:'-';?></h4>
          </div>
          <div class="list-group-item">
            <label>City</label>
            <h4 class="list-group-item-heading"><?php echo $profile->city?$profile->city:'-';?></h4>
          </div>
          <div class="list-group-item">
            <label>State</label>
            <h4 class="list-group-item-heading"><?php echo $profile->state?$profile->state:'-';?></h4>
          </div>
          <div class="list-group-item">
            <label>Country</label>
            <h4 class="list-group-item-heading"><?php echo $profile->country?$profile->country:'-';?></h4>
          </div>
          <div class="list-group-item">
            <label>Organisation</label>
            <h4 class="list-group-item-heading"><?php echo $profile->organisation?$profile->organisation:'-';?></h4>
          </div>
          <div class="list-group-item">
            <label>Job Title</label>
            <h4 class="list-group-item-heading"><?php echo $profile->jobtitle?$profile->jobtitle:'-';?></h4>
          </div>
          <div class="list-group-item">
            <label>Email (Work)</label>
            <h4 class="list-group-item-heading"><?php echo $profile->email_work?$profile->email_work:'-';?></h4>
          </div>
          <div class="list-group-item">
            <label>Email (Personal)</label>
            <h4 class="list-group-item-heading"><?php echo $profile->email_personal?$profile->email_personal:'-';?></h4>
          </div>
          <div class="list-group-item">
            <label>Mobile (Primary)</label>
            <h4 class="list-group-item-heading"><?php echo $profile->mobile_1?$profile->mobile_1:'-';?></h4>
          </div>
          <div class="list-group-item">
            <label>Mobile (Secondary)</label>
            <h4 class="list-group-item-heading"><?php echo $profile->mobile_2?$profile->mobile_2:'-';?></h4>
          </div>
          <div class="list-group-item">
            <label>Office Phone</label>
            <h4 class="list-group-item-heading"><?php echo $profile->office_phone?$profile->office_phone:'-';?></h4>
          </div>
          <div class="list-group-item">
            <label>Date of Birth</label>
            <h4 class="list-group-item-heading"><?php echo $profile->dob?$profile->dob:'-';?></h4>
          </div>
        </div>
        <div class="panel-footer">
          <small class="pull-left">Profile Details</small>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="profileModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" id="editProfileForm">
        <div class="modal-header">
          <div class="btn-group pull-left">
            <button class="btn btn-danger" data-dismiss="modal">
              <i class="fa fa-times" style="margin: 0;"></i>
            </button>
          </div>
          <div class="btn-group pull-right">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-floppy-o" style="margin: 0;"></i>
            </button>
          </div>
          <h3 class="modal-title">Edit Profile</h3>
        </div>
        <div class="modal-body row">
          <div class="col-xs-10 col-xs-offset-1">
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">Roll No.</label>
              <div class="col-sm-8 col-xs-12">
                <input type="text" name="roll" class="form-control" value="<?php echo $profile->roll;?>" readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">First Name</label>
              <div class="col-sm-8 col-xs-12">
                <input type="text" name="first_name" class="form-control" value="<?php echo $profile->first_name;?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">Middle Name</label>
              <div class="col-sm-8 col-xs-12">
                <input type="text" name="middle_name" class="form-control" value="<?php echo $profile->middle_name;?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">Last Name</label>
              <div class="col-sm-8 col-xs-12">
                <input type="text" name="last_name" class="form-control" value="<?php echo $profile->last_name;?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">Current Status</label>
              <div class="col-sm-8 col-xs-12">
                <select name="type" class="form-control">
                  <option value="" <?php echo $profile->type?'':'selected'; ?>>Select current status...</option>
                  <option value="Student" <?php echo $profile->type=="Student"?'selected':''; ?>>Student</option>
                  <option value="Graduate" <?php echo $profile->type=="Graduate"?'selected':''; ?>>Graduate</option>
                  <option value="Employee" <?php echo $profile->type=="Employee"?'selected':''; ?>>Employee</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">City</label>
              <div class="col-sm-8 col-xs-12">
                <input type="text" name="city" class="form-control" value="<?php echo $profile->city;?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">State</label>
              <div class="col-sm-8 col-xs-12">
                <input type="text" name="state" class="form-control" value="<?php echo $profile->state;?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">Country</label>
              <div class="col-sm-8 col-xs-12">
                <input type="text" name="country" class="form-control" value="<?php echo $profile->country;?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">Organisation</label>
              <div class="col-sm-8 col-xs-12">
                <input type="text" name="organisation" class="form-control" value="<?php echo $profile->organisation;?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">Job Title</label>
              <div class="col-sm-8 col-xs-12">
                <input type="text" name="jobtitle" class="form-control" value="<?php echo $profile->jobtitle;?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">Email (Work)</label>
              <div class="col-sm-8 col-xs-12">
                <input type="email" name="email_work" class="form-control" value="<?php echo $profile->email_work;?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">Email (Personal)</label>
              <div class="col-sm-8 col-xs-12">
                <input type="email" name="email_personal" class="form-control" value="<?php echo $profile->email_personal;?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">Mobile (Primary)</label>
              <div class="col-sm-8 col-xs-12">
                <input type="text" name="mobile_1" class="form-control" value="<?php echo $profile->mobile_1;?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">Mobile (Secondary)</label>
              <div class="col-sm-8 col-xs-12">
                <input type="text" name="mobile_2" class="form-control" value="<?php echo $profile->mobile_2;?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">Office Phone</label>
              <div class="col-sm-8 col-xs-12">
                <input type="text" name="office_phone" class="form-control" value="<?php echo $profile->office_phone;?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">Date of Birth</label>
              <div class="col-sm-8 col-xs-12">
                <input type="text" name="dob" class="form-control" placeholder="yyyy-mm-dd" value="<?php echo $profile->dob;?>">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="col-xs-6">
            <button class="btn btn-danger btn-block" data-dismiss="modal">
              <i class="fa fa-times"></i> Cancel
            </button>
          </div>
          <div class="col-xs-6">
            <button type="submit" class="btn btn-success btn-block">
              <i class="fa fa-floppy-o"></i> Save
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="passwordModal" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" id="changePasswordForm">
        <div class="modal-header">
          <div class="btn-group pull-left">
            <button class="btn btn-danger" data-dismiss="modal">
              <i class="fa fa-times" style="margin: 0;"></i>
            </button>
          </div>
          <div class="btn-group pull-right">
            <button type="submit" class="btn btn-success">
              <i class="fa fa-floppy-o" style="margin: 0;"></i>
            </button>
          </div>
          <h3 class="modal-title">Change Password</h3>
        </div>
        <div class="modal-body row">
          <div class="col-xs-10 col-xs-offset-1">
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">Old Password</label>
              <div class="col-sm-8 col-xs-12">
                <input type="password" name="oldpassword" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-4 col-xs-12 control-label">New Password</label>
              <div class="col-sm-8 col-xs-12">
                <input type="password" name="newpassword" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="col-xs-6">
            <button class="btn btn-danger btn-block" data-dismiss="modal">
              <i class="fa fa-times"></i> Cancel
            </button>
          </div>
          <div class="col-xs-6">
            <button type="submit" class="btn btn-success btn-block">
              <i class="fa fa-floppy-o"></i> Save
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $("#editProfileForm").submit(function(e) {
    $.ajax({
      type: "POST",
      url: "editprofile.php",
      data: $("#editProfileForm").serialize(),
      success: function (data) {
        $('#profileModal').modal('toggle');
        $('#main').html(data);
      }
    });
    e.preventDefault();
  });
</script>
<script type="text/javascript">
  $("#changePasswordForm").submit(function(e) {
    $.ajax({
      type: "POST",
      url: "changepassword.php",
      data: $("#changePasswordForm").serialize(),
      success: function (data) {
        $('#passwordModal').modal('toggle');
        $('#main').html(data);
      }
    });
    e.preventDefault();
  });
</script>
<?php include 'footer.php'; ?>