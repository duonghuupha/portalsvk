<?php
class Category extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('category/index');
        require('layouts/footer.php');
    }

    function json(){
        $rows = 10;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('category/json');
    }

    function add(){
        $code = time();
        $title = $_REQUEST['title']; $description = addslashes($_REQUEST['description']);
        $image = ($_FILES['image']['name'] != '') ? $this->_Convert->convert_file($_FILES['image']['name'], $this->_Convert->vn2latin($title, true)) : '';
        $data = array("title" => $title, "description" => $description, "image" => $image,
                        "status"=> 1, "code" => $code, "create_at" => date("Y-m-d H:i:s"));
        $temp = $this->model->addObj($data);
        if($temp){
            if($_FILES['image']['name'] != ''){
                if(move_uploaded_file($_FILES['image']['tmp_name'], DIR_UPLOAD.'/images/category/'.$image)){
                    $jsonObj['msg'] = "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $data_u = array("image" => "");
                    $this->model->updateObj_by_code($code, $data_u);
                    $jsonObj['msg'] = "Quá trình tải ảnh không thành công, thông tin danh mục đã được lưu";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
                
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("category/add");
    }

    function update(){
        $id = base64_decode($_REQUEST['id']); $image_old = $_REQUEST['image_old'];
        $title = $_REQUEST['title']; $description = addslashes($_REQUEST['description']);
        $image = ($_FILES['image']['name'] != '') ? $this->_Convert->convert_file($_FILES['image']['name'], $this->_Convert->vn2latin($title, true)) : $image_old;
        $data = array("title" => $title, "description" => $description, "image" => $image,
                    "create_at" => date("Y-m-d H:i:s"));
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            if($_FILES['image']['name'] != ''){
                if(move_uploaded_file($_FILES['image']['tmp_name'], DIR_UPLOAD.'/images/category/'.$image)){
                    unlink(DIR_UPLOAD.'/images/category/'.$image_old);
                    $jsonObj['msg'] = "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $data_u = array("image" => $image_old);
                    $this->model->updateObj($id, $data_u);
                    $jsonObj['msg'] = "Quá trình tải ảnh không thành công, thông tin danh mục đã được lưu";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
                
            }else{
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("category/update");
    }

    function del(){
        $id = base64_decode($_REQUEST['id']);
        $detail = $this->model->get_info($id);
        $temp = $this->model->delObj($id);
        if($temp){
            // xoa anh trong folder
            if(file_exists(DIR_UPLOAD.'/images/category/'.$detail[0]['image'])){
                unlink(DIR_UPLOAD.'/images/category/'.$detail[0]['image']);
            }
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("category/del");
    }

    function change(){
        $id = base64_decode($_REQUEST['id']); $status= $_REQUEST['status'];
        $data = array("status" => $status);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $jsonObj['msg'] = "Cập nhật dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Cập nhật dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("category/change");
    }
}
?>
