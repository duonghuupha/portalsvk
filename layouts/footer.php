            <div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">SVKHERBAL.COM</span>
							Application &copy; <?php echo date("Y") - 1 ?>-<?php echo date("Y") ?>
						</span>
						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>
							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>
							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		<div class="overlay">
			<div class="overlay__inner">
				<div class="overlay__content"><span class="spinner"></span></div>
			</div>
		</div>

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='styles/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo URL ?>/styles/js/bootstrap.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery-ui.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery.easypiechart.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery.sparkline.index.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery.flot.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery.flot.pie.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery.flot.resize.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/moment.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/bootstrap-datetimepicker.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery.toast.js"></script>
		<script src="<?php echo URL ?>/styles/js/select2.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/chosen.jquery.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/bootbox.js"></script>
		<script src="<?php echo URL ?>/styles/js/jquery.maskedinput.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/tree.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/bootstrap-tag.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/ace-elements.min.js"></script>
		<script src="<?php echo URL ?>/styles/js/ace.min.js"></script>
		<script>
			jQuery(function($){
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
			});
		</script>
	</body>
</html>
