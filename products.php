<?php 
include "include/header.php";
include "include/slide.php";
?>

<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Sản Phẩm DELL</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
		<?php
				  $product_new = $product->getproducts_new();
				  if($product_new){
					  while($result_new = $product_new->fetch_assoc()){
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_new['image'] ?>" style="height: 140px;" alt="" /></a>
					 <h2><?php echo $result_new['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result_new['description'], 50) ?></p>
					 <p><span class="price"><?php echo number_format($result_new['price'],0,",",".") . ' VNĐ'?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productid']?>" class="details">Details</a></span></div>
				</div>
				<?php 
				}
			}
			?>
		</div>
		<div class="content_bottom">
    		<div class="heading">
    		<h3>Sản Phẩm Apple</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php
				  $product_apple = $product->getproducts_apple();
				  if($product_new){
					  while($result_apple = $product_apple->fetch_assoc()){
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_apple['image'] ?>" style="height: 140px;" alt="" /></a>
					 <h2><?php echo $result_apple['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result_apple['description'], 50) ?></p>
					 <p><span class="price"><?php echo number_format($result_apple['price'],0,",",".") . ' VNĐ'?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_apple['productid']?>" class="details">Details</a></span></div>
				</div>
			
			<?php 
				}
			}
			?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Sản Phẩm Samsung</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php
				  $product_samsung = $product->getproducts_samsung();
				  if($product_samsung){
					  while($result_samsung = $product_samsung->fetch_assoc()){
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_samsung['image'] ?>" style="height: 140px;" alt="" /></a>
					 <h2><?php echo $result_samsung['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result_samsung['description'], 50) ?></p>
					 <p><span class="price"><?php echo number_format($result_samsung['price'],0,",",".") . ' VNĐ'?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_samsung['productid']?>" class="details">Details</a></span></div>
				</div>
			
			<?php 
				}
			}
			?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Sản Phẩm Oppo</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php
				  $product_oppo = $product->getproducts_oppo();
				  if($product_oppo){
					  while($result_oppo = $product_oppo->fetch_assoc()){
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_oppo['image'] ?>" style="height: 140px;" alt="" /></a>
					 <h2><?php echo $result_oppo['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result_oppo['description'], 50) ?></p>
					 <p><span class="price"><?php echo number_format($result_oppo['price'],0,",",".") . ' VNĐ'?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_oppo['productid']?>" class="details">Details</a></span></div>
				</div>
			
			<?php 
				}
			}
			?>
			</div>
	</div>
</div>
<?php 
include "include/footer.php";
?>
