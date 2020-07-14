<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php'?>
<?php 
$brand = new brand();
if(isset($_GET['iddelete'])){
	$id = $_GET['iddelete'];
	$deleteBrand = $brand->delete_brand($id);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh Sách Thương Hiệu</h2>
                <div class="block">   
				<?php 
                if(isset($deleteBrand)){
                    echo $deleteBrand;
                }
                ?>     
                    <table class="data display datatable" id="example" >
					<thead style="border: 1px solid black;text-align:center">
						<tr>
							<th style="border: 1px solid black;text-align:center">STT</th>
							<th style="border: 1px solid black;text-align:center">Tên Thương Hiệu</th>
							<th style="border: 1px solid black;text-align:center">Sửa/Xóa</th>
						</tr>
					</thead>
					<tbody style="border: 1px solid black;text-align:center">
					<?php
					$show_brand = $brand->show_brand();
					if($show_brand){
						$i = 0;
						while($result = $show_brand->fetch_assoc()){
							$i++;
					
					?>
						<tr class="odd gradeX" style="border: 1px solid black;text-align:center">
							<td style="border: 1px solid black;text-align:center"><?php echo $i;?></td>
							<td style="border: 1px solid black;text-align:center"><?php echo $result['brandName']?></td>
							<td ><a href="brandedit.php?brandid=<?php echo $result['brandid']?>">Edit</a> || <a onclick = "return confirm('Bạn có muốn xóa?')" href="?iddelete=<?php echo $result['brandid']?>">Delete</a></td>
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

