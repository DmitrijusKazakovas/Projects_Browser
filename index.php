<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Projects and teachers</title>
</head>
<body>
    <div class="all_tables">
  <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "s_projects";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }
    //Projects table
    $sql ="SELECT idprojects, projectscol FROM projects";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        echo "<div class='projects'><table>
        <tr>
        <th>Project ID</th>
        <th>Project Names</th>
        </tr>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
            <td>" . $row["idprojects"]. "</td>
            <td>" . $row["projectscol"]."</td>
            </tr>";
        }
        echo"</table> 
        <form action='function.php' method='POST'>
        Add new project: <input type='text' name='projectscol'>
        Add new project ID: <input type='text' name='idprojects'>
        <input type='submit' name='submit'>
        </form>
        </div>";
    }else {
        echo "0 results";
    }
    
    //Lecturers table
    $sql ="SELECT idlecturers, lecturerscol FROM lecturers";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        echo "<div class='teachers'><table>
        <tr>
        <th>Lecturer ID</th>
        <th>Lecturer Names</th>
        </tr>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
            <td>" . $row["idlecturers"]. "</td>
            <td>" . $row["lecturerscol"]."</td>
            </tr>";
        }
        echo"</table> </div>";
    }else {
        echo "0 results";
    }

    //Final table 
    $sql = "SELECT projects.idprojects, projects.projectscol, lecturers.lecturerscol 
    FROM projects, lecturers
    WHERE projects.idprojects = lecturers.idlecturers
    ORDER by projects.idprojects";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
        echo " <div class='final_res'> <table>
        <tr>
        <th>ID</th>
        <th>Project</th>
        <th>Lecturer</th>
        </tr>";
        while($row = $result->fetch_assoc()){
            echo "<tr>
            <td>" . $row["idprojects"]. "</td>
            <td>" . $row["projectscol"]."</td>
            <td>" . $row["lecturerscol"]."</td>
            </tr>";
        }
        echo"</table> </div>"; 
    }else {
        echo "0 results";
    }
  ?>
  </div>
</body>
</html>