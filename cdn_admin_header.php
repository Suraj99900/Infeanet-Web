<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Infeanet - Technology & IT Solutions</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <!-- Favicons -->
    <link href="assets/img/icon/logo.svg" rel="icon">
    <link href="assets/img/icon/logo.svg" rel="apple-touch-icon">

    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- DataTable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Main Template CSS -->
    <link href="assets/css/style_admin.css" rel="stylesheet">
    <link rel="stylesheet" href="res/css/select2.min.css">

    <!-- jQuery MUST BE FIRST BEFORE Select2 & DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- TinyMCE -->
    <!-- <script src="https://cdn.tiny.cloud/1/87ziajgslefznkwf0ger86nt82bwwz9qiuc2gqpfazqa5etr/tinymce/8/tinymce.min.js" referrerpolicy="origin"></script> -->
    <script src="res/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <?php
    if (isset($_GET['message'])) {
        echo "<script>alert('" . htmlspecialchars($_GET['message']) . "');</script>";
    }
    ?>
</head>

<body>
