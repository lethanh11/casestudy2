<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'?>
<?php 
$cate = new category();
if(isset($_GET['iddelete'])){
	$id = $_GET['iddelete'];
	$deleteCat = $cate->delete_category($id);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">   
				<?php 
                if(isset($deleteCat)){
                    echo $deleteCat;
                }
                ?>     
                    <table class="data display datatable" id="example" style="border:1px solid black;text-align:center">
					<thead>
						<tr style="border:1px solid black;text-align:center">
							<th style="border:1px solid black;text-align:center">STT</th>
							<th style="border:1px solid black;text-align:center">Tên Danh Mục</th>
							<th style="border:1px solid black;text-align:center">Sửa/Xóa</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$show_cate = $cate->show_category();
					if($show_cate){
						$i = 0;
						while($result = $show_cate->fetch_assoc()){
							$i++;
					
					?>
						<tr class="odd gradeX" style="border:1px solid black;text-align:center">
							<td style="border:1px solid black;text-align:center"><?php echo $i;?></td>
							<td style="border:1px solid black;text-align:center"><?php echo $result['catName']?></td>
							<td style="border:1px solid black;text-align:center"><a href="catedit.php?idcategory=<?php echo $result['idcategory']?>">Edit</a> || <a onclick = "return confirm('Bạn có muốn xóa?')" href="?iddelete=<?php echo $result['idcategory']?>">Delete</a></td>
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

