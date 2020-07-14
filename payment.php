<?php 
 include "include/header.php";
//  include "include/slide.php";
?>
<style>
    h3.payment{
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        text-decoration: underline;
    }
    .wrapper_method {
        text-align: center;
        width: 550px;
        margin: 0 auto;
        border: 1px solid #666;
        padding: 20px;
        background: cornsilk;
    }
    .wrapper_method a{
        background: red;
        color: #FFF;
        padding: 10px; 
    }
    .wrapper_method h3{
        margin-bottom: 20px;
    }
</style>
<div class="main">
	<div class="content">
		<div class="section group">
            <div class="content_top">
                <div class="heading">
                    <h3>Thanh Toán Hóa Đơn</h3>
                </div>
                <div class="clear"></div>
                <div class='wrapper_method'>
                    <h3 class='payment'> Phương Thức Thanh Toán</h3>
                    <a href="offlinepayment.php">Thanh Toán Offline</a>
                   <a href="onlinepayment.php">Thanh Toán Online</a><br><br><br>
                   <a style="background:grey;"href="cart.php"><<< Quay Lại</a>
                </div>
            </div>
    	</div>
            
	</div>
</div>
<?php 
 include "include/footer.php";
 ?>