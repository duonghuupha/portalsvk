<div class="modal-header no-padding">
    <div class="table-header">
        Thêm mới - Cập nhật thông tin block 3
    </div>
</div>
<div class="modal-body">
    <div class="row">
        <form id="fm-block-3" method="post" enctype="multipart/form-data">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="form-field-username">Tiêu đề</label>
                    <div>
                        <input type="text" id="title_block_3" name="title_block_3" class="form-control" style="width:100%"
                        required="" value="<?php echo (isset($_REQUEST['id'])) ? $this->jsonObj[0]['title'] : '' ?>"/>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="form-field-username">Đường dẫn</label>
                    <div>
                        <input type="text" id="link_block_3" name="link_block_3" class="form-control" style="width:100%"
                        required="" value="<?php echo (isset($_REQUEST['id'])) ? $this->jsonObj[0]['link'] : '' ?>"/>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="form-field-username">Nội dung</label>
                    <div>
                        <textarea id="content_block_3" name="content_block_3" class="form-control" 
                        style="width:100%; height:100px;resize:none" required=""><?php echo (isset($_REQUEST['id'])) ? $this->jsonObj[0]['content'] : '' ?></textarea>
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
    <button class="btn btn-sm btn-primary pull-right" onclick="save_block_3()">
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