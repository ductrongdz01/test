<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Facebook</title>
    <link rel="stylesheet" href="formPHP.css">
</head>

<body>
    <?php include("formPHP1.php") ?>
    <div class="container">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <div class="bar"></div>
            <div class="header">facebook</div>
            <div class="femail">
                <input type="text" placeholder="Số điện thoại hoặc email" name="tk">
                <div class="err"><?php echo $tkErr?></div>
            </div>
            <div class="fpass">
                <input type="password" placeholder="Mật khẩu" name="mk">
                <div class="err"><?php echo $mkErr?></div>
            </div>
            <div class="btn">
                <button type="submit" name="click">Đăng nhập</button>
            </div>
            <div class="bar"></div>
        </form>
    </div>
</body>

</html>