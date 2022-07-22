<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])//chuyen doi sang dang html de tranh xam nhap tu ben ngoai; ?>">
        <label>Ho va ten: </label><input type="text" name="name"> <br>
        <label>Email: </label><input type="email" name="email"><br>
        <label>So dien thoai: </label><input type="number" name="sdt"><br>
        <button type="submit" name="click">Submit</button>
    </form>

    <?php
    $_name = $_email = $_sdt = "";//khai bao chuoi rong
    if ($_SERVER["REQUEST_METHOD"] == "POST") {//xac dinh co phai phuong thuc post hay khong
        if (isset($_POST["click"])) {
            if (!empty($_POST["name"]) || !empty($_POST["email"]) || !empty($_POST["sdt"])) {//sau khi xac dinh da dien day du thong tin thi thuc hien cau lenh o duoi
                $_name = is_input($_POST["name"]);
                $_email = is_input($_POST["email"]);
                $_sdt = is_input($_POST["sdt"]);
                echo "Thong tin cua ban </br>";
                echo $_name."<br>";
                echo $_email."<br>";
                echo $_sdt."<br>";
            } else {
                echo "Ban dien thieu thong tin.";
            }
        }
    }
    function is_input($data)
    {
        //ham kiem tra dau vao loai bo cac ky tu khong can thiet
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
</body>

</html>