<?php
    class Model_dashboard extends CI_Model{
        public function getCountGallery(){
            $sql = "SELECT COUNT(id_gallery) AS id_gallery FROM tbl_gallery";
            $result = $this->db->query($sql);
            return $result->row()->id_gallery;
        }

        public function getCountMakanan(){
            $sql = "SELECT COUNT(id_makanan) AS id_makanan FROM tbl_makanan";
            $result = $this->db->query($sql);
            return $result->row()->id_makanan;
        }
        public function getCountMinuman(){
            $sql = "SELECT COUNT(id_minuman) AS id_minuman FROM tbl_minuman";
            $result = $this->db->query($sql);
            return $result->row()->id_minuman;
        }
        public function getCountLainya(){
            $sql = "SELECT COUNT(id_lainya) AS id_lainya FROM tbl_lainya";
            $result = $this->db->query($sql);
            return $result->row()->id_lainya;
        }
        public function getCountAll(){
            return $this->getCountMakanan() + $this->getCountMinuman() + $this->getCountLainya();
        }
        public function getCountSlider(){
            $sql = "SELECT COUNT(id_slider) AS id_slider FROM tbl_slider";
            $result = $this->db->query($sql);
            return $result->row()->id_slider;
        }
        public function getCountTestimoni(){
            $sql = "SELECT COUNT(id_testimoni) AS id_testimoni FROM tbl_testimoni";
            $result = $this->db->query($sql);
            return $result->row()->id_testimoni;
        }
        
    }
?>