<?php
class Decoration extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('decoration/index');
        require('layouts/footer.php');
    }

    function json(){
        $rows = 15;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj();
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('decoration/json');
    }

    function add(){
        $code = time(); $title = $_REQUEST['title']; $urlfile = $_REQUEST['url_file'];
        $orderblock = $_REQUEST['order_block']; $status = 1;
        $data = array("code" => $code, "title" => $title, "url_file" => $urlfile,
                        "order_block" => $orderblock, "status" => $status);
        $temp = $this->model->addObj($data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success']= true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success']= false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("decoration/add");
    }

    function change(){
        $id = base64_decode($_REQUEST['id']); $type = $_REQUEST['type'];
        if($type== 1){
            $status = $_REQUEST['status'];
            $data = array("status" => $status);
        }else{
            $value = $_REQUEST['value'];
            $data = array("order_block" => $value);
        }
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success']= true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success']= false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("decoration/change");
    }
}
?>