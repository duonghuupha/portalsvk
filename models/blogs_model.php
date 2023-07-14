<?php
class Blogs_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_content WHERE title LIKE '%$q%'");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, title, description, image, status, create_at FROM tbl_content
                                    WHERE title LIKE '%$q%' ORDER BY id DESC LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows']  = $query->fetchAll();
        return $result;
    }

    function get_info($id){
        $query = $this->db->query("SELECT * FROM tbl_content WHERE id = $id");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function addObj($data){
        $query = $this->insert("tbl_content", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_content", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_content", "id = $id");
        return $query;
    }
}
?>