<?php
class Other extends Controller{
    function __construct(){
        parent::__construct();
    }

    function combo_menu_parent(){
        $jsonObj = $this->model->get_menu_parent();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_menu_parent");
    }

    function combo_cate(){
        $jsonObj = $this->model->get_combo_cate();
        $this->view->jsonObj = $jsonObj;
        $this->view->render("other/combo_cate");
    }

}
?>
