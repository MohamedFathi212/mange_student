<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylee.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" href="imgs/photo.jpg">
    <title>إدارة بيانات الطلاب</title>
</head>
<body dir="rtl">
    <?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'mange_student';
    $conn = mysqli_connect($host, $user, $pass, $db);
    $res = mysqli_query($conn, "SELECT * FROM student");

    $id = '';
    $name = '';
    $adress = '';

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }

    if (isset($_POST['adress'])) {
        $adress = $_POST['adress'];
    }

    $sqls = '';

    if (isset($_POST['add'])) {
        $sqls = "INSERT INTO student VALUES ('$id', '$name', '$adress')";
        mysqli_query($conn, $sqls);
        header("location:home.php");
    }

    if (isset($_POST['del'])) {
        $sqls = "DELETE FROM student WHERE name = '$name'";
        mysqli_query($conn, $sqls);
        header("location:home.php");
    }
    ?>
    <div class="parent">
        <form action="" method="post">
            <aside>
                <div class="id">
                    <img src="imgs/student.png" alt="logo site">
                    <h3>لوحة التحكم</h3>
                    <label>رقم الطالب</label><br>
                    <input type="text" name="id" id="id"><br>
                    <label>اسم الطالب</label><br>
                    <input type="text" name="name" id="name"><br>
                    <label>عنوان الطالب</label><br>
                    <input type="text" name="adress" id="adress"><br><br>
                    <button type="submit" name="add">إضافة طالب</button>
                    <button type="submit" name="del">حذف الطالب</button>
                </div>
            </aside>
            <main>
                <table class="tbl">
                    <tr>
                        <th>الرقم التسلسلي</th>
                        <th>اسم الطالب</th>
                        <th>عنوان الطالب</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['adress'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </main>
        </form>
    </div>
</body>
</html>