<?php
$item = $this->jsonObj;
?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Trang chủ</a>
                </li>
                <li class="active">Cài đặt</li>
            </ul><!-- /.breadcrumb -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Cài đặt thông tin chung website
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <form id="fm" method="post" enctype="multipart/form-data">
                    <input id="image_old" name="image_old" type="hidden" value="<?php echo $item[0]['image_logo'] ?>"/>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">Giờ làm việc</label>
                            <div>
                                <input name="time_work" id="time_work" required="" class="form-control"
                                placeholder="Thời gian làm việc" style="width:100%" type="text"
                                value="<?php echo $item[0]['time_work'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">Địa chỉ</label>
                            <div>
                                <input name="address" id="address" required="" class="form-control"
                                placeholder="Địa chỉ" style="width:100%" type="text"value="<?php echo $item[0]['address'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">Quận/Huyện</label>
                            <div>
                                <input type="text" id="district" name="dsitrict" required="" class="form-control"
                                placeholder="Quận/Huyện" style="width:100%" value="<?php echo $item[0]['district'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">Tỉnh/Thành phố</label>
                            <div>
                                <input type="text" id="city" name="city" required=""class="form-control"
                                placeholder="Tỉnh/Thành phố" style="width:100%" value="<?php echo $item[0]['city'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">Điện thoại</label>
                            <div>
                                <input type="text" id="phone" name="phone" required=""class="form-control"
                                placeholder="Điện thoại" style="width:100%" value="<?php echo $item[0]['phone'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">Hotline</label>
                            <div>
                                <input type="text" id="hotline" name="hotline" required=""class="form-control"
                                placeholder="Hotline" style="width:100%" value="<?php echo $item[0]['hotline'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">Email</label>
                            <div>
                                <input type="text" id="email" name="email" required=""class="form-control"
                                placeholder="Email" style="width:100%" value="<?php echo $item[0]['email'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">Facebook</label>
                            <div>
                                <input type="text" id="facebook" name="facebook" required=""class="form-control"
                                placeholder="Facebook" style="width:100%" value="<?php echo $item[0]['facebook'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">Twitter</label>
                            <div>
                                <input type="text" id="twiter" name="twiter" required=""class="form-control"
                                placeholder="Twitter" style="width:100%" value="<?php echo $item[0]['twiter'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">Instagram</label>
                            <div>
                                <input type="text" id="instagram" name="instagram" required=""class="form-control"
                                placeholder="Instagram" style="width:100%" value="<?php echo $item[0]['instagram'] ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="form-field-username">Logo</label>
                            <div>
                                <input type="file" id="image_logo" name="image_logo" class="file_attach" style="width:100%" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 text-center">
                        <button class="btn btn-sm btn-danger" onclick="window.location.href='/'" type="button">
                            <i class="ace-icon fa fa-times"></i>
                            Hủy bỏ
                        </button>
                        <button class="btn btn-sm btn-primary" onclick="save()" type="button">
                            <i class="ace-icon fa fa-save"></i>
                            Ghi dữ liệu
                        </button>
                    </div>
                </form>
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<script src="<?php echo URL.'/public/' ?>scripts/setting/index.js"></script>