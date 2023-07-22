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

		<!--Form don vi tinh-->
		<div id="modal-users" class="modal fade" data-keyboard="false" data-backdrop="static">
			<div class="modal-dialog">
				<div class="modal-content" id="form">
					<div class="modal-header no-padding">
						<div class="table-header">
							Cập nhật tài khoản
						</div>
					</div>
					<div class="modal-body">
						<div class="row">
							<form id="fm-users" method="post" enctype="multipart/form-data">
								<div class="col-xs-12">
									<div class="form-group">
										<label for="form-field-username">Tên người dùng</label>
										<div>
											<input type="text" id="fullname_pro" name="fullname_pro" required="" readonly=""
											placeholder="Tên người dùng" style="width:100%" value="<?php echo $_SESSION['data'][0]['fullname'] ?>"/>
										</div>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<label for="form-field-username">Mật khẩu</label>
										<div>
											<input type="password" id="pass_pro" name="pass_pro"
											placeholder="Mật khẩu" style="width:100%" required=""/>
										</div>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<label for="form-field-username">Xác nhận mật khẩu</label>
										<div>
											<input type="password" id="repass_pro" name="repass_pro" required=""
											placeholder="Xác nhận mật khẩu" style="width:100%" />
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal" type="button">
							<i class="ace-icon fa fa-times"></i>
							Đóng
						</button>
						<button class="btn btn-sm btn-primary pull-right" onclick="save_users()" type="button">
							<i class="ace-icon fa fa-save"></i>
							Ghi dữ liệu
						</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
		<!-- End formm don vi tinh-->

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
