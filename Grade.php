<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <a class="nav" href="Home.html">Home</a> |
        <a class="nav" href="Home.html">Log out</a>
    </nav>

    <?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "c354l536", "ee4Rei9v", "c354l536");
    if ($mysqli->connect_error) {
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }
    session_start();
    $id = $_SESSION['EmployeeID'];

    $query = "SELECT StudentClass.StudentID, StudentClass.CourseName, Grade from StudentClass,Class WHERE Class.EmployeeID='$id' and StudentClass.CourseName=Class.CourseName";
    $result = $mysqli->query($query);

    $st_id= $_SESSION['StudentID'];
    $gd =$_POST["Grade"];
    $query = "UPDATE StudentClass SET Grade = '$gd' WHERE StudentID='$st_id' ";
    $Grade = $mysqli->query($query);
    echo "<script>alert('Success');location.href='Teacher.php'</script>";
    $mysqli->close();
    ?>