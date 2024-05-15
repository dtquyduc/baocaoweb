<div class="row">
    <div class="category">
        <ul class="category-ul">
            <?php
            $result = showAllTable($conn, 'danhmuc');
            while ($row = mysqli_fetch_array($result)) { ?>
                <li><a href="index.php?url=product&danmuc=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendm'] ?></a></li>
            <?php
            }
            ?>
        </ul>
    </div>
    <div class="list-product row">
        <?php
        if (isset($_GET['danmuc'])) {
            $id = $_GET['danmuc'];
            $result = showTableCondition($conn, 'sanpham', 'id_danhmuc', $id);
        } else {
            $result = showAllTable($conn, 'sanpham');
        }
        while ($row = mysqli_fetch_array($result)) {
            echo '<div class="product-item">
                        <div class="image-product">
                            <a href="index.php?url=detail&id=' . $row['id_sanpham'] . '">
                                <img src="./images/product/' . $row['hinhanh'] . '" alt="" />
                            </a>
                        </div>
                        <div class="content">
                            <div class="name">
                                <h3>' . $row['tensp'] . '
                                </h3>
                            </div>
                            <div class="price">
                                    <span>' . number_format($row['gia'], 0, ',', '.') . '&#8363;</span>
                            </div>
                        </div>
                        <div class="btn">
                            <a href="index.php?url=detail&id=' . $row['id_sanpham'] . '">
                                <button type="submit">Xem</button>
                            </a>
                        </div>
                    </div>';
        }
        ?>
    </div>