<?php
class Block_five extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function form(){
        $jsonObj= $this->model->get_info();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("block_five/form");
    }

    function update(){
        $title = $_REQUEST['title_block_5']; $content = $_REQUEST['content_block_5'];
        $image_old = $_REQUEST['image_old_block_5'];
        $image = ($_FILES['image_block_5']['name'] != '') ? $this->_Convert->convert_file($_FILES['image_block_5']['name'], "image_block_5") : $image_old;
        $data = array("title" => $title, "content" => $content, "image" => $image);
        $temp = $this->model->updateObj($data);
        if($temp){
            if($_FILES['image_block_5']['name'] != ''){
                move_uploaded_file($_FILES['image_block_5']['tmp_name'], DIR_UPLOAD.'/images/block/'.$image);
            }
            $jsonObj['msg']= "Cập nhật dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg']= "Cập nhật dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("block_five/update");
    }
}
?>
