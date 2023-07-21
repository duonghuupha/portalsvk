<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Giao diện</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Cài đặt giao diện
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-6 col-sm-6">
                    <div id="list-data" class="dataTables_wrapper form-inline no-footer"></div>
                </div><!-- /.col -->
                <div class="col-xs-6 col-sm-6">
                    <h3 class="header smaller lighter blue" style="margin-top:0">
                        Cập nhật dữ liệu
                        <small class="pull-right" id="btn_slide">
                            <button type="button" class="btn btn-primary btn-sm" onclick="add_slide()"
                            id="btn_block">
                                <i class="fa fa-plus"></i>
                                Thêm mới
                            </button>
                        </small>
                    </h3>
                    <div id="content-decoration"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<!--Form don vi tinh-->
<div id="modal-data" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" id="form">
            <div class="modal-header no-padding">
                <div class="table-header">
                    Thêm mới - Cập nhật Block
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm" method="post" enctype="multipart/form-data">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Tiêu đề block</label>
                                <div>
                                    <input type="text" id="title" name="title" required="" 
                                    placeholder="Tiêu đề block" style="width:100%" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Tên file</label>
                                <div>
                                    <input type="text" id="url_file" name="url_file" required="" 
                                    placeholder="Tên file" style="width:100%" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Thứ tự</label>
                                <div>
                                    <input type="text" id="order_block" name="order_block" required="" 
                                    placeholder="Thứ tụ" style="width:100%" onkeypress="validate(event)"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                    Đóng
                </button>
                <button class="btn btn-sm btn-primary pull-right" onclick="save()">
                    <i class="ace-icon fa fa-save"></i>
                    Ghi dữ liệu
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-decoration" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" id="form-decoration">
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/decoration/index.js"></script>
<script src="<?php echo URL.'/public/' ?>scripts/decoration/slide.js"></script>
<script src="<?php echo URL.'/public/' ?>scripts/decoration/block_two.js"></script>
<script src="<?php echo URL.'/public/' ?>scripts/decoration/block_three.js"></script>
<script src="<?php echo URL.'/public/' ?>scripts/decoration/block_four.js"></script>
<script src="<?php echo URL.'/public/' ?>scripts/decoration/block_six.js"></script>
<script src="<?php echo URL.'/public/' ?>scripts/decoration/block_night.js"></script>
<script src="<?php echo URL.'/public/' ?>scripts/decoration/block_ten.js"></script>