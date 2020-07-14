<?php
$fileapath = realpath(dirname(__FILE__));
include_once($fileapath . "/../lib/database.php");
include_once($fileapath . "/../helpers/format.php");
?>

<?php
class cart
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function add_to_cart($quantity, $id)
    {
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sid = session_id();

        $query = "SELECT * FROM product WHERE productid = '$id'";
        $result = $this->db->select($query)->fetch_assoc();

        $image = $result['image'];
        $price = $result['price'];
        $productName = $result['productName'];
        $query_insert = "INSERT INTO cart(product_productid,SL,sid,image,price,productName) VALUES('$id','$quantity',
            '$sid','$image','$price','$productName')";
        $insert_cart = $this->db->insert($query_insert);
        if ($result) {
            header('Location:cart.php');
        } else {
            header('Location:404.php');
        }
    }
    public function get_product_cart()
    {
        $sid = session_id();
        $query = "SELECT * FROM cart WHERE sid ='$sid'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_quantity_Cart($quantity, $cartid)
    {
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $cartid = mysqli_real_escape_string($this->db->link, $cartid);
        $query = "UPDATE cart SET SL ='$quantity' WHERE cartid = '$cartid' ";
        $result = $this->db->update($query);
        if ($result) {
            header('Location:cart.php');
        } else {
            $msg = "<span class='error'>Thay đổi số lượng sản phẩm không thành công</span>";
            return $msg;
        }
    }
    public function delete_cart($cartid)
    {
        $cartid = mysqli_real_escape_string($this->db->link, $cartid);
        $query = "DELETE  FROM cart WHERE cartid ='$cartid'";
        $result = $this->db->delete($query);
        if ($result) {
            header('Location:cart.php');
        } else {
            $msg = "<span class='error'>Xóa sản phẩm không thành công</span>";
            return $msg;
        }
    }
    public function check_cart()
    {
        $sid = session_id();
        $query = "SELECT * FROM cart WHERE sid ='$sid'";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_all_data_cart()
    {
        $sid = session_id();
        $query = "DELETE  FROM cart WHERE sid ='$sid'";
        $result = $this->db->select($query);
        return $result;
    }
    public function insertOrder($customer_id)
    {
        $sid = session_id();
        $query = "DELETE  FROM cart WHERE sid ='$sid'";
        $get_product = $this->db->select($query);
        if ($get_product) {
            while ($result = $get_product->fetch_assoc()) {
                $productid = $result['product_productid'];
                $productName = $result['productName'];
                $SL = $result['SL'];
                $price = $result['price'];
                $image = $result['image'];
                $customer_id = $result['customer_idcustomer'];
                $query_order = "INSERT INTO order(product_productid,productName,SL,price,image,customer_idcustomer) VALUES('$productid','$productName',
                '$SL','$price','$image','$customer_id')";
                $insert_order = $this->db->insert($query_order);
            }
        }
    }
}
?>  