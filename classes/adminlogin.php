<?php 
$fileapath = realpath(dirname(__FILE__));
include ($fileapath."/../lib/session.php");
Session::checkLogin(); 
include_once ($fileapath."/../lib/database.php");
include_once ($fileapath."/../helpers/format.php");
?>



<?php 
class Adminlogin {
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function loginAdmin($adminUser,$adminPass){
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);

        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser); 
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);


        if(empty($adminUser) || empty($adminPass)){
            $alert = "User and Pass must be not empty";
                return $alert;
        } else {
            $query = "SELECT * FROM admin WHERE username = '$adminUser' AND password = '$adminPass' LIMIT 1";

            $result = $this->db->select($query);

            if($result != false) {
                $value = $result->fetch_assoc();
                Session::set('adminlogin',true);
                Session::set('idadmin',$value['idadmin']);
                Session::set('adminUser',$value['adminUser']);
                Session::set('name',$value['name']);
                header('Location:index.php');
            } else {
                $alert = "User and Pass not match";
                return $alert;
            }
        }
    }
} 
?>  