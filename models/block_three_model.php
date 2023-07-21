<?php
class Block_three_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_block_3");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title, link, status FROM tbl_block_3
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_block_3", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_block_3", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_block_3", "id = $id");
        return $query;
    }

    function get_info($id){
        $query = $this->db->query("SELECT * FROM tbl_block_3 WHERE id = $id");
        return $query->fetchAll();
    }

    function get_block_6_title(){
        $query = $this->db->query("SELECT * FROM tbl_block_3_title WHERE id = 1");
        return $query->fetchAll();
    }

    function updateObj_title($data){
        $query = $this->update("tbl_block_3_title", $data, "id = 1");
        return $query;
    }
}
?>