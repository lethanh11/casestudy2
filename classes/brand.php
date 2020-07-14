<?php
$fileapath = realpath(dirname(__FILE__));
include_once ($fileapath."/../lib/database.php");
include_once ($fileapath."/../helpers/format.php");
?>

<?php 
class brand {
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_brand($brandName){

        $brandName = $this->fm->validation($brandName);

        $brandName = mysqli_real_escape_string($this->db->link, $brandName); 
        


        if(empty($brandName)){
            $alert = "<span class='erros'>Thương hiệu không được để trống";
                return $alert;
        } else {
            $query = "INSERT INTO brand(brandName) VALUES('$brandName')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'>Thêm Thành Công</span>";
                return $alert;
            } else {
                $alert = "<span class='erros'>Không Thành Công</span>";
                return $alert;
            }

            
        }
    }
    public function show_brand(){
        $query = "SELECT * FROM brand order by brandid desc";
        $result = $this->db->insert($query);
        return $result;
    }
    public function getbrandbyId($id){
        $query = "SELECT * FROM brand where brandid ='$id'";
        $result = $this->db->insert($query);
        return $result;
    }
    public function update_brand($brandName,$id) {
        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName); 
        $id = mysqli_real_escape_string($this->db->link, $id); 
        if(empty($brandName)){
            $alert = "<span class='erros'>Danh mục không được để trống";
                return $alert;
        } else {
            $query = "UPDATE brand SET brandName ='$brandName' WHERE brandid='$id' ";
            $result = $this->db->update($query);
            if($result){
                $alert = "<span class='success'>Thay Đổi Thành Công</span>";
                return $alert;
            } else {
                $alert = "<span class='erros'>Thay Đổi Không Thành Công</span>";
                return $alert;
            }

            
        }

    }
    public function delete_brand($id){
        $query = "DELETE FROM brand where brandid ='$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert = "<span class='success'>Xóa Thành Công</span>";
            return $alert;
        } else {
            $alert = "<span class='erros'>Xóa Không Thành Công</span>";
            return $alert;
        }
       
    }
} 
?>  