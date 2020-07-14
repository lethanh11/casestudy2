<?php
$fileapath = realpath(dirname(__FILE__));
include_once ($fileapath."/../lib/database.php");
include_once ($fileapath."/../helpers/format.php");
?>

<?php 
class customer {
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_customer($data){
        $name = mysqli_real_escape_string($this->db->link, $data['name']); 
        $gender = mysqli_real_escape_string($this->db->link, $data['gender']); 
        $namsinh = mysqli_real_escape_string($this->db->link, $data['namsinh']); 
        $email = mysqli_real_escape_string($this->db->link, $data['email']); 
        $address = mysqli_real_escape_string($this->db->link, $data['address']); 
        $city = mysqli_real_escape_string($this->db->link, $data['city']); 
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']); 
        $password = mysqli_real_escape_string($this->db->link, $data['password']); 
        if($name =="" || $gender ==""  || $namsinh =="" || $email =="" || $address =="" || $city =="" || $phone == "" || $password == ""){
            $alert = "<span class='error'>Không được để trống";
                return $alert;
        } else {
            $check_email = "SELECT * FROM customer WHERE  email='$email' LIMIT 1";
            $result_check = $this->db->select($check_email);
            if($result_check){
                $alert = "<span class='error'> Email đã tồn tài ! Email không được để trống </span>";
                return $alert;
            }else {
                $query = "INSERT INTO customer(name,gender,namsinh,email,address,city,phone,password) VALUES('$name','$gender','$namsinh',
            '$email','$address','$city','$phone',$password)";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'>Đăng Ký Thành Công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Đăng Ký Không Thành Công</span>";
                return $alert;
            }
            }
        }
    }
    public function login_customer($data){
        $email = mysqli_real_escape_string($this->db->link, $data['email']); 
        $password = mysqli_real_escape_string($this->db->link, $data['password']);
        if ($email =="" || $password == ""){
            $alert = "<span class='error'>Password và Email Không được để trống";
            return $alert;
        } else {
            $check_email = "SELECT * FROM customer WHERE  email='$email' AND password='$password' LIMIT 1";
            $result_check = $this->db->select($check_email);
            if($result_check != false){
                $value = $result_check->fetch_assoc();
                Session::set('customer_login',true);
                Session::set('customer_id',$value['idcustomer']);
                Session::set('customer_name',$value['name']);
                header('Location:oder.php');
            }else {
                $alert = "<span class='error'> Email and Password không trùng khớp </span>";
                return $alert;
            }
        } 
    }
    public function show_customer($id){
        $query = "SELECT * FROM customer WHERE idcustomer='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function updateCustomer($data,$id){
        $name = mysqli_real_escape_string($this->db->link, $data['name']); 
        $gender = mysqli_real_escape_string($this->db->link, $data['gender']); 
        $namsinh = mysqli_real_escape_string($this->db->link, $data['namsinh']); 
        $email = mysqli_real_escape_string($this->db->link, $data['email']); 
        $address = mysqli_real_escape_string($this->db->link, $data['address']); 
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']); 
        if($name =="" || $gender ==""  || $namsinh =="" || $email =="" || $address =="" ||  $phone == ""){
            $alert = "<span class='error'>Không được để trống";
                return $alert;
        } else {
                $query = "UPDATE customer SET name='$name',gender='$gender',namsinh='$namsinh',email='$email',address='$address',phone='$phone' WHERE idcustomer='$id'";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<span class='success'>Cập Nhật Thành Công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Cập Nhật Không Thành Công</span>";
                return $alert;
            }
            }
        }
    }
?>  