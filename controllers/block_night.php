<?php
class Block_night extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function form(){
        $jsonObj= $this->model->get_info_block();
        $this->view->jsonObj = $jsonObj;

        $cate = $this->model->get_all_cate();
        $this->view->cate = $cate;

        $this->view->render("block_night/form");
    }

    function update(){
        $title = $_REQUEST['title_block_9']; $link = implode(",", $_REQUEST['link_block_9']);
        $data = array("title" => $title, "link" => $link, "create_at" => date("Y-m-d H:i:s"));
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
        $this->view->render("block_night/update");
    }
}
?>
