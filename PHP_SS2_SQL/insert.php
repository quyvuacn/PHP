<style>
    input{
        display: block;
        margin-top: 20px;
    }
    button{
        margin-top: 20px;
    }
</style>

<h1>Thêm sách vào thư viện</h1>
<form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
    <input type="text" name="title" placeholder="Title..." minlength="1">
    <input type="text" name="author" placeholder="Author...">
    <input type="text" name="ISBN" placeholder="ISBN...">
    <input type="text" name="pub_year" placeholder="Year public...">
    <button>Add</button>
</form>

<?php
    $myDB = new mysqli('localhost','root','','library');
    if ($myDB -> connect_error) {
        die('Connect Error (' . $myDB->connect_errno . ')' . $myDB->connect_error);
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(!empty($_POST)){
            $title = $_POST["title"];
            $author = $_POST["author"];
            $isbn = $_POST["ISBN"];
            $pub_year = $_POST["pub_year"];
            $sql = "
        INSERT INTO books(authorid,title,ISBN,pub_year,available) VALUES 
        ('$author','$title','$isbn','$pub_year',1)
        ";
            $result = $myDB->query($sql);
            echo $sql;
            echo "Thêm thành công";
        }

    }
?>