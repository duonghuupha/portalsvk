<?php
class Block_ten extends Controller{
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
        $this->view->render('block_ten/json');
    }

    function add(){
        $code = time(); $title = $_REQUEST['title_block_10']; $link = $_REQUEST['link_block_10'];
        $image = $this->_Convert->convert_file($_FILES['image_block_10']['name'], 'image_block_10');
        $data = array("image" => $image, "status"=> 1, "code" => $code, "create_at" => date("Y-m-d H:i:s"),
                        "title" => $title, "link" => $link);
        $temp = $this->model->addObj($data);
        if($temp){
            move_uploaded_file($_FILES['image_block_10']['tmp_name'], DIR_UPLOAD.'/images/block/'.$image);
            $jsonObj['msg'] = "Ghi dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Ghi dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("block_ten/add");
    }

    function update(){
        $id = base64_decode($_REQUEST['id']); $image_old = $_REQUEST['image_old_block_10'];
        $title = $_REQUEST['title_block_10']; $link = $_REQUEST['link_block_10'];
        $image = ($_FILES['image_block_10']['name'] != '') ? $this->_Convert->convert_file($_FILES['image_block_10']['name'], 'image_block_10') : $image_old;
        $data = array("image" => $image, "create_at" => date("Y-m-d H:i:s"), "title" => $title,
                        "link" => $link);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            if($_FILES['image_block_10']['name'] != ''){
                if(move_uploaded_file($_FILES['image_block_10']['tmp_name'], DIR_UPLOAD.'/images/block/'.$image)){
                    unlink(DIR_UPLOAD.'/images/block/'.$image_old);
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
        $this->view->render("block_ten/update");
    }

    function del(){
        $id = base64_decode($_REQUEST['id']);
        $detail = $this->model->get_info($id);
        $temp = $this->model->delObj($id);
        if($temp){
            // xoa anh trong folder
            if(file_exists(DIR_UPLOAD.'/images/block/'.$detail[0]['image'])){
                unlink(DIR_UPLOAD.'/images/block/'.$detail[0]['image']);
            }
            $jsonObj['msg'] = "Xóa dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Xóa dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("block_ten/del");
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
        $this->view->render("block_ten/change");
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
        $this->view->render("block_ten/form");
    }
}
?>
