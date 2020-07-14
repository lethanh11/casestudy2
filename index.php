<?php 
 include "include/header.php";
 include "include/slide.php";
?>
 
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Sản Phẩm Hot</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			  <?php
				  $product_hot = $product->getproduct_hot();
				  if($product_hot){
					  while($result = $product_hot->fetch_assoc()){
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result['image'] ?>" style="height: 140px;" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['description'], 50) ?></p>
					 <p><span class="price"><?php echo number_format($result['price'],0,",",".") . ' VNĐ'?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productid']?>" class="details">Details</a></span></div>
				</div>
				<?php 
				}
				  }
				?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Sản Phẩm Mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php
				  $product_new = $product->getproduct_new();
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
    </div>
 </div>
<?php 
include "include/footer.php";
?>

 
