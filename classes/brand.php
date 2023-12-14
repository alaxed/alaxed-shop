<?php

    include_once '../lib/database.php';
    include_once '../helper/format.php';
?>

<?php
    class brand{
        private $db;
        public $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();

        
        }    

        public function insert($brandName){
            $brandName = $this->fm->validation($brandName);
           

            $brandName = mysqli_real_escape_string($this->db->link, $brandName);
          

            if(empty($brandName) ){
                $alert = "Brand name must be not empty!";
                return $alert;
            }else{
                $query = "INSERT INTO `tbl_brand`(name) VALUES ('$brandName')";
                $rs = $this->db->insert($query);
                if($rs){
                    $alert = "Insert Brand successfully!";
                    return $alert;
                }else{
                    $alert = "Insert Brand not successfully!";
                    return $alert;
                }
            }
        }

        public function findAll(){
            $query = "SELECT * FROM tbl_brand ORDER BY id DESC";
            $rs = $this->db->insert($query);
            return $rs;
        }


        public function findById($id){
            $query = "SELECT * FROM tbl_brand WHERE id = '$id'";
            $rs = $this->db->insert($query);
            return $rs;
        }

        public function update($id,$brandName){
            $brandName = $this->fm->validation($brandName);
            $id = $this->fm->validation($id);
           

            $brandName = mysqli_real_escape_string($this->db->link, $brandName);
            $id = mysqli_real_escape_string($this->db->link, $id);
          

            if(empty($brandName) ){
                $alert = "Brand name must be not empty!";
                return $alert;
            }else{
                $query = "UPDATE tbl_brand SET name = '$brandName' WHERE  id = '$id'";
                $rs = $this->db->update($query);
                if($rs){
                    $alert = "Update Brand successfully!";
                    return $alert;
                }else{
                    $alert = "Update Brand not successfully!";
                    return $alert;
                }
            }
        }


        public function delByID($id){

            $id = $this->fm->validation($id);
           

           
            $id = mysqli_real_escape_string($this->db->link, $id);
          

           
                $query = "DELETE FROM tbl_brand WHERE id = '$id'";
                $rs = $this->db->delete($query);
                if($rs){
                    $alert = "Delete Brand successfully!";
                    return $alert;
                }else{
                    $alert = "Delete Brand not successfully!";
                    return $alert;
                }
            
        }

    }
?>