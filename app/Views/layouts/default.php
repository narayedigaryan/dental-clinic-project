<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title ?? '';?></title>
    <style>
        #wrapper {
            width: 200px; /* Set sidebar width */
            height: 100vh; /* Full height */
            position: fixed; /* Fix sidebar to the side */
        }

        #content {
            margin-left: 0px; /* Offset content by the sidebar width */
        }


    </style>
    <link href="public/assets111/css/fontawesome/css/all.css" rel="stylesheet" type="text/css">

    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <link href="public/assets111/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<body id="page-top">

<div id="wrapper" class="d-flex">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/app/Views/admin/admin.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item active">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Գրանցումներ</span>
            </a>

            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded " style="padding-left:0">
                    <a class="collapse-item" href="<?=base_url('/add_patient')?>">Ավելացնել հաճախորդ</a>
                    <a class="collapse-item" href="<?=base_url('/search_patient')?>">Գտնել հաճախորդին</a>
                </div>
            </div>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?=base_url('/table_admins')?>">
                <i class="fas fa-fw fa-people-arrows"></i>
                <span>Մեր ադմինները</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Interface
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-file-image"></i>
                <span>Նկարներ</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?=base_url('/background_images')?>">Ֆոնի նկարներ</a>
                    <a class="collapse-item" href="cards.html">Այլ նկարներ</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
               aria-expanded="true" aria-controls="collapseUtilities2">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Ծառայություններ</span>
            </a>
            <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded " style="padding-left:0">
                    <a class="collapse-item" href="<?=base_url('/add_new_servicess')?>">Ստեղծել ծառայություններ</a>
                    <a class="collapse-item" href="utilities-border.html">Ծառայությունների ցանկ</a>
                </div>
            </div>
        </li>


        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Այլ էջեր</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="<?=base_url('/login')?>">Login</a>
                    <a class="collapse-item" href="<?=base_url('/register')?>">Register</a>
                    <a class="collapse-item" href="<?=base_url('/forgot-password')?>">Forgot Password</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Other Pages:</h6>
                    <a class="collapse-item" href="<?=base_url('/404')?>">404 Page</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?=base_url('/admin_comments')?>">
                <i class="fas fa-fw fa-comment"></i>
                <span>Մեկնաբանություններ</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url('/web_second_part')?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Web էջ 2-րդ բաժին</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?=base_url('/web_third_part')?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Web էջ 3-րդ բաժին</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
</div>
<?php //= app()->get('test');?>
<?php get_alerts(); ?>
<div id="content" class="flex-grow-1 p-4">
    <?= $this->content; ?>
</div>


<script src="public/assets111/vendor/jquery/jquery.min.js"></script>
<script src="public/assets111/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="public/assets111/vendor/jquery-easing/jquery.easing.min.js"></script>


<script src="public/assets111/js/sb-admin-2.min.js"></script>
<script src="public/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>


<script>
    $(document).ready(function() {
        tinymce.init({
            selector: '#editor',
            plugins: 'table lists link image code fullscreen',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | table | numlist bullist | link image | code fullscreen',
            menubar: 'file edit view insert format table tools help',
            height: 300,
            branding: false,
            content_css: 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css'
        });
    });
</script>

</body>
</html>



