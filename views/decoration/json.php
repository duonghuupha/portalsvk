<?php
$jsonObj = $this->jsonObj; $perpage = $this->perpage; $pages = $this->page;
?>
<table 
    id="dynamic-table" 
    class="table table-striped table-bordered table-hover dataTable no-footer" 
    role="grid"
    aria-describedby="dynamic-table_info">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px">#</th>
            <th class="text-center" style="width:120px">Mã block</th>
            <th class="">Tiêu đề</th>
            <th class="text-center">Thứ tự</th>
            <th class="text-center" style="width:80px;">Kích hoạt</th>
            <th class="text-center" style="width:80px;">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach($jsonObj['rows'] as $row){
            $i++;
            $class = ($i%2 == 0) ? 'even' : 'odd'; 
        ?>
        <tr role="row" class="<?php echo $class ?>">
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center"><?php echo $row['code'] ?></td>
            <td>
                <?php echo $row['title'] ?>         
            </td>
            <td class="text-center" style="cursor: pointer" ondblclick="edit_cell(<?php echo $row['id'].', '.$row['order_block'] ?>)">
                <span id="orderblock_<?php echo $row['id'] ?>"><?php echo $row['order_block'] ?></span>
                <input id="order_<?php echo $row['id'] ?>" name="order_<?php echo $row['id'] ?>"
                value="<?php echo $row['order_block'] ?>" type="text" onkeypress="validate(event)"
                size="5" style="text-align:center;display:none" class="form-control order_block"/>
            </td>
            <td class="text-center">
                <?php
                if($row['status'] == 1){
                    echo '<a href="javascript:void(0)" onclick="change('.$row['id'].', 0)"><img src="'.URL.'/styles/images/publish.png"/></a>';
                }else{
                    echo '<a href="javascript:void(0)" onclick="change('.$row['id'].', 1)"><img src="'.URL.'/styles/images/unpublish.png"/></a>';

                }
                ?>
            </td>
            <td class="text-center">
                <div class="action-buttons">
                    <a class="green" href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)" id="btn_edit_<?php echo $row['id'] ?>">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <a class="blue" href="javascript:void(0)" onclick="save_cell(<?php echo $row['id'] ?>)" id="btn_save_<?php echo $row['id'] ?>"
                    style="display:none">
                        <i class="ace-icon fa fa-save bigger-130"></i>
                    </a>
                </div>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<div class="row mini">
    <div class="col-xs-12 col-sm-6">
        <div class="dataTables_info" id="dynamic-table_info" role="status" aria-live="polite">
            <?php echo $this->_Convert->return_show_entries($jsonObj['total'], $perpage,  $pages) ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6">
        <?php
        if($jsonObj['total'] > $perpage){
            $pagination = $this->_Convert->pagination($jsonObj['total'], $pages, $perpage);
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_decoration', 1);
        ?>
        <div class="dataTables_paginate paging_simple_numbers" id="dynamic-table_paginate">
            <ul class="pagination">
                <?php echo $createlink ?>
            </ul>
        </div>
        <?php
        }
        ?>
    </div>
</div>