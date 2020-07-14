<?php 
 include "include/header.php";
?>
<?php 
	$login_check = Session::get('customer_login');
	if($login_check==false){
		header('Location:login.php');
	}
?>
 <style>
     .oder_page {
         font-size: 30px;
         font-weight: bold;
         color: red;
     }
 </style>
<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
			<div class='oder_page'>
                <h3>Không Tìm Kiếm Được Trang Này</h3>
            </div>
				
		     </div>
		</div>
		<div class="clear"></div>
	</div>
</div>

<?php 
 include "include/footer.php";
 ?>



