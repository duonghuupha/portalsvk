<?php
class Slide_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_block_1");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, image, status, create_at FROM tbl_block_1
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows']  = $query->fetchAll();
        return $result;
    }

    function get_info($id){
        $query = $this->db->query("SELECT * FROM tbl_block_1 WHERE id = $id");
        return $query->fetchAll();
    }

    function addObj($data){
        $query = $this->insert("tbl_block_1", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_block_1", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_block_1", "id = $id");
        return $query;
    }
}
?>