<?php
class Category_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_category");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, title, description, image, status, create_at FROM tbl_category
                                    ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_category", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_category", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_category", "id = $id");
        return $query;
    }
}
?>