<?php 
require '../../connect.php';
     $id = $_GET['id'];
     $sql_up = "SELECT * FROM sanpham, thongsokythuat WHERE sanpham.id_sanpham = thongsokythuat.id_sanpham AND sanpham.id_sanpham = '$id' AND sanpham.id_sanpham = '$id'";
     $query_up = mysqli_query($conn, $sql_up);
     $row_up = mysqli_fetch_array($query_up);

     if(isset($_POST['sbm'])){
          $id_sanpham = $_POST['id_sanpham'];
          $cpu = $_POST['cpu'];
          $ram = $_POST['ram'];
          $ocung = $_POST['ocung'];
          $cardohoa = $_POST['cardohoa'];
          $manhinh = $_POST['manhinh'];
          $conggiaotiep = $_POST['conggiaotiep'];
          $audio = $_POST['audio'];
          $banphim = $_POST['banphim'];
          $lan = $_POST['lan'];
          $wifi = $_POST['wifi'];
          $bluetooth = $_POST['bluetooth'];
          $webcam = $_POST['webcam'];
          $hedieuhanh = $_POST['hedieuhanh'];
          $pin = $_POST['pin'];
          $trongluong = $_POST['trongluong'];
          $mausac = $_POST['mausac'];
          $kichthuoc = $_POST['kichthuoc'];

          $sql_thongsokythuat = "UPDATE thongsokythuat SET id_sanpham = '$id_sanpham', cpu = '$cpu', ram = '$ram', ocung = '$ocung', cardohoa = '$cardohoa', manhinh = '$manhinh', conggiaotiep = '$conggiaotiep', audio = '$audio', banphim = '$banphim', lan = '$lan', wifi = '$wifi', bluetooth = '$bluetooth', webcam = '$webcam', hedieuhanh = '$hedieuhanh', pin = '$pin', trongluong = '$trongluong', mausac = '$mausac', kichthuoc = '$kichthuoc' WHERE id_sanpham = '$id'";

          $query_thongsokythuat = mysqli_query($conn, $sql_thongsokythuat);

          header('location:../index.php?page=danhsachsua');

     }
?>
<link rel="stylesheet" href="../css/admin.css">
<link rel="stylesheet" href="../css/main.css">
<div class="container-from">
     <h1>Sửa sản phẩm </h1>
     <form action="" method="post">

          <div class="form-group">
               <label for="id_sanpham">Sản phẩm:</label>
               <select name="id_sanpham" id="id_sanpham" class="form-control" required
                    value="<?php echo $row_up['id_sanpham'] ?>">
                    <?php
                         $sql = "SELECT * FROM sanpham where id_sanpham = '$id'";
                         $query = mysqli_query($conn, $sql);
                         while ($row = mysqli_fetch_array($query)) {
                         ?>
                    <option required value="<?php echo $row_up['id_sanpham'] ?>"> <?php  echo $row['tensp'] ?>
                    </option>
                    <?php
                          }
                         ?>

               </select>

          </div>

          <div class="form-group">
               <label for="cpu">CPU:</label>
               <input type="text" id="cpu" class="form-control" name="cpu" required
                    value="<?php echo $row_up['cpu'] ?>">
          </div>
          <div class="form-group">
               <label for="ram">RAM:</label>
               <input type="text" id="ram" class="form-control" name="ram" required
                    value="<?php echo $row_up['ram'] ?>">
          </div>
          <div class="form-group">
               <label for="ocung">Ổ cứng:</label>
               <input type="text" id="ocung" class="form-control" name="ocung" required
                    value="<?php echo $row_up['ocung'] ?>">
          </div>
          <div class="form-group">
               <label for="cardohoa">Card đồ họa:</label>
               <input type="text" id="cardohoa" class="form-control" name="cardohoa" required
                    value="<?php echo $row_up['cardohoa'] ?>">
          </div>
          <div class="form-group">
               <label for="manhinh">Màn hình:</label>
               <input type="text" id="manhinh" class="form-control" name="manhinh" required
                    value="<?php echo $row_up['manhinh'] ?>">
          </div>
          <div class="form-group">
               <label for="conggiaotiep">Cổng giao tiếp:</label>
               <input type="text" id="conggiaotiep" class="form-control" name="conggiaotiep" required
                    value="<?php echo $row_up['conggiaotiep'] ?>">
          </div>
          <div class="form-group">
               <label for="audio">Audio:</label>
               <input type="text" id="audio" class="form-control" name="audio" required
                    value="<?php echo $row_up['audio'] ?>">
          </div>
          <div class="form-group">
               <label for="banphim">Bàn phím:</label>
               <input type="text" id="banphim" class="form-control" name="banphim" required
                    value="<?php echo $row_up['banphim'] ?>">
          </div>
          <div class="form-group">
               <label for="lan">Chuẩn LAN:</label>
               <input type="text" id="lan" class="form-control" name="lan" required
                    value="<?php echo $row_up['lan'] ?>">
          </div>
          <div class="form-group">
               <label for="wifi">Chuẩn Wifi:</label>
               <input type="text" id="wifi" class="form-control" name="wifi" required
                    value="<?php echo $row_up['wifi'] ?>">
          </div>
          <div class="form-group">
               <label for="bluetooth">Bluetooth:</label>
               <input type="text" id="bluetooth" class="form-control" name="bluetooth" required
                    value="<?php echo $row_up['bluetooth'] ?>">
          </div>
          <div class="form-group">
               <label for="webcam">Webcam:</label>
               <input type="text" id="webcam" class="form-control" name="webcam" required
                    value="<?php echo $row_up['webcam'] ?>">
          </div>
          <div class="form-group">
               <label for="hedieuhanh">Hệ điều hành:</label>
               <input type="text" id="hedieuhanh" class="form-control" name="hedieuhanh" required
                    value="<?php echo $row_up['hedieuhanh'] ?>">
          </div>
          <div class="form-group">
               <label for="pin">Pin:</label>
               <input type="text" id="pin" class="form-control" name="pin" required
                    value="<?php echo $row_up['pin'] ?>">
          </div>
          <div class="form-group">
               <label for="trongluong">Trọng lượng:</label>
               <input type="text" id="trongluong" class="form-control" name="trongluong" required
                    value="<?php echo $row_up['trongluong'] ?>">
          </div>

          <div class="form-group">
               <label for="mausac">Màu sắc:</label>
               <input type="text" id="mausac" class="form-control" name="mausac" required
                    value="<?php echo $row_up['mausac'] ?>">
          </div>
          <div class="form-group">
               <label for="kichthuoc">Kích thước:</label>
               <input type="text" id="kichthuoc" class="form-control" name="kichthuoc" required
                    value="<?php echo $row_up['kichthuoc'] ?>">
          </div>

          <button type="submit" name="sbm" class="btn-success">Sửa sản phẩm</button>
     </form>
</div>