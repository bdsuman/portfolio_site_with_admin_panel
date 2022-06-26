<!-- Main navigation -->
<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

            <!-- Main -->
            <li class=<?php echo $manuName == 'admin' ? "active" : ''; ?> ><a href="<?php echo $isInternal == true ? '../': '';?>index.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
            <li class=<?php echo $manuName == 'banner' ? "active" : ''; ?> ><a href="<?php echo $isInternal == true ? '../banner/': 'banner/';?>bannerList.php"><i class="icon-image-compare"></i> <span>Banners</span></a></li>
            <li class=<?php echo $manuName == 'service' ? "active" : ''; ?>><a href="<?php echo $isInternal == true ? '../service/': 'service/';?>servicesList.php"><i class="icon-office"></i> <span>Services</span></a></li>
            <li class=<?php echo $manuName == 'category' ? "active" : ''; ?>><a href="<?php echo $isInternal == true ? '../category/': 'category/';?>categoryList.php"><i class="icon-office"></i> <span>Category</span></a></li>
            <li><a href="#"><i class="icon-home4"></i> <span>Sections</span></a></li>
            <li><a href="#"><i class="icon-home4"></i> <span>Our Projects</span></a></li>
            <li><a href="#"><i class="icon-home4"></i> <span>Our Staff</span></a></li>
            <li><a href="#"><i class="icon-home4"></i> <span>Our Clients</span></a></li>
            <li><a href="#"><i class="icon-home4"></i> <span>Contact Messagea</span></a></li>
            
            <li>
                <a href="#"><i class="icon-gear"></i> <span>Back Office Setup</span></a>
                <ul>
                    <li><a href="#">Category</a></li>
                    <li><a href="#">Designation</a></li>
                </ul>
            </li>
            
            <li>
                <a href="#"><i class="icon-stack"></i> <span>Starter kit</span></a>
                <ul>
                    <li>
                        <a href="#">3 columns</a>
                        <ul>
                            <li><a href="starters/3_col_dual.html">Dual sidebars</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- /main -->

        </ul>
    </div>
</div>
<!-- /main navigation -->