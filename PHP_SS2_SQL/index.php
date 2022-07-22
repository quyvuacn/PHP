<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        require_once "configure.php";
    ?>
    <table cellspacing="2" cellpadding="6" align="center" border="1">
        <tr>
            <td colspan="4">
                <form action="<?=$_SERVER["PHP_SELF"]?>"  method="get">
                    <input type="text" name="name" id="name" placeholder="Tìm kiếm học sinh..." value="">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    <a class="insert" href="insert.php"><i class="fa-solid fa-plus"></i></a>
                </form>
            </td>
        </tr>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date of birth</th>
            <th>Action</th>
        </tr>


        <?php
            if(!empty($_GET["name"])){
                $key = $_GET["name"];
                $sql="select * from student where stu_name like '%$key%'";
            }else{
                $sql = "select * from student";
            }
        $result=mysqli_query($link,$sql);
        while ($row=$result->fetch_assoc()){
            $id=$row["rollNo"];
            $name=$row["stu_name"];
            $dob=$row["stu_dob"];
            echo "<tr>";
            echo "<td>";
            echo $row["rollNo"];
            echo "</td>";
            echo "<td>";
            echo $row["stu_name"];
            echo "</td>";
            echo "<td>";
            echo $row["stu_dob"];
            echo "</td>";
            echo "<td class='action'>";
                    echo "<a href='#'><i class='fa-solid fa-eye'></i></a>";
                    echo "<a href='update.php?id=$id&name=$name&dob=$dob'><i class='fa-solid fa-pen'></i></a>";
                    echo "<a href='delete.php?id=$id'><i class='fa-solid fa-trash'></i></a>";
            echo "</td>";
            echo "</tr>";
        }

        ?>
    </table>
</body>
</html>

