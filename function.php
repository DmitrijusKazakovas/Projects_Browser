<?php
include ("updateproj.php");

if (isset($_POST['submit'])){
        $projectscol = $_POST['projectscol'];
        $idprojects = $_POST['idprojects'];

        $result=mysqli_query($mysqli, "INSERT into projects values('', 'projectscol', 'idprojects')");
    }
?>