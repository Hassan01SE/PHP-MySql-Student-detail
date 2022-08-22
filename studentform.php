<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
</head>

<!-- For connection -->
<?php 

$localhost = "localhost";
$user = "root";
$pass = "";
$dbname = "student";

$con = mysqli_connect($localhost,$user,$pass);
if(!$con){
    echo ("failed connection");
    die();
} 
else{
    
}

 ?>



<body>
<img src="https://iconarchive.com/download/i99510/webalys/kameleon.pics/Student-3.ico" height="70px" alt="">
    <h1>Student Details</h1>
<form action="" method="POST">
<label >Student Name: <input type="text" name="name" placeholder="enter name" required></label>
<br>
<label >Student Age: <input type="number" name="age" placeholder="Age" required></label>
<br>
<label >Roll No: <input type="number" name="roll" placeholder="roll no" required></label>
<br>
<button id="sub" type="submit" name="submit"> Submit </button> 
</form>

<!-- For Insertion of record -->
<?php
$dbcon = mysqli_select_db($con,$dbname);

if (isset($_POST['submit'])){
$name = $_POST['name'];
$age = $_POST['age'];
$roll = $_POST['roll'];


 
$result = mysqli_query($con, "INSERT INTO student(name,age,Roll) VALUES('$name','$age','$roll')");
} 

?>

<!-- For Deletion of record, have to refresh  -->
<?php

if (isset($_GET['del'])){
   $serial = $_GET['serial'];
    
    $sql ="DELETE FROM student WHERE id='$serial'";
    
    $show=mysqli_query($con,$sql); 
}

?>

<h2>Student Details Table</h2>
<table>
    <thead> 
        <tr>
        <th>Serial No</th>
            <th>Name</th>
            <th>Age</th>
            <th>Roll No</th>
        </tr>
    </thead>

    
    <tbody>
<?php
 $dbcon = mysqli_select_db($con,$dbname);

 $sql="select * from student";

$show=mysqli_query($con,$sql);
while($final = $show -> fetch_assoc()) { ?>
    <tr><div>
        
        <td ><?php echo $final['id'];?></td>
        <td > <?php echo $final['name'];?></td> 
        <td ><?php echo $final['age']; ?></td> 
        <td ><?php echo $final['Roll']; ?></td>
        
    </tr>
<?php } ?>

    </tbody>
</table>
<br>
<div>
<form action="" method="GET">
<label>Enter serial number to delete record: <input name="serial" type="number" placeholder="serial number"></label>
<br>
<button type="submit" name="del" >Delete </button>
</form>

</div>


 



</body>


<style>

body{
    background-color: aquamarine;
    text-align: center;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-size: 17px;
}

button{
    padding: 7px 10px;
    border-radius: 50%;
    cursor: pointer;
}

button:hover{
    background-color: red;
    color: yellow;
    transform: scale(1.1);
}

#sub:hover{
    background-color: red;
    color:greenyellow;
}

label{
    display: block;
    color: rgb(55, 30, 77);
}
table{
    border: 2px solid black;
    margin: auto;
    background-color: yellow;
}
tr,td,th{
    border-bottom:2px solid black;
    border-left:none;
    border-right:2px solid black;
}
tr:nth-last-child{
border-bottom:2px solid black;
}
td:nth-last-child{
border-right:none;
}

</style>


</html>
