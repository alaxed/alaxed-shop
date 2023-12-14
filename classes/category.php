<?php


include_once '../lib/database.php';
include_once '../helper/format.php';
?>

<?php
class category
{
    private $db;
    public $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();


    }

    public function insert($cateName)
    {
        $cateName = $this->fm->validation($cateName);


        $cateName = mysqli_real_escape_string($this->db->link, $cateName);


        if (empty($cateName)) {
            $alert = "Category name must be not empty!";
            return $alert;
        } else {
            $query = "INSERT INTO tbl_category (name) VALUES ('$cateName')";
            $rs = $this->db->insert($query);
            if ($rs) {
                $alert = "Insert Category successfully!";
                return $alert;
            } else {
                $alert = "Insert Category not successfully!";
                return $alert;
            }
        }
    }

    public function findAll()
    {
        $query = "SELECT * FROM tbl_category ORDER BY id DESC";
        $rs = $this->db->insert($query);
        return $rs;
    }


    public function findById($id)
    {
        $query = "SELECT * FROM tbl_category WHERE id = '$id' ";
        $rs = $this->db->insert($query);
        return $rs;
    }

    public function update($id, $cateName)
    {
        $cateName = $this->fm->validation($cateName);
        $id = $this->fm->validation($id);


        $cateName = mysqli_real_escape_string($this->db->link, $cateName);
        $id = mysqli_real_escape_string($this->db->link, $id);


        if (empty($cateName)) {
            $alert = "Category name must be not empty!";
            return $alert;
        } else {
            $query = "UPDATE tbl_category SET name = '$cateName' WHERE  id = '$id'";
            $rs = $this->db->update($query);
            if ($rs) {
                $alert = "Update Category successfully!";
                return $alert;
            } else {
                $alert = "Update Category not successfully!";
                return $alert;
            }
        }
    }


    public function delByID($id)
    {

        $id = $this->fm->validation($id);



        $id = mysqli_real_escape_string($this->db->link, $id);



        $query = "DELETE FROM tbl_category WHERE id = '$id'";
        $rs = $this->db->delete($query);
        if ($rs) {
            $alert = "Delete Category successfully!";
            return $alert;
        } else {
            $alert = "Delete Category not successfully!";
            return $alert;
        }

    }

}
?>