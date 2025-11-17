<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>FishNote</title>
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
                </div>
                <!-- Bagian Login Box -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="login-box text-center">
                        <select id="authSelect" class="selectpicker show-tick form-control" data-placeholder="Sign In">
                            <option value="none" selected disabled>-- Pilih Aksi --</option>
                            <option value="register">Register Here</option>
                            <option value="login">Sign In</option>
                        </select>
                    </div>
                </div>

                <!-- Popup Modal -->
                <div id="authModal" class="auth-modal">
                    <div class="auth-modal-content">
                        <span class="close-btn" onclick="closeModal()">&times;</span>
                        <div id="formContainer"></div>
                    </div>
                </div>

                <!-- Style -->
                <style>
                    /* Latar belakang popup */
                    .auth-modal {
                        display: none;
                        position: fixed;
                        z-index: 9999;
                        left: 0;
                        top: 0;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(9, 19, 85, 0.6);
                        justify-content: center;
                        align-items: center;
                    }

                    /* Kotak form */
                    .auth-modal-content {
                        background: #fff;
                        width: 400px;
                        max-width: 90%;
                        padding: 30px;
                        border-radius: 10px;
                        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
                        animation: fadeIn 0.3s ease;
                        position: relative;
                    }

                    /* Tombol close (X) */
                    .close-btn {
                        position: absolute;
                        right: 15px;
                        top: 10px;
                        font-size: 24px;
                        cursor: pointer;
                        color: #333;
                    }

                    /* Efek animasi */
                    @keyframes fadeIn {
                        from {
                            opacity: 0;
                            transform: scale(0.8);
                        }

                        to {
                            opacity: 1;
                            transform: scale(1);
                        }
                    }

                    /* Gaya form */
                    .auth-modal-content h3 {
                        text-align: center;
                        margin-bottom: 20px;
                        color: #333;
                    }

                    .auth-modal-content input {
                        width: 100%;
                        padding: 10px;
                        margin-bottom: 15px;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                    }

                    .auth-modal-content button {
                        width: 100%;
                        padding: 10px;
                        background: #007bff;
                        color: white;
                        border: none;
                        border-radius: 5px;
                    }

                    .auth-modal-content button:hover {
                        background: #0056b3;
                    }
                </style>

                <!-- Script -->
                <script>
                    const selectBox = document.getElementById("authSelect");
                    const modal = document.getElementById("authModal");
                    const formContainer = document.getElementById("formContainer");

                    selectBox.addEventListener("change", function() {
                        let content = "";

                        if (this.value === "register") {
                            content = `
        <h3>Register</h3>
        <form action="proses_register.php" method="POST">
          <input type="text" name="username" placeholder="Username" required>
          <input type="email" name="email" placeholder="Email" required>
          <input type="password" name="password" placeholder="Password" required>
          <button type="submit">Register</button>
        </form>
      `;
                        } else if (this.value === "login") {
                            content = `
        <h3>Sign In</h3>
        <form action="proses_login.php" method="POST">
          <input type="email" name="email" placeholder="Email" required>
          <input type="password" name="password" placeholder="Password" required>
          <button type="submit">Login</button>
        </form>
      `;
                        }

                        formContainer.innerHTML = content;
                        modal.style.display = "flex";
                    });

                    function closeModal() {
                        modal.style.display = "none";
                        selectBox.value = "none";
                    }

                    // Tutup modal saat klik di luar kotak
                    window.onclick = function(event) {
                        if (event.target === modal) {
                            closeModal();
                        }
                    };
                </script>
                </select>
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

<div class ="from-box register">
    <h2 class="tittle animation" style="--i: 17; --j: 0">sign up</h2>

    <from action="#">
        <div class="input-box animation" style="--i: 18; --j: 1">
            <input type
