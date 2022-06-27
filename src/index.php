<?php
include './functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nordvpn Web</title>
    <link rel="stylesheet" href="./dist/css/bootstrap.min.css">
    <script src="./dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container py-4">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-5 m-auto">
                <header class="mb-3 text-center">
                    <img src="./img/logo.png" alt="NordVPN logo" class="img-responsive img-fluid mb-3" width="250"/>
                </header>
                <?php
                if(preg_match("/Account Information/" , file_get_contents('../storage/login.txt'))){
                    include './connect.php';
                }else{
                    include './login.php';
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>