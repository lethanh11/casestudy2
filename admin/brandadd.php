<?php include 'inc/header.php'; 
 include 'inc/sidebar.php'; 
 $fileapath = realpath(dirname(__FILE__));
 include ($fileapath."/../classes/brand.php");?>

<?php 
$brand = new brand();
if($_SERVER['REQUEST_METHOD'] === 'POST') {
	$brandName = $_POST['brandName'];
	$insertBrand = $brand->insert_brand($brandName);
    
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm Thương Hiệu</h2>
                
               <div class="block copyblock"> 
               <?php 
                if(isset($insertBrand)){
                    echo $insertBrand;
                }
                ?>
                 <form action="brandadd.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Thêm Thương Hiệu" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Add" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>