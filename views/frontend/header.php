<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>giao diện web</title>
     <link rel="stylesheet" href="public/css/all.min.css">
     <link rel="stylesheet" href="public/css/bootstrap.min.css">
     <link rel="stylesheet" href="public/css/layoutsite.css">
     <link rel="stylesheet" href="public/css/owl.carousel.min.css">
     <link rel="stylesheet" href="public/css/owl.theme.default.min.css">
     <script src="public/js/jquery.min.js"></script>
     <script src="public/js/owl.carousel.js"></script>
     
    

</head>

<body>
     <section class="topbar border-bottom">
          <div class="container">
               <div class="row">
                    <div class="col-md-2 border-end mb-2 toan3">
                    <img src="public/images/logopolo.png" width="180" alt="">
                    </div>
                    <div class="col-md-6 border-end text-center  toan3">
                    <div class="col-md-10"><i class="fas fa-clock"></i>T2 - T7 8h00 - 22h00<br>
                   Bạn cần hỗ trợ? <i class="fas fa-phone"></i>Gọi ngay 19006750<br>
                  Tuần lễ SALE Giảm giá  UP TO 50%</div>
                    </div>
                    <div class="col-md-4 border-end text-center toan3">
                    <a class="toan" href="index.php?option=customer&f=logout"><i class="fa-solid fa-user"></i>Đăng Xuất</a>
                    <a class="toan" href="index.php?option=customer&f=login"><i class="fa-solid fa-user"></i>Đăng Nhập</a>
                    <a class="toan" href="index.php?option=customer&f=profile"><i class="fa-solid fa-user"></i>đơn đã mua</a>
                    
                    </div>
                   

               </div>
          </div>
     </section>
     <section class="header s1">
          <div class="container">
               <div class="row">
                    <div class="col-md-12 mt-1 s1 md-2">
                          <marquee direction="left" height="20" onmouseout="this.start()" scrollamount="3" onmouseover="this.stop()"> 
                                    <li style="list-style:none;display:inline-block;color:red;">
                                        <a title="cửa hàng polo Tây Ninh xin kính chào quý khách,chúc quý khách có một ngày mới tốt lành bên gia đình và người thân" rel="dofollow" 
                                        target="_self">
                                       <p> CỬA HÀNG POLO TÂY NINH XIN KÍNH  CHÀO QUÝ KHÁCH, CHÚC QUÝ KHÁCH CÓ MỘT NGÀY MỚI TỐT LÀNH VÀ MAY MẮN </p></a>
                                   </li>
                          <li style="list-style:none;display:inline-block"> </li> 
                          </marquee>
                    </div>
               </div>
          </div>
     </section>
     <section class="mainmenu bg-mainmenu ">
          <div class="container">
          <?php require_once('views/frontend/mod_mainmenu.php'); ?>
          </div>
     </section>