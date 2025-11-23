<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>FishNote - Pencatatan dan Promosi</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	
                <div class="custom-select-box">
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="#"><i class=""></i></a></li>
                            <li><a href="#"><i class=""></i></a></li>
                            <li><a href="#"><i class=""></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="login-box">
						<select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
							<option>Register Here</option>
							<option>Sign In</option>
						</select>
					</div>
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                               <li>
                                    <i class="fab fa "></i> Selamat datang di FishNote
                                </li>
                                <li>
                                    <i class="fab fa "></i> Ingin memulai pencatatan dan promosi hasil panen mu?
                                </li>
                                <li>
                                    <i class="fab fa"></i> Silahkan registrasi terlebih dahulu
                                </li>
                                <li>
                                    <i class="fab fa"></i> Mulai hidup sehat dengan mengonsumsi ikan segar tanpa pengawet.
                                </li>
                                <li>
                                    <i class="fab fa"></i> Jaminan kesegaran 100% langsung dari kolam budidaya.
                                </li>
                                <li>
                                    <i class="fab fa"></i> Dibudidayakan dengan pakan berkualitas, hasil lebih bersih & sehat.
                                </li>
                                <li>
                                    <i class="fab fa"></i> Ukuran ikan bisa request sesuai kebutuhan pembeli.
                                </li>
                                <li>
                                    <i class="fab fa"></i> Nggak usah ke pasar, ikan segar sampai depan rumah!
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">

        <!-- Start Navigation -->  
    @include('navigasi')
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    @include('search')
    <!-- End Top Search -->

    <!-- Start Slider -->
    @include('slider')
    <!-- End Slider -->

    <!-- Start Categories  -->
     @include('categoris')
    <!-- End Categories -->
	
	<div class="box-add-products">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<img class="img-fluid" src="images/add-img-01.jpg" alt="" />
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="offer-box-products">
						<img class="img-fluid" src="images/add-img-02.jpg" alt="" />
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- Start Products  -->
    @include('products')
    <!-- End Products  -->

    <!-- Start Blog  -->
    @include('blog')
    <!-- End Blog  -->

    <!-- Start Instagram Feed  -->
    @include('feed')
    <!-- End Instagram Feed  -->

    <!-- Start Footer  -->
    @include('footer')
    <!-- End Footer  -->

    <!-- Start copyright  -->
    @include('copyright')
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>