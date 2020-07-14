<?php 
 include "include/header.php";

?>
<?php 
	  $login_check = Session::get('customer_login');
	  if($login_check==false){
		  header('Location:login.php');
	  }
	  ?>
<div class="main">
	<div class="content">
		<div class="section group">
        <div class="content_top">
    		<div class="heading">
    		    <h3>Thông Tin Khách Hàng</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
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
<?php 
 include "include/footer.php";
 ?>