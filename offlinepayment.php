<?php
include "include/header.php";
?>
<?php
    if(isset($_GET['idorder']) && $_GET['idorder'] =='idorder'){
        $customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrder($customer_id);
        $delCart = $ct->del_all_data_cart();
        
    } 
?>
<style>
    .box_left{
        width: 50%;
        border:1px solid #666;
        float:left;
        padding: 10px;
    }
    .box_right {
        width: 45%;
        border: 1px solid #666;
        float: right;
        padding: 4px;
    }
    .a_order {
        padding: 7px 20px;
        background: red;
        font-size: 21px;
        color: #FFF;
        border-bottom-right-radius: 50px;
        border-top-right-radius: 50px;
        border-bottom-left-radius: 50px;
        border-top-left-radius: 50px;

    }
</style>
<form action="" method="POST">
<div class="main">
    <div class="content">
        <div class="section group">
            <div class="heading">
                <h3>Thanh Toán Offline</h3>
            </div>
            <div class="clear"></div>
            <div class="box_left">
            <div class="cartpage">
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
                        <th width="5%">ID</th>
						<th width="15%">Tên Sản Phẩm</th>
						<th width="10%">Ảnh</th>
						<th width="15%">Giá</th>
						<th width="25%">Số Lượng</th>
						<th width="20%">Tổng Tiền</th>
					</tr>
					<?php
					$get_product_cart =  $ct->get_product_cart();
					if($get_product_cart){
						$sum = 0;
                        $sl = 0;
                        $i= 0 ; 
						while($result = $get_product_cart->fetch_assoc()){
							 $sum += $result['price'] * $result['SL']; 
                             $sl =$sl + $result['SL'];
                             $i++;
					?>
					<tr>
                        <td style="border: 1px solid black;text-align:center"><?php echo $i;?></td>
						<td style="border: 1px solid black;text-align:center"><?php echo $result['productName']?></td>
						<td style="border: 1px solid black;text-align:center"><img src="admin/uploads/<?php echo $result['image']?>" alt="" /></td>
						<td style="border: 1px solid black;text-align:center"><?php echo number_format($result['price'],0,",",".") . ' VNĐ'?></td>
						<td style="border: 1px solid black;text-align:center">
							<form action="" method="post">
								<?php echo $result['SL']?>	

							</form>
						</td>
						<td style="border: 1px solid black;text-align:center"><?php echo number_format($result['price'] * $result['SL'],0,",",".") . ' VNĐ'?></td>

					</tr>
					<?php 
						}
					}
					?>
				</table >
				<?php
					$check_cart = $ct->check_cart();
					if($check_cart){
						
				 ?>
				<table style="float:right;text-align:left;border: 1px solid black" width="40%">
					<tr style="border: 1px solid black;text-align:center">
						<th >Tổng Tiền : </th>
						<td ><?php 
								  
								  echo number_format($sum,0,",",".") . ' VNĐ' ;
								  Session::set('sum',$sum);
								  Session::set('sl',$sl);
							?>
						</td>
					</tr>
					<tr style="border: 1px solid black;text-align:center">
						<th>Thuế : </th>
						<td>10% (<?php echo $vat = $sum * 0.1?>)</td>
					</tr>
					<tr style="text-align:center">
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
            </div>
            <div class="box_right">
            <table class='tblone'>
                <?php 
                $id = Session::get('customer_id');
                $get_customer = $cs->show_customer($id);
                if($get_customer){
                    while($result =$get_customer->fetch_assoc()){
                
                ?>
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td><?php echo $result['name']?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>:</td>
                    <td><?php echo $result['gender']?></td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>:</td>
                    <td><?php echo $result['namsinh']?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td><?php echo $result['address']?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>:</td>
                    <td><?php echo $result['city']?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $result['email']?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td><?php echo $result['phone']?></td>
                </tr>
                <tr>
                    <td colspan='3'><a href='editprofile.php'>Cập Nhật Thông Tin</a></td>
                </tr>
                <?php
                     }
                }
                ?>
            </table>
            </div>
            
        </div>
    </div>
    <center><a href="success.php?idorder=idorder" class="a_order">Order</a></center>
</div>
</form>
<?php
include "include/footer.php";
?>