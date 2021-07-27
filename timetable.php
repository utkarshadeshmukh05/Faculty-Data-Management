<?php
error_reporting(0);
$year=$_POST["year"];
$branch=$_POST["branch"];
$division=$_POST["division"];
$classincharge=$_POST["classincharge"];
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'faculty_project');

// Uploads files
if (isset($_POST['add'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];
    

    // destination of the file on the server
    $destination = 'timetable_uploads/' . $filename;

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
            $sql = "INSERT INTO timetable (year,branch,division,timetable_file, classincharge) VALUES ('$year','$branch','$division','$filename','$classincharge')";
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
  <title>Add timetable</title>
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
    text-shadow: 0 3px 10px rgb(0 0 0 / 0.5);"><h3>Add Timetable</h3></span>
  </nav>
  <div class="wrapper">
    <div class="sidebar">
       
        <ul>
          <li><a href="./home.html">Home</a></li>
          <li><a href="./timetable.php">Add timetable</a></li>
          <li><a href="./studentlist.php">Add StudentList</a></li>
          <li><a href="./Viewteachingplan.php">View Teaching plan</a></li>
          <li><a href="./Viewattendance.php">View Attendance List</a></li>
          
        </ul> 
    </div>
    </div>
     <div id="back" style=" padding: 10px; margin-top: 1%; margin-left: 35%;  border: 1px solid #fdfeff; width: 35%; height:auto;" >
    <div  style="margin-left: 25%; padding-right: 15px;">
        <div style="margin-left: 26px;  font-weight: bolder; font-size:larger;  
        font-family: 'PT Sans', sans-serif;"></div>
        <form  action=" " id="login" class="input-group" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
             
           
         
          <div class="col-sm-10" id="true">
                   <h6 style="font-weight: bold;">Year</h6>
                   <span id="pass3" style="color: red; padding: 0%; "></span>
          <select id="year1" name="year">
            <option value="year">Select Year</option>
            <option value="1">I</option>
            <option value="2">II</option>
            <option value="3">III</option>
            <option value="4">IV</option>
          </select>
                    
          
          
         <div class="col-sm-10" style="margin-top: 4%;" id="true">
                    <h6 style="font-weight: bold;">Branch</h6>
                    <span id="pass3" style="color: red; padding: 0%; "></span>
                    <select id="year2" name="branch">
            <option value="Branch">Select Branch</option>
            <option value="CS">Computer Science</option>
            <option value="IT">Information Technology</option>
            <option value="MECH">Mechanical</option>
            <option value="INSTRU">Instrumentation</option>
            <option value="ETC">Electronics and Telecommunication</option>
          </select>
  
         <div class="col-sm-10" style="margin-top: 4%;" id="true">
                     <h6 style="font-weight: bold;">Division</h6>
                    <span id="pass4" style="color: red; padding: 0%; "></span>
                    <select id="year2" name="branch" style="padding:0px";>
            <option value="Branch">Division</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
          </select>
        
        <div class="row mb-3" style="margin-top: 4%;" >
                
                <div class="col-sm-10"id="true" >
          <input type="file" name="myfile">
          <input type="hidden" name="MAX_FILE_SIZE" value="67108864"/> <! - 64 MB's worth in bytes ->
        </div>
        <div>
         <div class="row mb-3" style="margin-top: 4%;" >
        <span id="pass1" style="color: red; padding: 0%; "></span>
        <input type="text" class="input-field" placeholder="Class Incharge" id="phone" name="classincharge" required>
  </div>
        <button type="submit" class="btn"  id ="color" style="margin-left:30%; 
                 width: 50%; padding: 10px; margin-top: 4% ; color: white;" name="add">Add Timetable</button> 
      </form>



    </div>
    <script>

  form.addEventListener('submit' ,(event)=>
  
  {
    var form = document.getElementById("form");
  var sub = document.getElementById("user").value;
  var form2 = document.getElementById("phone").value;
  var form3 = document.getElementById('file');
  var form4 =document.getElementById("year1").value;
  var form5 =document.getElementById("year2").value;
  var valid =document.getElementById("pass1");
  var valid2 =document.getElementById("pass2");
  
  if((sub == '') && (form2 == '') && (form3.files.length == 0) && (form4 == "Select Year") && (form5 == "Select Division")){
  alert("please fill the form ");
  event.preventDefault();
  
  }
  
  else if ((sub == '') || (form2 == ''))
  {
  
  
    alert("please fill all the fields");
  event.preventDefault();
  
  
  }
  
  else{
  
    validation();
  }
  
   
    
    
  }
  
  )
  
  
  function validation(){
  
    var form = document.getElementById("form");
  var sub = document.getElementById("user").value;
  var form2 = document.getElementById("phone").value;
  var form3 = document.getElementById('file');
  var form4 = document.getElementById("year1").value;
  var form5 =document.getElementById("year2").value;
  var valid =document.getElementById("pass1");
  var valid2 =document.getElementById("pass2");
  
  
  
  
    if(sub == '')
    {
    document.getElementById("pass1").innerHTML="<h6>**not be empty</h6>";
    document.getElementById("user").style.borderColor="red";
    event.preventDefault();
    console.log("prevent");
  
  }
  
    
    else if(!isNaN(sub)) {
    document.getElementById('pass1').innerHTML="<h6>**not be number</h6>";
    document.getElementById('user').style.borderColor="red";
    event.preventDefault();
    console.log("prevent");
  }
  
    else{
  
  document.getElementById('user').style.borderColor="green";
  document.getElementById('pass1').innerHTML="   ";
  console.log(sub);
  
  }
  
  if(form2 == '')
    {
    document.getElementById("pass2").innerHTML="<h6>**not be empty</h6>";
    document.getElementById("phone").style.borderColor="red";
    event.preventDefault();
    console.log("prevent");
  
  }
  
    
    else if(!isNaN(form2)) {
    document.getElementById('pass2').innerHTML="<h6>**not be number</h6>";
    document.getElementById('phone').style.borderColor="red";
    event.preventDefault();
    console.log("prevent");
  }
  
    else{
  
  document.getElementById('phone').style.borderColor="green";
  document.getElementById('pass2').innerHTML="   ";
  console.log(sub);
  
  }
  
  
   if(form3.files.length == 0){
  document.getElementById("passed").innerHTML="**select file";
  event.preventDefault();
   }
  
   else{
  
    document.getElementById("passed").innerHTML=" ";
   }
  
  if((form4 == "1")||(form4 == "2")||(form4 == "3")||(form4 == "4")){
    document.getElementById('pass3').innerHTML="    ";
    
  }
  
    else{
     
      document.getElementById('pass3').innerHTML="<h6>**select valid option</h6>";
   
   event.preventDefault();
   
    
    }
  
  
  
  
  
    if((form5 == "A")||(form5 == "B")||(form5 == "C")||(form5 == "D")||(form5 == "E")){
      document.getElementById('pass4').innerHTML="  ";
  
  }
  
  else{
    
    document.getElementById('pass4').innerHTML="<h6>**select valid option</h6>";
    
  event.preventDefault();
  console.log("prevent");
     
    
  
  
  }
  
  }
  
  
  
  
  
  
  
  </script>
</body>
</html>