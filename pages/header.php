<header class="header">
    <div class="header-left">
        <a href="index.php?url=home"><img src="./icon/logoFshop.png" alt="" /></a>

    </div>
    <div class="header-center">
        <form autocomplete="off" method="post" action="index.php?url=search">
            <div class="search">
                <div class="search-input">
                    <input type="search" required name="search" placeholder="Bạn cần tìm gì..." value="<?php echo isset($_POST['search']) ? $_POST['search'] : ""  ?>" />
                    <button type="submit" name="btn_search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="header-right">
        <div class="phone">
            <div class="image">
                <img src="./icon/phone-icon.webp" alt="" />
            </div>
            <div class="text">
                <div>Gọi mua hàng</div>
                <div><a href="#">0322771486</a></div>
            </div>
        </div>
        <div class="map">
            <div class="image">
                <img src="./icon/address-icon.webp" alt="" />
            </div>
            <div class="text">
                <a href="">Hệ thống <br />
                    cửa hàng</a>
            </div>
        </div>
        <div class="account">
            <div class="image">
                <img src="./icon/account-icon.webp" alt="" />
            </div>
            <div class="text">
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<a>" . $_SESSION['username'] . "</a><br/>";
                    echo ' <a href="index.php?url=logout">Đăng xuất
                    </a>';
                } else {
                    echo '<a href="index.php?url=login">Đăng nhập</a><br/>';
                    echo '<a href="index.php?url=register">Đăng ký</a><br/>';
                }
                ?>
                </a>
            </div>
        </div>
        <div class="cart">
            <a href="index.php?url=cart">
                <div class="icon-cart">
                    <img src="./icon/cart-icon.png" alt="">
                </div>
                <div class="text-cart">
                    <span>Giỏ hàng</span>
                </div>
            </a>
            <span class="quantity_cart">
                <?php
                echo isset($_SESSION['cart']) ?  count($_SESSION['cart']) :  0;
                ?>
            </span>
        </div>
    </div>
</header>