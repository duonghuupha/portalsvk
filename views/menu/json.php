<?php
$jsonObj = $this->jsonObj; $perpage = $this->perpage; $pages = $this->page;
$array_type_menu = ['Một bài viết', 'Danh sách bài viết', 'Liên hệ', 'Liên kết ngoài'];
?>
<table 
    id="dynamic-table" 
    class="table table-striped table-bordered table-hover dataTable no-footer" 
    role="grid"
    aria-describedby="dynamic-table_info">
    <thead>
        <tr role="row">
            <th class="text-center" style="width:20px">#</th>
            <th class="text-center" style="width:120px">Mã menu</th>
            <th class="">Danh mục cha</th>
            <th class="">Tiêu đề</th>
            <th class="text-center">Kiểu menu</th>
            <th class="text-center">Vị trí menu</th>
            <th class="text-center">Thứ tự <br/>hiển thị</th>
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
            <td><i><?php echo ($row['parent_id'] == 0) ? 'Danh mục gốc' : $this->_Data->return_title_menu_parent($row['parent_id)']) ?></i></td>
            <td id="title_<?php echo $row['id'] ?>"><?php echo $row['title'] ?></td>
            <td class="text-center"><?php echo $array_type_menu[$row['type_menu']- 1] ?></td>
            <td class="text-center"><?php echo ($row['position'] == 1) ? 'Menu top' : 'Menu bottom' ?></td>
            <td class="text-center" id="ordermenu_<?php echo $row['id'] ?>"><?php echo $row['order_menu'] ?></td>
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
                    <a class="green" href="javascript:void(0)" onclick="edit(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                    </a>
                    <a class="red" href="javascript:void(0)" onclick="del(<?php echo $row['id'] ?>)">
                        <i class="ace-icon fa fa-trash bigger-130"></i>
                    </a>
                </div>
            </td>
            <td class="hidden" id="parent_<?php echo $row['id'] ?>"><?php echo $row['parent_id'] ?></td>
            <td class="hidden" id="type_<?php echo $row['id'] ?>"><?php echo $row['type_menu'] ?></td>
            <td class="hidden" id="link_<?php echo $row['id'] ?>"><?php echo $row['link'] ?></td>
            <td class="hidden" id="position_<?php echo $row['id'] ?>"><?php echo $row['position'] ?></td>
            <td class="hidden" id="single_<?php echo $row['id'] ?>"><?php echo $row['single_type'] ?></td>
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
            $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 'view_page_menu', 1);
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