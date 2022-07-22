<?php
   if($_SERVER["REQUEST_METHOD"]=="POST"){
       require_once "configure.php";
       $sql = "delete from student where rollNo = ?";
       if($stm=mysqli_prepare($link,$sql)){
           $id=$_POST["id"];
           mysqli_stmt_bind_param($stm,"s",$id);
           if(mysqli_stmt_execute($stm)){
               header("location: index.php");
               exit();
           }else{
               echo "Lỗi không thể xóa.Hoặc không tìm thấy học sinh";
           }
       }
       mysqli_stmt_close($stm);
   }else{
       if(empty($_GET["id"])){
           header("location: err.php");
           exit();
       }
   }


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form{
            width: 500px;
            margin: 0 auto;
        }
        input{
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
        <p>Bạn có muốn thực sự xóa học sinh này?</p>
        <input type="text" hidden value="<?=$_GET["id"]?>" name="id">
        <input type="submit" value="Yes">
        <a href="index.php">No</a>
    </form>
</body>
</html>
