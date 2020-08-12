    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSudi extends CI_Model{
    function AddData($tabel, $data=array())
    {
        $this->db->insert($tabel,$data);
    }

    function UpdateData($tabel,$fieldid,$fieldvalue,$data=array())
    {
        $this->db->where($fieldid,$fieldvalue)->update($tabel,$data);
    }

    function DeleteData($tabel,$fieldid,$fieldvalue)
    {
        $this->db->where($fieldid,$fieldvalue)->delete($tabel);
    }

    function GetData($tabel)
    {
        $query= $this->db->get($tabel);
        return $query->result();
    }

    // function GetPhoto($foto, $tabel, $id, $val)
    // {
    //     $this->db->select($foto);
    //     $this->db->from($tabel);
    //     $this->db->where($id, $val);
    //     return $this->db->get()->result();
    // }

    function GetDataWhere($tabel,$id,$nilai)
    {
        $this->db->where($id,$nilai);
        $query= $this->db->get($tabel);
        return $query;
    }

    function GetDataJoin($tbl1, $tbl2, $param){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->join($tbl2, $param);
        $query = $this->db->get();
        return $query->result();
    }

    function GetData2Join($tbl1, $tbl2, $tbl3, $param){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->from($tbl2);
        $this->db->join($tbl3, $param);
        $query = $this->db->get();
        return $query->result();
    }

    function GetData3Join($tbl1, $tbl2, $tbl3, $tbl4, $param){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->from($tbl2);
        $this->db->from($tbl3);
        $this->db->join($tbl4, $param);
        $query = $this->db->get();
        return $query->result();
    }

    function GetData3JoinWhere($tbl1, $tbl2, $tbl3, $tbl4, $param, $id, $data){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->from($tbl2);
        $this->db->from($tbl3);
        $this->db->join($tbl4, $param);
        $this->db->where($id, $data);
        $query = $this->db->get();
        return $query;
    }

    function GetDataJoinWhere($tbl1, $tbl2, $param, $id, $data){
        $this->db->select('*');
        $this->db->from($tbl1);
        $this->db->join($tbl2, $param);
        $this->db->where($id, $data);
        $query = $this->db->get();
        return $query;
    }

}