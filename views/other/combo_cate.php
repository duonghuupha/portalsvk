<option value="">Lựa chọn danh mục</option>
<?php
foreach($this->jsonObj as $row){
    echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
}
?>