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
    $id = $_SESSION['EmployeeID'];

    $query = "select EmployeeID, FirstName, LastName, PhoneNumber, Address,Office,OfficePhone from Employee where EmployeeID='$id'";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Employee ID: " . $row["EmployeeID"] . "<br>";
            echo "Name: " . $row["FirstName"] . " " . $row["LastName"] . "<br>";
            echo "Phone Number: " . $row["PhoneNumber"] . "<br>";
            echo "Address: " . $row["Address"] . "<br>";
            echo "Office: " . $row["Office"] . "<br>";
            echo "Office Phone: " . $row["OfficePhone"] . "<br>";
        }
    } else {
        echo "Some info loss";
    }


    $mysqli->close();
    ?>

    <h2>Course Management</h2>
    <p1>My Course</p1><br>
    <?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "c354l536", "ee4Rei9v", "c354l536");
    if ($mysqli->connect_error) {
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }
    session_start();
    $id = $_SESSION['EmployeeID'];
    $query = "select CourseID, CourseName, CourseCredits from Class where EmployeeID='$id'";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Course ID: " . $row["CourseID"] ." ";
            echo "Course Name: " . $row["CourseName"] . " ";
            echo "Course Credit: " . $row["CourseCredits"] . "<br>";
        }
    } else {
        echo "No Course Find";
    }
    $mysqli->close();
    ?>
    <br>
    <p1>Add Course</p1>
    <form action="AddClass.php" method="post">
        Course ID: <input type="text" name="class_id" id="class_id" placeholder="Ex:123456" required>
        Course Name: <input type="text" name="class_name" id="class_name" placeholder="Ex:EECS 647" required>
        Course Credits: <input type="text" name="class_credit" id="class_credit" placeholder="Ex:3" required>
        <button type="submit">Add Course</button>
    </form>

    <p1>Grade Course</p1>
    <form action="Grade.php" method="post" id="usrform">
            <?php
                $mysqli = new mysqli("mysql.eecs.ku.edu", "c354l536", "ee4Rei9v", "c354l536");
                if ($mysqli->connect_error){
                    printf('Connection failed %s\n', $mysqli->connect_error);
                    exit();
                }
                session_start();
                $id = $_SESSION['EmployeeID'];
                $query = "SELECT StudentClass.StudentID, StudentClass.CourseName, Grade from StudentClass,Class WHERE Class.EmployeeID='$id' and StudentClass.CourseName=Class.CourseName";
                $result = $mysqli->query($query);

                echo "<table style='border: 1px solid black; width: 100%'>";
                echo "<tr>";
                echo "<td >" . "StudentID" . "</td>";
                echo "<td >" . "CourseName" . "</td>";
                echo "<td >" . "Grade" . "</td>";
                echo "<td >" . "Update" . "</td>";
                echo "</tr>";
                if ($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                        echo "<tr>";
                        $_SESSION['StudentID']= $row["StudentID"];
                        echo "<td >" . $row["StudentID"] . "</td>";
                        echo "<td >" . $row["CourseName"] . "</td>";
                        echo "<td >" . $row["Grade"] . "</td>";
                        echo "<td ><input type='text' name='Grade'id='Grade'> </td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";

                $mysqli->close();
            ?>

            <button type="submit">Grade</button>
        </form>

</body>