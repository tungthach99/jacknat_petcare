<?php  
    if (isset($_POST['submit_search'])) {
        $key = $_POST['keyw'];
        $sql = "SELECT *FROM tbl_don_hang WHERE dien_thoai LIKE '%$key%' ORDER BY id_don_hang";
    }else{
        $sql = "SELECT *FROM tbl_don_hang ORDER BY id_don_hang";
    }
    
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Đơn hàng <small>JACK & NAT Pet Care</small>
            </h1>

            <form action="" method="POST">
                <div class="input-group">

                  <input type="text" required="" placeholder="Nhập số điện thoại cần tìm..." name="keyw" class="form-control" value="<?php if(isset($key)) { echo $key; } ?>"/>

                  <span class="input-group-addon">
                      <button style="line-height: 0px; padding: 0px;" type="submit" class="" name="submit_search">Tìm kiếm</button>
                  </span>

                </div>
            </form>

            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Danh sách đơn hàng
                </li>
            </ol>
        </div>

    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <?php if ($count > 0) { ?>
                    <thead>
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Họ tên</th>
                            <th class="text-center">Số điện thoại</th>
                            <th class="text-center">Email </th>
                            <th class="text-center">Thời gian</th>
 			    <th class="text-center">Tổng tiền</th>
			    <th class="text-center">Mã giảm giá</th>
			    <th class="text-center">Địa chỉ nhận hàng</th>
                            <th class="text-center">Hình Thức</th>
			    <th class="text-center">Ghi Chú</th>
			    <th class="text-center">Tình trạng</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $stt = 0;
                            while ($row = mysqli_fetch_array($query)) {
                                 $stt += 1;
                        ?>
                            <tr>
                                <td><?php echo $stt; ?></td>
                                <td><?php echo $row['ten_khach_hang']; ?></td>
                                <td><?php echo $row['dien_thoai']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($row['ngay_dat'])); ?></td>
                               	<td><?php echo $row['tong_tien']; ?></td>
				<td><?php echo $row['ma_giam_gia']; ?></td>
				<td><?php echo $row['dia_chi_nhan_hang']; ?></td>
				<td><?php echo $row['hinh_thuc_mua_hang']; ?></td>
	        		<td><?php echo $row['ghi_chu']; ?></td>
 
                                <td>
                                    <?php  
                                        // if ($row['trang_thai'] == 1) {
                                        //     echo "<p style='color: red;'>Đã thanh toán</p>";

                                        // }else{
                                        //     echo "<p style='color: red;'>Chưa thanh toán </p>";
                                        // }
                                    ?>
                                    <form action="index.php?page=ordered&id=<?php echo $row['id_don_hang']; ?>" method="POST">
                                        <div class="input-group">

                                            <select class="form-control" name="<?php echo $row['id_don_hang']; ?>" id="">
                                                <option value="1" <?php if(isset($row['trang_thai']) && $row['trang_thai'] == 1) { ?> selected="selected"  <?php } ?> >Đã thanh toán</option>
                                                <option value="0" <?php if(isset($row['trang_thai']) && $row['trang_thai'] == 0) { ?> selected="selected"  <?php } ?> >Chưa thanh toán</option>
                                            </select>

                                            <span class="input-group-addon">
                                                <button onclick="return confirm('Bạn có thực sự muốn cập nhật trạng thái đặt này không?');" style="line-height: 0px; padding: 0px;" type="submit" class="" name="submit">Cập nhật</button>
                                            </span>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        <?php
                                }
                            }else{
                        ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Dữ liệu</strong> hiện không có!
                            </div>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>

<?php  
    if (isset($_POST['submit'])) {
        $id = $_GET['id_don_hang'];
        $status_order = $_POST[$id];
        
        $sql_status = "UPDATE tbl_don_hang SET trang_thai = '$status_order' WHERE id_don_hang = $id";
        $query = mysqli_query($conn, $sql_status);
        header("Location: index.php?page=ordered;");

    }
?>