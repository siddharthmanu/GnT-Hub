		<!-- fixed tabbed footer -->
		<div class="navbar navbar-default navbar-fixed-bottom">
			<div class="container">
				<div class="bootcards-desktop-footer clearfix">
					<p class="pull-left">Copyright © 2016 | Designed by <a href="https://in.linkedin.com/in/siddharthmanu" target="_blank">Siddharth Manu</a></p>
				</div>
			</div>
		</div>

		<!-- Load the required JavaScript libraries -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootstrap-notify.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/jquery.pjax.min.js"></script>
		<script src="js/fastclick.min.js"></script>
		<script src="js/raphael-min.js"></script>
		<script src="js/morris.min.js"></script>
		<script src="js/lightbox.min.js"></script>

		<!-- Bootcards JS file -->
		<script src="js/bootcards.min.js"></script>
		<script src="js/bootcards-demo-app.js"></script>

		<script type="text/javascript">
			bootcards.init({
				offCanvasHideOnMainClick : true,
				offCanvasBackdrop : true,
				enableTabletPortraitMode : true,
				disableRubberBanding : true,
				disableBreakoutSelector : 'a.no-break-out'
			});
			function notready()
			{
				$.notify({icon:'fa fa-exclamation-triangle',message:'<strong>Sorry!</strong> This feature is not ready yet.'},{type:'danger'});
			}
		</script>
	</body>
</html>