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
    $fname = $_POST["employee_fname"];
    $lname = $_POST["employee_lname"];
    $phone = $_POST["employee_phoneNum"];
    $addr = $_POST["employee_address"];
    $office = $_POST["employee_office"];
    $officePhone= $_POST["employee_officePhone"];

    $query = "INSERT INTO Employee (EmployeeID,LastName,FirstName,PhoneNumber,Address,Office,OfficePhone) VALUES ('$user','$fname','$lname','$phone','$addr','$office','$officePhone')";
    if ($result = $mysqli->query($query)){
        echo "<script>alert('created successfully');location.href='LoginTeacher.html'</script>";
    }
    else{
        echo "<script>alert('created Fail, User already exist.');location.href='LoginTeacher.html'</script>";
    }
    $mysqli->close();
?>