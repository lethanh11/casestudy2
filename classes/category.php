<?php
$fileapath = realpath(dirname(__FILE__));
include_once ($fileapath."/../lib/database.php");
include_once ($fileapath."/../helpers/format.php");
?>

<?php 
class category {
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_category($catName){

        $catName = $this->fm->validation($catName);

        $catName = mysqli_real_escape_string($this->db->link, $catName); 
        


        if(empty($catName)){
            $alert = "<span class='erros'>Danh mục không được để trống";
                return $alert;
        } else {
            $query = "INSERT INTO category(catName) VALUES('$catName')";
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
    public function show_category(){
        $query = "SELECT * FROM category order by idcategory desc";
        $result = $this->db->insert($query);
        return $result;
    }
    public function getcatbyId($id){
        $query = "SELECT * FROM category where idcategory ='$id'";
        $result = $this->db->insert($query);
        return $result;
    }
    public function update_category($catName,$id) {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName); 
        $id = mysqli_real_escape_string($this->db->link, $id); 
        if(empty($catName)){
            $alert = "<span class='erros'>Danh mục không được để trống";
                return $alert;
        } else {
            $query = "UPDATE category SET catName ='$catName' WHERE idcategory='$id' ";
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
    public function delete_category($id){
        $query = "DELETE FROM category where idcategory ='$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert = "<span class='success'>Xóa Thành Công</span>";
            return $alert;
        } else {
            $alert = "<span class='erros'>Xóa Không Thành Công</span>";
            return $alert;
        }
       
    }
    public function show_category_fontend(){
        $query = "SELECT * FROM category order by idcategory desc";
        $result = $this->db->insert($query);
        return $result;
    }
    public function get_product_bycat($id){
        $query = "SELECT * FROM product WHERE category_idcategory = '$id' order by category_idcategory desc LIMIT 4";
        $result = $this->db->insert($query);
        return $result;
    }

    public function get_name_bycat($id){
        $query = "SELECT product.*,category.catName,category.idcategory FROM product,category WHERE product.category_idcategory = category.idcategory AND product.category_idcategory = '$id' LIMIT 1";
        $result = $this->db->insert($query);
        return $result;
    }
    
} 
?>  