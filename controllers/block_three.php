<?php
class Block_three extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function json(){
        $rows = 5;
        $get_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        $offset = ($get_pages-1)*$rows;
        $jsonObj = $this->model->getFetObj($offset, $rows);
        $this->view->jsonObj = $jsonObj; $this->view->perpage = $rows; $this->view->page = $get_pages;
        $json = $this->model->get_block_3_title();
        $this->view->json = $json;
        $this->view->render('block_three/json');
    }

    function add(){
        $code = time(); $title = $_REQUEST['title_block_3']; $link = $_REQUEST['link_block_3'];
        $content = $_REQUEST['content_block_3'];
        $data = array("content" => $content, "status"=> 1, "code" => $code, "create_at" => date("Y-m-d H:i:s"),
                        "title" => $title, "link" => $link);
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
        $this->view->render("block_three/add");
    }

    function update(){
        $id = base64_decode($_REQUEST['id']); $content = $_REQUEST['content_block_3'];
        $title = $_REQUEST['title_block_3']; $link = $_REQUEST['link_block_3'];
        $data = array("content" => $content, "create_at" => date("Y-m-d H:i:s"), "title" => $title,
                    "link" => $link);
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
        $this->view->render("block_three/update");
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
        $this->view->render("block_three/del");
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
        $this->view->render("block_three/change");
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function form(){
        if(isset($_REQUEST['id'])){
            $id = base64_decode($_REQUEST['id']);
            $jsonObj= $this->model->get_info($id);
            $this->view->jsonObj = $jsonObj;
        }else{
            $this->view->jsonObj = [];
        }
        $this->view->render("block_three/form");
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////
    function update_global(){
        $title = $_REQUEST['title_block_3_global']; $img_old = $_REQUEST['image_old_block_3_global'];
        $image = ($_FILES['image_block_3_global']['name'] != '') ? $this->_Convert->convert_file($_FILES['image_block_3_global']['name'], 'image_block_3') : $img_old;
        if($img_old == '' && $_FILES['image_block_3_global']['name'] == ''){
            $jsonObj['msg'] = "Chưa chọn hình ảnh";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $data = array("title" => $title, "image" => $image);
            $temp = $this->model->updateObj_title($data);
            if($temp){
                if($_FILES['image_block_3_global']['name'] != ''){
                    unlink(DIR_UPLOAD.'/images/block/'.$img_old);
                    if(move_uploaded_file($_FILES['image_block_3_global']['tmp_name'], DIR_UPLOAD.'/images/block/'.$image)){
                        $jsonObj['msg'] = "Ghi dữ liệu thành công";
                        $jsonObj['success'] = true;
                        $this->view->jsonObj  = json_encode($jsonObj);
                    }else{
                        $jsonObj['msg'] = "Quá trình tải ảnh gặp lỗi, thông tin tiêu đề đã được lưu";
                        $jsonObj['success'] = true;
                        $this->view->jsonObj  = json_encode($jsonObj);
                    }
                }else{
                    $jsonObj['msg'] = "Ghi dữ liệu thành công";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj  = json_encode($jsonObj);
                }
            }
        }
        $this->view->render("block_three/update_global");
    }
}
?>
