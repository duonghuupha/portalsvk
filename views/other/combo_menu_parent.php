<option value="">Lựa chọn menu</option>
<?php
foreach($this->jsonObj as $row){
    echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
}
?>