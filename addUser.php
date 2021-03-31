<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm người dùng</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
//Kết nối database
    $username = "root";
    $password = "";
    $host = "localhost";
    $database = "user_form";
    $connection = new mysqli($host, $username, $password, $database);
    if ($connection->connect_error) {
        die("Connection is error!");
    }
// Thực hiện thêm
    if(isset($_POST["add-user"])){
        $fullName = $_POST["full-name"];
        if($_POST["gender"]=="male"){
            $gender = 1;
        }
        elseif ($_POST["gender"]=="female"){
            $gender = 2;
        }
        else {
            $gender =3;
        }
        $dateOfBirth = $_POST["date-of-birth"];
        $address = $_POST["address"];
        $phoneNumber = $_POST["phone-number"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "INSERT INTO user VALUES ('','$fullName','$gender','$dateOfBirth','$address','$email','$phoneNumber','$password')";
        if($connection -> query($sql)){
            echo "<script>alert('Thêm thành công!');</script>";
        }
        else{
            echo "<script>alert('Thêm không thành công! Vui lòng kiểm tra lại!');</script>";
        }
    }
    $connection -> close();
?>
   <div class="user-form">
       <form method="post" action="">
           <div class="form-group">
              <div class="label-1"><label for="full-name">Họ và tên: </label></div>
               <label>
                   <input type="text" name="full-name">
               </label>
           </div>
           <div class="form-group">
               <div class="label-1"><label for="gender">Giới tính: </label></div>
               <label>
                   <select name="gender" id="gender">
                       <option value="male">Nam</option>
                       <option value="female">Nữ</option>
                       <option value="other">Khác</option>
                   </select>
               </label>
           </div>
           <div class="form-group">
               <div class="label-1"><label for="date-of-birth">Ngày sinh: </label></div>
               <label>
                   <input type="date" name="date-of-birth">
               </label>
           </div>
           <div class="form-group">
               <div class="label-1"><label for="address">Địa chỉ: </label></div>
               <label>
                   <input type="text" name="address">
               </label>
           </div>
           <div class="form-group">
               <div class="label-1"><label for="phone-number">Số điện thoại: </label></div>
               <label>
                   <input type="text" name="phone-number">
               </label>
           </div>
           <div class="form-group">
               <div class="label-1"><label for="email">Email: </label></div>
                   <label>
                       <input class="input-1" type="text" name="email" placeholder="Địa chỉ email sẽ là tên tài khoản đăng nhập!">
                   </label>
           </div>
           <div class="form-group">
               <div class="label-1"><label for="password">Mật khẩu: </label></div>
               <label>
                   <input type="password" name="password">
               </label>
           </div>
           <button type="submit" name="add-user">Submit</button>
       </form>
   </div>
</body>
</html>
