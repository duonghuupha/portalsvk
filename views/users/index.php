<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Quản lý người dùng</li>
            </ul><!-- /.breadcrumb -->
            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Tìm kiếm ..." class="nav-search-input" id="nav-search-input" autocomplete="off"
                        onkeyup="search()"/>
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Quản lý người dùng
                    <small class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" onclick="add()">
                            <i class="fa fa-plus"></i>
                            Thêm mới
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-4 col-sm-4">
                    <h3 class="header smaller lighter blue" style="margin-top:0">
                        Cập nhật người dùng
                    </h3>
                    <form id="fm-update" method="post">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tên người dùng</label>
                                    <div>
                                        <input type="text" id="fullname_edit" name="fullname_edit" required=""
                                        placeholder="Tên người dùng" style="width:100%" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tên đăng nhập</label>
                                    <div>
                                        <input type="text" id="username_edit" name="username_edit" required=""
                                        placeholder="Tên đăng nhập" style="width:100%" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-sm btn-danger" type="button" onclick="window.location.reload(true)"
                                disabled="" id="cancel_edit">
                                    <i class="ace-icon fa fa-times"></i>
                                    Hủy bỏ
                                </button>
                                <button class="btn btn-sm btn-primary" type="button" onclick="save_update()" disabled=""
                                id="save_edit">
                                    <i class="ace-icon fa fa-save"></i>
                                    Ghi dữ liệu
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="space-24"></div>
                    <h3 class="header smaller lighter blue" style="margin-top:0">
                        Thay đổi mật khẩu
                    </h3>
                    <form id="fm-pass" method="post">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Tên đăng nhập</label>
                                    <div>
                                        <input type="text" id="username_pass" readonly=""
                                        placeholder="Tên đăng nhập" style="width:100%" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Mật khẩu</label>
                                    <div>
                                        <input type="password" id="pass_edit" name="pass_edit" required=""
                                        placeholder="Mật khẩu" style="width:100%" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="form-field-username">Xác nhận mật khẩu</label>
                                    <div>
                                        <input type="password" id="repass_edit" name="repass_edit" required=""
                                        placeholder="Xác nhận mật khẩu" style="width:100%" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-sm btn-danger" type="button" onclick="window.location.reload()"
                                disabled="" id="cancel_pass">
                                    <i class="ace-icon fa fa-times"></i>
                                    Hủy bỏ
                                </button>
                                <button class="btn btn-sm btn-primary" type="button" onclick="save_pass()" disabled=""
                                id="save_passs">
                                    <i class="ace-icon fa fa-save"></i>
                                    Ghi dữ liệu
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
                <div class="col-xs-8 col-sm-8">
                    <div id="list-data" class="dataTables_wrapper form-inline no-footer"></div>
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
                    Thêm mới - Cập nhật người dùng
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm" method="post" enctype="multipart/form-data">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Tên đăng nhập</label>
                                <div>
                                    <input type="text" id="username" name="username" required="" 
                                    placeholder="Tên đăng nhập" style="width:100%" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Tên người dùng</label>
                                <div>
                                    <input type="text" id="fulllname" name="fullname" required="" 
                                    placeholder="Tên người dùng" style="width:100%" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Mật khẩu</label>
                                <div>
                                    <input type="password" id="pass" name="pass" required="" 
                                    placeholder="Mật khẩu" style="width:100%" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Xác nhận mật khẩu</label>
                                <div>
                                    <input type="password" id="repass" name="repass" required="" 
                                    placeholder="Xác nhận mật khẩu" style="width:100%" />
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

<script src="<?php echo URL.'/public/' ?>scripts/users/index.js"></script>