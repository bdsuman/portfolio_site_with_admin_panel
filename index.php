<?php
    require 'admin/controller/dbConfig.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Digilab - Free Bootstrap 4 Template by Colorlib</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="css/styleOne.css" />
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target"
    id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Digi<span>Lab</span></a>
      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
        data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav nav ml-auto">
          <li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
          <li class="nav-item"><a href="#services-section" class="nav-link"><span>Services</span></a></li>
          <li class="nav-item"><a href="#projects-section" class="nav-link"><span>Projects</span></a></li>
          <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
          <li class="nav-item"><a href="#testimony-section" class="nav-link"><span>Testimony</span></a></li>
          <li class="nav-item"><a href="#blog-section" class="nav-link"><span>Blog</span></a></li>
          <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <section id="home-section" class="hero">
    <h3 class="vr">Welcome to DigiLab</h3>
    <div class="home-slider js-fullheight owl-carousel">

      <!--slider dynamic start-->
      <?php

      $banarSelectQry = "select * from banners where `active_status`=1";
      $banarResults = mysqli_query($dbCon, $banarSelectQry);
      foreach($banarResults as $banar){
?>
      <div class="slider-item js-fullheight">
        <div class="overlay"></div>
        <div class="container-fluid p-0">
          <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end"
            data-scrollax-parent="true">
            <div class="one-third order-md-last img js-fullheight"
              style="background-image:url(admin/uploads/bannerImage/<?php echo $banar['image'];?>)">
              <div class="overlay"></div>
            </div>
            <div class="one-forth d-flex js-fullheight align-items-center ftco-animate"
              data-scrollax=" properties: { translateY: '70%' }">
              <div class="text">
                <span class="subheading"><?php echo $banar['title'];?></span>
                <h1 class="mb-4 mt-3"><?php echo $banar['sub_title'];?></h1>
                <p><?php echo $banar['details'];?></p>
                <p><a href="#" class="btn btn-primary px-5 py-3 mt-3">Get in touch</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php } ?>
      <!--slider dynamic end-->
    </div>
  </section>
  <section class="ftco-section ftco-no-pb ftco-no-pt ftco-services bg-light" id="services-section">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-4 ftco-animate py-5 nav-link-wrap">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <?php

              $serviceSelectQry = "select * from services where `design_status`=1 order by id asc";
              $servicesResults = mysqli_query($dbCon,$serviceSelectQry);
              foreach($servicesResults as $key=>$service){
                ++$key;
            ?>
                <a class="nav-link px-4 <?php echo ($key==1)?'active':'';?>" id="v-pills-<?php echo $key;?>-tab" data-toggle="pill" href="#v-pills-<?php echo $key;?>" role="tab"
                  aria-controls="v-pills-<?php echo $key;?>" aria-selected="true">
                      <span class="mr-3 <?php echo $service['icon_name'];?>"></span> <?php echo $service['service_name'];?>
                </a>
            <?php
             }
            ?>
          </div>
        </div>
        <div class="col-md-8 ftco-animate p-4 p-md-5 d-flex align-items-center">
          <div class="tab-content pl-md-5" id="v-pills-tabContent">
          <?php

          $serviceSelectQry = "select * from services where `design_status`=1 order by id asc";
          $servicesResults = mysqli_query($dbCon,$serviceSelectQry);
          foreach($servicesResults as $key=>$service){
          ++$key;
          ?>
            <div class="tab-pane fade show <?php echo ($key==1)?'active':'';?> py-5" id="v-pills-<?php echo $key;?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $key;?>-tab">
              <span class="icon mb-3 d-block <?php echo $service['icon_name'];?>"></span>
              <h2 class="mb-4"><?php echo $service['service_name'];?></h2>
              <p><?php echo $service['service_details'];?></p>
              <p><a href="#" class="btn btn-primary px-4 py-3">Learn More</a></p>
            </div>
            <?php 
            } 
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="ftco-section-2 img" style="background-image:url(images/bg_3.jpg)">
    <div class="container">
      <div class="row d-md-flex justify-content-end">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <?php
                $sectionSelectQry = "select * from sections where `status`=1 order by id asc";
                $sectionsResults = mysqli_query($dbCon,$sectionSelectQry);
                foreach($sectionsResults as $section){
              ?>
              <a href="<?php echo $section['page_link'];?>" class="services-wrap ftco-animate">
                <div class="icon d-flex justify-content-center align-items-center">
                  <span class="ion-ios-arrow-back"></span>
                  <span class="ion-ios-arrow-forward"></span>
                </div>
                <h2><?php echo $section['title'];?></h2>
                <p><?php echo $section['sub_title'];?></p>
              </a>
            <?php 
                }
            ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section ftco-project bg-light" id="projects-section">
    <div class="container px-md-5">
      <div class="row justify-content-center pb-5">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">Accomplishments</span>
          <h2 class="mb-4">Our Projects</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 testimonial">
          <div class="carousel-project owl-carousel">
          <?php
                	$selectQry = "SELECT categories.category_name,projects.project_name,projects.project_link,projects.project_thumb FROM projects inner join categories on projects.category_id= categories.id WHERE projects.active_status=1";
									$projectList = mysqli_query($dbCon, $selectQry);
									foreach ($projectList as $key => $project) {
              ?>
            <div class="item">
              <div class="project">
                <div class="img">
                  <img src="admin/uploads/projectImage/<?php echo $project['project_thumb']; ?>" class="img-fluid"
                    alt="Colorlib Template">
                  <div class="text px-4">
                    <h3><a href="<?php echo $project['project_link']; ?>"><?php echo $project['project_name']; ?></a></h3>
                    <span><?php echo $project['category_name']; ?></span>
                  </div>
                </div>
              </div>
            </div>
          <?php 
                }
          ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-6 col-lg-5 d-flex">
          <div class="img d-flex align-self-stretch align-items-center"
            style="background-image:url(images/xabout.jpg.pagespeed.ic.ddph6amxc8.jpg)">
          </div>
        </div>
        <div class="col-md-6 col-lg-7 pl-lg-5 py-5">
          <div class="py-md-5">
            <div class="row justify-content-start pb-3">
              <div class="col-md-12 heading-section ftco-animate">
                <span class="subheading">Welcome to digilab</span>
                <h2 class="mb-4" style="font-size: 34px; text-transform: capitalize;">We Are Digital Agency</h2>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
                  paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic
                  life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the
                  far World of Grammar.</p>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
                  paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
              </div>
            </div>
            <div class="counter-wrap ftco-animate d-flex mt-md-3">
              <div class="text p-4 bg-primary">
                <p class="mb-0">
                  <span class="number" data-number="20">0</span>
                  <span>Years of experience</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center pb-5">
        <div class="col-md-6 heading-section text-center ftco-animate">
          <span class="subheading">About Us</span>
          <h2 class="mb-4">Our Staff</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3 ftco-animate">
          <div class="staff">
            <div class="img-wrap d-flex align-items-stretch">
              <div class="img align-self-stretch"
                style="background-image:url(images/xstaff-1.jpg.pagespeed.ic.-caudx8oxf.jpg)"></div>
            </div>
            <div class="text d-flex align-items-center pt-3 text-center">
              <div>
                <h3 class="mb-2">Lloyd Wilson</h3>
                <span class="position mb-4">CEO, Founder</span>
                <div class="faded">
                  <ul class="ftco-social text-center">
                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 ftco-animate">
          <div class="staff">
            <div class="img-wrap d-flex align-items-stretch">
              <div class="img align-self-stretch"
                style="background-image:url(images/xstaff-2.jpg.pagespeed.ic.ah2dkk40qg.jpg)"></div>
            </div>
            <div class="text d-flex align-items-center pt-3 text-center">
              <div>
                <h3 class="mb-2">Rachel Parker</h3>
                <span class="position mb-4">Web Designer</span>
                <div class="faded">
                  <ul class="ftco-social text-center">
                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 ftco-animate">
          <div class="staff">
            <div class="img-wrap d-flex align-items-stretch">
              <div class="img align-self-stretch"
                style="background-image:url(images/xstaff-3.jpg.pagespeed.ic.ouqkobngee.jpg)"></div>
            </div>
            <div class="text d-flex align-items-center pt-3 text-center">
              <div>
                <h3 class="mb-2">Ian Smith</h3>
                <span class="position mb-4">Web Developer</span>
                <div class="faded">
                  <ul class="ftco-social text-center">
                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 ftco-animate">
          <div class="staff">
            <div class="img-wrap d-flex align-items-stretch">
              <div class="img align-self-stretch"
                style="background-image:url(images/xstaff-4.jpg.pagespeed.ic.rjllkc0xzz.jpg)"></div>
            </div>
            <div class="text d-flex align-items-center pt-3 text-center">
              <div>
                <h3 class="mb-2">Alicia Henderson</h3>
                <span class="position mb-4">Graphic Designer</span>
                <div class="faded">
                  <ul class="ftco-social text-center">
                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section testimony-section" id="testimony-section">
    <div class="container">
      <div class="row justify-content-center pb-3">
        <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          <h2 class="mb-4">Happy Clients</h2>
        </div>
      </div>
      <div class="row ftco-animate justify-content-center">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel ftco-owl">
            <div class="item">
              <div class="testimony-wrap text-center py-4 pb-5">
                <div class="user-img" style="background-image:url(images/xperson_1.jpg.pagespeed.ic.p4phl6glbj.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text px-4 pb-5">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                    Consonantia, there live the blind texts.</p>
                  <p class="name">John Fox</p>
                  <span class="position">Businessman</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap text-center py-4 pb-5">
                <div class="user-img" style="background-image:url(images/xperson_2.jpg.pagespeed.ic.yyrmjbh91b.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text px-4 pb-5">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                    Consonantia, there live the blind texts.</p>
                  <p class="name">John Fox</p>
                  <span class="position">Businessman</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap text-center py-4 pb-5">
                <div class="user-img" style="background-image:url(images/person_3.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text px-4 pb-5">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                    Consonantia, there live the blind texts.</p>
                  <p class="name">John Fox</p>
                  <span class="position">Businessman</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap text-center py-4 pb-5">
                <div class="user-img" style="background-image:url(images/xperson_4.jpg.pagespeed.ic.sgz97bcjv4.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text px-4 pb-5">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                    Consonantia, there live the blind texts.</p>
                  <p class="name">John Fox</p>
                  <span class="position">Businessman</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="testimony-wrap text-center py-4 pb-5">
                <div class="user-img" style="background-image:url(images/person_3.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text px-4 pb-5">
                  <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                    Consonantia, there live the blind texts.</p>
                  <p class="name">John Fox</p>
                  <span class="position">Businessman</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section bg-light" id="blog-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading">Blog</span>
          <h2 class="mb-4">Our Blog</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        </div>
      </div>
      <div class="row d-flex">
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry justify-content-end">
            <a href="single.html" class="block-20"
              style="background-image:url(images/ximage_1.jpg.pagespeed.ic.vf_don1zsh.jpg)">
            </a>
            <div class="text mt-3 float-right d-block">
              <div class="d-flex align-items-center pt-2 mb-4 topp">
                <div class="one mr-2">
                  <span class="day">12</span>
                </div>
                <div class="two">
                  <span class="yr">2019</span>
                  <span class="mos">March</span>
                </div>
              </div>
              <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business Growth</a>
              </h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              <div class="d-flex align-items-center mt-4 meta">
                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                      class="ion-ios-arrow-round-forward"></span></a></p>
                <p class="ml-auto mb-0">
                  <a href="#" class="mr-2">Admin</a>
                  <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry justify-content-end">
            <a href="single.html" class="block-20"
              style="background-image:url(images/ximage_2.jpg.pagespeed.ic.mmfqd6zg2h.jpg)">
            </a>
            <div class="text mt-3 float-right d-block">
              <div class="d-flex align-items-center pt-2 mb-4 topp">
                <div class="one mr-2">
                  <span class="day">10</span>
                </div>
                <div class="two">
                  <span class="yr">2019</span>
                  <span class="mos">March</span>
                </div>
              </div>
              <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business Growth</a>
              </h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              <div class="d-flex align-items-center mt-4 meta">
                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                      class="ion-ios-arrow-round-forward"></span></a></p>
                <p class="ml-auto mb-0">
                  <a href="#" class="mr-2">Admin</a>
                  <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry">
            <a href="single.html" class="block-20"
              style="background-image:url(images/ximage_3.jpg.pagespeed.ic.trchucgaea.jpg)">
            </a>
            <div class="text mt-3 float-right d-block">
              <div class="d-flex align-items-center pt-2 mb-4 topp">
                <div class="one mr-2">
                  <span class="day">05</span>
                </div>
                <div class="two">
                  <span class="yr">2019</span>
                  <span class="mos">March</span>
                </div>
              </div>
              <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business Growth</a>
              </h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              <div class="d-flex align-items-center mt-4 meta">
                <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                      class="ion-ios-arrow-round-forward"></span></a></p>
                <p class="ml-auto mb-0">
                  <a href="#" class="mr-2">Admin</a>
                  <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading">Contact</span>
          <h2 class="mb-4">Contact Us</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        </div>
      </div>
      <div class="row d-flex contact-info mb-5">
        <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          <div class="align-self-stretch box p-4 text-center">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="icon-map-signs"></span>
            </div>
            <h3 class="mb-4">Address</h3>
            <p>198 West 21th Street, Suite 721 New York NY 10016</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          <div class="align-self-stretch box p-4 text-center">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="icon-phone2"></span>
            </div>
            <h3 class="mb-4">Contact Number</h3>
            <p><a href="tel://1234567920">+ 1235 2355 98</a></p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          <div class="align-self-stretch box p-4 text-center">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="icon-paper-plane"></span>
            </div>
            <h3 class="mb-4">Email Address</h3>
            <p><a href="/#bdd4d3dbd2fdc4d2c8cfced4c9d893ded2d0"><span class="__cf_email__"
                  data-cfemail="0d64636b624d7462787f7e647968236e6260">[email&#160;protected]</span></a></p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          <div class="align-self-stretch box p-4 text-center">
            <div class="icon d-flex align-items-center justify-content-center">
              <span class="icon-globe"></span>
            </div>
            <h3 class="mb-4">Website</h3>
            <p><a href="#">yoursite.com</a></p>
          </div>
        </div>
      </div>
      <div class="row no-gutters block-9">
        <div class="col-md-6 order-md-last d-flex">
          <form action="#" class="bg-light p-5 contact-form">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Your Name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Your Email">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Subject">
            </div>
            <div class="form-group">
              <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
            </div>
          </form>
        </div>
        <div class="col-md-6 d-flex">
          <div id="map" class="bg-white"></div>
        </div>
      </div>
    </div>
  </section>
  <footer class="ftco-footer ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">About DigiLab</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-4">
            <h2 class="ftco-heading-2">Links</h2>
            <ul class="list-unstyled">
              <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
              <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
              <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Services</a></li>
              <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Projects</a></li>
              <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Services</h2>
            <ul class="list-unstyled">
              <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Web Design</a></li>
              <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Web Development</a></li>
              <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Business Strategy</a></li>
              <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Data Analysis</a></li>
              <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Graphic Design</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San
                    Francisco, California, USA</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text"><span class="__cf_email__"
                        data-cfemail="670e090108271e08121503080a060e094904080a">[email&#160;protected]</span></span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <p>
            Copyright &copy;
            <script data-cfasync="false" src="js/email-decode.min.js"></script>
            <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with
            <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com"
              target="_blank">Colorlib</a>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" />
    </svg></div>
  <script src="js/jquery.min.js"></script>
  <script src="script/script_one.js"></script>
  <script>eval(mod_pagespeed_QoQw5mEjcw);</script>
  <script>eval(mod_pagespeed_vJQZATLKX_);</script>
  <script>eval(mod_pagespeed__uMKjXdTTb);</script>
  <script src="script/script_two.js"></script>
  <script>eval(mod_pagespeed_MopiGN0l60);</script>
  <script>eval(mod_pagespeed_yqyi7SROoB);</script>
  <script>eval(mod_pagespeed_B_8AKRgOLa);</script>
  <script>eval(mod_pagespeed_KlaBTxBGz$);</script>
  <script src="script/script_three.js"></script>
  <script>eval(mod_pagespeed_xJO9nXgGsQ);</script>
  <script>eval(mod_pagespeed_keatkQTnas);</script>
  <script>eval(mod_pagespeed_GaS9YCK1um);</script>
  <script>eval(mod_pagespeed_RTyTkD0doj);</script>
  <script src="maps/api/map.js"></script>
  <script>eval(mod_pagespeed_EpcOxjoUJz);</script>
  <script>eval(mod_pagespeed_hwvKDLnz23);</script>
 
</body>

</html>
<?php 
mysqli_close($dbCon);
?>