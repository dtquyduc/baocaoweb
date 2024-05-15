<?php 
// require '../../connect.php';
          $sql = "SELECT * FROM quatang";
     $query = mysqli_query($conn, $sql);
?>

<div class="container-fluid">
     <div class="card">

          <div class="card-body">

               <table class="table-qt">
                    <tr>
                         <th>STT</th>
                         <th>Tên quà tặng</th>


                    </tr>
                    <?php
                             $i = 1;
                             while($row = mysqli_fetch_array($query)){?>
                    <tr>
                         <th><?php echo $i++; ?></th>
                         <td><?php echo $row['tenqt']; ?></td>

                         <th><a class="btn-sqt"
                                   href="sanpham/suaquatang.php?id=<?php echo $row['id_quatang'] ?>">Sửa</a>
                         </th>
                    </tr>
                    <?php 
                             }
                         ?>
               </table>
          </div>
     </div>
</div>