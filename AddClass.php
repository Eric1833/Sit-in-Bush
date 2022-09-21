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
    $employee = $_SESSION['EmployeeID'];
    $id = $_POST["class_id"];
    $name = $_POST["class_name"];
    $credits = $_POST["class_credit"];

    $query = "INSERT INTO Class (CourseID,CourseName,CourseCredits,EmployeeID) VALUES ('$id','$name','$credits','$employee')";
    if ($result = $mysqli->query($query)){
        echo "<script>alert('Add Course successfully');location.href='Teacher.php'</script>";
    }
    else{
        echo "<script>alert('Add Course Fail, Course already exist');location.href='Teacher.php'</script>";
    }
    $mysqli->close();
?>