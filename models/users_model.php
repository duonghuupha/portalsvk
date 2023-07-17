<?php
class Users_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function getFetObj($q, $offset, $rows){
        $result = array();
        $query = $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE id != 1
                                    AND fullname LIKE '%$q%'");
        $row = $query->fetchAll();
        $query = $this->db->query("SELECT id, code, username, fullname, status FROM tbl_users
                                    WHERE id != 1 AND fullname LIKE '%$q%' ORDER BY id DESC 
                                    LIMIT $offset, $rows");
        $result['total'] = $row[0]['Total'];
        $result['rows']  = $query->fetchAll();
        return $result;
    }

    function dupliObj($id, $username){
        $query= $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE username = '$username'");
        if($id > 0){
            $query= $this->db->query("SELECT COUNT(*) AS Total FROM tbl_users WHERE username = '$username'
                                        AND id != $id");
        }
        $row = $query->fetchAll();
        return $row[0]['Total'];
    }

    function get_info($id){
        $query = $this->db->query("SELECT * FROM tbl_users WHERE id = $id");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function addObj($data){
        $query = $this->insert("tbl_users", $data);
        return $query;
    }

    function updateObj($id, $data){
        $query = $this->update("tbl_users", $data, "id = $id");
        return $query;
    }

    function delObj($id){
        $query = $this->delete("tbl_users", "id = $id");
        return $query;
    }
}
?>