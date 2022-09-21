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
    if ($mysqli->connect_error){
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }
    session_start();
    $id = $_SESSION['StudentID'];
    $name = $_POST["CourseName"];

    $query = "delete from StudentClass where CourseName = '$name'";
    if ($result = $mysqli->query($query)){
        echo "<script>alert('Drop Course Successfully');location.href='Student.php'</script>";
    }
    else{
        echo "Course was not Drop because " . $id . " is not taken";
    }
    $mysqli->close();
?>