<?php
class Blogs extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');
        $this->view->render('blogs/index');
        require('layouts/footer.php');
    }

    function json(){
        $rows = 15;
        $keyword = isset($_REQUEST['q']) ? str_replace("$", " ", $_REQUEST['q']) : '';
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($keyword, $offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $this->view->render('blogs/json');
    }

    function add(){
        $code = time(); $cate = $_REQUEST['cate_id']; $title = addslashes($_REQUEST['title']);
        $desc = addslashes($_REQUEST['description']);
        $content = addslashes($_REQUEST['noidung']);
        $image = $this->_Convert->convert_file($_FILES['image']['name'], 'content_blogs');
        $create_at = date("Y-m-d H:i:s"); $active = 1;
        $display = (isset($_REQUEST['display_img_detail']) && $_REQUEST['display_img_detail'] != '') ? 0 : 1;
        $data = array("code" => $code, "cate_id" => $cate, "title" => $title, "description" => $desc,
                        "content" => $content, "image" => $image, "create_at" => $create_at, 
                        "status" => $active, "display_img_detail" => $display);
        $temp = $this->model->addObj($data);
        if($temp){
            if(move_uploaded_file($_FILES['image']['tmp_name'], DIR_UPLOAD.'/images/blogs/content/'.$image)){
                $jsonObj['msg'] = "Ghi dữ liệu thành công";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Quá trình tải ảnh đại diện không thành công. Nội dung bài viết đã được lưu";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render('blogs/add');
    }

    function update(){
        $id = base64_decode($_REQUEST['id']); $cate = $_REQUEST['cate_id']; $title = addslashes($_REQUEST['title']);
        $desc = addslashes($_REQUEST['description']); $img = $_REQUEST['image_old'];
        $content = addslashes($_REQUEST['noidung']);
        $image = ($_FILES['image']['name'] != '') ? $this->_Convert->convert_file($_FILES['image']['name'], 'content_blog') : $img;
        $create_at = date("Y-m-d H:i:s"); $active = 1;
        $display = (isset($_REQUEST['display_img_detail']) && $_REQUEST['display_img_detail'] != '') ? 0 : 1;
        $data = array("cate_id" => $cate, "title" => $title, "description" => $desc,
                        "content" => $content, "image" => $image, "create_at" => $create_at,
                        "display_img_detail" => $display);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            if($_FILES['image']['name'] != ''){
                if(move_uploaded_file($_FILES['image']['tmp_name'], DIR_UPLOAD.'/images/blogs/content/'.$image)){
                    //// xoa anh cu ddi
                    unlink(DIR_UPLOAD.'/images/blogs/content/'.$img);
                    $jsonObj['msg'] = "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $jsonObj['msg'] = "Quá trình tải ảnh đại diện không thành công. Nội dung bài viết đã được lưu";
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
        $this->view->render('blogs/update');
    }

    function del(){
        $id = base64_decode($_REQUEST['id']);
        $detail = $this->model->get_info($id);
        $temp = $this->model->delObj($id);
        if($temp){
            unlink(DIR_UPLOAD.'/images/blogs/content/'.$detail[0]['image']);
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("blogs/del");
    }

    function change(){
        $id = base64_decode($_REQUEST['id']); $status = $_REQUEST['status'];
        $data = array('status' => $status);
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
        $this->view->render("blogs/change");
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function info(){
        $id = base64_decode($_REQUEST['id']);
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = json_encode($jsonObj[0]);
        $this->view->render('blogs/info');
    }
}