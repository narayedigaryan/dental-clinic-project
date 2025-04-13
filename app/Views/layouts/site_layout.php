<?php

use App\Controllers\Admin\AdminController;

?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Dentist</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <!--    <link href="public/assets111/css/fontawesome/css/all.css" rel="stylesheet" type="text/css">-->
    <!--    <link href="public/assets111/css/sb-admin-2.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="<?= base_url('/public/assets111/css/flaticon.css')?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets111/css/clinic_styles.css')?>">

    <link rel="stylesheet" href="<?= base_url('/public/assets111/css/icomoon.css')?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets111/css/style.css')?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets111/css/open-iconic-bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets111/css/animate.css')?>">

    <link rel="stylesheet" href="<?= base_url('/public/assets111/css/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets111/css/owl.theme.default.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets111/css/magnific-popup.css')?>">

    <link rel="stylesheet" href="<?= base_url('/public/assets111/css/aos.css')?>">

    <link rel="stylesheet" href="<?= base_url('/public/assets111/css/ionicons.min.css')?>">

    <link rel="stylesheet" href="<?= base_url('/public/assets111/css/bootstrap-datepicker.css')?>">
    <link rel="stylesheet" href="<?= base_url('/public/assets111/css/jquery.timepicker.css')?>">
    <link rel="stylesheet" href="<?= base_url('/public/js/DataTables/datatables.min.css')?>">


    <!--    <link rel="stylesheet" href="Views/site/css/linearicons.css">-->
    <!--    <link rel="stylesheet" href="css/font-awesome.min.css">-->
    <!--    <link rel="stylesheet" href="/Config/Views/site/css/bootstrap.css">-->
    <!--    <link rel="stylesheet" href="css/magnific-popup.css">-->
    <!--    <link rel="stylesheet" href="css/nice-select.css">-->
    <!--    <link rel="stylesheet" href="css/animate.min.css">-->
    <!--    <link rel="stylesheet" href="css/jquery-ui.css">-->
    <!--    <link rel="stylesheet" href="css/owl.carousel.css">-->
    <!--    <link rel="stylesheet" href="css/main.css">-->
</head>
<body>
<section class="home-slider owl-carousel">
    <?php
    if (isset($background_images)) {
        foreach ($background_images as $image) { ?>
            <div class="slider-item"
                 style="background-image:url('<?= base_url('/images/background_images/' . htmlspecialchars($image['img_path'])) ?>')">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text align-items-center" data-scrollax-parent="true">
                        <div class="col-md-6 col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                            <h3 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Ժամանակակից
                                ատամնաբուժություն՝ </h3>
                            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">հիմնված
                                նորագույն նյութերի և գործիքների վրա, որոնք համալրված են վստահելի և փորձառու անձնակազմի
                                հոգատարությամբ:</p>
                            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="#"
                                                                                                  class="btn btn-primary px-4 py-3">Make
                                    an Appointment</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>
</section>

<!-- End footer Area -->
<?php //= app()->get('menu_site');?>
<?= cache()->get('menu_site'); ?>

<?= $this->content; ?>
<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">DentaCare.</h2>
                    <p>Մեր նպատակն է ապահովել Ձեր առողջ և գեղեցիկ ժպիտը։</p>
                </div>

            </div>
            <div class="col-md-3">
                <div class="footer-section">
                    <h4 class="ftco-heading-2 text-light">Աշխատանքային ժամեր</h4>
                    <ul>
                        <li>Երկուշաբթի-Ուրբաթ․ 10։00 - 19։00</li>
                        <li>Շաբաթ․ 10։00 - 15։00</li>
                        <li>Կիրակի փակ է</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-section">
                    <h4 class="ftco-heading-2 text-light">Կոնտակտային տեղեկատվություն</h4>
                    <p>📍 <strong>Հասցե․</strong> ք․ Նոյեմբերյան, Սուվորովի 5</p>
                    <p>📞 <strong>Հեռ․</strong> +374 94 44 54 35</p>
                    <p>📧 <strong>Email․</strong> amushegh@gmail.com</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        Mushegh Amiraghyan Dental Clinic. All rights reserved  </a>
                   </p>
                </div>
            </div>
        </div>
</footer>

<script src="<?= base_url('/public/assets111/js/jquery.min.js')?>"></script>
<script src="<?= base_url('/public/assets111/js/jquery-migrate-3.0.1.min.js')?>"></script>
<script src="<?= base_url('/public/assets111/js/popper.min.js')?>"></script>
<script src="<?= base_url('/public/assets111/js/bootstrap.min.js')?>"></script>
<script src="<?= base_url('/public/assets111/js/jquery.easing.1.3.js')?>"></script>
<script src="<?= base_url('/public/assets111/js/jquery.waypoints.min.js')?>"></script>
<script src="<?= base_url('/public/assets111/js/jquery.stellar.min.js')?>"></script>
<script src="<?= base_url('/public/assets111/js/owl.carousel.min.js')?>"></script>
<script src="<?= base_url('/public/assets111/js/jquery.magnific-popup.min.js')?>"></script>
<script src="<?= base_url('/public/assets111/js/aos.js')?>"></script>
<script src="<?= base_url('/public/assets111/js/jquery.animateNumber.min.js')?>"></script>
<script src="<?= base_url('/public/assets111/js/bootstrap-datepicker.js')?>"></script>
<script src="<?= base_url('/public/assets111/js/jquery.timepicker.min.js')?>"></script>
<script src="<?= base_url('/public/assets111/js/scrollax.min.js')?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="<?= base_url('/public/assets111/js/google-map.js')?>"></script>
<script src="<?= base_url('/public/assets111/js/main.js')?>"></script>
<script src="<?= base_url('/public/js/DataTables/datatables.min.js')?>" referrerpolicy="origin"></script>
<script src="<?= base_url('/public/js/custom.js')?>"></script>


</body>
</html>