<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <a class="nav" href="Home.html">Home</a> |

    </nav>
<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "c354l536", "ee4Rei9v", "c354l536");
    if ($mysqli->connect_error){
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }

    $user = $_POST["employee_id"];

    if ($user == ""){
        echo "User was not Login because the field was left empty";
        exit();
    }

    $query = "select * from Employee where EmployeeID='$user'";
    $result=mysqli_query($mysqli,$query);
    
    if ($row=mysqli_fetch_assoc($result)){
        session_start();
        $_SESSION['EmployeeID']=$row['EmployeeID'];
        $_SESSION['LastName'] = $row['LastName'];
        $_SESSION['FirstName']=$row['FirstName'];
        $_SESSION['PhoneNumber'] = $row['PhoneNumber'];
        $_SESSION['Address']=$row['Address'];
        echo "<script>alert('Login successfully');location.href='Teacher.php'</script>";
    }
    else{
        echo "<script>alert('Login failed, No user find.');location.href='LoginTeacher.html'</script>";
    }
    $mysqli->close();
?>