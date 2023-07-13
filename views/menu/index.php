<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Menu</li>
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
                    Menu của website
                    <small class="pull-right">
                        <button type="button" class="btn btn-primary btn-sm" onclick="add()">
                            <i class="fa fa-plus"></i>
                            Thêm mới
                        </button>
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div id="list_data" class="dataTables_wrapper form-inline no-footer"></div>
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
                    Thêm mới - Cập nhật menu website
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fm" method="post" enctype="multipart/form-data">
                        <input id="blog_id" name="blog_id" type="hidden"/>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Lựa chọn menu cha</label>
                                <div>
                                    <select id="parent_id" name="parent_id" class="select2"
                                    data-placeholder="Lựa chọn menu" style="width:100%"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Tiêu đề</label>
                                <div>
                                    <input type="text" id="title" name="title" required="" 
                                    placeholder="Tiêu đề menu" style="width:100%" />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="form-field-username">Kiểu menu</label>
                                <div>
                                    <select id="type_menu" name="type_menu" class="select2"
                                    data-placeholder="Lựa chọn kiểu menu" style="width:100%"
                                    onchange="set_data(this.value)" required="">
                                        <option value="">Lựa chọn kiểu menu</option>
                                        <option value="1">Một bài viết</option>
                                        <option value="2">Danh sách bài viết</option>
                                        <option value="3">Liên hệ</option>
                                        <option value="4">Liên kết ngoài</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group" id="single_blog">
                                <label for="form-field-username">Lựa chọn bài viết</label>
                                <div class="input-group">
                                    <input type="text" id="single_blog_title" name="single_blog_title"
                                    placeholder="Click Go! để lựa chọn" style="width:100%" readonly=""/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm btn-primary" type="button" onclick="select_blogs()"
                                        id="select_users">
                                            <i class="ace-icon fa fa-users bigger-110"></i>
                                            Go!
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group" id="list_blog">
                                <label for="form-field-username">Lựa chọn danh mục</label>
                                <div>
                                    <select id="blog_cate" name="blog_cate[]" class="select2"
                                    data-placeholder="Lựa chọn danh mục" style="width:100%" multiple=""></select>
                                </div>
                            </div>
                            <div class="form-group" id="link_out">
                                <label for="form-field-username">Đường dẫn</label>
                                <div>
                                    <input type="text" id="link" name="link" 
                                    placeholder="Đường dẫn" style="width:100%"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Vị trí</label>
                                <div>
                                    <select id="position" name="position" class="select2"
                                    data-placeholder="Lựa chọn vị trí" style="width:100%">
                                        <option value="1">Menu top</option>
                                        <option value="2">Menu bottom</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="form-field-username">Thứ tự hiển thị</label>
                                <div>
                                    <input type="text" id="order_menu" name="order_menu" required="" 
                                    placeholder="Thứ tự hiển thị menu" style="width:100%"
                                    onkeypress="validate(event)"/>
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
<div id="modal-blogs" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    Danh sách bài viết
                </div>
            </div>
            <div class="modal-body" style="height:520px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <input class="form-control" id="nav-search-input-blogs" type="text" style="width:100%"
                        placeholder="Tìm kiếm" onkeyup="search_blogs()"/>
                    </div>
                    <div class="col-xs-12">
                        <div class="space-6"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div id="list_blogs" class="dataTables_wrapper form-inline no-footer"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-right" id="pager_blogs">
                    <!--display pagination-->
                </small>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<!--Form don vi tinh-->
<div id="modal-pro" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">×</span>
                    </button>
                    Danh sách sản phẩm
                </div>
            </div>
            <div class="modal-body" style="height:520px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <input class="form-control" id="nav-search-input-pro" type="text" style="width:100%"
                        placeholder="Tìm kiếm" onkeyup="search_pro()"/>
                    </div>
                    <div class="col-xs-12">
                        <div class="space-6"></div>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div id="list_product" class="dataTables_wrapper form-inline no-footer"></div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="modal-footer">
                <small class="pull-right" id="pager_pro">
                    <!--display pagination-->
                </small>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End formm don vi tinh-->

<script src="<?php echo URL.'/public/' ?>scripts/menu/index.js"></script>