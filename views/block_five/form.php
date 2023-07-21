<?php
$item = $this->jsonObj;
?>
<div class="row">
    <form id="fm-block-5" method="post" enctype="multipart/form-data">
        <input id="image_old_block_5" name="image_old_block_5" type="hidden" value="<?php echo $item[0]['image'] ?>"/>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">Tiêu đề</label>
                <div>
                    <input type="text" id="title_block_5" name="title_block_5" class="form-control" style="width:100%"
                    required="" value="<?php echo $item[0]['title'] ?>"/>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">Lựa chọn danh mục</label>
                <div>
                    <textarea id="content_block_5" name="content_block_5" class="form-control" style="width:100%;height:150px;reize:none"
                    required=""><?php echo $item[0]['content'] ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">Hình ảnh (634 x 373)</label>
                <div>
                    <input type="file" id="image_block_5" name="image_block_5" class="file_attach" 
                    style="width:100%" onchange="check_size_block_5()"/>
                </div>
            </div>
        </div>
        <div class="col-xs-12 text-center">
            <button class="btn btn-sm btn-danger" onclick="window.location.reload()" type="button">
                <i class="ace-icon fa fa-times"></i>
                Hủy bỏ
            </button>
            <button class="btn btn-sm btn-primary" onclick="save_block_5()" type="button">
                <i class="ace-icon fa fa-save"></i>
                Ghi dữ liệu
            </button>
        </div>
    </form>
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