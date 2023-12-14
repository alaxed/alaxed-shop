<?php


include_once '../lib/database.php';
include_once '../helper/format.php';
?>

<?php
class product
{
    private $db;
    public $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();


    }

    public function insert($data, $files){

        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $cateId = mysqli_real_escape_string($this->db->link, $data['cateId']);
        $brandId = mysqli_real_escape_string($this->db->link, $data['brandId']);
        $descriptions = mysqli_real_escape_string($this->db->link, $data['descriptions']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);

        $permited = array('jpg', 'jpeg', 'png');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_iamge = substr(md5(time()), 0, 10). '.' . $file_ext;
        $uploaded_image = "uploads/". $unique_iamge;

        if ($name == "" || $cateId == "" || $brandId == "" || $descriptions == "" || $price == "" || $type == "" ) {
            $alert = "Fields must be not empty!";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product ( name, catId, brandId, description, type, price, image) VALUES ('$name','$cateId','$brandId','$descriptions','$type','$price','$unique_iamge')";
            $rs = $this->db->insert($query);
            if ($rs) {
                $alert = "Insert Product successfully!";
                return $alert;
            } else {
                $alert = "Insert Product not successfully!";
                return $alert;
            }
        }
    }

    public function findAll()
    {
        // $query = "SELECT * FROM tbl_product ORDER BY id DESC";
        $query = "SELECT p.*, c.name as 'category', b.name as 'brand' FROM tbl_product p JOIN tbl_category c on p.catId = c.id JOIN tbl_brand b on p.brandId = b.id ORDER BY id DESC";
        $rs = $this->db->insert($query);
        return $rs;
    }


    public function findById($id)
    {
        $query = "SELECT * FROM tbl_product WHERE id = '$id' ";
        $rs = $this->db->insert($query);
        return $rs;
    }

    public function update($data, $fiel, $id)
    {
        // $cateName = $this->fm->validation($cateName);
        // $id = $this->fm->validation($id);


        // $cateName = mysqli_real_escape_string($this->db->link, $cateName);
        // $id = mysqli_real_escape_string($this->db->link, $id);


        // if (empty($cateName)) {
        //     $alert = "Category name must be not empty!";
        //     return $alert;
        // } else {
        //     $query = "UPDATE tbl_category SET name = '$cateName' WHERE  id = '$id'";
        //     $rs = $this->db->update($query);
        //     if ($rs) {
        //         $alert = "Update Category successfully!";
        //         return $alert;
        //     } else {
        //         $alert = "Update Category not successfully!";
        //         return $alert;
        //     }
        // }
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