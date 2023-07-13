<?php
class Menu_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_menu WHERE title LIKE '%$q%'");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, parent_id, title, type_menu, position, status, order_menu, link,
                                    IF(type_menu = 1, (SELECT tbl_content.title FROM tbl_content WHERE tbl_content.id = link),
                                    '') AS single_type 
                                    FROM tbl_menu WHERE title LIKE '%$q%' ORDER BY position, order_menu ASC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows']  = $query->fetchAll();
        return $result;
    }

    function addObj($data){
        $query = $this->insert("tbl_menu", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_menu", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_menu", "id = $id");
        return $query;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function get_data_blogs($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_content WHERE title LIKE '%$q%'
                                    AND status = 1");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT code, id, title FROM tbl_content WHERE title LIKE '%$q%'
                                    AND status = 1 LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows'] = $query->fetchAll();
        return $result;
    }

    function get_data_blogs_total($q){
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_content WHERE title LIKE '%$q%'
                                    AND status = 1");
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }
}
?>