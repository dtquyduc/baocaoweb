<?php 

     $sql = "SELECT * FROM sanpham, thongsokythuat WHERE sanpham.id_sanpham = thongsokythuat.id_sanpham";
     $query = mysqli_query($conn, $sql);

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

          $sql_thongsokythuat = "INSERT INTO thongsokythuat(id_sanpham, cpu, ram, ocung, cardohoa, manhinh, conggiaotiep, audio, banphim, lan, wifi, bluetooth, webcam, hedieuhanh, pin, trongluong, mausac, kichthuoc) VALUES ('$id_sanpham','$cpu', '$ram', '$ocung', '$cardohoa', '$manhinh', '$conggiaotiep', '$audio', '$banphim', '$lan', '$wifi', '$bluetooth', '$webcam', '$hedieuhanh', '$pin', '$trongluong', '$mausac', '$kichthuoc')";

          $query_thongsokythuat = mysqli_query($conn, $sql_thongsokythuat);

          header('location:index.php?page=danhsachsanpham');


     }
?>

<div class="container-from">
     <h1>Thêm thông số kỹ thuật</h1>
     <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
               <label for="id_sanpham">Sản phẩm:</label>
               <select name="id_sanpham" id="id_sanpham" class="form-control">

                    <?php
                         $sql = "SELECT * FROM sanpham order by id_sanpham desc";
                         $query = mysqli_query($conn, $sql);
                         while ($row = mysqli_fetch_array($query)) {
                         ?>
                    <option value="<?php echo $row['id_sanpham'] ?>"><?php  echo $row['tensp'] ?></option>
                    <?php
                          }
                         ?>

               </select>

          </div>

          <div class="form-group">
               <label for="cpu">CPU:</label>
               <input type="text" id="cpu" class="form-control" name="cpu" required>
          </div>
          <div class="form-group">
               <label for="ram">RAM:</label>
               <input type="text" id="ram" class="form-control" name="ram" required>
          </div>
          <div class="form-group">
               <label for="ocung">Ổ cứng:</label>
               <input type="text" id="ocung" class="form-control" name="ocung" required>
          </div>
          <div class="form-group">
               <label for="cardohoa">Card đồ họa:</label>
               <input type="text" id="cardohoa" class="form-control" name="cardohoa" required>
          </div>
          <div class="form-group">
               <label for="manhinh">Màn hình:</label>
               <input type="text" id="manhinh" class="form-control" name="manhinh" required>
          </div>
          <div class="form-group">
               <label for="conggiaotiep">Cổng giao tiếp:</label>
               <input type="text" id="conggiaotiep" class="form-control" name="conggiaotiep" required>
          </div>
          <div class="form-group">
               <label for="audio">Audio:</label>
               <input type="text" id="audio" class="form-control" name="audio" required>
          </div>
          <div class="form-group">
               <label for="banphim">Bàn phím:</label>
               <input type="text" id="banphim" class="form-control" name="banphim" required>
          </div>
          <div class="form-group">
               <label for="lan">Chuẩn LAN:</label>
               <input type="text" id="lan" class="form-control" name="lan" required>
          </div>
          <div class="form-group">
               <label for="wifi">Chuẩn Wifi:</label>
               <input type="text" id="wifi" class="form-control" name="wifi" required>
          </div>
          <div class="form-group">
               <label for="bluetooth">Bluetooth:</label>
               <input type="text" id="bluetooth" class="form-control" name="bluetooth" required>
          </div>
          <div class="form-group">
               <label for="webcam">Webcam:</label>
               <input type="text" id="webcam" class="form-control" name="webcam" required>
          </div>
          <div class="form-group">
               <label for="hedieuhanh">Hệ điều hành:</label>
               <input type="text" id="hedieuhanh" class="form-control" name="hedieuhanh" required>
          </div>
          <div class="form-group">
               <label for="pin">Pin:</label>
               <input type="text" id="pin" class="form-control" name="pin" required>
          </div>
          <div class="form-group">
               <label for="trongluong">Trọng lượng:</label>
               <input type="text" id="trongluong" class="form-control" name="trongluong" required>
          </div>

          <div class="form-group">
               <label for="mausac">Màu sắc:</label>
               <input type="text" id="mausac" class="form-control" name="mausac" required>
          </div>
          <div class="form-group">
               <label for="kichthuoc">Kích thước:</label>
               <input type="text" id="kichthuoc" class="form-control" name="kichthuoc" required>
          </div>

          <button type="submit" name="sbm" class="btn-success">Thêm thông số kỹ thuật</button>
     </form>
</div>