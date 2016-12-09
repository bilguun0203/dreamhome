
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>DreamHome</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/datepicker.css" media="screen">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" media="screen">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,700,700italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>
    <script src="assets/js/custom.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <a class="navbar-brand" href="#">DreamHome</a>
    <ul class="nav navbar-nav">
        <li <?php if($data['page'] == "home") { ?>class="active" <?php } ?>><a href="?page=home">Эхлэл</a></li>
        <li <?php if($data['page'] == "branch" || $data['page'] == "branch_data") { ?>class="active" <?php } ?>><a href="?page=branch">Салбар</a></li>
        <li <?php if($data['page'] == "client") { ?>class="active" <?php } ?>><a href="?page=client">Үйлчлүүлэгч</a></li>
        <li <?php if($data['page'] == "privateowner") { ?>class="active" <?php } ?>><a href="?page=privateowner">Эзэмшигч</a></li>
        <li <?php if($data['page'] == "propertyforrent") { ?>class="active" <?php } ?>><a href="?page=propertyforrent">Түрээсийн байр</a></li>
        <li <?php if($data['page'] == "registration") { ?>class="active" <?php } ?>><a href="?page=registration">Бүртгэл</a></li>
        <li <?php if($data['page'] == "staff" || $data['page'] == "staff_data") { ?>class="active" <?php } ?>><a href="?page=staff">Ажилтан</a></li>
        <li <?php if($data['page'] == "viewing") { ?>class="active" <?php } ?>><a href="?page=viewing">Сэтгэгдэл</a></li>
    </ul>
</nav>