<?php 
 include "include/header.php";
 ?>
 
<?php
if(isset($_GET['cartid'])){
	$cartid = $_GET['cartid'];
	$deleteCart = $ct->delete_cart($cartid);
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
	$cartid = $_POST['cartid'];
	$quantity = $_POST['quantity'];
	$update_quantity_Cart = $ct->update_quantity_Cart($quantity,$cartid);
}
?>
<?php 
if(!isset($_GET['id'])){
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
}
?>
<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Giỏ Hàng</h2>
				<?php 
				if(isset($update_quantity_Cart)){
					echo $update_quantity_Cart;
				}
				?>
				<?php 
				if(isset($deleteCart)){
					echo $deleteCart;
				}
				?>
				<table class="tblone">
					<tr>
						<th width="20%">Tên Sản Phẩm</th>
						<th width="10%">Ảnh</th>
						<th width="15%">Giá</th>
						<th width="25%">Số Lượng</th>
						<th width="20%">Tổng Tiền</th>
						<th width="10%">Hoạt động</th>
					</tr>
					<?php
					$get_product_cart =  $ct->get_product_cart();
					if($get_product_cart){
						$sum = 0;
						$sl = 0;
						while($result = $get_product_cart->fetch_assoc()){
							 $sum += $result['price'] * $result['SL']; 
							 $sl =$sl + $result['SL'];
					?>
					<tr>
						<td><?php echo $result['productName']?></td>
						<td><img src="admin/uploads/<?php echo $result['image']?>" alt="" /></td>
						<td><?php echo number_format($result['price'],0,",",".") . ' VNĐ'?></td>
						<td>
							<form action="" method="post">
								<input type="hidden" name="cartid" min="0" value="<?php echo $result['cartid']?>" />
								<input type="number" name="quantity" min="0" value="<?php echo $result['SL']?>" />	
								<input type="submit" name="submit" value="Update" />
							</form>
						</td>
						<td><?php echo number_format($result['price'] * $result['SL'],0,",",".") . ' VNĐ'?></td>
						<td><a href="?cartid=<?php echo $result['cartid'] ?>">Xóa</a></td>
					</tr>
					<?php 
						}
					}
					?>
				</table>
				<?php
					$check_cart = $ct->check_cart();
					if($check_cart){
						
				 ?>
				<table style="float:right;text-align:left;" width="40%">
					<tr>
						<th>Tổng Tiền : </th>
						<td><?php 
								  
								  echo number_format($sum,0,",",".") . ' VNĐ' ;
								  Session::set('sum',$sum);
								  Session::set('sl',$sl);
							?>
						</td>
					</tr>
					<tr>
						<th>Thuế : </th>
						<td>10%</td>
					</tr>
					<tr>
						<th>Tổng cộng :</th>
						<td><?php $vat = $sum * 0.1 ;
								$gtotal = $sum + $vat;
								echo number_format($gtotal,0,",",".").' VNĐ';
							?>
						</td>
					</tr>
				</table>
				<?php
				} else {
					echo "Giỏ Hàng Của Bạn Đang Trống?";
				}
				?>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
				<div class="shopright">
					<a href="payment.php"> <img src="images/check.png" alt="" /></a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>

<?php 
 include "include/footer.php";
 ?>

