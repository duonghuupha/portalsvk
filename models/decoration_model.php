<?php
class Decoration_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj(){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_block");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title, url_file, order_block, status
                                    FROM tbl_block ORDER BY order_block ASC");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_block", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_block", $data, "id = $id");
        return $query;
    }
}
?>