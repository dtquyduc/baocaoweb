<div class="container">
    <section class="slider">
        <div class="wrap-images">
            <img src="./images/slider/slider_1.webp" alt="" class="img-item" />
            <img src="./images/slider/slider_2.webp" alt="" class="img-item" />
            <img src="./images/slider/slider_3.png" alt="" class="img-item" />
            <img src="./images/slider/slider_4.png" alt="" class="img-item" /> 
        </div>
        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div> 
            <div class="dot"></div> 
        </div>
    </section>
</div>
<div class="title">
    <span>Sản phẩm mới</span>
</div>
<div class="product-news">
    <?php
    $result = showNewProduct($conn, 5);
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
<div class="title">
    <span>Sản phẩm nổi bật</span>
</div>
<div class="product-featured">
    <?php
    $result = showProductFeatured($conn, 1, 5);
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
    <?php

    ?>
</div>
<div class="all-product btn">
    <a href="index.php?url=product">
        <button class="">Xem tất cả
            <i class="fa-solid fa-angle-right"></i>
        </button>
    </a>
</div>
</div>