<?php
class Model_slider extends CI_Model
{
    public function tampilData(){
        return $this->db->get('tbl_slider');
    }
    public function tambahSlider($data, $table){
        $this->db->insert($table,$data);
    }
    public function editSlider($where, $table){
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
        $this->db->from('tbl_slider');
        $this->db->like('judul', $keyword);
        $this->db->or_like('description', $keyword);
        
        
        return $this->db->get()->result();
    }
}