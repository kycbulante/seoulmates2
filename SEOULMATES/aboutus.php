<?php 
session_start();
include("includes/header.php"); 
?>
<link rel="stylesheet" href="assets/css/custom.css">

<style>
    .about {
     padding-top: 90px ;
     padding-bottom: 84px ;
     background: url(../images/aboutbg.jpg);
    background-position-x: 0%;
    background-position-y: 0%;
    background-repeat: repeat;
    background-size: auto;
    background-repeat: no-repeat;
    background-size: 100% 100%;
    background-position: center center;
}

.about .about_img figure {
     margin: 0px;
}

.about .about_box {
     text-align: right;
     padding-top: 130px;
}

.about .about_box h3 {
     font-weight: bold;
     font-size: 30px;
     color: #888687;
     line-height: 32px;
     padding-bottom: 7px;
    display: block;
}

.about .about_box span {
     font-weight: bold;
     font-size: 50px;
     line-height: 58px;
     color:#23242a; 
     padding-bottom: 10px;
display: block
}

.about .about_box p {
     font-size: 17px;
     line-height: 30px;
     color: #23242a;
}

.about_box_ span {
     font-weight: bold;
     font-size: 50px;
     line-height: 58px;
     color:#23242a; 
     padding-bottom: 10px;
display: block
}

.about_box_ { text-align: left;
     padding-top: 130px;}

.about_box_ p {
     font-size: 17px;
     line-height: 30px;
     color: #23242a;
     
}

</style>
<!-- about -->
    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-5 co-sm-l2">
                    <div class="about_img">
                        <figure><img src="uploads/abtus.jpg" alt="img" width="500" height="500"/></figure>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-7 co-sm-l2"> 
                    <div class="about_box">
                        <span>Our Album Shop</span>
                        <p class="abt">Soulmates is a Korea-based distributor of K-Pop music. Going beyond general music distribution, we hope to become a contact point between pop K-Pop Stars and Fans around the world. </p>

                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-7 co-sm-l2">
                    <div class="about_box_ ">
                        <p>We handle 100% AUTHENTIC original albums and goods. Products are distributed from Korea to worldwide with SOULMATES   certified fast and safe delivery.</p>

                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 co-sm-l2">
                    <div class="about_img">
                        <figure><img src="uploads/about.png" alt="img" width="500" height="500"/></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end about -->
    <?php 

include("includes/footer.php"); ?>