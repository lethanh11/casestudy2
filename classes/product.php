<?php

$fileapath = realpath(dirname(__FILE__));
include_once ($fileapath."/../lib/database.php");
include_once ($fileapath."/../helpers/format.php");
?>

<?php 
class product {
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function search_product($tukhoa){
        $catName = $this->fm->validation($tukhoa);
        $query = "SELECT * FROM product WHERE productName LIKE '%$tukhoa%'";
        $result = $this->db->select($query);
        return $result;
    }
    public function insert_product($data,$files){
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']); 
        $idcategory = mysqli_real_escape_string($this->db->link, $data['idcategory']); 
        $brand = mysqli_real_escape_string($this->db->link, $data['brandid']); 
        $description = mysqli_real_escape_string($this->db->link, $data['description']); 
        $price = mysqli_real_escape_string($this->db->link, $data['price']); 
        $type = mysqli_real_escape_string($this->db->link, $data['type']); 
        // kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
        $premited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];  

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/". $unique_image;

        if($productName =="" || $idcategory ==""  || $brand =="" || $description =="" || $price =="" || $type =="" || $file_name == ""){
            $alert = "<span class='erros'>Không được để trống";
                return $alert;
        } else {
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO product(productName,category_idcategory,brand_brandid,description,price,type,image) VALUES('$productName','$idcategory','$brand',
            '$description','$price','$type','$unique_image')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'>Thêm Sản Phẩm Thành Công</span>";
                return $alert;
            } else {
                $alert = "<span class='erros'>Không Thành Công</span>";
                return $alert;
            }

            
        }
    }   
     public function show_product(){
        $query = "SELECT product .* , category.catName ,brand.brandName
        FROM product 
        INNER JOIN category 
        ON product.category_idcategory = category.idcategory
        INNER JOIN brand 
        ON product.brand_brandid = brand.brandid
        order by product.productid desc";
        

        $result = $this->db->insert($query);
        return $result;
    }
    public function getproductbyId($id){
        $query = "SELECT * FROM product where productid ='$id'";
        $result = $this->db->insert($query);
        return $result;
    }
    public function update_product($data,$files,$id) {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']); 
        $idcategory = mysqli_real_escape_string($this->db->link, $data['idcategory']); 
        $brand = mysqli_real_escape_string($this->db->link, $data['brandid']);
        $description = mysqli_real_escape_string($this->db->link, $data['description']); 
        $price = mysqli_real_escape_string($this->db->link, $data['price']); 
        $type = mysqli_real_escape_string($this->db->link, $data['type']); 
        // kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];  

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/". $unique_image;
        if($productName =="" || $idcategory =="" || $brand =="" || $description =="" || $price =="" || $type =="" ){
            $alert = "<span class='error'>Không được để trống";
                return $alert;
        } else {
            if(!empty($file_name)){
                //Nếu người dùng chọn ảnh
                if($file_size > 204800){
                $alert = "<span class='success'>
                Kích thước hình ảnh phải nhỏ hơn 2MB!</span>";
                return $alert;
                } elseif(in_array($file_ext,$permited)=== false){
                $alert = "<span class='success'>Bạn chỉ có thể tải lên:-" .implode(',',$permited)."</span>";
                return $alert;
                    }
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "UPDATE product SET 
                productName ='$productName' ,
                category_idcategory ='$idcategory', 
                brand_brandid ='$brand',
                description ='$description', 
                price ='$price', 
                type ='$type', 
                image ='$unique_image' 
                WHERE productid='$id' ";
            } else {
            //Nếu người dùng không chọn ảnh
            $query = "UPDATE product SET 
                productName ='$productName' ,
                category_idcategory ='$idcategory' ,
                brand_brandid ='$brand',
                description ='$description' ,
                price ='$price' ,
                type ='$type'  
                WHERE productid='$id' ";
            }
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
    public function delete_product($id){
        $query = "DELETE FROM product where productid ='$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert = "<span class='success'>Xóa Thành Công</span>";
            return $alert;
        } else {
            $alert = "<span class='erros'>Xóa Không Thành Công</span>";
            return $alert;
        }
       
    }

    public function getproduct_hot(){
        $query = "SELECT * FROM product where type ='1' LIMIT 4";
        $result = $this->db->insert($query);
        return $result;
    }
    public function getproduct_new(){
        $query = "SELECT * FROM product order by productid desc LIMIT 4 ";
        $result = $this->db->insert($query);
        return $result;
    }
    public function getproducts_new(){
        $query = "SELECT * FROM product where brand_brandid ='2' LIMIT 4 ";
        $result = $this->db->insert($query);
        return $result;
    }
    public function getproducts_apple(){
        $query = "SELECT * FROM product where brand_brandid ='6' LIMIT 4 ";
        $result = $this->db->insert($query);
        return $result;
    }

    public function getproducts_samsung(){
        $query = "SELECT * FROM product where brand_brandid ='4' LIMIT 4 ";
        $result = $this->db->insert($query);
        return $result;
    }

    public function getproducts_oppo() {
        $query = "SELECT * FROM product where brand_brandid ='3' LIMIT 4 ";
        $result = $this->db->insert($query);
        return $result;
    }

    public function get_details($id) {
        $query = "SELECT product .* , category.catName ,brand.brandName
        FROM product 
        INNER JOIN category 
        ON product.category_idcategory = category.idcategory
        INNER JOIN brand 
        ON product.brand_brandid = brand.brandid
        WHERE product.productid = '$id'";
        

        $result = $this->db->insert($query);
        return $result;
    }
    public function getLastestDell(){
        $query = "SELECT * FROM product WHERE brand_brandid ='2' order by productid desc LIMIT 1";
        $result = $this->db->insert($query);
        return $result;
    }
    public function getLastestOppo(){
        $query = "SELECT * FROM product WHERE brand_brandid ='3' order by productid desc LIMIT 1";
        $result = $this->db->insert($query);
        return $result;
    }
    public function getLastestApple(){
        $query = "SELECT * FROM product WHERE brand_brandid ='6' order by productid desc LIMIT 1";
        $result = $this->db->insert($query);
        return $result;
    }
    public function getLastestSamsung(){
        $query = "SELECT * FROM product WHERE brand_brandid ='4' order by productid desc LIMIT 1";
        $result = $this->db->insert($query);
        return $result;
    }
    public function getLastestHuawei(){
        $query = "SELECT * FROM product WHERE brand_brandid ='5' order by productid desc LIMIT 1";
        $result = $this->db->insert($query);
        return $result;
    }
}
?>  