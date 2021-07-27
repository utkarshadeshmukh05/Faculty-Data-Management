<?php
error_reporting(0);
$year=$_POST["year"];
$branch=$_POST["branch"];
$division=$_POST["division"];
$subject=$_POST["subject"];
$faculty=$_POST["faculty"];
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'faculty_project');

// Uploads files
if (isset($_POST['add'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];
    

    // destination of the file on the server
    $destination = 'teachingplan_uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    
    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO teachingplan (year,branch,division,subject,faculty_name,teachingplan_file) VALUES ('$year','$branch','$division','$subject','$faculty','$filename')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }}
    //update teachplan
 if (isset($_POST['update'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];
    

    // destination of the file on the server
    $destination = 'teachingplan_uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    
    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $updateQuery = "UPDATE teachingplan SET teachingplan_file=$filename WHERE faculty_name=$faculty";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }}

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Teachplan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
 integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./tech.css">
  
</head>
<body>


  <nav class="navbar"  id="nav" style="background-color:#d40b0b; ">
    <span class="navbar-brand "  id="nav2" style="color:white; margin-left: 5%; 
    text-shadow: 0 3px 10px rgb(0 0 0 / 0.5);"><h3>Teaching Plan</h3></span>
  </nav>
  <div class="wrapper">
    <div class="sidebar">
       
        <ul>
           <li><a href="./setclass.php">Set Profile</a></li>
                  <li><a href="./addteachplan.php">Add Teach plan</a></li>
                  <li><a href="./addattendance.php">Add Attendance</a></li>
                  <li><a href="./viewtimetable.php">View Timetable</a></li>
                  <li><a href="./Viewstudentlist.php">View class List</a></li>
                  <li><a href="checkform.php">Class Incharge</a></li>
                  <li><a href="./login.php">Logout</a></li>
        </ul>  
    </div>
    </div>
  
  <div id="back" style=" padding: 10px; margin-top: 5%; margin-left: 35%;  border: 1px solid #fdfeff; width: 35%; height:auto;" >
    <div  style="margin-left: 25%; padding-right: 15px;">
        <div style="margin-left: 26px;  font-weight: bolder; font-size:larger;  font-family: 'PT Sans', sans-serif;"></div>
            <form action=" "  id="form" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  
          <div class="col-sm-10" id="true">
          <h6>Year</h6>
          <select id="year" name="year">
            <option value="year">Select Year</option>
            <option value="1">I</option>
            <option value="2">II</option>
            <option value="3">III</option>
            <option value="4">IV</option>
          </select></div>
         
          <div class="select">Branch</div>
          <select id="Branch" name="branch">
            <option value="Branch">Select Branch</option>
            <option value="CS">Computer Science</option>
            <option value="II">Information Technology</option>
            <option value="MECH">Mechanical</option>
            <option value="INSTRU">Instrumentation</option>
            <option value="ETC">Electronics and Telecommunication</option>
          </select></div>
                  
                
          <div class="col-sm-10" style="margin-top: 4%;" id="true">
          <h6>Division</h6>
          <select id="division" name="division">
                      <option value="year">Select Division</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                      <option value="E">E</option>
                      <option value="F">F</option>
                      
         </select></div>
                  
                
        <div class="row mb-3">
        <div class="col-sm-8" id="true">
        <input id= "user" class="form-control"  placeholder="Enter subject" name="subject">
        </div>
                  
        <div class="col-sm-8" style="margin-top: 4%;" id="true">
        <input type="text"  class="form-control" id="phone"  placeholder="Enter faculty name" name="faculty">
        </div>
    
         
        <div class="formgroup container-fluid">
          <input type="file" name="myfile">
          <input type="hidden" name="MAX_FILE_SIZE" value="67108864"/> <! - 64 MB's worth in bytes ->
        </div>

          </div>
            </div>
                     
    
                
                <button type="submit" class="btn"  id ="color" style="margin-left:15%;  width: 30%; padding: 10px; margin-top: 4% ; color: white;" name="add">Add Plan</button>
                <button type="button" class="btn btn-primary" id ="color" style="margin-left:5%; width: 30%; padding: 10px; margin-top: 4% ; color: white;" name="update">Update</button>
              </div>
              </form >
        
    </div>





   
</body></html>























































