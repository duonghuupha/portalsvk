<?php
class Menu extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('menu/index');
        require('layouts/footer.php');
    }

    function json(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('menu/json');
    }

    function add(){
        $code = time(); $parent_id = (isset($_REQUEST['parent_id']) && $_REQUEST['parent_id'] != '') ? $_REQUEST['parent_id'] : 0; 
        $title = $_REQUEST['title']; $typemenu = $_REQUEST['type_menu']; $position = $_REQUEST['position'];
        $order_menu = $_REQUEST['order_menu']; $active = 1;
        if($typemenu == 1){// mot bai viet
            $link = $_REQUEST['blog_id'];
        }elseif($typemenu == 2){ // danh sach bai viet
            $link = implode(",", $_REQUEST['blog_cate']);
        }elseif($typemenu == 3){ // Lien he
            $link = '';
        }elseif($typemenu == 4){ // Lien ket ngoai
            $link = $_REQUEST['link'];
        }
        $data = array("code" => $code, "parent_id" => $parent_id, "title" => $title, "type_menu" => $typemenu,
                        "link" => $link, "position" => $position, "order_menu" => $order_menu, "status" => $active,
                        "create_at" => date("Y-m-d H:i:s"));
        $temp = $this->model->addObj($data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("menu/add");
    }

    function update(){
        $id = base64_decode($_REQUEST['id']); $parent_id = (isset($_REQUEST['parent_id']) && $_REQUEST['parent_id'] != '') ? $_REQUEST['parent_id'] : 0; 
        $title = $_REQUEST['title']; $typemenu = $_REQUEST['type_menu']; $position = $_REQUEST['position'];
        $order_menu = $_REQUEST['order_menu'];
        if($typemenu == 1){// mot bai viet
            $link = $_REQUEST['blog_id'];
        }elseif($typemenu == 2){ // danh sach bai viet
            $link = implode(",", $_REQUEST['blog_cate']);
        }elseif($typemenu == 3){ // Lien he
            $link = '';
        }elseif($typemenu == 4){ // Lien ket ngoai
            $link = $_REQUEST['link'];
        }
        $data = array("parent_id" => $parent_id, "title" => $title, "type_menu" => $typemenu,
                        "link" => $link, "position" => $position, "order_menu" => $order_menu);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("menu/update");
    }

    function del(){
        $id = base64_decode($_REQUEST['id']);
        $temp = $this->model->delObj($id);
        if($temp){
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render('menu/del');
    }

    function change(){
        $id = base64_decode($_REQUEST['id']); $status = $_REQUEST['status'];
        $data = array('status' => $status);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $jsonObj['msg'] = "Cập nhật trạng thái thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Cập nhật trạng thái không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render('menu/change');
    }
//////////////////////////////////////////////////////////////////////////////////////////////////
    function list_blogs(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_blogs($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; //$this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('menu/list_blogs');
    }

    function list_blogs_page(){
        $rows = 10;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->get_data_blogs_total($keyword);
        $this->view->total = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('menu/list_blogs_page');
    }
}
?>
