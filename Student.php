<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <a class="nav" href="Home.html">Home</a> |
        <a class="nav" href="Home.html">Log out</a>
    </nav>
    <h1>Welcome!</h1>
    <?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "c354l536", "ee4Rei9v", "c354l536");
    if ($mysqli->connect_error) {
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }
    session_start();
    $id = $_SESSION['StudentID'];

    $query = "select StudentID, FirstName, LastName, PhoneNumber, Address, DateOfBirth from Student where StudentID='$id'";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Student ID: " . $row["StudentID"] . "<br>";
            echo "Name: " . $row["FirstName"] . " " . $row["LastName"] . "<br>";
            echo "Phone Number: " . $row["PhoneNumber"] . "<br>";
            echo "Address: " . $row["Address"] . "<br>";
            echo "Date Of Birth: " . $row["DateOfBirth"] . "<br>";
        }
    } else {
        echo "Some info loss";
    }
    $mysqli->close();
    ?>
    <h2>Course Info</h2>
    <p1>My Course</p1><br>
    <?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "c354l536", "ee4Rei9v", "c354l536");
    if ($mysqli->connect_error) {
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }
    session_start();
    $id = $_SESSION['StudentID'];
    $query = "SELECT CourseName, Grade from StudentClass where StudentID='$id'";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Course Name: " . $row["CourseName"] . " ";
            echo "Course Grade: " . $row["Grade"] . "<br>";
        }
    } else {
        echo "No Course Find", "<br>";
    }
    $mysqli->close();
    ?>
    <p1>Enroll </p1><br>
    <form action="Enroll.php" method="post">
        <label for="CourseName">Enroll:</label>
        <select name="CourseName" id="CourseName">
            <?php
            $mysqli = new mysqli("mysql.eecs.ku.edu", "c354l536", "ee4Rei9v", "c354l536");
            if ($mysqli->connect_error) {
                printf('Connection failed %s\n', $mysqli->connect_error);
                exit();
            }
            session_start();
            $id = $_SESSION['StudentID'];
            $query = "select CourseName from Class";
            $result = $mysqli->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<option value ='" . $row["CourseName"] . "'>" . $row["CourseName"] . "</option>";
            }
            $mysqli->close();
            ?>
        </select>
        <button type="submit">Enroll</button>
    </form>

    <p1>Drop </p1><br>
    <form action="Drop.php" method="post">
        <label for="CourseName">Drop:</label>
        <select name="CourseName" id="CourseName">
            <?php
            $mysqli = new mysqli("mysql.eecs.ku.edu", "c354l536", "ee4Rei9v", "c354l536");
            if ($mysqli->connect_error) {
                printf('Connection failed %s\n', $mysqli->connect_error);
                exit();
            }
            session_start();
            $id = $_SESSION['StudentID'];
            $query = "select CourseName from StudentClass where StudentID='$id'";
            $result = $mysqli->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<option value ='" . $row["CourseName"] . "'>" . $row["CourseName"] . "</option>";
            }
            $mysqli->close();
            ?>
        </select>
        <button type="submit">Drop</button>
    </form>

</body>