<?php
class Block_four extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function form(){
        $jsonObj= $this->model->get_info();
        $this->view->jsonObj = $jsonObj;

        $cate= $this->model->get_all_cate();
        $this->view->cate = $cate;

        $this->view->render("block_four/form");
    }

    function update(){
        $title = $_REQUEST['title_block_4']; $link = $_REQUEST['link_block_4'];
        $data = array("title" => $title, "type_data" => 0, "link" => $link);
        $temp = $this->model->updateObj($data);
        if($temp){
            $jsonObj['msg']= "Cập nhật dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg']= "Cập nhật dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("block_four/update");
    }
}
?>
