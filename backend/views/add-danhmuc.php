<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                DANH MỤC <small>JACK&NAT -  DANH MỤC</small>
            </h1>

            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Thêm mới danh mục
                </li>
            </ol>
        </div>

    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
            <form action="" method="POST" enctype="multipart/form-data">
            
                <div class="form-group">
                    <label for="input-username">Tên danh mục</label>
                    <input type="text" required="" class="form-control" name="danhmuc" id="tendanhmuc" required="">
                </div>
				
                <button type="submit" name="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
    <!-- /.row -->

</div>

<?php  
    if (isset($_POST['submit'])) {
        $tendanhmuc = $_POST['ten_danh_muc'];
       
        $sql = "INSERT INTO tbl_danh_muc(ten_danh_muc) VALUES('$tendanhmuc')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
           $_SESSION['check'] = 1;
           header("Location: index.php?page=dsdanhmuc");
        }

    }

?>