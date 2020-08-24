<?php
class Model_gallery extends CI_Model
{
    public function tampilData(){
        return $this->db->get('tbl_gallery');
    }
    public function tambahGallery($data, $table){
        $this->db->insert($table,$data);
    }
    public function editGallery($where, $table){
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
        $this->db->from('tbl_gallery');
        $this->db->like('description', $keyword);
        
        
        return $this->db->get()->result();
    }


}