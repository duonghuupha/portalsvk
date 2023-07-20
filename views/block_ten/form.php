<div class="modal-header no-padding">
    <div class="table-header">
        Thêm mới - Cập nhật thông tin block 10
    </div>
</div>
<div class="modal-body">
    <div class="row">
        <form id="fm-block-10" method="post" enctype="multipart/form-data">
            <input id="image_old_block_10" name="image_old_block_10" type="hidden" value="<?php echo (isset($_REQUEST['id'])) ? $this->jsonObj[0]['image'] : '' ?>"/>
            <?php
            if(isset($_REQUEST['id'])){
            ?>
            <div class="col-xs-12">
                <img src="<?php echo URL.'/public/images/block/'.$this->jsonObj[0]['image'] ?>" width="10%"/>
            </div>
            <?php
            }
            ?>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="form-field-username">Tiêu đề</label>
                    <div>
                        <input type="text" id="title_block_10" name="title_block_10" class="form-control" style="width:100%"
                        required=""/>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="form-field-username">Đường dẫn</label>
                    <div>
                        <input type="text" id="link_block_10" name="link_block_10" class="form-control" style="width:100%"
                        required="" onchange="check_size_block_10()"/>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="form-field-username">Hình ảnh</label>
                    <div>
                        <input type="file" id="image_block_10" name="image_block_10" class="file_attach" style="width:100%"
                        <?php echo (isset($_REQUEST['id'])) ? 'required=""' : '' ?>/>
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
    <button class="btn btn-sm btn-primary pull-right" onclick="save_block_10()">
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