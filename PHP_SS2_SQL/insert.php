<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php
        $err_id=$err_name=$err_dob ="";
        $done = "";
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(empty($_POST["id"])){
               $err_id="*"."ID không được bỏ trống";
            }else{
                $match = preg_match("/(TH|th)[\d]{7}/",$_POST["id"]);
                if(!$match){
                    $err_id = "*"."ID phải có dạng THxxxxxxx (theo sau TH là 7 số)";
                }
            }
            if(empty($_POST["stu_name"])){
                $err_name="*"."Tên không được bỏ trống";
            }else{
                $match = preg_match("/\w+/",$_POST["stu_name"]);
                if(!$match){
                    $err_name = "*"."Tên không được bỏ trống";
                }
            }

            if(empty($_POST["stu_dob"])){
                $err_dob="*"."Ngày sinh không được bỏ trống";
            }else{
                $match = preg_match("/\w+/",$_POST["stu_dob"]);
                if(!$match){
                    $err_dob = "*"."Ngày sinh không được bỏ trống";
                }
            }

            if(!$err_name && !$err_id && !$err_dob){
                require_once "configure.php";
                $id = strtoupper($_POST["id"]);
                $name = $_POST["stu_name"];
                $dob = $_POST["stu_dob"];
                $sql = "insert into student values('$id','$name','$dob')";
                $result=mysqli_query($link,$sql);
                header("location: index.php");
                exit();
            }



        }

    ?>

    <div class="container">
        <div class="box">
            <h1>Thêm học sinh <a href="index.php">Back</a></h1>
            <p class="done"><?=$done?></p>
            <form class="form-insert" action="<?=$_SERVER["PHP_SELF"]?>" method="post">
                <div class="mb-3">
                    <label for="id" class="form-label">RollNo</label>
                    <input type="text" class="form-control" id="id" name="id" value="">
                    <p class="err"><?=$err_id?></p>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="stu_name" value="">
                    <p class="err"><?=$err_name?></p>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date Of Birth</label>
                    <input type="date" class="form-control" id="dob" name="stu_dob" value="">
                    <p class="err"><?=$err_dob?></p>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>

</body>
</html>