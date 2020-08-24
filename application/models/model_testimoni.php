<?php
class Model_testimoni extends CI_Model
{
    public function tampilData(){
        return $this->db->get('tbl_testimoni');
    }
    public function tambahTestimoni($data, $table){
        $this->db->insert($table,$data);
    }
    public function editTestimoni($where, $table){
        return $this->db->get_where($table, $where);
    }
    public function updateData($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function hapusData($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getKeyword($keyword){
        $this->db->select('*');
        $this->db->from('tbl_testimoni');
        $this->db->like('nama_testimoni', $keyword);
        $this->db->or_like('kedudukan_testimoni', $keyword);
        
        
        return $this->db->get()->result();
    }
}