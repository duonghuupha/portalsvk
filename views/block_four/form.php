<?php
$item = $this->jsonObj;
?>
<div class="row">
    <form id="fm-block-4" method="post" enctype="multipart/form-data">
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">Tiêu đề</label>
                <div>
                    <input type="text" id="title_block_4" name="title_block_4" class="form-control" style="width:100%"
                    required="" value="<?php echo $item[0]['title'] ?>"/>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">Lựa chọn danh mục</label>
                <div>
                    <select id="link_block_4" name="link_block_4" class="select2" style="width:100%"
                    required="" data-placeholder="Lựa chọn danh mục">
                        <option value="">Lựa chọn danh mục</option>
                        <?php
                        foreach($this->cate as $row){
                            echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 text-center">
            <button class="btn btn-sm btn-danger" onclick="window.location.reload()" type="button">
                <i class="ace-icon fa fa-times"></i>
                Hủy bỏ
            </button>
            <button class="btn btn-sm btn-primary" onclick="save_block_4()" type="button">
                <i class="ace-icon fa fa-save"></i>
                Ghi dữ liệu
            </button>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(){
        $('.select2').select2();
    });
</script>