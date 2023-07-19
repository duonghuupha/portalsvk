<?php
class Block_four_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_info(){
        $query = $this->db->query("SELECT * FROM tbl_block_4 WHERE id = 1");
        return $query->fetchAll();
    }

    function updateObj($data){
        $query = $this->update("tbl_block_4", $data, "id = 1");
        return $query;
    }

    function get_all_cate(){
        $query = $this->db->query("SELECT id, title FROM tbl_category WHERE status = 1");
        return $query->fetchAll();
    }
}
?>