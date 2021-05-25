<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title> Pet Profile Page</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

 <?php session_start() ;?>

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/portfolio.js"></script>
    <script src="js/hoverdir.js"></script>   
    <div id="features" class="section wb">
        <div class="container">
            <div class="section-title text-center">
            <h2>Hi user</h2>
                <h3>Welcome</h3>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="features-left">
                        <li class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                            <i class="flaticon-pet-house"></i>
                            <div class="fl-inner">
                                <h4><a href="registerpet.php">REGISTER PET </a> </h4>
                                <p> Add pet's basic details </p>
                            </div>
                        </li>
                        <li class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                            <i class="flaticon-windows"></i>
                            <div class="fl-inner">
                                <h4><a href="petattribute.php">EDIT PET'S HEALTH DETAILS</a></h4>
                                <p>Edit pet's health details </p>
                            </div>
                        </li>
    
                    </ul>
                </div>
                <div class="col-md-4 hidden-xs hidden-sm">
                    <img src="#" class="img-center img-responsive" alt="">
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="features-right">
                        <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                            <i class="flaticon-pantone"></i>
                            <div class="fr-inner">
                                <h4><a href="add_pet_health.php">ADD MORE DETAILS</a></h4>
                                <p>Add pet's health details </p>
                            </div>
                        </li>
                        <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                            <i class="flaticon-cloud-computing"></i>
                            <div class="fr-inner">
                                <h4><a href="treetable.php">VIEW </a></h4>
                                <p> View Pet's Hierarchy</p>
                            </div>
                        </li>
                       
                    </ul>
                </div><!-- end col -->
            </div><!-- end row -->
    </div>
 </div>
</body>
</html>