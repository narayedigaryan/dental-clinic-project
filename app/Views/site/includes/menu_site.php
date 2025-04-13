<?php
$current_page = $_SERVER['REQUEST_URI'];
?>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="site.php">Dental<span>Care</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= (strpos($current_page, '/site') !== false) ? 'active' : '' ?>">
                    <a href="<?= base_url('/site') ?>" class="nav-link">Գլխավոր Էջ</a>
                </li>
                <li class="nav-item <?= (strpos($current_page, '/about') !== false) ? 'active' : '' ?>">

                    <a href="<?= base_url('/about') ?>" class="nav-link">Մեր մասին</a>
                </li>
                <li class="nav-item <?= (strpos($current_page, '/services') !== false) ? 'active' : '' ?>">
                    <a href="<?= base_url('/services') ?>" class="nav-link">Ծառայություններ</a>
                </li>
                <li class="nav-item <?= (strpos($current_page, '/our_works') !== false) ? 'active' : '' ?>">
                    <a href="<?= base_url('/our_works') ?>" class="nav-link">Մեր գործերից</a>
                </li>
                <li class="nav-item <?= (strpos($current_page, '/send_mail') !== false) ? 'active' : '' ?>">
                    <a href="<?= base_url('/send_mail') ?>" class="nav-link">Կապ մեզ հետ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>

    .navbar-nav .nav-item .nav-link {
        color: white !important;
    }


    .navbar-nav .nav-item.active .nav-link {
        color: #007bff !important; /* Blue color for active item */
        font-weight: bold;
    }
</style>
<!--<script>-->
<!--    document.addEventListener("DOMContentLoaded", function () {-->
<!--        let currentPath = window.location.pathname; // Get current page path-->
<!--        let navLinks = document.querySelectorAll(".navbar-nav .nav-item");-->
<!---->
<!--        navLinks.forEach(function (navItem) {-->
<!--            let link = navItem.querySelector("a");-->
<!--            if (link && link.getAttribute("href") === currentPath) {-->
<!--                navItem.classList.add("active"); // Add active class immediately-->
<!--            }-->
<!---->
<!--            // Add click event to set active instantly-->
<!--            link.addEventListener("click", function () {-->
<!--                navLinks.forEach(item => item.classList.remove("active")); // Remove previous active-->
<!--                navItem.classList.add("active"); // Add to clicked item-->
<!--            });-->
<!--        });-->
<!--    });-->
<!--</script>-->