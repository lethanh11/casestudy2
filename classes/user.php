<?php
$fileapath = realpath(dirname(__FILE__));
include_once ($fileapath."/../lib/database.php");
include_once ($fileapath."/../helpers/format.php");
?>

<?php 
class user {
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    
    }
?>  