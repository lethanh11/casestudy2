<?php 
 include "include/header.php";
?>
<?php 
	$login_check = Session::get('customer_login');
	if($login_check==true){
		header('Location:oder.php');
	}
?>
<?php 
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
	$insertCustomer = $cs->insert_customer($_POST);
    
}
?>
<?php 
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
	$login_Customer = $cs->login_customer($_POST);
    
}
?>
<div class="main">
	<div class="content">
		<div class="login_panel">
			<h3>Existing Customers</h3>
			<p>Sign in with the form below.</p>
			<?php 
				if(isset($login_Customer)){
				echo $login_Customer;
			} 
			?>
			<form action="" method="POST">
				<input type="text" name="email" class="field" placeholder="Nhập Email">
				<input type="password" name="password" class="field" placeholder="Nhập Password">
				<p class="note"><a href="#">Quên Mật Khẩu </a></p>
				<div class="buttons">
					<div><input type="submit" name='login' class="grey" value="Sign In" style="font-size: 19px; background: #FFF;"></div>
				</div>
			</form>
		</div>
		<?php 

		?>
		<div class="register_account">
			<h3>Đăng Ký Tài Khoản</h3>
			<?php
			if(isset($insertCustomer)){
				echo $insertCustomer;
			} 
			?>
			<form action="" method="POST">
				<table>
					<tbody>
						<tr>
							<td>
								<div>
									<input type="text" name="name" placeholder="Nhập Tên...">
								</div>

								<div>
									<input type="text" name="gender" placeholder="Nhập Giới Tính...">
								</div>

								<div>
									<input type="text" name="namsinh" placeholder="Nhập năm sinh...">
								</div>
								<div>
									<input type="text" name="email" placeholder="Nhập Email...">
								</div>
							</td>
							<td>
								<div>
									<input type="text" name="address" placeholder="Nhập Địa Chỉ..." >
								</div>
								<div>
									<select id="country" name="city" placeholder="Nhập Thành Phố...">
										<option value="null">Chọn Thành Phố</option>
										<option value="HCM">TP.HCM</option>
										<option value="Huế">Huế</option>
										<option value="ĐN">Đà Nẵng</option>
										<option value="HN">Hà Nội</option>

									</select>
								</div>

								<div>
									<input type="text" name="phone" placeholder="Nhập Số điện thoại...">
								</div>

								<div>
									<input type="text" name="password" placeholder="Nhập Mật khẩu...">
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="search">
					<div><input type="submit" name='submit' class="grey" value="Submit" style="font-size: 19px; background: #FFF;"></div>
				</div>
				<p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp;
						Conditions</a>.</p>
				<div class="clear"></div>
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php 
 include "include/footer.php";
 ?>