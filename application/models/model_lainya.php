<?php
class Model_lainya extends CI_Model
{
    public function tampilData(){
        return $this->db->get('tbl_lainya');
    }
    public function tambahProduk($data, $table){
        $this->db->insert($table,$data);
    }
    public function editProduk($where, $table){
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
        $this->db->from('tbl_lainya');
        $this->db->like('judul_produk', $keyword);
        $this->db->or_like('harga_asli', $keyword);
        
        
        return $this->db->get()->result();
    }
    
}