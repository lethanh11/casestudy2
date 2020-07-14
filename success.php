<?php
include "include/header.php";
?>
<?php
    if(isset($_GET['idorder']) && $_GET['idorder']=='idorder'){
        $customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrder($customer_id);
        $delCart = $ct->del_all_data_cart();
        // header('Location:success.php');
    } 
?>
<style>
   h2.success_order{
       text-align: center;
       color : green;
    }
</style>
<form action="" method="POST">
<div class="main">
    <div class="content">
        <div class="section group">
            <h2 class='success_order'>Hoàn Tất Thanh Toán</h2>
        </div>
    </div>
</div>
</form>
<?php
include "include/footer.php";
?>