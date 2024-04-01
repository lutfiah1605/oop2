<nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section">
                <a href="databeras.php"><img class="logo_icon img-responsive" src="images/logo/logo.png" alt="#" /></a>
            </div>
        </div>
        <div class="sidebar_user_info">
            <div class="icon_setting"></div>
            <div class="user_profle_side">
                <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" />
                </div>
                <div class="user_info">
                    <h6>
                        <?php echo $_SESSION['username']; ?>
                    </h6>
                    <p><span class="online_animation"></span> Online</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar_blog_2">
        <h4>MENU</h4>
        <ul class="list-unstyled components">
            <li><a href="databeras.php"><i class="fa fa-database yellow_color"></i> <span>Data Beras</span></a></li>
            <li><a href="muzakki.php"><i class="fa fa-user"></i> <span>Muzakki</span></a></li>
            <li><a href="transaksi.php"><i class="fa fa-credit-card blue_color"></i> <span>Transaksi</span></a></li>
        </ul>
    </div>
</nav>