<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo constant("path")?>public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo constant("path")?>public/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo constant("path")?>public/admin/css/custom.css">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="<?php echo constant("path")?>public/admin/js/custom.js"></script> 
</head>

<body class="bg-gradient-primary">

<?php
require_once "./mvc/views/admin/pages/login/".$data['page'].".php";
?>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo constant("path")?>public/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo constant("path")?>public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo constant("path")?>public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo constant("path")?>public/admin/js/sb-admin-2.min.js"></script>

</body>

</html>
