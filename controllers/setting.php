<?php
class Setting extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/header.php');

        $jsonObj= $this->model->getFetObj();
        $this->view->jsonObj = $jsonObj;

        $this->view->render("setting/index");
        require('layouts/footer.php');
    }

    function update(){
        $timework = $_REQUEST['time_work']; $address = $_REQUEST['address']; $district = $_REQUEST['district'];
        $city = $_REQUEST['city']; $phone = $_REQUEST['phone']; $hotline = $_REQUEST['hotline'];
        $email = $_REQUEST['email']; $facebook = $_REQUEST['facebook']; $twiter = $_REQUEST['twiter'];
        $instagram = $_REQUEST['instagram']; $img_old = $_REQUEST['image_old'];
        $logo = ($_FILES['image_logo']['name'] != '') ? $this->_Convert->convert_file($_FILES['image_logo']['name'], 'img_logo') : $img_old;
        $data = array("time_work" => $timework, "address" => $address, "district" => $district, "city" => $city,
                        "phone" => $phone, "hotline" => $hotline, "email" => $email, "facebook" => $facebook,
                        "twiter" => $twiter, "instagram" => $instagram, "image_logo" => $logo);
        $temp = $this->model->updateObj($data);
        if($temp){
            if($_FILES['image_logo']['name'] != ''){
                move_uploaded_file($_FILES['image_logo']['tmp_name'], DIR_UPLOAD.'/images/other/'.$logo);
            }
            $jsonObj['msg']= "Cập nhật dữ liệu thành công";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg']= "Cập nhật dữ liệu không thành công";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("setting/update");
    }
}
?>
