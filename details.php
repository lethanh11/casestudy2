<?php 
 include "include/header.php";
//  include "include/slide.php";
?>
<?php 
if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
    echo "<script>window.location = '404.php'</script>";
} else {
    $id = $_GET['proid'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
	$quantity = $_POST['quantity'];
	$addtoCart = $ct->add_to_cart($quantity,$id);
}
?>
<div class="main">
	<div class="content">
		<div class="section group">
			<?php
			$get_product_details = $product->get_details($id); 
			if($get_product_details){
				while($result_details = $get_product_details->fetch_assoc()){
			?>
			<div class="cont-desc span_1_of_2">
				<div class="grid images_3_of_2">
					<img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" />
				</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details['productName'] ?></h2>
					<p><?php echo $result_details['description'] ?></p>
					<div class="price">
						<p>Giá: <span><?php echo number_format($result_details['price'],0,",",".") . ' VNĐ' ?></span></p>
						<p>Thương Hiệu: <span><?php echo $result_details['brandName'] ?></span></p>
					</div>
					<div class="add-cart">
						<form action="" method="post">
							<input type="number" class="buyfield" name="quantity" value="1" min="1" />
							<input type="submit" class="buysubmit" name="submit" value="Mua Ngay" />
						</form>
						<?php
							if(isset($addtoCart)){
								echo '<span style="color: red;font-size=18px;">Sản phẩm đã có trong giỏ hàng</span>';
							}
							?>
					</div>
				</div>
				<div class="product-desc">
					<h2>Giới Thiệu Công Ty Cửa Hàng Di Động</h2>
					<p>Công ty Cổ phần Đầu tư Cửa Hàng Di Động (MWG) là nhà bán lẻ số 1 Việt Nam về doanh thu và lợi nhuận, với mạng lưới hơn 3.400 cửa hàng trên toàn quốc. MWG vận hành các chuỗi bán lẻ thegioididong.com, Điện Máy Xanh, Bách Hoá Xanh. Ngoài ra, MWG còn mở rộng ra thị trường nước ngoài với chuỗi bán lẻ thiết bị di động và điện máy tại Campuchia. Năm 2020, thành viên mới của MWG là 4KFarm ra đời với mục tiêu cung cấp cho người tiêu dùng thực phẩm an toàn theo chuẩn 4 không (không thuốc trừ sâu, không chất bảo quản, không chất tăng trưởng, không sử dụng giống biến đổi gen).</p>
					<p>MWG vinh dự khi liên tiếp lọt vào bảng xếp hạng TOP 50 công ty niêm yết tốt nhất Châu Á của tạp chí uy tín Forbes và là đại diện Việt Nam duy nhất trong Top 100 nhà bán lẻ hàng đầu Châu Á – Thái Bình Dương do Tạp chí bán lẻ châu Á (Retail Asia) và Tập đoàn nghiên cứu thị trường Euromonitor bình chọn. MWG nhiều năm liền có tên trong các bảng xếp hạng danh giá như TOP 500 nhà bán lẻ hàng đầu Châu Á – Thái Bình Dương (Retail Asia) và dẫn đầu TOP 50 công ty kinh doanh hiệu quả nhất Việt Nam (Nhịp Cầu Đầu Tư)… Sự phát triển của MWG cũng là một điển hình tốt được nghiên cứu tại các trường Đại học hàng đầu như Harvard, UC Berkeley, trường kinh doanh Tuck (Mỹ).</p>
				</div>
			</div>
			<?php 
				}
			}
			?>
			<div class="rightsidebar span_3_of_1">
				<h2>CATEGORIES</h2>
				<ul>
					<?php 
					$getall_category = $cate->show_category_fontend();
						if($getall_category){
							while($result_allcat=$getall_category->fetch_assoc()){
					?>
					<li><a href="productbycat.php?catid=<?php echo $result_allcat['idcategory']?>"><?php echo $result_allcat['catName']?></a></li>
					<?php
						}
					}
					?>
				</ul>

			</div>
		</div>
	</div>
<?php 
 include "include/footer.php";
 ?>