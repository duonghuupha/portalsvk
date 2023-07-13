<?php
class Other_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_combo_cate(){
        $query = $this->db->query("SELECT id, title FROM tbl_category WHERE status = 1");
        return $query->fetchAll();
    }

    function get_menu_parent(){
        $query = $this->db->query("SELECT id, title FROM tbl_menu WHERE status = 1 AND parent_id = 0");
        return $query->fetchAll();
    }
}
?>