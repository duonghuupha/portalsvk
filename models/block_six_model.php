<?php
class Block_six_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_block_6");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title, image, link, status FROM tbl_block_6
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_block_6", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_block_6", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_block_6", "id = $id");
        return $query;
    }

    function get_info($id){
        $query = $this->db->query("SELECT * FROM tbl_block_6 WHERE id = $id");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_block_6_title(){
        $query = $this->db->query("SELECT * FROM tbl_block_6_global WHERE id = 1");
        return $query->fetchAll();
    }

    function updateObj_title($data){
        $query = $this->update("tbl_block_6_global", $data, "id = 1");
        return $query;
    }
}
?>