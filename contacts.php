<?php
  include 'header.php';
  $query = "SELECT * FROM members ORDER BY first_name";
  $result = mysql_query($query);
?>

<div class="container bootcards-container" id="main">
  <div class="row">
    <div class="col-sm-5 bootcards-list" id="list" data-title="Contacts">
      <div class="panel panel-default">       
        <div class="panel-body">
          <div class="search-form">
            <div class="row">
              <div class="col-sm-8 col-xs-7">
                <div class="form-group">
                  <input id="namekeywords" type="text" class="form-control" placeholder="Search contacts...">
                  <i class="fa fa-search"></i>
                </div>
              </div>
              <div class="col-sm-4 col-xs-5">
                <div class="form-group">
                  <select id="parameter" class="btn btn-primary form-control">
                    <option value="n" selected>Name</option>
                    <option value="c">Company</option>
                    <option value="l">Location</option>
                  </select> 
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="contactlist" class="list-group"></div>
        <div class="panel-footer">
          <small class="pull-left">Contacts List</small>
        </div>
      </div>
    </div>
    <div class="col-sm-7 bootcards-cards" id="listDetails">
      <div id="contactCard"></div>
    </div>
  </div>
</div>

<script type="text/javascript">
  if ( $('.list-group a.active').length === 0 ) {
    $('.list-group a').first().addClass('active');
  }
  $(document).keydown(function(e){
    if (e.keyCode == 40)
      var nextcontact = $("a.active").parent().parent().next().find("a:eq(1)").attr("id");
    else if (e.keyCode == 38)
      var nextcontact = $("a.active").parent().parent().prev().find("a:eq(1)").attr("id");
    if(nextcontact)
    {
      search_details(nextcontact);
      e.preventDefault();
    }
  });
</script>

<?php include 'footer.php'; ?>