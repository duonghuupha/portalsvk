<?php
class Users extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('users/index');
        require('layouts/footer.php');
    }

    function json(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('users/json');
    }

    function add(){
        $code = time(); $username = $_REQUEST['username']; $pass = $_REQUEST['pass'];
        $repass = $_REQUEST['repass']; $fullname = $_REQUEST['fullname']; $status = 1;
        if($this->model->dupliObj(0, $username) > 0){
            $jsonObj['msg']= "Tên đăng nhập đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            if(sha1($pass) != sha1($repass)){
                $jsonObj['msg'] = "Xác nhận mật khẩu không chính xác";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $data = array("code" => $code, "username" => $username, "password" => sha1($pass),
                            "fullname" => $fullname, "roles" => "", "status" => $status);
                $temp = $this->model->addObj($data);
                if($temp){
                    $jsonObj['msg']="Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $jsonObj['msg']="Ghi dữ liệu không thành công";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }
        }
        $this->view->render('users/add');
    }

    function update(){
        $id = base64_decode($_REQUEST['id']); $username= $_REQUEST['username_edit'];
        $fullname = $_REQUEST['fullname_edit'];
        if($this->model->dupliObj($id, $username) > 0){
            $jsonObj['msg'] = "Tên đăng nhập đã tồn tại";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("username" => $username, "fullname" => $fullname);
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
        }
        $this->view->render('users/update');
    }

    function update_pass(){
        $id = base64_decode($_REQUEST['id']); $pass = $_REQUEST['pass_edit'];
        $repass = $_REQUEST['repass_edit'];
        if(sha1($pass) != sha1($repass)){
            $jsonObj['msg'] = "Xác nhận mật khẩu không chính xác";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("password" => sha1($pass));
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
        }
        $this->view->render("users/update_pass");
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
        $this->view->render('users/del');
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
        $this->view->render('users/change');
    }
}