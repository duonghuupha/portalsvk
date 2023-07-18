<div class="modal-header no-padding">
    <div class="table-header">
        Thêm mới - Cập nhật Ảnh Slide
    </div>
</div>
<div class="modal-body">
    <div class="row">
        <form id="fm-slide" method="post" enctype="multipart/form-data">
            <input id="image_old" name="image_old" type="hidden" value="<?php echo (isset($_REQUEST['id'])) ? $this->jsonObj[0]['image'] : '' ?>"/>
            <?php
            if(isset($_REQUEST['id'])){
            ?>
            <div class="col-xs-12">
                <img src="<?php echo URL.'/public/images/slide/'.$this->jsonObj[0]['image'] ?>" width="100%"/>
            </div>
            <?php
            }
            ?>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="form-field-username">Hình ảnh (1920 x 655)</label>
                    <div>
                        <input type="file" id="image_slide" name="image_slide" class="file_attach" style="width:100%"
                        required="" onchange="check_size()"/>
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
    <button class="btn btn-sm btn-primary pull-right" onclick="save_slide()">
        <i class="ace-icon fa fa-save"></i>
        Ghi dữ liệu
    </button>
</div>
<script type="text/javascript">
$(function(){
    $('.file_attach').ace_file_input({
        no_file:'Không có file ...',
        btn_choose:'Lựa chọn',
        btn_change:'Thay đổi',
        droppable:false,
        onchange:null,
        thumbnail:true
    });
})
</script>