<!-- Main navigation -->
<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

            <!-- Main -->
            <li class=<?php echo $manuName == 'admin' ? "active" : ''; ?> ><a href="<?php echo $isInternal == true ? '../': '';?>index.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
            <li class=<?php echo $manuName == 'banner' ? "active" : ''; ?> ><a href="<?php echo $isInternal == true ? '../banner/': 'banner/';?>bannerList.php"><i class="icon-image-compare"></i> <span>Banners</span></a></li>
            <li class=<?php echo $manuName == 'service' ? "active" : ''; ?>><a href="<?php echo $isInternal == true ? '../service/': 'service/';?>servicesList.php"><i class="icon-office"></i> <span>Services</span></a></li>
            <li class=<?php echo $manuName == 'project' ? "active" : ''; ?>><a href="<?php echo $isInternal == true ? '../project/': 'project/';?>projectsList.php"><i class="icon-file-text"></i> <span>Project</span></a></li>
            <li class=<?php echo $manuName == 'section' ? "active" : ''; ?>><a href="<?php echo $isInternal == true ? '../section/': 'section/';?>sectionsList.php"><i class="icon-stack3"></i> <span>Section</span></a></li>
            <li class=<?php echo $manuName == 'staff' ? "active" : ''; ?>><a href="<?php echo $isInternal == true ? '../staff/': 'staff/';?>staffList.php"><i class="icon-theater"></i> <span>Staff</span></a></li>
           
            <li>
                <a href="#"><i class="icon-gear"></i> <span>Back Office Setup</span></a>
                <ul>
                    <li class=<?php echo $manuName == 'category' ? "active" : ''; ?>><a href="<?php echo $isInternal == true ? '../category/': 'category/';?>categoryList.php"><i class="icon-color-sampler"></i> <span>Category</span></a></li>
                    <li class=<?php echo $manuName == 'designation' ? "active" : ''; ?>><a href="<?php echo $isInternal == true ? '../designation/': 'designation/';?>designationList.php"><i class="icon-magazine"></i> <span>Designation</span></a></li>
                   
                </ul>
            </li>
            
            <!-- <li>
                <a href="#"><i class="icon-stack"></i> <span>Starter kit</span></a>
                <ul>
                    <li>
                        <a href="#">3 columns</a>
                        <ul>
                            <li><a href="starters/3_col_dual.html">Dual sidebars</a></li>
                        </ul>
                    </li>
                </ul>
            </li> -->
            <!-- /main -->

        </ul>
    </div>
</div>
<!-- /main navigation -->