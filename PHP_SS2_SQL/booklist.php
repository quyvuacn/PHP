<?php
    $myDB = new mysqli('localhost','root','','library');
    if ($myDB -> connect_error) {
        die('Connect Error (' . $myDB->connect_errno . ')' . $myDB->connect_error);
    }
    $sql = "SELECT * FROM books 
    JOIN authors
    ON books.authorid = authors.authorid";
    $result = $myDB->query($sql);
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
<style>
    *{
        margin: 0;
    }
    table{
        margin: 40px auto 0px auto;
    }
    form{
        display: flex;
        justify-content: center;
        gap: 10px;

    }
    button{
        cursor: pointer;
        background: #efefef;
        padding: 6px;
        border: 1px solid #666;
        border-radius: 4px;
    }
    a{
        color: #000;
        display: flex;
        text-decoration: none;
        align-items: center;
        background: #efefef;
        padding: 6px;
        border: 1px solid #666;
        border-radius: 4px;
    }
</style>

<table cellspacing="2" cellpadding="6" align="center" border="1">
    <tr>
        <td colspan="4">
            <form action="<?=$_SERVER["PHP_SELF"]?>"  method="get">
                <input type="text" name="search" id="search" placeholder="Tìm kiếm một cuốn sách" value="">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                <a href="insert.php"><i class="fa-solid fa-plus"></i></a>
            </form>

        </td>
    </tr>
    <tr>
        <td align="center">Title</td>
        <td align="center">Year Published</td>
        <td align="center">Author</td>
    </tr>
    <?php

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if(isset($_GET["search"])){
                $key = $_GET["search"];
                $sql = "SELECT * FROM books 
                            JOIN authors
                            ON books.authorid = authors.authorid
                            WHERE books.title LIKE '%$key%'";
                $result = $myDB->query($sql);
            } else {
                $sql = "SELECT * FROM books 
                            JOIN authors
                            ON books.authorid = authors.authorid";
                $result = $myDB->query($sql);
            }
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>";
                echo stripcslashes($row["title"]);
                echo "</td><td align='center'>";
                echo $row["pub_year"];
                echo "</td><td>";
                echo $row["name"];
                echo "</td>";
                echo "</tr>";
            }
        }
    ?>

</table>