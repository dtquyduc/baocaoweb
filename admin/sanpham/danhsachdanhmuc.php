<?php 
          $sql = "SELECT * FROM danhmuc";
     $query = mysqli_query($conn, $sql);
?>

<div class="container-fluid">
     <div class="card">
          <div class="card-body">

               <table class="table-dm">
                    <tr>
                         <th>STT</th>
                         <th>Tên danh muc</th>
                         <th>Nổi bật</th>
                         <th></th>

                    </tr>
                    <?php
                             $i = 1;
                             while($row = mysqli_fetch_array($query)){?>
                    <tr>
                         <th><?php echo $i++; ?></th>
                         <td><?php echo $row['tendm']; ?></td>
                         <td><?php echo $row['noibat']; ?></td>
                         <th><a href="sanpham/suadanhmuc.php?id=<?php echo $row['id_danhmuc'] ?>">Sửa</a> </th>
                    </tr>
                    <?php 
                             }
                         ?>
               </table>

          </div>

     </div>
</div>