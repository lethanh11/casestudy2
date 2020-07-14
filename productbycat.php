<?php 
 include "include/header.php";
?>
<?php 
if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
    echo "<script>window.location = '404.php'</script>";
} else {
    $id = $_GET['catid'];
}
?>
<div class="main">
	<div class="content">
		<div class="content_top">
		<?php 
			$name_cat = $cate->get_name_bycat($id);
			if($name_cat){
				while($result_name = $name_cat->fetch_assoc()){
		?>
			<div class="heading">
				<h3>Category : <?php echo $result_name['catName'] ?></h3>
			</div>
			<?php 
				}
			}
			?>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php 
				$productbycat = $cate->get_product_bycat($id);
			if($productbycat){
				while($result = $productbycat->fetch_assoc()){
			?>
			<div class="grid_1_of_4 images_1_of_4">
				<a href="preview-3.php"><img src="admin/uploads/<?php echo $result['image']?>" alt="" style='width: 80px;'/></a>
				<h2><?php echo $result['productName']?> </h2>
				<p><?php echo $fm->textShorten($result['description'], 50) ?></p>
				<p><span class="price"><?php echo number_format($result['price'],0,",",".") . ' VNĐ' ?></span></p>
				<div class="button"><span><a href="details.php?proid=<?php echo $result['productid']?>" class="details">Details</a></span></div>
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