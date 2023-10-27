<?php
include ('../admin/config/dbconfig.php');
include ('../admin/includes/header.php');
include ('../admin/includes/navbar.php');
?>
    <style>
        .astrodivider {
            margin:64px auto;
            width:400px;
            max-width: 100%;
            position:relative;
        }

        .astrodividermask {
            overflow:hidden; height:20px;
        }

        .astrodividermask:after {
            content:'';
            display:block; margin:-25px auto 0;
            width:100%; height:25px;
            border-radius:125px / 12px;
            box-shadow:0 0 8px #049372;
        }
        .astrodivider span {
            width:50px; height:50px;
            position:absolute;
            bottom:100%; margin-bottom:-25px;
            left:50%; margin-left:-25px;
            border-radius:100%;
            box-shadow:0 2px 4px #4fb39c;
            background:#fff;
        }
        .astrodivider i {
            position:absolute;
            top:4px; bottom:4px;
            left:4px; right:4px;
            border-radius:100%;
            border:1px dashed #68beaa;
            text-align:center;
            line-height:40px;
            font-style:normal;
            color:#049372;
        }
    </style>
    <strong><i> <h2 style="text-align: center; margin-top: 10px">VIEW ODERS</h2></i></strong>
    <div class="astrodivider"><div class="astrodividermask"></div><span><i>&#10038;</i></span></div>
<?php
	$sql_lietke_dh = "SELECT * FROM tbl_cart,users WHERE tbl_cart.id_khachhang=users.id ORDER BY tbl_cart.id_cart DESC";
	$query_lietke_dh = mysqli_query($con,$sql_lietke_dh);
?>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #D6EEEE;
        }
    </style>
<table >
  <tr>
  	<th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Họ</th>
    <th>Tên</th>
<!--    <th>Địa chỉ</th>-->
    <th>Email</th>
<!--    <th>Số điện thoại</th>-->
    <th>Tình trạng</th>
    <th>Ngày đặt</th>
  	<th>Quản lý</th>
    <th>In</th>
  
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
  	$i++;
  ?>
  <tr>
  	<td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['fname'] ?></td>
      <td><?php echo $row['lname'] ?></td>
<!--    <td>--><?php //echo $row['diachi'] ?><!--</td>-->
    <td><?php echo $row['email'] ?></td>
<!--    <td>--><?php //echo $row['dienthoai'] ?><!--</td>-->
    <td>
    	<?php if($row['cart_status']==1){
    		echo '<a href="xuly.php?code='.$row['code_cart'].'">Đơn hàng mới</a>';
    	}else{
    		echo 'Đã xem';
    	}
    	?>
    </td>
    <td><?php echo $row['cart_date'] ?></td>
   	<td>
   		<a href="xemdonhang.php?code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a>
   	</td>
    <td>
      <a href="indonhang.php?code=<?php echo $row['code_cart'] ?>">In Đơn hàng</a>
    </td>
   
  </tr>
  <?php
  } 
  ?>
 
</table>
<?php
include ('../admin/includes/footer.php');
?>