<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?=get_csrf_meta();?>
    <title><?= $title ?? '';?>></title>

    <!-- Custom fonts for this template-->
    <link href="public/assets111/css/fontawesome/css/all.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="public/assets111/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-secondary">
<?php get_alerts();?>
<?= $this->content;?>

<!-- Bootstrap core JavaScript-->
<script src="public/assets111/vendor/jquery/jquery.min.js"></script>
<script src="public/assets111/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="public/assets111/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
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