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

    $user = $_POST["stud_id"];
    $fname = $_POST["stud_fname"];
    $lname = $_POST["stud_lname"];
    $phone = $_POST["stud_phoneNum"];
    $addr = $_POST["stud_address"];
    $dateofbirth = $_POST["stud_dateofbirth"];
    if ($user == ""){
        echo "User was not created because the field was left empty";
        exit();
    }

    $query = "INSERT INTO Student (StudentID,LastName,FirstName,PhoneNumber,Address,DateOfBirth) VALUES ('$user','$fname','$lname','$phone','$addr','$dateofbirth')";
    if ($result = $mysqli->query($query)){
        echo "<script>alert('created successfully');location.href='LoginStudent.html'</script>";
    }
    else{
        echo "<script>alert('created fail, user already exist');location.href='LoginStudent.html'</script>";
    }
    $mysqli->close();
?>