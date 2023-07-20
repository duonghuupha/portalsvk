<?php
$item = $this->jsonObj; $array = explode(",", $item[0]['link']);
?>
<div class="row">
    <form id="fm-block-9" method="post" enctype="multipart/form-data">
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">Tiêu đề</label>
                <div>
                    <input type="text" id="title_block_9" name="title_block_9" class="form-control" style="width:100%"
                    required="" value="<?php echo $item[0]['title'] ?>"/>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <label for="form-field-username">Lựa chọn danh mục</label>
                <div>
                    <select id="link_block_9" name="link_block_9[]" class="select2" style="width:100%"
                    required="" data-placeholder="Lựa chọn danh mục" multiple="">
                        <option value="">Lựa chọn danh mục</option>
                        <?php
                        foreach($this->cate as $row){
                            $selected = in_array($row['id'], $array) ? 'selected=""' : '';
                            echo '<option value="'.$row['id'].'" '.$selected.'>'.$row['title'].'</option>';
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
            <button class="btn btn-sm btn-primary" onclick="save_block_9()" type="button">
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