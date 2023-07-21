<?php
class Block_five_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function get_info(){
        $query = $this->db->query("SELECT * FROM tbl_block_5 WHERE id = 1");
        return $query->fetchAll();
    }

    function updateObj($data){
        $query = $this->update("tbl_block_5", $data, "id = 1");
        return $query;
    }
}
?>