<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helpers/format.php';?>

<?php 
	$pd = new product();
	$fm = new Format();
	if(isset($_GET['productid'])){
		$id = $_GET['productid'];
		$deletePro = $pd->delete_product($id);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh Sách Sản Phẩm</h2>
        <div class="block">  
			<?php if(isset($deletePro)){
				echo $deletePro;
			}
			?>
            <table class="data display datatable" id="example" style="border: 1px solid black">
			<thead>
				<tr >
					<th>ID</th>
					<th>Tên Sản Phẩm</th>
					<th>Giá</th>
					<th>Ảnh</th>
					<th>Danh Mục</th>
					<th>Thương Hiệu</th>
					<th>Mô Tả</th>
					<th>Loại</th>
					<th>Sửa/Xóa</th>
					
				</tr>
			</thead>
			<tbody style="border: 1px solid black">
				<?php
				$pdlist = $pd->show_product();
				if($pdlist){
					$i = 0 ;
					while($result = $pdlist->fetch_assoc()){
						$i++;
				?>
				<tr class="odd gradeX" style="border: 1px solid black">
					<td style="border: 1px solid black;text-align:center"><?php echo $i ?></td>
					<td style="border: 1px solid black;text-align:center"><?php echo $result['productName'] ?></td>
					<td style="border: 1px solid black;text-align:center" ><?php echo number_format($result['price'],0,",",".") . ' VNĐ' ?></td>
					<td style="border: 1px solid black;text-align:center"><img src="uploads/<?php echo $result['image'] ?>"style="width:70px;margin-left:38px;margin-top:17px"></td>
					<td style="border: 1px solid black;text-align:center"><?php echo $result['catName'] ?></td>
					<td style="border: 1px solid black;text-align:center"><?php echo $result['brandName'] ?></td>
					<td style="border: 1px solid black;text-align:center"><?php echo $fm->textShorten($result['description'], 50) ?></td>
					<td class="center" style="border: 1px solid black;text-align:center">
						<?php 
						if($result['type']==0){
							echo "No Hot";
						} else {
							echo "Hot";
						}
						 ?>
					 </td>
					<td style="text-align:center"><a href="productedit.php?productid=<?php echo $result['productid']?>">Edit</a> || <a href="?productid=<?php echo $result['productid']?>">Delete</a></td>
				</tr>
				<?php 
					}
				}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
